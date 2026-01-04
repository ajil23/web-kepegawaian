@extends('layouts.master')

@section('title', 'Data Notifikasi')
@section('page-title', 'Data Notifikasi')

@section('content')

@if (session('success'))
<div class="mb-4 px-4 py-3 rounded-lg bg-green-100 text-green-700 text-sm">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-slate-100">

    <!-- Header -->
    <div class="p-6 border-b border-slate-100">
        <h3 class="font-bold text-slate-800">Data Notifikasi (2 Hari Terakhir)</h3>
    </div>

    <!-- Content -->
    <div class="p-6 space-y-4">

        @php
            $notifications = collect();

            // TUGAS (tugas + penugasan = satu kesatuan)
            foreach ($tugas as $task) {
                $notifications->push([
                    'id'         => $task->id,
                    'judul'      => $task->judul,
                    'deskripsi'  => 'Kamu mendapatkan tugas baru',
                    'tipe'       => 'Tugas',
                    'created_at'=> $task->created_at,
                    'type'       => 'tugas',
                    'link'       => route('pegawai.tugas.index'),
                    'status'     => null,
                ]);
            }

            // CATATAN KEGIATAN (hanya setuju / tolak)
            foreach ($catatanKegiatan as $activity) {
                $notifications->push([
                    'id'         => $activity->id,
                    'judul'      => $activity->judul,
                    'deskripsi'  => $activity->status === 'tolak'
                        ? 'Catatan kegiatan kamu ditolak'
                        : 'Catatan kegiatan kamu diterima',
                    'tipe'       => 'Catatan Kegiatan',
                    'created_at'=> $activity->created_at,
                    'type'       => 'catatan',
                    'status'     => $activity->status,
                    'link'       => null,
                ]);
            }

            $notifications = $notifications->sortByDesc('created_at')->values();
        @endphp

        @forelse($notifications as $notification)
        <div class="flex items-start gap-4 p-4 border border-slate-100 rounded-lg hover:bg-slate-50 transition">

            <!-- Icon -->
            <div class="flex-shrink-0">
                @if($notification['type'] === 'tugas')
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                        📋
                    </div>
                @else
                    <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                        📝
                    </div>
                @endif
            </div>

            <!-- Content -->
            <div class="flex-1">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="font-semibold text-slate-800">
                            {{ $notification['judul'] }}
                        </h4>
                        <p class="text-sm text-slate-600 mt-1">
                            {{ $notification['deskripsi'] }}
                        </p>
                    </div>

                    <span class="text-xs text-slate-500 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($notification['created_at'])->diffForHumans() }}
                    </span>
                </div>

                <div class="mt-3 flex items-center justify-between">
                    <span class="text-xs font-medium px-3 py-1 rounded-full
                        {{ $notification['type'] === 'tugas'
                            ? 'bg-blue-100 text-blue-700'
                            : 'bg-green-100 text-green-700' }}">
                        {{ $notification['tipe'] }}
                    </span>

                    @if($notification['link'])
                        <a href="{{ $notification['link'] }}"
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                            Detail
                        </a>
                    @else
                        <a href="{{ route('pegawai.catatan_kegiatan.index') }}"
                        onclick="showNotificationDetail({{ json_encode($notification) }})"
                        class="text-sm text-slate-600 hover:text-blue-600 font-medium">
                            Detail
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="text-center text-slate-500 py-10">
            Tidak ada notifikasi dalam 2 hari terakhir
        </div>
        @endforelse

    </div>
</div>

<script>
function showNotificationDetail(notification) {
    let message =
        'Judul: ' + notification.judul + '\n' +
        'Deskripsi: ' + notification.deskripsi + '\n' +
        'Tipe: ' + notification.tipe + '\n' +
        'Tanggal: ' + notification.created_at;

    if (notification.status) {
        message += '\nStatus: ' +
            (notification.status === 'tolak' ? 'Ditolak' : 'Diterima');
    }

    alert(message);
}
</script>

@endsection
