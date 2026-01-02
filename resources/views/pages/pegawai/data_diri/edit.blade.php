@extends('layouts.master')

@section('title', 'Data Diri')
@section('page-title', 'Edit Data Diri')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-100 mb-6">

    <!-- Header -->
    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h3 class="font-bold text-slate-800">Edit Data Diri</h3>
        <a href="{{ route('pegawai.data_diri.index') }}"
            class="text-sm text-slate-500 hover:text-slate-700">✕</a>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('pegawai.data_diri.update', $dataDiri->id) }}" class="p-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- No HP -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $dataDiri->no_hp) }}" required
                    pattern="\d*"
                    oninput="this.value = this.value.replace(/\D/g,'')"
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm
                    focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <x-input-error :messages="$errors->get('no_hp')" class="mt-1" />
            </div>

            <!-- Tempat Lahir -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $dataDiri->tempat_lahir) }}" required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm
                    focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-1" />
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $dataDiri->tgl_lahir) }}" required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm
                    focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-1" />
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm">
                    <option value="L" @selected(old('jenis_kelamin', $dataDiri->jenis_kelamin) == 'L')>Laki-laki</option>
                    <option value="P" @selected(old('jenis_kelamin', $dataDiri->jenis_kelamin) == 'P')>Perempuan</option>
                </select>
                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-1" />
            </div>

            <!-- Alamat -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-1">Alamat</label>
                <textarea name="alamat" rows="3" required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm
                    focus:ring-2 focus:ring-green-500 focus:border-green-500">{{ old('alamat', $dataDiri->alamat) }}</textarea>
                <x-input-error :messages="$errors->get('alamat')" class="mt-1" />
            </div>

            <!-- Foto -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-1">Foto</label>
                <input type="file" name="foto" accept="image/*" onchange="previewImage(event)"
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm
                    focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <x-input-error :messages="$errors->get('foto')" class="mt-1" />

                <!-- Preview Foto -->
                <div class="mt-4">
                    <img id="fotoPreview"
                        src="{{ $dataDiri->foto ? asset('storage/' . $dataDiri->foto) : '#' }}"
                        alt="Preview Foto"
                        class="w-32 h-32 object-cover rounded-full border border-slate-200">
                </div>
            </div>

        </div>

        <!-- Action -->
        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <a href="{{ route('pegawai.data_diri.index') }}"
                class="px-4 py-2 text-sm rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50">
                Batal
            </a>
            <button type="submit"
                class="px-5 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                Simpan
            </button>
        </div>

    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('fotoPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
