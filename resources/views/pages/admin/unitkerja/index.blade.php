@extends('layouts.master')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border">
        <div class="p-6 border-b flex justify-between items-center">
            <h3 class="font-bold">Data Terbaru</h3>
            <button class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg">Tambah Data</button>
        </div>
        <div class="p-12 text-center text-gray-400">
            [Tempat Konten Utama Anda]
        </div>
    </div>
@endsection
