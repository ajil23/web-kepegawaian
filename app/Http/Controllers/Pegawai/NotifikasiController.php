<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\CatatanKegiatan;
use App\Models\Pegawai;
use App\Models\Penugasan;
use App\Models\Tugas;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        // Get the currently logged-in employee
        $pegawai = Pegawai::where('user_id', auth()->id())->firstOrFail();

        // Fetch tasks assigned to the employee with their assignments (last 2 days only)
        $tugas = Tugas::with([
            'penugasan' => function ($query) use ($pegawai) {
                $query->where('pegawai_id', $pegawai->id);
            }
        ])
        ->whereHas('penugasan', function ($query) use ($pegawai) {
            $query->where('pegawai_id', $pegawai->id);
        })
        ->where('created_at', '>=', now()->subDays(2))
        ->orderBy('deadline', 'asc')
        ->get();

        // Fetch assignments for the employee with their tasks (last 2 days only)
        $penugasan = Penugasan::with(['tugas'])
            ->where('pegawai_id', $pegawai->id)
            ->where('created_at', '>=', now()->subDays(2))
            ->orderBy('created_at', 'desc')
            ->get();

        // Fetch activity logs for the employee (last 2 days only)
        $catatanKegiatan = CatatanKegiatan::where('pegawai_id', $pegawai->id)
            ->where('created_at', '>=', now()->subDays(2))
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('pages.pegawai.notifikasi.index', compact('tugas', 'penugasan', 'catatanKegiatan'));
    }
}
