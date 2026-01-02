<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatKepegawaianController extends Controller
{
    public function index()
    {
        return view('pages.admin.riwayat_kepegawaian.index');
    }
}
