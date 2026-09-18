@extends('layouts.app')

@section('title', 'Edit Jenis Pajak')

@section('content')

<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">
        Edit Jenis Pajak
    </h2>

    <p class="mt-1 text-sm text-gray-500">
        Perbarui informasi jenis pajak.
    </p>
</div>

<div class="rounded-xl bg-white p-6 shadow">

    <form action="{{ route('jenis-pajak.update', $jenisPajak) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <div>
                <label for="kode"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Kode Pajak
                </label>

                <input type="text"
                       name="kode"
                       id="kode"
                       value="{{ old('kode', $jenisPajak->kode) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm uppercase">

                @error('kode')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="nama"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Nama Pajak
                </label>

                <input type="text"
                       name="nama"
                       id="nama"
                       value="{{ old('nama', $jenisPajak->nama) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm">

                @error('nama')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="tarif"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Tarif Pajak (%)
                </label>

                <input type="number"
                       name="tarif"
                       id="tarif"
                       value="{{ old('tarif', $jenisPajak->tarif) }}"
                       min="0"
                       max="100"
                       step="0.01"
                       class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm">

                @error('tarif')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="md:col-span-2">

                <label for="deskripsi"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          id="deskripsi"
                          rows="4"
                          class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm">{{ old('deskripsi', $jenisPajak->deskripsi) }}</textarea>

                @error('deskripsi')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

        <div class="mt-8 flex justify-end gap-3">

            <a href="{{ route('jenis-pajak.index') }}"
               class="rounded-lg bg-gray-100 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-200">
                Batal
            </a>

            <button type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow hover:bg-blue-700">
                Update
            </button>

        </div>

    </form>

</div>

@endsection