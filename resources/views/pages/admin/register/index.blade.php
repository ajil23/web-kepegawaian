@extends('layouts.master')

@section('title', 'Registrasi & Verifikasi')
@section('page-title', 'Registrasi & Verifikasi')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-slate-100">

    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h3 class="font-bold text-slate-800">Register & Verifikasi</h3>
        <button class="px-4 py-2 text-sm text-white bg-green-600 rounded-lg">Tambah Data</button>
    </div>

    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-slate-500 uppercase text-xs">
                        <th class="pb-3 text-left">No</th>
                        <th class="pb-3 text-left">Nama</th>
                        <th class="pb-3 text-left">NIP</th>
                        <th class="pb-3 text-left">Email</th>
                        <th class="pb-3 text-left">Role</th>
                        <th class="pb-3 text-left">Status</th>
                        <th class="pb-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($user as $i => $user)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4">{{ $i + 1 }}</td>
                        <td class="py-4 font-medium text-slate-800"> {{ $user->name }}</td>
                        <td class="py-4">{{ $user->nip }}</td>
                        <td class="py-4">{{ $user->email }}</td>
                        <td class="py-4">{{ $user->role }}</td>
                        <td class="py-4">
                            @if ($user->status_akun == 'aktif')
                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Aktif</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Non-Aktif</span>
                            @endif
                        </td>
                        <td class="py-4">
                            <button class="px-3 py-1 text-xs bg-blue-500 text-white rounded hover:bg-blue-600">Edit</button>
                            <button class="px-3 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-8 text-center text-slate-400">
                            Data log aktivitas belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection