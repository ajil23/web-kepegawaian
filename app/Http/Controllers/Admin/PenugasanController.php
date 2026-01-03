<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Penugasan;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenugasanController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with(['user', 'penugasan.pegawai.user'])->orderBy('created_at', 'desc')->get();
        return view('pages.admin.penugasan.index', compact('tugas'));
    }

    public function create()
    {
        $pegawai = Pegawai::with('user')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->orderBy('users.name')
            ->select('pegawai.*')
            ->get();

        return view('pages.admin.penugasan.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'deadline'     => 'required|date',
            'prioritas'    => 'required|string',
            'pegawai_id'   => 'required|array|min:1',
            'pegawai_id.*' => 'exists:pegawai,id',
        ]);

        DB::transaction(function () use ($request) {

            // Simpan TUGAS
            $tugas = Tugas::create([
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'deadline'  => $request->deadline,
                'prioritas' => $request->prioritas,
                'user_id'   => auth()->id(),
            ]);

            // Simpan PENUGASAN untuk setiap pegawai
            foreach ($request->pegawai_id as $pegawaiId) {
                Penugasan::create([
                    'pegawai_id' => $pegawaiId,
                    'tugas_id'   => $tugas->id,
                    'status'     => 'ditugaskan',
                ]);
            }
        });

        return redirect()
            ->route('admin.penugasan.index')
            ->with('success', 'Penugasan berhasil dibuat.');
    }

    public function edit(Tugas $penugasan)
    {
        // Ambil semua pegawai (join dengan user untuk nama)
        $pegawai = Pegawai::with('user')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->orderBy('users.name')
            ->select('pegawai.*')
            ->get();

        // Ambil id pegawai yang sudah ditugaskan pada tugas ini
        $pegawaiTerpilih = $penugasan->penugasan->pluck('pegawai_id')->toArray();

        return view('pages.admin.penugasan.edit', compact('penugasan', 'pegawai', 'pegawaiTerpilih'));
    }

    public function update(Request $request, Tugas $penugasan)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'deadline'     => 'required|date',
            'prioritas'    => 'required|string',
            'pegawai_id'   => 'required|array|min:1',
            'pegawai_id.*' => 'exists:pegawai,id',
        ]);

        DB::transaction(function () use ($request, $penugasan) {

            // 1️⃣ Update data TUGAS
            $penugasan->update([
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'deadline'  => $request->deadline,
                'prioritas' => $request->prioritas,
                // tetap pertahankan user_id pembuat
            ]);

            // 2️⃣ Sinkronisasi PENUGASAN pegawai
            $pegawaiIds = $request->pegawai_id;

            // Hapus penugasan yang sudah tidak ada di request
            Penugasan::where('tugas_id', $penugasan->id)
                ->whereNotIn('pegawai_id', $pegawaiIds)
                ->delete();

            // Tambah penugasan baru jika ada
            foreach ($pegawaiIds as $pegawaiId) {
                Penugasan::firstOrCreate(
                    ['tugas_id' => $penugasan->id, 'pegawai_id' => $pegawaiId],
                    ['status' => 'ditugaskan']
                );
            }
        });

        return redirect()
            ->route('admin.penugasan.index')
            ->with('success', 'Penugasan berhasil diperbarui.');
    }

    public function delete(Tugas $penugasan)
    {
        DB::transaction(function () use ($penugasan) {
            // Hapus semua penugasan terkait
            Penugasan::where('tugas_id', $penugasan->id)->delete();

            // Hapus tugas
            $penugasan->delete();
        });

        return redirect()
            ->route('admin.penugasan.index')
            ->with('success', 'Penugasan berhasil dihapus.');
    }
}