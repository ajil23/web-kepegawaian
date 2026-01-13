<?php

namespace App\Http\Controllers\KPH;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\RiwayatKepegawaian;
use Illuminate\Http\Request;

class RiwayatKepegawaianController extends Controller
{
    public function index(Request $request)
    {
        $riwayatQuery = RiwayatKepegawaian::with([
            'pegawai.user',
            'pegawai.unitkerja',
            'pegawai.golongan',
            'pegawai.jabatan',
        ]);

        // Apply search filter if provided
        if ($request->filled('q')) {
            $q = $request->q;
            $riwayatQuery->where(function ($query) use ($q) {
                $query->where('jenis_mutasi', 'like', "%{$q}%")
                      ->orWhere('keterangan', 'like', "%{$q}%")
                      ->orWhere('catatan', 'like', "%{$q}%")
                      ->orWhereHas('pegawai.user', function ($userQuery) use ($q) {
                          $userQuery->where('name', 'like', "%{$q}%")
                                   ->orWhere('email', 'like', "%{$q}%")
                                   ->orWhere('nip', 'like', "%{$q}%");
                      });
            });
        }

        $riwayat = $riwayatQuery
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.kph.riwayat_kepegawaian.index', compact('riwayat'));
    }
}