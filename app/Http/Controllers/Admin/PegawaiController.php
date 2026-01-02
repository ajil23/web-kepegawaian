<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with(['user', 'unitkerja', 'golongan', 'jabatan'])->get();
        return view('pages.admin.pegawai.index', compact('pegawai'));
    }
}
