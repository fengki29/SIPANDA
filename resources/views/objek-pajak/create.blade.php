@extends('layouts.app')

@section('title', 'Tambah Objek Pajak')

@section('content')

<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">
        Tambah Objek Pajak
    </h2>

    <p class="mt-1 text-sm text-gray-500">
        Tambahkan data objek pajak baru.
    </p>
</div>

<div class="rounded-xl bg-white p-6 shadow">

    <form action="{{ route('objek-pajak.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            {{-- Wajib Pajak --}}
            <div class="md:col-span-2">

                <label
                    for="wajib_pajak_id"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Wajib Pajak
                </label>

                <select
                    name="wajib_pajak_id"
                    id="wajib_pajak_id"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                >

                    <option value="">
                        -- Pilih Wajib Pajak --
                    </option>

                    @foreach($wajibPajaks as $wajibPajak)

                        <option
                            value="{{ $wajibPajak->id }}"
                            {{ old('wajib_pajak_id') == $wajibPajak->id ? 'selected' : '' }}
                        >

                            {{ $wajibPajak->nama }} - NIK: {{ $wajibPajak->nik }}

                        </option>

                    @endforeach

                </select>

                @error('wajib_pajak_id')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Nama Objek --}}
            <div>

                <label
                    for="nama_objek"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Nama Objek Pajak
                </label>

                <input
                    type="text"
                    name="nama_objek"
                    id="nama_objek"
                    value="{{ old('nama_objek') }}"
                    placeholder="Contoh: Rumah Budi Santoso"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                >

                @error('nama_objek')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Jenis Objek --}}
            <div>

                <label
                    for="jenis_objek"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Jenis Objek
                </label>

                <select
                    name="jenis_objek"
                    id="jenis_objek"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                >

                    <option value="">
                        -- Pilih Jenis --
                    </option>

                    <option
                        value="Rumah"
                        {{ old('jenis_objek') == 'Rumah' ? 'selected' : '' }}
                    >
                        Rumah
                    </option>

                    <option
                        value="Tanah"
                        {{ old('jenis_objek') == 'Tanah' ? 'selected' : '' }}
                    >
                        Tanah
                    </option>

                    <option
                        value="Ruko"
                        {{ old('jenis_objek') == 'Ruko' ? 'selected' : '' }}
                    >
                        Ruko
                    </option>

                    <option
                        value="Usaha"
                        {{ old('jenis_objek') == 'Usaha' ? 'selected' : '' }}
                    >
                        Usaha
                    </option>

                    <option
                        value="Hotel"
                        {{ old('jenis_objek') == 'Hotel' ? 'selected' : '' }}
                    >
                        Hotel
                    </option>

                    <option
                        value="Restoran"
                        {{ old('jenis_objek') == 'Restoran' ? 'selected' : '' }}
                    >
                        Restoran
                    </option>

                    <option
                        value="Kendaraan"
                        {{ old('jenis_objek') == 'Kendaraan' ? 'selected' : '' }}
                    >
                        Kendaraan
                    </option>

                </select>

                @error('jenis_objek')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Alamat --}}
            <div class="md:col-span-2">

                <label
                    for="alamat_objek"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Alamat Objek Pajak
                </label>

                <textarea
                    name="alamat_objek"
                    id="alamat_objek"
                    rows="4"
                    placeholder="Masukkan alamat objek pajak"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                >{{ old('alamat_objek') }}</textarea>

                @error('alamat_objek')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- Nilai Objek --}}
            <div>

                <label
                    for="nilai_objek"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Nilai Objek
                </label>

                <input
                    type="number"
                    name="nilai_objek"
                    id="nilai_objek"
                    value="{{ old('nilai_objek') }}"
                    placeholder="Contoh: 250000000"
                    min="0"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                >

                @error('nilai_objek')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>

        </div>


        {{-- Button --}}
        <div class="mt-8 flex items-center justify-end gap-3">

            <a
                href="{{ route('objek-pajak.index') }}"
                class="rounded-lg bg-gray-100 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-200"
            >
                Batal
            </a>

            <button
                type="submit"
                class="rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow hover:bg-blue-700"
            >
                Simpan
            </button>

        </div>

    </form>

</div>

@endsection