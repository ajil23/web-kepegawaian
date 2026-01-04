<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatatanKegiatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index()
    {
        $catatan = CatatanKegiatan::with([
            'pegawai.user',
            'pegawai.unitkerja',
            'pegawai.jabatan',
        ])
            ->whereIn('status', ['ajukan', 'setuju', 'tolak'])
            ->orderByRaw("
                FIELD(status, 'ajukan', 'setuju', 'tolak')
            ")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.admin.catatan_kegiatan.index', compact('catatan'));
    }

    public function updateStatus(Request $request, CatatanKegiatan $catatan)
    {
        $request->validate([
            'status' => 'required|in:setuju,tolak',
            'catatan_admin' => 'nullable|string',
        ]);

        $catatan->update([
            'status' => $request->status,
            'catatan_admin' => $request->status === 'tolak'
                ? $request->catatan_admin
                : null,
        ]);

        return response()->json(['success' => true]);
    }
}
