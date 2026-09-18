@extends('layouts.app')

@section('title', 'Detail Jenis Pajak')

@section('content')

<div class="mb-8 flex items-center justify-between">

    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Detail Jenis Pajak
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Informasi lengkap jenis pajak.
        </p>
    </div>

    <div class="flex gap-2">

        <a href="{{ route('jenis-pajak.edit', $jenisPajak) }}"
           class="rounded-lg bg-yellow-500 px-5 py-3 text-sm font-semibold text-white hover:bg-yellow-600">
            Edit
        </a>

        <a href="{{ route('jenis-pajak.index') }}"
           class="rounded-lg bg-gray-100 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-200">
            Kembali
        </a>

    </div>

</div>

<div class="rounded-xl bg-white p-6 shadow">

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

        <div>
            <p class="text-sm text-gray-500">
                Kode Pajak
            </p>

            <p class="mt-1 text-lg font-bold text-gray-800">
                {{ $jenisPajak->kode }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">
                Nama Pajak
            </p>

            <p class="mt-1 text-lg font-bold text-gray-800">
                {{ $jenisPajak->nama }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">
                Tarif
            </p>

            <p class="mt-1 text-lg font-bold text-blue-700">
                {{ number_format($jenisPajak->tarif, 2, ',', '.') }}%
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">
                Status
            </p>

            <div class="mt-2">

                @if($jenisPajak->status)

                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                        Aktif
                    </span>

                @else

                    <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                        Nonaktif
                    </span>

                @endif

            </div>
        </div>

        <div class="md:col-span-2">

            <p class="text-sm text-gray-500">
                Deskripsi
            </p>

            <p class="mt-2 rounded-lg bg-gray-50 p-4 text-gray-700">
                {{ $jenisPajak->deskripsi ?? 'Tidak ada deskripsi.' }}
            </p>

        </div>

    </div>

</div>

@endsection