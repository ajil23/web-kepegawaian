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
    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h3 class="font-bold text-slate-800">Data Notifikasi (2 Hari Terakhir)</h3>
    </div>

    <!-- Table -->
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-slate-500 uppercase text-xs">
                        <th class="pb-3 text-left">No</th>
                        <th class="pb-3 text-left">Judul</th>
                        <th class="pb-3 text-left">Deskripsi</th>
                        <th class="pb-3 text-left">Tipe</th>
                        <th class="pb-3 text-left">Tanggal Dibuat</th>
                        <th class="pb-3 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @php
                        $notifications = collect();

                        // Add tasks to notifications
                        foreach($tugas as $task) {
                            $notifications->push([
                                'id' => $task->id,
                                'judul' => $task->judul,
                                'deskripsi' => 'Kamu mendapatkan tugas baru',
                                'tipe' => 'Tugas',
                                'created_at' => $task->created_at,
                                'model' => $task,
                                'type' => 'tugas',
                                'status' => null,
                                'link' => null
                            ]);
                        }

                        // Add assignments to notifications
                        foreach($penugasan as $assignment) {
                            $notifications->push([
                                'id' => $assignment->id,
                                'judul' => $assignment->tugas->judul ?? 'Tugas Tidak Ditemukan',
                                'deskripsi' => 'Kamu mendapatkan tugas baru',
                                'tipe' => 'Penugasan',
                                'created_at' => $assignment->created_at,
                                'model' => $assignment,
                                'type' => 'penugasan',
                                'status' => null,
                                'link' => route('pegawai.tugas-saya.index')
                            ]);
                        }

                        // Add activity logs to notifications
                        foreach($catatanKegiatan as $activity) {
                            $deskripsi = '';
                            if($activity->status == 'disetujui' || $activity->status == 'setuju') {
                                $deskripsi = 'Catatan kegiatan kamu diterima';
                            } elseif($activity->status == 'ditolak') {
                                $deskripsi = 'Catatan kegiatan kamu ditolak';
                            } else {
                                $deskripsi = 'Catatan kegiatan sedang menunggu persetujuan';
                            }

                            $notifications->push([
                                'id' => $activity->id,
                                'judul' => $activity->judul,
                                'deskripsi' => $deskripsi,
                                'tipe' => 'Catatan Kegiatan',
                                'created_at' => $activity->created_at,
                                'model' => $activity,
                                'type' => 'catatan',
                                'status' => $activity->status,
                                'link' => null
                            ]);
                        }

                        // Sort by creation date (newest first)
                        $notifications = $notifications->sortByDesc('created_at')->values();
                    @endphp

                    @forelse($notifications as $index => $notification)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4">{{ $index + 1 }}</td>
                        <td class="py-4 font-medium text-slate-800">{{ $notification['judul'] }}</td>
                        <td class="py-4 text-slate-600">{{ $notification['deskripsi'] }}</td>
                        <td class="py-4">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $notification['tipe'] }}
                            </span>
                        </td>
                        <td class="py-4">{{ \Carbon\Carbon::parse($notification['created_at'])->format('d M Y H:i') }}</td>
                        <td class="py-4 text-right whitespace-nowrap">
                            @if($notification['type'] == 'penugasan' && $notification['link'])
                                <a href="{{ $notification['link'] }}"
                                   class="text-blue-600 hover:text-blue-800 font-medium transition">
                                    Detail
                                </a>
                            @else
                                <a href="#"
                                   class="text-slate-600 hover:text-blue-600 font-medium transition"
                                   onclick="showNotificationDetail({{ json_encode($notification) }})">
                                    Detail
                                </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-500">
                            Tidak ada notifikasi dalam 2 hari terakhir
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function showNotificationDetail(notification) {
    // This function can be expanded to show a modal with detailed information
    let message = 'Detail Notifikasi:\n\n' +
                  'Judul: ' + notification.judul + '\n' +
                  'Deskripsi: ' + notification.deskripsi + '\n' +
                  'Tipe: ' + notification.tipe + '\n' +
                  'Tanggal Dibuat: ' + notification.created_at;

    if(notification.status) {
        let statusText = '';
        switch(notification.status) {
            case 'disetujui':
            case 'setuju':
                statusText = 'Diterima';
                break;
            case 'ditolak':
                statusText = 'Ditolak';
                break;
            default:
                statusText = 'Menunggu Persetujuan';
        }
        message += '\nStatus: ' + statusText;
    }

    alert(message);
}
</script>

@endsection
