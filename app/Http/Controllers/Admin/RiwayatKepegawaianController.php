<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RiwayatKepegawaian;
use App\Models\UnitKerja;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatKepegawaianController extends Controller
{
    public function index(Request $request)
    {
        $riwayatQuery = RiwayatKepegawaian::with([
            'user',
            'unitkerja',
            'golongan',
            'jabatan',
        ]);

        // Apply search filter if provided
        if ($request->filled('q')) {
            $q = $request->q;
            $riwayatQuery->where(function ($query) use ($q) {
                $query->where('tgl_mulai', 'like', "%{$q}%")
                      ->orWhere('tgl_selesai', 'like', "%{$q}%")
                      ->orWhereHas('user', function ($userQuery) use ($q) {
                          $userQuery->where('name', 'like', "%{$q}%")
                                   ->orWhere('email', 'like', "%{$q}%")
                                   ->orWhere('nip', 'like', "%{$q}%");
                      })
                      ->orWhereHas('unitkerja', function ($unitQuery) use ($q) {
                          $unitQuery->where('nama_unitkerja', 'like', "%{$q}%");
                      })
                      ->orWhereHas('golongan', function ($golonganQuery) use ($q) {
                          $golonganQuery->where('nama_golongan', 'like', "%{$q}%");
                      })
                      ->orWhereHas('jabatan', function ($jabatanQuery) use ($q) {
                          $jabatanQuery->where('nama_jabatan', 'like', "%{$q}%");
                      });
            });
        }

        $riwayat = $riwayatQuery->orderBy('created_at', 'desc')->get();

        return view('pages.admin.riwayat_kepegawaian.index', compact('riwayat'));
    }

    public function create()
    {
        return view('pages.admin.riwayat_kepegawaian.create', [
            'users' => User::orderBy('name')->get(),
            'unitkerja' => UnitKerja::orderBy('nama_unitkerja')->get(),
            'golongan' => Golongan::orderBy('nama_golongan')->get(),
            'jabatan' => Jabatan::orderBy('nama_jabatan')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'unitkerja_id' => 'required|exists:ref_unitkerja,id',
            'golongan_id' => 'required|exists:ref_golongan,id',
            'jabatan_id' => 'required|exists:ref_jabatan,id',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'nullable|date|after_or_equal:tgl_mulai',
        ]);

        DB::beginTransaction();

        try {
            RiwayatKepegawaian::create([
                'user_id' => $request->user_id,
                'unitkerja_id' => $request->unitkerja_id,
                'golongan_id' => $request->golongan_id,
                'jabatan_id' => $request->jabatan_id,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
            ]);

            DB::commit();

            return redirect()
                ->route('admin.riwayat_kepegawaian.index')
                ->with('success', 'Riwayat kepegawaian berhasil ditambahkan.');
        } catch (\Throwable $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit(RiwayatKepegawaian $riwayat)
    {
        return view('pages.admin.riwayat_kepegawaian.edit', [
            'riwayat' => $riwayat,
            'users' => User::orderBy('name')->get(),
            'unitkerja' => UnitKerja::orderBy('nama_unitkerja')->get(),
            'golongan' => Golongan::orderBy('nama_golongan')->get(),
            'jabatan' => Jabatan::orderBy('nama_jabatan')->get(),
        ]);
    }

    public function update(Request $request, RiwayatKepegawaian $riwayat)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'unitkerja_id' => 'required|exists:ref_unitkerja,id',
            'golongan_id' => 'required|exists:ref_golongan,id',
            'jabatan_id' => 'required|exists:ref_jabatan,id',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'nullable|date|after_or_equal:tgl_mulai',
        ]);

        DB::beginTransaction();

        try {
            $riwayat->update([
                'user_id' => $request->user_id,
                'unitkerja_id' => $request->unitkerja_id,
                'golongan_id' => $request->golongan_id,
                'jabatan_id' => $request->jabatan_id,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
            ]);

            DB::commit();

            return redirect()
                ->route('admin.riwayat_kepegawaian.index')
                ->with('success', 'Riwayat kepegawaian berhasil diperbarui.');
        } catch (\Throwable $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function delete(RiwayatKepegawaian $riwayat)
    {
        $riwayat->delete();

        return redirect()
            ->route('admin.riwayat_kepegawaian.index')
            ->with('success', 'Riwayat kepegawaian berhasil dihapus.');
    }
}