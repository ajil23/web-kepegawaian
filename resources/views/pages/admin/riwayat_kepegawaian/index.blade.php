@extends('layouts.master')

@section('title', 'Riwayat Kepegawaian')
@section('page-title', 'Riwayat Kepegawaian')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-slate-100">

    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h3 class="font-bold text-slate-800">Riwayat Kepegawaian</h3>
        <button class="px-4 py-2 text-sm text-white bg-green-600 rounded-lg">Tambah Data</button>
    </div>

    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-slate-500 uppercase text-xs">
                        <th class="pb-3 text-left">No</th>
                        <th class="pb-3 text-left">Nama</th>
                        <th class="pb-3 text-left">Unit Kerja</th>
                        <th class="pb-3 text-left">Golongan</th>
                        <th class="pb-3 text-left">Jabatan</th>
                        <th class="pb-3 text-left">Tanggal Mulai</th>
                        <th class="pb-3 text-left">Tanggal Selesai</th>
                        <th class="pb-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4"></td>
                        <td class="py-4 font-medium text-slate-800"> </td>
                        <td class="py-4"></td>
                        <td class="py-4"></td>
                        <td class="py-4"></td>
                        <td class="py-4"></td>
                        <td class="py-4"></td>
                        <td class="py-4"></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection