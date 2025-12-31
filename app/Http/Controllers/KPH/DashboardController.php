<?php

namespace App\Http\Controllers\KPH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.kph.index');
    }
}
