@extends('layouts.app')

@section('title', 'Data Wajib Pajak - SIPANDA')

@section('content')
<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-[#1769AA]">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M18 20a6 6 0 00-12 0m12 0h1.5a1.5 1.5 0 001.5-1.5v-1a4.5 4.5 0 00-4.5-4.5h-1m-7.5 7H6a1.5 1.5 0 01-1.5-1.5v-1A4.5 4.5 0 019 13h1m2-9a3 3 0 110 6 3 3 0 010-6z"/>
                    </svg>
                </div>

                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                        Data Wajib Pajak
                    </h1>
                    <p class="mt-1 text-sm text-slate-500">
                        Kelola data wajib pajak yang terdaftar pada sistem SIPANDA.
                    </p>
                </div>
            </div>
        </div>

        <a href="{{ route('wajib-pajak.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Wajib Pajak
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4">
            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <p class="text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if($errors->any())
        <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4">
            <div class="flex items-start gap-3">
                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 2.75h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>
                </div>

                <div>
                    <p class="text-sm font-semibold text-red-800">
                        Terjadi kesalahan
                    </p>

                    <ul class="mt-1 list-disc space-y-1 pl-5 text-sm text-red-700">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

        {{-- TOTAL --}}
        <div class="group rounded-2xl border border-blue-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                        Total Wajib Pajak
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-[#1769AA]">
                        {{ number_format($totalWajibPajak, 0, ',', '.') }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Seluruh wajib pajak terdaftar
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4FC] text-[#1769AA] transition group-hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m8-10a4 4 0 100-8 4 4 0 000 8zm6-3a3 3 0 110-6 3 3 0 010 6zm2 13v-2a4 4 0 00-3-3.87"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- AKTIF --}}
        <div class="group rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                        Wajib Pajak Aktif
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-emerald-600">
                        {{ number_format($jumlahAktif, 0, ',', '.') }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Status aktif
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 transition group-hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- NONAKTIF --}}
        <div class="group rounded-2xl border border-red-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                        Wajib Pajak Nonaktif
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-red-600">
                        {{ number_format($jumlahNonaktif, 0, ',', '.') }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Status nonaktif
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-600 transition group-hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 9v4m0 4h.01M10.29 3.86l-7.6 13.17A2 2 0 004.42 20h15.16a2 2 0 001.73-2.97l-7.6-13.17a2 2 0 00-3.42 0z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- FILTER --}}
    <div class="overflow-visible rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

        <div class="mb-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA]">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3 4h18M6 8h12M9 12h6M11 16h2M12 20v-4"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-sm font-bold text-slate-900">
                        Cari & Filter Data
                    </h2>

                    <p class="mt-0.5 text-xs text-slate-500">
                        Gunakan pencarian atau filter untuk menemukan wajib pajak.
                    </p>
                </div>
            </div>
        </div>

        <form action="{{ route('wajib-pajak.index') }}"
              method="GET">

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">

                {{-- SEARCH --}}
                <div class="lg:col-span-2">
                    <label for="search"
                           class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                        Pencarian
                    </label>

                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                            </svg>
                        </div>

                        <input type="text"
                               name="search"
                               id="search"
                               value="{{ request('search') }}"
                               placeholder="Cari NIK, nama, atau nomor HP..."
                               class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50">
                    </div>
                </div>

                {{-- JENIS WP --}}
                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                        Jenis Wajib Pajak
                    </label>

                    <div class="custom-filter-dropdown relative z-[60]"
                         data-dropdown>

                        <input type="hidden"
                               name="jenis_wp"
                               value="{{ request('jenis_wp') }}">

                        <button type="button"
                                data-dropdown-button
                                aria-expanded="false"
                                class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50/60 px-3.5 text-left text-sm font-medium text-slate-700 outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50">

                            <span class="flex min-w-0 items-center gap-3">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-[#1769AA]">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="1.8">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M15 19a4 4 0 00-8 0m8 0h3.5a1.5 1.5 0 001.5-1.5v-.5A4 4 0 0016 13.13M9 8a3 3 0 110-6 3 3 0 010 6zm8 4a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"/>
                                    </svg>
                                </span>

                                <span data-dropdown-label
                                      class="truncate">
                                    {{ request('jenis_wp') ?: 'Semua Jenis' }}
                                </span>
                            </span>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 data-dropdown-chevron
                                 class="h-4 w-4 shrink-0 text-slate-400 transition-transform duration-200"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6.75 9.75L12 15l5.25-5.25"/>
                            </svg>
                        </button>

                        <div data-dropdown-menu
                             class="absolute left-0 right-0 z-[9999] mt-2 hidden max-h-64 overflow-y-auto overflow-x-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70">

                            <button type="button"
                                    class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 {{ !request('jenis_wp') ? 'bg-blue-50 text-blue-700' : 'text-slate-700' }}"
                                    data-value=""
                                    data-label="Semua Jenis">
                                Semua Jenis
                            </button>

                            @foreach($jenisWajibPajak as $jenis)
                                <button type="button"
                                        class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 {{ request('jenis_wp') == $jenis ? 'bg-blue-50 text-blue-700' : 'text-slate-700' }}"
                                        data-value="{{ $jenis }}"
                                        data-label="{{ $jenis }}">
                                    {{ $jenis }}
                                </button>
                            @endforeach

                        </div>
                    </div>
                </div>

                {{-- STATUS --}}
                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                        Status
                    </label>

                    <div class="custom-filter-dropdown relative z-[50]"
                         data-dropdown>

                        <input type="hidden"
                               name="status"
                               value="{{ request('status') }}">

                        <button type="button"
                                data-dropdown-button
                                aria-expanded="false"
                                class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50/60 px-3.5 text-left text-sm font-medium text-slate-700 outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50">

                            <span class="flex min-w-0 items-center gap-3">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="1.8">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 00-8.618 3.04A12.02 12.02 0 003 12c0 5.591 3.824 10.29 9 11.622C17.176 22.29 21 17.591 21 12c0-1.41-.24-2.764-.682-4.016z"/>
                                    </svg>
                                </span>

                                <span data-dropdown-label
                                      class="truncate">
                                    @if(request('status') === '1')
                                        Aktif
                                    @elseif(request('status') === '0')
                                        Nonaktif
                                    @else
                                        Semua Status
                                    @endif
                                </span>
                            </span>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 data-dropdown-chevron
                                 class="h-4 w-4 shrink-0 text-slate-400 transition-transform duration-200"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6.75 9.75L12 15l5.25-5.25"/>
                            </svg>
                        </button>

                        <div data-dropdown-menu
                             class="absolute left-0 right-0 z-[9999] mt-2 hidden max-h-64 overflow-y-auto overflow-x-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70">

                            <button type="button"
                                    class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 {{ !request()->filled('status') ? 'bg-blue-50 text-blue-700' : 'text-slate-700' }}"
                                    data-value=""
                                    data-label="Semua Status">
                                Semua Status
                            </button>

                            <button type="button"
                                    class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 {{ request('status') === '1' ? 'bg-blue-50 text-blue-700' : 'text-slate-700' }}"
                                    data-value="1"
                                    data-label="Aktif">
                                Aktif
                            </button>

                            <button type="button"
                                    class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 {{ request('status') === '0' ? 'bg-blue-50 text-blue-700' : 'text-slate-700' }}"
                                    data-value="0"
                                    data-label="Nonaktif">
                                Nonaktif
                            </button>

                        </div>
                    </div>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="mt-5 flex flex-col gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">

                <a href="{{ route('wajib-pajak.index') }}"
                   class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-800">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Reset
                </a>

                <button type="submit"
                        class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                    </svg>
                    Cari Data
                </button>

            </div>

        </form>
    </div>

    {{-- FILTER RESULT INFO --}}
    @if(
        request()->filled('search') ||
        request()->filled('jenis_wp') ||
        request()->filled('status')
    )
        <div class="flex flex-col gap-2 rounded-xl border border-blue-100 bg-blue-50/60 px-4 py-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-2 text-sm text-slate-600">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4 text-[#1769AA]"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z"/>
                </svg>

                <span>
                    Menampilkan
                    <span class="font-bold text-slate-900">
                        {{ $wajibPajaks->total() }}
                    </span>
                    data hasil filter.
                </span>
            </div>

            <a href="{{ route('wajib-pajak.index') }}"
               class="text-sm font-semibold text-[#1769AA] transition hover:text-[#0D6EAD] hover:underline">
                Hapus semua filter
            </a>
        </div>
    @endif

    {{-- DATA TABLE --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        @if($wajibPajaks->count() > 0)

            {{-- TABLE HEADER --}}
            <div class="flex flex-col gap-2 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-900">
                        Daftar Wajib Pajak
                    </h2>

                    <p class="mt-0.5 text-xs text-slate-500">
                        Data wajib pajak yang tersimpan dalam sistem.
                    </p>
                </div>

                <div class="inline-flex items-center gap-2 self-start rounded-full bg-slate-50 px-3 py-1.5 text-xs font-semibold text-slate-500">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#1769AA]"></span>
                    {{ $wajibPajaks->total() }} data
                </div>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="border-b border-slate-100 bg-slate-50/80">
                        <tr>
                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                No
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                NIK
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Nama
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Alamat
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                No. HP
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Jenis WP
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @foreach($wajibPajaks as $index => $wajibPajak)

                            <tr class="group transition hover:bg-blue-50/30">

                                {{-- NO --}}
                                <td class="whitespace-nowrap px-6 py-5 text-sm font-medium text-slate-400">
                                    {{ $wajibPajaks->firstItem() + $index }}
                                </td>

                                {{-- NIK --}}
                                <td class="whitespace-nowrap px-6 py-5">
                                    <span class="rounded-lg bg-slate-50 px-2.5 py-1.5 font-mono text-xs font-semibold text-slate-600">
                                        {{ $wajibPajak->nik }}
                                    </span>
                                </td>

                                {{-- NAMA --}}
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">

                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-xs font-bold text-[#1769AA]">
                                            {{ strtoupper(substr($wajibPajak->nama, 0, 1)) }}
                                        </div>

                                        <div class="min-w-0">
                                            <p class="truncate text-sm font-bold text-slate-800">
                                                {{ $wajibPajak->nama }}
                                            </p>

                                            <p class="mt-0.5 text-xs text-slate-400">
                                                Wajib Pajak
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                {{-- ALAMAT --}}
                                <td class="max-w-xs px-6 py-5">
                                    <div class="flex max-w-xs items-start gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="mt-0.5 h-4 w-4 shrink-0 text-slate-400"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.8">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 21s7-6.2 7-12a7 7 0 10-14 0c0 5.8 7 12 7 12z"/>
                                            <circle cx="12"
                                                    cy="9"
                                                    r="2.25"/>
                                        </svg>

                                        <p class="truncate text-sm text-slate-600">
                                            {{ $wajibPajak->alamat }}
                                        </p>
                                    </div>
                                </td>

                                {{-- NO HP --}}
                                <td class="whitespace-nowrap px-6 py-5">
                                    @if($wajibPajak->no_hp)
                                        <div class="flex items-center gap-2 text-sm text-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-4 w-4 text-slate-400"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="1.8">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M7.5 3h9A1.5 1.5 0 0118 4.5v15a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 016 19.5v-15A1.5 1.5 0 017.5 3z"/>
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M10 18h4"/>
                                            </svg>

                                            {{ $wajibPajak->no_hp }}
                                        </div>
                                    @else
                                        <span class="text-sm text-slate-400">
                                            -
                                        </span>
                                    @endif
                                </td>

                                {{-- JENIS WP --}}
                                <td class="whitespace-nowrap px-6 py-5">
                                    @if($wajibPajak->jenis_wp === 'Badan')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-purple-50 px-3 py-1.5 text-xs font-bold text-purple-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-purple-500"></span>
                                            {{ $wajibPajak->jenis_wp }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-[#1769AA]">
                                            <span class="h-1.5 w-1.5 rounded-full bg-[#1769AA]"></span>
                                            {{ $wajibPajak->jenis_wp }}
                                        </span>
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td class="whitespace-nowrap px-6 py-5">
                                    @if($wajibPajak->status)
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="whitespace-nowrap px-6 py-5">
                                    <div class="flex items-center gap-1.5">

                                        {{-- DETAIL --}}
                                        <a href="{{ route('wajib-pajak.show', $wajibPajak) }}"
                                           title="Lihat detail"
                                           class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 transition hover:border-blue-200 hover:bg-blue-50 hover:text-[#1769AA]">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-4 w-4"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="1.8">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M2.25 12s3.5-6 9.75-6 9.75 6 9.75 6-3.5 6-9.75 6-9.75-6-9.75-6z"/>
                                                <circle cx="12"
                                                        cy="12"
                                                        r="2.5"/>
                                            </svg>
                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('wajib-pajak.edit', $wajibPajak) }}"
                                           title="Edit data"
                                           class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-amber-50 text-amber-600 transition hover:bg-amber-100">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-4 w-4"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="1.8">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M16.862 3.487a2.25 2.25 0 013.182 3.182L8.25 18.464 4 19.5l1.036-4.25L16.862 3.487z"/>
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M15.75 5.25l3 3"/>
                                            </svg>
                                        </a>

                                        {{-- HAPUS --}}
                                        <form action="{{ route('wajib-pajak.destroy', $wajibPajak) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data wajib pajak ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    title="Hapus data"
                                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-red-50 text-red-600 transition hover:bg-red-100">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4 w-4"
                                                     fill="none"
                                                     viewBox="0 0 24 24"
                                                     stroke="currentColor"
                                                     stroke-width="1.8">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          d="M6 7h12m-9 0v-2h6v2m-7 0l.75 13h6.5L16 7M10 11v5m4-5v5"/>
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            <div class="border-t border-slate-100 px-6 py-4">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <p class="text-sm text-slate-500">
                        Menampilkan
                        <span class="font-semibold text-slate-700">
                            {{ $wajibPajaks->firstItem() ?? 0 }}
                        </span>
                        sampai
                        <span class="font-semibold text-slate-700">
                            {{ $wajibPajaks->lastItem() ?? 0 }}
                        </span>
                        dari
                        <span class="font-semibold text-slate-700">
                            {{ $wajibPajaks->total() }}
                        </span>
                        data.
                    </p>

                    <div>
                        {{ $wajibPajaks->links() }}
                    </div>

                </div>
            </div>

        @else

            {{-- EMPTY STATE --}}
            <div class="px-6 py-16 text-center">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-50 text-[#1769AA]">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-8 w-8"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                    </svg>
                </div>

                @if(
                    request()->filled('search') ||
                    request()->filled('jenis_wp') ||
                    request()->filled('status')
                )

                    <h3 class="mt-5 text-lg font-bold text-slate-800">
                        Data tidak ditemukan
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                        Tidak ada wajib pajak yang sesuai dengan pencarian atau filter yang dipilih.
                    </p>

                    <a href="{{ route('wajib-pajak.index') }}"
                       class="mt-5 inline-flex h-[46px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 4v5h5M20 20v-5h-5M5.5 15A7 7 0 0019 9M18.5 9A7 7 0 005 15"/>
                        </svg>
                        Reset Filter
                    </a>

                @else

                    <h3 class="mt-5 text-lg font-bold text-slate-800">
                        Belum ada data wajib pajak
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                        Belum terdapat data wajib pajak di dalam sistem. Tambahkan data pertama untuk mulai menggunakan modul ini.
                    </p>

                    <a href="{{ route('wajib-pajak.create') }}"
                       class="mt-5 inline-flex h-[46px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Wajib Pajak
                    </a>

                @endif

            </div>

        @endif

    </div>

</div>

{{-- CUSTOM DROPDOWN SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdowns = document.querySelectorAll('[data-dropdown]');

    dropdowns.forEach(function (dropdown) {

        const button = dropdown.querySelector('[data-dropdown-button]');
        const menu = dropdown.querySelector('[data-dropdown-menu]');
        const label = dropdown.querySelector('[data-dropdown-label]');
        const input = dropdown.querySelector('input[type="hidden"]');
        const chevron = dropdown.querySelector('[data-dropdown-chevron]');
        const options = dropdown.querySelectorAll('.custom-option');

        if (!button || !menu || !label || !input) {
            return;
        }

        button.addEventListener('click', function (event) {

            event.stopPropagation();

            dropdowns.forEach(function (otherDropdown) {

                if (otherDropdown !== dropdown) {

                    const otherMenu =
                        otherDropdown.querySelector('[data-dropdown-menu]');

                    const otherButton =
                        otherDropdown.querySelector('[data-dropdown-button]');

                    const otherChevron =
                        otherDropdown.querySelector('[data-dropdown-chevron]');

                    if (otherMenu) {
                        otherMenu.classList.add('hidden');
                    }

                    if (otherButton) {
                        otherButton.setAttribute('aria-expanded', 'false');
                    }

                    if (otherChevron) {
                        otherChevron.classList.remove('rotate-180');
                    }
                }
            });

            const isHidden = menu.classList.contains('hidden');

            if (isHidden) {

                menu.classList.remove('hidden');

                button.setAttribute('aria-expanded', 'true');

                if (chevron) {
                    chevron.classList.add('rotate-180');
                }

            } else {

                menu.classList.add('hidden');

                button.setAttribute('aria-expanded', 'false');

                if (chevron) {
                    chevron.classList.remove('rotate-180');
                }
            }
        });

        options.forEach(function (option) {

            option.addEventListener('click', function (event) {

                event.stopPropagation();

                const value = option.dataset.value ?? '';
                const selectedLabel = option.dataset.label ?? '';

                input.value = value;
                label.textContent = selectedLabel;

                options.forEach(function (otherOption) {

                    otherOption.classList.remove(
                        'bg-blue-50',
                        'text-blue-700'
                    );

                    otherOption.classList.add(
                        'text-slate-700'
                    );
                });

                option.classList.remove('text-slate-700');

                option.classList.add(
                    'bg-blue-50',
                    'text-blue-700'
                );

                menu.classList.add('hidden');

                button.setAttribute('aria-expanded', 'false');

                if (chevron) {
                    chevron.classList.remove('rotate-180');
                }
            });
        });
    });

    document.addEventListener('click', function () {

        dropdowns.forEach(function (dropdown) {

            const menu =
                dropdown.querySelector('[data-dropdown-menu]');

            const button =
                dropdown.querySelector('[data-dropdown-button]');

            const chevron =
                dropdown.querySelector('[data-dropdown-chevron]');

            if (menu) {
                menu.classList.add('hidden');
            }

            if (button) {
                button.setAttribute('aria-expanded', 'false');
            }

            if (chevron) {
                chevron.classList.remove('rotate-180');
            }
        });
    });

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            dropdowns.forEach(function (dropdown) {

                const menu =
                    dropdown.querySelector('[data-dropdown-menu]');

                const button =
                    dropdown.querySelector('[data-dropdown-button]');

                const chevron =
                    dropdown.querySelector('[data-dropdown-chevron]');

                if (menu) {
                    menu.classList.add('hidden');
                }

                if (button) {
                    button.setAttribute('aria-expanded', 'false');
                }

                if (chevron) {
                    chevron.classList.remove('rotate-180');
                }
            });
        }
    });

});
</script>

@endsection