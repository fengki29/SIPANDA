@extends('layouts.app')

@section('title', 'Laporan Pajak')

@section('content')

{{-- ========================================================= --}}
{{-- HEADER --}}
{{-- ========================================================= --}}
<div class="mb-7 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

    <div class="flex items-start gap-4">

        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-[#1769AA] shadow-sm">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4.5 19.5V10.5m5 9V4.5m5 15v-6m5 6V7.5"
                />
            </svg>
        </div>

        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                Laporan Pajak
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Ringkasan penerimaan, tagihan, target, dan tunggakan pajak daerah.
            </p>
        </div>

    </div>


    {{-- EXPORT --}}
    <div class="flex flex-wrap items-center gap-2">

        <a
            href="{{ route('laporan.export.excel', request()->query()) }}"
            class="inline-flex h-11 items-center gap-2 rounded-xl border border-emerald-200 bg-emerald-50 px-4 text-sm font-semibold text-emerald-700 shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-100 hover:shadow-md"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3.75v10.5m0 0l-3.75-3.75M12 14.25L15.75 10.5M5.25 20.25h13.5a1.5 1.5 0 001.5-1.5v-3.375M3.75 15.375v3.375a1.5 1.5 0 001.5 1.5"
                />
            </svg>

            Excel
        </a>


        <a
            href="{{ route('laporan.export.pdf', request()->query()) }}"
            class="inline-flex h-11 items-center gap-2 rounded-xl bg-red-600 px-4 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-red-700 hover:shadow-md"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7.5 3.75h6l3.75 3.75v12.75H7.5a1.5 1.5 0 01-1.5-1.5V5.25a1.5 1.5 0 011.5-1.5z"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M13.5 3.75v4.5h4.5M8.75 13.5h6.5M8.75 16.5h4.5"
                />
            </svg>

            PDF
        </a>

    </div>

</div>


{{-- ========================================================= --}}
{{-- FILTER --}}
{{-- ========================================================= --}}
<div class="mb-7 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

    <div class="mb-5 flex items-start gap-3">

        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA]">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4.5 6.75h15M7.5 12h9m-6 5.25h3"
                />
            </svg>
        </div>

        <div>
            <h2 class="text-sm font-bold text-slate-800">
                Filter Laporan
            </h2>

            <p class="mt-1 text-xs text-slate-500">
                Pilih periode, jenis pajak, dan status untuk menyesuaikan laporan.
            </p>
        </div>

    </div>


    <form
        action="{{ route('laporan.index') }}"
        method="GET"
        class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4"
    >

        {{-- ================================================= --}}
        {{-- TAHUN PAJAK --}}
        {{-- ================================================= --}}
        <div>

            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Tahun Pajak
            </label>

            <div
                class="relative"
                data-dropdown
            >

                <input
                    type="hidden"
                    name="tahun"
                    value="{{ request('tahun') }}"
                    data-dropdown-input
                >

                <button
                    type="button"
                    data-dropdown-button
                    class="flex h-[52px] w-full items-center rounded-xl border border-slate-200 bg-slate-50/60 text-left shadow-sm outline-none transition hover:border-blue-300 hover:bg-blue-50/40 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                >

                    <span class="flex w-11 shrink-0 items-center justify-center text-[#1769AA]">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 3.75v3m10.5-3v3M4.5 8.25h15M5.25 5.25h13.5A1.75 1.75 0 0120.5 7v12a1.75 1.75 0 01-1.75 1.75H5.25A1.75 1.75 0 013.5 19V7a1.75 1.75 0 011.75-1.75z"
                            />
                        </svg>

                    </span>


                    <span
                        data-dropdown-label
                        class="flex-1 truncate pr-3 text-sm font-medium text-slate-700"
                    >
                        {{ request('tahun') ?: 'Semua Tahun' }}
                    </span>


                    <span class="flex w-11 shrink-0 items-center justify-center text-slate-400">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            data-dropdown-chevron
                            class="h-4 w-4 transition-transform duration-200"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 9.75L12 15l5.25-5.25"
                            />
                        </svg>

                    </span>

                </button>


                <div
                    data-dropdown-menu
                    class="absolute left-0 right-0 z-50 mt-2 hidden max-h-72 overflow-y-auto rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl"
                >

                    <button
                        type="button"
                        data-dropdown-option
                        data-value=""
                        data-label="Semua Tahun"
                        class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                    >
                        Semua Tahun
                    </button>


                    @foreach($tahunTersedia as $tahunItem)

                        <button
                            type="button"
                            data-dropdown-option
                            data-value="{{ $tahunItem }}"
                            data-label="{{ $tahunItem }}"
                            class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                        >
                            {{ $tahunItem }}
                        </button>

                    @endforeach

                </div>

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- JENIS PAJAK --}}
        {{-- ================================================= --}}
        <div>

            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Jenis Pajak
            </label>

            <div
                class="relative"
                data-dropdown
            >

                <input
                    type="hidden"
                    name="jenis"
                    value="{{ request('jenis') }}"
                    data-dropdown-input
                >

                <button
                    type="button"
                    data-dropdown-button
                    class="flex h-[52px] w-full items-center rounded-xl border border-slate-200 bg-slate-50/60 text-left shadow-sm outline-none transition hover:border-blue-300 hover:bg-blue-50/40 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                >

                    <span class="flex w-11 shrink-0 items-center justify-center text-[#1769AA]">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 4.5h12M6 9h12M6 13.5h7.5M6 18h5"
                            />
                        </svg>

                    </span>


                    <span
                        data-dropdown-label
                        class="flex-1 truncate pr-3 text-sm font-medium text-slate-700"
                    >

                        @if(request('jenis'))

                            @php
                                $jenisTerpilih = $jenisPajaks->firstWhere('id', request('jenis'));
                            @endphp

                            {{ $jenisTerpilih ? $jenisTerpilih->kode . ' - ' . $jenisTerpilih->nama : 'Semua Jenis Pajak' }}

                        @else

                            Semua Jenis Pajak

                        @endif

                    </span>


                    <span class="flex w-11 shrink-0 items-center justify-center text-slate-400">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            data-dropdown-chevron
                            class="h-4 w-4 transition-transform duration-200"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 9.75L12 15l5.25-5.25"
                            />
                        </svg>

                    </span>

                </button>


                <div
                    data-dropdown-menu
                    class="absolute left-0 right-0 z-50 mt-2 hidden max-h-72 overflow-y-auto rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl"
                >

                    <button
                        type="button"
                        data-dropdown-option
                        data-value=""
                        data-label="Semua Jenis Pajak"
                        class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                    >
                        Semua Jenis Pajak
                    </button>


                    @foreach($jenisPajaks as $jenisPajak)

                        <button
                            type="button"
                            data-dropdown-option
                            data-value="{{ $jenisPajak->id }}"
                            data-label="{{ $jenisPajak->kode }} - {{ $jenisPajak->nama }}"
                            class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                        >
                            {{ $jenisPajak->kode }} - {{ $jenisPajak->nama }}
                        </button>

                    @endforeach

                </div>

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- STATUS TAGIHAN --}}
        {{-- ================================================= --}}
        <div>

            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Status Tagihan
            </label>

            <div
                class="relative"
                data-dropdown
            >

                <input
                    type="hidden"
                    name="status"
                    value="{{ request('status') }}"
                    data-dropdown-input
                >

                <button
                    type="button"
                    data-dropdown-button
                    class="flex h-[52px] w-full items-center rounded-xl border border-slate-200 bg-slate-50/60 text-left shadow-sm outline-none transition hover:border-blue-300 hover:bg-blue-50/40 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                >

                    <span class="flex w-11 shrink-0 items-center justify-center text-[#1769AA]">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6-1.5a8.25 8.25 0 11-16.5 0 8.25 8.25 0 0116.5 0z"
                            />
                        </svg>

                    </span>


                    <span
                        data-dropdown-label
                        class="flex-1 truncate pr-3 text-sm font-medium text-slate-700"
                    >

                        @switch(request('status'))

                            @case('belum_bayar')
                                Belum Bayar
                                @break

                            @case('sebagian')
                                Sebagian
                                @break

                            @case('lunas')
                                Lunas
                                @break

                            @case('jatuh_tempo')
                                Jatuh Tempo
                                @break

                            @default
                                Semua Status

                        @endswitch

                    </span>


                    <span class="flex w-11 shrink-0 items-center justify-center text-slate-400">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            data-dropdown-chevron
                            class="h-4 w-4 transition-transform duration-200"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 9.75L12 15l5.25-5.25"
                            />
                        </svg>

                    </span>

                </button>


                <div
                    data-dropdown-menu
                    class="absolute left-0 right-0 z-50 mt-2 hidden overflow-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl"
                >

                    <button
                        type="button"
                        data-dropdown-option
                        data-value=""
                        data-label="Semua Status"
                        class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                    >
                        Semua Status
                    </button>


                    <button
                        type="button"
                        data-dropdown-option
                        data-value="belum_bayar"
                        data-label="Belum Bayar"
                        class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                    >
                        Belum Bayar
                    </button>


                    <button
                        type="button"
                        data-dropdown-option
                        data-value="sebagian"
                        data-label="Sebagian"
                        class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                    >
                        Sebagian
                    </button>


                    <button
                        type="button"
                        data-dropdown-option
                        data-value="lunas"
                        data-label="Lunas"
                        class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                    >
                        Lunas
                    </button>


                    <button
                        type="button"
                        data-dropdown-option
                        data-value="jatuh_tempo"
                        data-label="Jatuh Tempo"
                        class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                    >
                        Jatuh Tempo
                    </button>

                </div>

            </div>

        </div>


        {{-- ================================================= --}}
        {{-- BUTTON --}}
        {{-- ================================================= --}}
        <div class="flex items-end gap-2">

            <a
                href="{{ route('laporan.index') }}"
                class="inline-flex h-[52px] flex-1 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-slate-300 hover:bg-slate-50"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4.5 7.5h15M7.5 12h9m-6 4.5h3"
                    />
                </svg>

                Reset

            </a>


            <button
                type="submit"
                class="inline-flex h-[52px] flex-1 items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-4 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4.5 12h15m0 0l-5.25-5.25M19.5 12l-5.25 5.25"
                    />
                </svg>

                Terapkan

            </button>

        </div>

    </form>

</div>


{{-- ========================================================= --}}
{{-- RINGKASAN KEUANGAN --}}
{{-- ========================================================= --}}
<div class="mb-7 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

    {{-- TOTAL TAGIHAN --}}
    <div class="group rounded-2xl border border-blue-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    Total Nilai Tagihan
                </p>

                <p class="mt-2 text-xl font-bold tracking-tight text-slate-800">
                    Rp {{ number_format($totalTagihan, 0, ',', '.') }}
                </p>

            </div>


            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA]">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M7.5 3.75h6l3.75 3.75v12.75H7.5a1.5 1.5 0 01-1.5-1.5V5.25a1.5 1.5 0 011.5-1.5z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M13.5 3.75v4.5h4.5"
                    />
                </svg>

            </div>

        </div>

        <div class="mt-4 flex items-center justify-between">

            <span class="text-xs text-slate-400">
                {{ number_format($jumlahTagihan, 0, ',', '.') }} transaksi
            </span>

            <span class="text-xs font-semibold text-blue-600">
                Tagihan
            </span>

        </div>

    </div>


    {{-- PEMBAYARAN --}}
    <div class="group rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    Total Pembayaran
                </p>

                <p class="mt-2 text-xl font-bold tracking-tight text-emerald-600">
                    Rp {{ number_format($totalPembayaran, 0, ',', '.') }}
                </p>

            </div>


            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 6.75v10.5m3.75-7.5c0-1.036-1.68-1.875-3.75-1.875s-3.75.84-3.75 1.875 1.68 1.875 3.75 1.875 3.75.84 3.75 1.875-1.68 1.875-3.75 1.875-3.75-.84-3.75-1.875"
                    />
                </svg>

            </div>

        </div>

        <div class="mt-4 flex items-center justify-between">

            <span class="text-xs text-slate-400">
                Akumulasi penerimaan
            </span>

            <span class="text-xs font-semibold text-emerald-600">
                Realisasi
            </span>

        </div>

    </div>


    {{-- TUNGGAKAN --}}
    <div class="group rounded-2xl border border-red-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    Total Tunggakan
                </p>

                <p class="mt-2 text-xl font-bold tracking-tight text-red-600">
                    Rp {{ number_format($totalTunggakan, 0, ',', '.') }}
                </p>

            </div>


            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-600">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3.75m0 3.75h.007v.008H12v-.008zM10.29 3.86L2.82 17.25A1.875 1.875 0 004.45 20h15.1a1.875 1.875 0 001.63-2.75L13.71 3.86a1.875 1.875 0 00-3.42 0z"
                    />
                </svg>

            </div>

        </div>

        <div class="mt-4 flex items-center justify-between">

            <span class="text-xs text-slate-400">
                Belum terselesaikan
            </span>

            <span class="text-xs font-semibold text-red-600">
                Perlu ditindaklanjuti
            </span>

        </div>

    </div>


    {{-- TARGET --}}
    <div class="group rounded-2xl border border-amber-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    Pencapaian Target
                </p>

                <p class="mt-2 text-xl font-bold tracking-tight text-amber-600">
                    {{ number_format($persentasePencapaian, 1, ',', '.') }}%
                </p>

            </div>


            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 13.5l5.25-5.25 3.75 3.75L20.25 4.5M20.25 4.5v5.25m0-5.25H15"
                    />
                </svg>

            </div>

        </div>

        <div class="mt-4">

            <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                <div
                    class="h-full rounded-full bg-amber-500 transition-all duration-500"
                    style="width: {{ min($persentasePencapaian, 100) }}%"
                ></div>

            </div>

            <div class="mt-2 flex items-center justify-between text-xs">

                <span class="text-slate-400">
                    Target
                </span>

                <span class="font-semibold text-slate-600">
                    Rp {{ number_format($totalTarget, 0, ',', '.') }}
                </span>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- STATUS TAGIHAN --}}
{{-- ========================================================= --}}
<div class="mb-7 grid grid-cols-1 gap-4 sm:grid-cols-3">

    {{-- JUMLAH TAGIHAN --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6.75 3.75h7.5L18.75 8.25v12H6.75a1.5 1.5 0 01-1.5-1.5v-13.5a1.5 1.5 0 011.5-1.5z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M14.25 3.75v4.5h4.5"
                    />
                </svg>

            </div>

            <div>

                <p class="text-xs font-medium text-slate-400">
                    Total Tagihan
                </p>

                <p class="mt-0.5 text-lg font-bold text-slate-800">
                    {{ number_format($jumlahTagihan, 0, ',', '.') }}
                </p>

            </div>

        </div>

    </div>


    {{-- LUNAS --}}
    <div class="rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm">

        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75l2 2 4-4"
                    />
                    <circle
                        cx="12"
                        cy="12"
                        r="8.25"
                    />
                </svg>

            </div>

            <div>

                <p class="text-xs font-medium text-slate-400">
                    Tagihan Lunas
                </p>

                <p class="mt-0.5 text-lg font-bold text-emerald-600">
                    {{ number_format($jumlahLunas, 0, ',', '.') }}
                </p>

            </div>

        </div>

    </div>


    {{-- BELUM LUNAS --}}
    <div class="rounded-2xl border border-red-100 bg-white p-5 shadow-sm">

        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-50 text-red-600">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3.75m0 3.75h.007v.008H12v-.008z"
                    />
                    <circle
                        cx="12"
                        cy="12"
                        r="8.25"
                    />
                </svg>

            </div>

            <div>

                <p class="text-xs font-medium text-slate-400">
                    Belum Lunas
                </p>

                <p class="mt-0.5 text-lg font-bold text-red-600">
                    {{ number_format($jumlahBelumLunas, 0, ',', '.') }}
                </p>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- RINGKASAN PER JENIS PAJAK --}}
{{-- ========================================================= --}}
<div class="mb-7 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="flex flex-col gap-3 border-b border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between">

        <div class="flex items-start gap-3">

            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA]">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4.5 19.5V10.5m5 9V4.5m5 15v-6m5 6V7.5"
                    />
                </svg>

            </div>

            <div>

                <h2 class="text-sm font-bold text-slate-800">
                    Ringkasan Per Jenis Pajak
                </h2>

                <p class="mt-1 text-xs text-slate-500">
                    Perbandingan target, realisasi, dan nilai tagihan.
                </p>

            </div>

        </div>


        @if(request('tahun'))

            <span class="inline-flex w-fit items-center rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-semibold text-[#1769AA]">
                Tahun {{ request('tahun') }}
            </span>

        @else

            <span class="inline-flex w-fit items-center rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                Semua Tahun
            </span>

        @endif

    </div>


    <div class="overflow-x-auto">

        <table class="min-w-[900px] w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Jenis Pajak
                    </th>

                    <th class="px-5 py-3.5 text-right text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Target
                    </th>

                    <th class="px-5 py-3.5 text-right text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Realisasi
                    </th>

                    <th class="px-5 py-3.5 text-right text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Nilai Tagihan
                    </th>

                    <th class="px-5 py-3.5 text-right text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Selisih
                    </th>

                    <th class="px-5 py-3.5 text-center text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Pencapaian
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                @forelse($jenisPajakRingkasan as $ringkasan)

                    <tr class="transition hover:bg-slate-50/70">

                        <td class="px-5 py-4">

                            <div class="flex items-center gap-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-xs font-bold text-[#1769AA]">
                                    {{ strtoupper(substr($ringkasan['kode'], 0, 3)) }}
                                </div>

                                <div>

                                    <p class="text-sm font-semibold text-slate-800">
                                        {{ $ringkasan['nama'] }}
                                    </p>

                                    <p class="mt-0.5 text-xs text-slate-400">
                                        {{ $ringkasan['kode'] }}
                                        ·
                                        {{ number_format($ringkasan['jumlah_tagihan'], 0, ',', '.') }} tagihan
                                    </p>

                                </div>

                            </div>

                        </td>


                        <td class="px-5 py-4 text-right">

                            <span class="text-sm font-semibold text-slate-700">
                                Rp {{ number_format($ringkasan['target'], 0, ',', '.') }}
                            </span>

                        </td>


                        <td class="px-5 py-4 text-right">

                            <span class="text-sm font-semibold text-emerald-600">
                                Rp {{ number_format($ringkasan['realisasi'], 0, ',', '.') }}
                            </span>

                        </td>


                        <td class="px-5 py-4 text-right">

                            <span class="text-sm font-semibold text-slate-700">
                                Rp {{ number_format($ringkasan['nilai_tagihan'], 0, ',', '.') }}
                            </span>

                        </td>


                        <td class="px-5 py-4 text-right">

                            <span class="text-sm font-semibold text-amber-600">
                                Rp {{ number_format($ringkasan['selisih'], 0, ',', '.') }}
                            </span>

                        </td>


                        <td class="px-5 py-4">

                            <div class="mx-auto w-36">

                                <div class="mb-1.5 flex items-center justify-between gap-3">

                                    <span class="text-xs font-semibold text-slate-600">
                                        {{ number_format($ringkasan['persentase'], 1, ',', '.') }}%
                                    </span>

                                </div>

                                <div class="h-2 overflow-hidden rounded-full bg-slate-100">

                                    <div
                                        class="h-full rounded-full bg-[#1769AA] transition-all duration-500"
                                        style="width: {{ min($ringkasan['persentase'], 100) }}%"
                                    ></div>

                                </div>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="px-5 py-12 text-center">

                            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-400">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 12.75l2 2 4-4"
                                    />
                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="8.25"
                                    />
                                </svg>

                            </div>

                            <p class="mt-3 text-sm font-semibold text-slate-700">
                                Belum ada ringkasan jenis pajak
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Data akan muncul setelah tersedia.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


{{-- ========================================================= --}}
{{-- DATA TAGIHAN --}}
{{-- ========================================================= --}}
<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="flex flex-col gap-3 border-b border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <h2 class="text-sm font-bold text-slate-800">
                Data Tagihan
            </h2>

            <p class="mt-1 text-xs text-slate-500">
                Daftar tagihan berdasarkan filter laporan yang dipilih.
            </p>

        </div>


        <span class="inline-flex w-fit items-center rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">

            {{ number_format($tagihans->total(), 0, ',', '.') }}
            data

        </span>

    </div>


    <div class="overflow-x-auto">

        <table class="min-w-[1150px] w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        No
                    </th>

                    <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Nomor Tagihan
                    </th>

                    <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Wajib Pajak
                    </th>

                    <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Jenis Pajak
                    </th>

                    <th class="px-5 py-3.5 text-center text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Tahun
                    </th>

                    <th class="px-5 py-3.5 text-right text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Tagihan
                    </th>

                    <th class="px-5 py-3.5 text-right text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Dibayar
                    </th>

                    <th class="px-5 py-3.5 text-right text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Sisa
                    </th>

                    <th class="px-5 py-3.5 text-center text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Status
                    </th>

                    <th class="px-5 py-3.5 text-center text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                @forelse($tagihans as $tagihan)

                    @php

                        $totalTagihanItem = (float) $tagihan->total_tagihan;

                        $totalDibayarItem = (float) $tagihan->pembayarans->sum('jumlah_bayar');

                        $sisaItem = max(
                            0,
                            $totalTagihanItem - $totalDibayarItem
                        );

                    @endphp


                    <tr class="transition hover:bg-slate-50/70">

                        <td class="whitespace-nowrap px-5 py-4 text-sm font-medium text-slate-500">
                            {{ $tagihans->firstItem() + $loop->index }}
                        </td>


                        <td class="whitespace-nowrap px-5 py-4">

                            <span class="text-sm font-bold text-[#1769AA]">
                                {{ $tagihan->nomor_tagihan }}
                            </span>

                        </td>


                        <td class="px-5 py-4">

                            <div>

                                <p class="whitespace-nowrap text-sm font-semibold text-slate-800">
                                    {{ $tagihan->wajibPajak->nama ?? '-' }}
                                </p>

                                <p class="mt-0.5 whitespace-nowrap text-xs text-slate-400">
                                    {{ $tagihan->wajibPajak->nik ?? '-' }}
                                </p>

                            </div>

                        </td>


                        <td class="px-5 py-4">

                            <span class="whitespace-nowrap text-sm font-medium text-slate-700">
                                {{ $tagihan->jenisPajak->nama ?? '-' }}
                            </span>

                        </td>


                        <td class="whitespace-nowrap px-5 py-4 text-center">

                            <span class="inline-flex items-center rounded-lg bg-blue-50 px-2.5 py-1 text-xs font-bold text-[#1769AA]">
                                {{ $tagihan->tahun_pajak }}
                            </span>

                        </td>


                        <td class="whitespace-nowrap px-5 py-4 text-right">

                            <span class="text-sm font-semibold text-slate-700">
                                Rp {{ number_format($totalTagihanItem, 0, ',', '.') }}
                            </span>

                        </td>


                        <td class="whitespace-nowrap px-5 py-4 text-right">

                            <span class="text-sm font-semibold text-emerald-600">
                                Rp {{ number_format($totalDibayarItem, 0, ',', '.') }}
                            </span>

                        </td>


                        <td class="whitespace-nowrap px-5 py-4 text-right">

                            @if($sisaItem > 0)

                                <span class="text-sm font-bold text-red-600">
                                    Rp {{ number_format($sisaItem, 0, ',', '.') }}
                                </span>

                            @else

                                <span class="text-sm font-bold text-emerald-600">
                                    Rp 0
                                </span>

                            @endif

                        </td>


                        <td class="whitespace-nowrap px-5 py-4 text-center">

                            @switch($tagihan->status)

                                @case('lunas')

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                        Lunas

                                    </span>

                                    @break


                                @case('sebagian')

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                        Sebagian

                                    </span>

                                    @break


                                @case('jatuh_tempo')

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                        Jatuh Tempo

                                    </span>

                                    @break


                                @default

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600">

                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                        Belum Bayar

                                    </span>

                            @endswitch

                        </td>


                        <td class="whitespace-nowrap px-5 py-4 text-center">

                            <a
                                href="{{ route('tagihan.show', $tagihan) }}"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 shadow-sm transition hover:border-blue-200 hover:bg-blue-50 hover:text-[#1769AA]"
                                title="Lihat detail"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6z"
                                    />

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="2.75"
                                    />
                                </svg>

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="10" class="px-5 py-14 text-center">

                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-7 w-7"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M7.5 3.75h6l3.75 3.75v12.75H7.5a1.5 1.5 0 01-1.5-1.5V5.25a1.5 1.5 0 011.5-1.5z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13.5 3.75v4.5h4.5"
                                    />

                                </svg>

                            </div>


                            <p class="mt-4 text-sm font-bold text-slate-700">
                                Tidak ada data tagihan
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Coba ubah filter laporan yang digunakan.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- PAGINATION --}}
    @if($tagihans->hasPages())

        <div class="border-t border-slate-100 px-5 py-4">

            {{ $tagihans->links() }}

        </div>

    @endif

</div>


{{-- ========================================================= --}}
{{-- CUSTOM DROPDOWN SCRIPT --}}
{{-- ========================================================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdowns = document.querySelectorAll('[data-dropdown]');


    dropdowns.forEach(function (dropdown) {

        const button = dropdown.querySelector('[data-dropdown-button]');
        const menu = dropdown.querySelector('[data-dropdown-menu]');
        const input = dropdown.querySelector('[data-dropdown-input]');
        const label = dropdown.querySelector('[data-dropdown-label]');
        const chevron = dropdown.querySelector('[data-dropdown-chevron]');
        const options = dropdown.querySelectorAll('[data-dropdown-option]');


        function closeDropdown() {

            menu.classList.add('hidden');

            button.classList.remove(
                'border-[#1769AA]',
                'bg-white',
                'ring-4',
                'ring-blue-50'
            );

            chevron.classList.remove('rotate-180');

        }


        function openDropdown() {

            document.querySelectorAll('[data-dropdown-menu]').forEach(function (otherMenu) {

                if (otherMenu !== menu) {

                    otherMenu.classList.add('hidden');

                }

            });


            document.querySelectorAll('[data-dropdown-chevron]').forEach(function (otherChevron) {

                if (otherChevron !== chevron) {

                    otherChevron.classList.remove('rotate-180');

                }

            });


            document.querySelectorAll('[data-dropdown-button]').forEach(function (otherButton) {

                if (otherButton !== button) {

                    otherButton.classList.remove(
                        'border-[#1769AA]',
                        'bg-white',
                        'ring-4',
                        'ring-blue-50'
                    );

                }

            });


            menu.classList.remove('hidden');

            button.classList.add(
                'border-[#1769AA]',
                'bg-white',
                'ring-4',
                'ring-blue-50'
            );

            chevron.classList.add('rotate-180');

        }


        button.addEventListener('click', function (event) {

            event.preventDefault();
            event.stopPropagation();

            if (menu.classList.contains('hidden')) {

                openDropdown();

            } else {

                closeDropdown();

            }

        });


        options.forEach(function (option) {

            option.addEventListener('click', function (event) {

                event.preventDefault();
                event.stopPropagation();

                const value = this.dataset.value ?? '';
                const text = this.dataset.label ?? '';

                input.value = value;

                label.textContent = text;


                options.forEach(function (item) {

                    item.classList.remove(
                        'bg-blue-50',
                        'text-[#1769AA]'
                    );

                });


                this.classList.add(
                    'bg-blue-50',
                    'text-[#1769AA]'
                );


                closeDropdown();

            });

        });


        const currentValue = input.value;

        options.forEach(function (option) {

            if (option.dataset.value === currentValue) {

                option.classList.add(
                    'bg-blue-50',
                    'text-[#1769AA]'
                );

            }

        });

    });


    document.addEventListener('click', function (event) {

        dropdowns.forEach(function (dropdown) {

            if (!dropdown.contains(event.target)) {

                const menu = dropdown.querySelector('[data-dropdown-menu]');
                const button = dropdown.querySelector('[data-dropdown-button]');
                const chevron = dropdown.querySelector('[data-dropdown-chevron]');

                menu.classList.add('hidden');

                button.classList.remove(
                    'border-[#1769AA]',
                    'bg-white',
                    'ring-4',
                    'ring-blue-50'
                );

                chevron.classList.remove('rotate-180');

            }

        });

    });

});
</script>

@endsection