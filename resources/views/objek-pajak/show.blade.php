@extends('layouts.app')

@section('title', 'Detail Objek Pajak')

@section('content')

<div class="mb-8 flex items-center justify-between">

    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Detail Objek Pajak
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Informasi lengkap objek pajak.
        </p>
    </div>

    <div class="flex gap-2">

        <a href="{{ route('objek-pajak.edit', $objekPajak) }}"
           class="rounded-lg bg-yellow-500 px-5 py-3 text-sm font-semibold text-white hover:bg-yellow-600">
            Edit
        </a>

        <a href="{{ route('objek-pajak.index') }}"
           class="rounded-lg bg-gray-100 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-200">
            Kembali
        </a>

    </div>

</div>

<div class="grid grid-cols-1 gap-6 md:grid-cols-3">

    {{-- Informasi Objek --}}
    <div class="rounded-xl bg-white p-6 shadow md:col-span-2">

        <h3 class="mb-6 border-b pb-4 text-lg font-bold text-gray-800">
            Informasi Objek Pajak
        </h3>

        <div class="space-y-5">

            <div>
                <p class="text-sm text-gray-500">
                    Nama Objek
                </p>

                <p class="mt-1 font-semibold text-gray-800">
                    {{ $objekPajak->nama_objek }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Alamat
                </p>

                <p class="mt-1 font-semibold text-gray-800">
                    {{ $objekPajak->alamat_objek }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Jenis Objek
                </p>

                <p class="mt-1 font-semibold text-gray-800">
                    {{ $objekPajak->jenis_objek }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Nilai Objek
                </p>

                <p class="mt-1 font-semibold text-gray-800">
                    @if($objekPajak->nilai_objek !== null)
                        Rp {{ number_format($objekPajak->nilai_objek, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Status
                </p>

                <div class="mt-2">

                    @if($objekPajak->status)

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

        </div>

    </div>

    {{-- Informasi Wajib Pajak --}}
    <div class="rounded-xl bg-white p-6 shadow">

        <h3 class="mb-6 border-b pb-4 text-lg font-bold text-gray-800">
            Wajib Pajak
        </h3>

        <div class="space-y-5">

            <div>
                <p class="text-sm text-gray-500">
                    Nama
                </p>

                <p class="mt-1 font-semibold text-gray-800">
                    {{ $objekPajak->wajibPajak->nama ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    NIK
                </p>

                <p class="mt-1 font-semibold text-gray-800">
                    {{ $objekPajak->wajibPajak->nik ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    No. HP
                </p>

                <p class="mt-1 font-semibold text-gray-800">
                    {{ $objekPajak->wajibPajak->no_hp ?? '-' }}
                </p>
            </div>

            <a href="{{ $objekPajak->wajibPajak ? route('wajib-pajak.show', $objekPajak->wajibPajak) : '#' }}"
               class="block rounded-lg bg-blue-50 px-4 py-3 text-center text-sm font-semibold text-blue-700 hover:bg-blue-100">
                Lihat Wajib Pajak
            </a>

        </div>

    </div>

</div>

@endsection