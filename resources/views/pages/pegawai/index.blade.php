@extends('layouts.master')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Selamat Datang Kembali</h2>
        <p class="text-gray-600">Berikut adalah ringkasan aktivitas anda hari ini.</p>
    </div>

    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                👤
            </div>
            <div>
                <p class="text-sm text-gray-600">Total User</p>
                <p class="text-lg font-bold text-gray-700">1,250</p>
            </div>
        </div>
    </div>

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
