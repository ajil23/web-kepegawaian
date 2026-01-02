<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with(['user', 'unitkerja', 'golongan', 'jabatan'])->get();
        return view('pages.admin.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pages.admin.pegawai.create', [
            'unitkerja' => UnitKerja::where('aktif', 'aktif')->orderBy('nama_unitkerja')->get(),
            'golongan'  => Golongan::where('aktif', 'aktif')->orderBy('nama_golongan')->get(),
            'jabatan'   => Jabatan::where('aktif', 'aktif')->orderBy('nama_jabatan')->get(),
            'users'     => User::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'unitkerja_id' => 'required|exists:ref_unitkerja,id',
            'golongan_id' => 'required|exists:ref_golongan,id',
            'jabatan_id' => 'required|exists:ref_jabatan,id',
            'status_pegawai' => 'required|in:aktif,nonaktif',
        ]);

        Pegawai::create([
            'user_id'        => $request->user_id,
            'unitkerja_id'   => $request->unitkerja_id,
            'golongan_id'    => $request->golongan_id,
            'jabatan_id'     => $request->jabatan_id,
            'status_pegawai' => $request->status_pegawai,
            'data_diri_id'   => null,
        ]);

        return redirect()
            ->route('admin.pegawai.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pages.admin.pegawai.edit', [
            'pegawai'  => $pegawai,
            'unitkerja' => UnitKerja::where('aktif', 'aktif')->orderBy('nama_unitkerja')->get(),
            'golongan' => Golongan::where('aktif', 'aktif')->orderBy('nama_golongan')->get(),
            'jabatan'  => Jabatan::where('aktif', 'aktif')->orderBy('nama_jabatan')->get(),
            'users'    => User::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'unitkerja_id'   => 'required|exists:ref_unitkerja,id',
            'golongan_id'    => 'required|exists:ref_golongan,id',
            'jabatan_id'     => 'required|exists:ref_jabatan,id',
            'status_pegawai' => 'required|in:aktif,nonaktif',
        ]);

        $pegawai->update([
            'unitkerja_id'   => $request->unitkerja_id,
            'golongan_id'    => $request->golongan_id,
            'jabatan_id'     => $request->jabatan_id,
            'status_pegawai' => $request->status_pegawai,
        ]);

        return redirect()
            ->route('admin.pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function delete(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()
            ->route('admin.pegawai.index')
            ->with('success', 'Data pegawai berhasil dihapus.');
    }
}
