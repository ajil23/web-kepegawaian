@extends('layouts.master')

@section('title', 'Tugas Saya')
@section('page-title', 'Tugas Saya')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-slate-100">

    <!-- Header -->
    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h3 class="font-bold text-slate-800">Daftar Tugas Saya</h3>
    </div>

    <!-- Table -->
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-slate-500 uppercase text-xs">
                        <th class="pb-3 text-left">No</th>
                        <th class="pb-3 text-left">Judul Tugas</th>
                        <th class="pb-3 text-left">Deskripsi</th>
                        <th class="pb-3 text-left">Deadline</th>
                        <th class="pb-3 text-left">Status</th>
                        <th class="pb-3 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @php
                        $tugas = [
                            [
                                'id' => 1,
                                'judul' => 'Menyusun Laporan Bulanan',
                                'deskripsi' => 'Membuat laporan kegiatan bulan ini',
                                'deadline' => '2026-01-10',
                                'status' => 'proses',
                            ],
                            [
                                'id' => 2,
                                'judul' => 'Update Data Pegawai',
                                'deskripsi' => 'Melengkapi data pegawai baru',
                                'deadline' => '2026-01-05',
                                'status' => 'selesai',
                            ],
                        ];
                    @endphp

                    @forelse ($tugas as $i => $item)
                    <tr class="hover:bg-slate-50 transition">

                        <td class="py-4">{{ $i + 1 }}</td>

                        <td class="py-4 font-medium text-slate-800">
                            {{ $item['judul'] }}
                        </td>

                        <td class="py-4 text-slate-600">
                            {{ $item['deskripsi'] }}
                        </td>

                        <td class="py-4">
                            {{ \Carbon\Carbon::parse($item['deadline'])->format('d M Y') }}
                        </td>

                        <td class="py-4">
                            @if ($item['status'] === 'selesai')
                                <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                    Selesai
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">
                                    Proses
                                </span>
                            @endif
                        </td>

                        <td class="py-4 text-right">
                            <button
                                onclick="openDetailModal({{ $item['id'] }})"
                                class="text-slate-600 hover:text-blue-600 font-medium transition">
                                Detail
                            </button>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400">
                            Tugas belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- Modal Detail Tugas -->
<div id="detailModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-xl">

        <!-- Header -->
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-800">Detail Tugas</h3>
            <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>

        <!-- Body -->
        <div class="p-6 space-y-4">
            <div>
                <strong>Judul Tugas</strong>
                <p id="detail_judul" class="text-slate-700 mt-1">-</p>
            </div>

            <div>
                <strong>Deskripsi</strong>
                <p id="detail_deskripsi" class="text-slate-700 mt-1">-</p>
            </div>

            <div>
                <strong>Deadline</strong>
                <p id="detail_deadline" class="text-slate-700 mt-1">-</p>
            </div>

            <div>
                <strong>Status</strong>
                <p id="detail_status" class="text-slate-700 mt-1">-</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 border-t bg-gray-50 text-right">
            <button onclick="closeDetailModal()" class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300">
                Tutup
            </button>
        </div>

    </div>
</div>

<script>
    const tugasDummy = {
        1: {
            judul: 'Menyusun Laporan Bulanan',
            deskripsi: 'Membuat laporan kegiatan bulan ini',
            deadline: '10 Januari 2026',
            status: 'Proses'
        },
        2: {
            judul: 'Update Data Pegawai',
            deskripsi: 'Melengkapi data pegawai baru',
            deadline: '5 Januari 2026',
            status: 'Selesai'
        }
    };

    function openDetailModal(id) {
        const data = tugasDummy[id];
        if (!data) return;

        document.getElementById('detail_judul').textContent = data.judul;
        document.getElementById('detail_deskripsi').textContent = data.deskripsi;
        document.getElementById('detail_deadline').textContent = data.deadline;
        document.getElementById('detail_status').textContent = data.status;

        document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }
</script>

@endsection
