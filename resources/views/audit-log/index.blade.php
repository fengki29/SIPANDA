@extends('layouts.app')

@section('title', 'Riwayat Aktivitas')

@section('content')

<div class="space-y-6">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

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
                        d="M9 5.25H6.75A2.25 2.25 0 004.5 7.5v11.25A2.25 2.25 0 006.75 21h10.5a2.25 2.25 0 002.25-2.25V7.5a2.25 2.25 0 00-2.25-2.25H15"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 5.25a3 3 0 016 0v1.5H9v-1.5z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8.25 11.25h7.5M8.25 15h5.25"
                    />
                </svg>

            </div>


            <div>

                <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                    Riwayat Aktivitas
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Pantau seluruh aktivitas pengguna yang dilakukan di dalam sistem SIPANDA.
                </p>

            </div>

        </div>


        <div class="flex items-center gap-3 rounded-2xl border border-blue-100 bg-blue-50/70 px-4 py-3 shadow-sm">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-[#1769AA] shadow-sm">

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
                        d="M4.5 6.75A2.25 2.25 0 016.75 4.5h10.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25H6.75a2.25 2.25 0 01-2.25-2.25V6.75z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8.25 9h7.5M8.25 12.75h7.5M8.25 16.5h4.5"
                    />
                </svg>

            </div>


            <div>

                <p class="text-[11px] font-semibold uppercase tracking-wider text-blue-600">
                    Total Aktivitas
                </p>

                <p class="mt-0.5 text-xl font-bold text-[#1769AA]">
                    {{ number_format($auditLogs->total(), 0, ',', '.') }}
                </p>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- STATISTIK --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

        {{-- TOTAL LOG --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-blue-100 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Log
                    </p>

                    <p class="mt-2 text-2xl font-bold tracking-tight text-slate-800">
                        {{ number_format($totalLog, 0, ',', '.') }}
                    </p>

                </div>


                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA] transition duration-200 group-hover:scale-105">

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
                            d="M6.75 3.75h7.5L18.75 8.25v12H6.75a1.5 1.5 0 01-1.5-1.5V5.25a1.5 1.5 0 011.5-1.5z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M14.25 3.75v4.5h4.5"
                        />
                    </svg>

                </div>

            </div>


            <div class="mt-4 flex items-center gap-2">

                <span class="h-1.5 w-1.5 rounded-full bg-[#1769AA]"></span>

                <p class="text-xs text-slate-400">
                    Seluruh aktivitas tercatat
                </p>

            </div>

        </div>


        {{-- HARI INI --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-emerald-100 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Aktivitas Hari Ini
                    </p>

                    <p class="mt-2 text-2xl font-bold tracking-tight text-emerald-600">
                        {{ number_format($logHariIni, 0, ',', '.') }}
                    </p>

                </div>


                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 transition duration-200 group-hover:scale-105">

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
                            d="M12 6.75v5.25l3.75 2.25"
                        />

                        <circle
                            cx="12"
                            cy="12"
                            r="8.25"
                        />
                    </svg>

                </div>

            </div>


            <div class="mt-4 flex items-center gap-2">

                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                <p class="text-xs text-slate-400">
                    Aktivitas pada hari ini
                </p>

            </div>

        </div>


        {{-- MODUL TERAKTIF --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-purple-100 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="min-w-0">

                    <p class="text-sm font-medium text-slate-500">
                        Modul Teraktif
                    </p>


                    @if($modulTeraktif)

                        <p class="mt-2 truncate text-lg font-bold text-purple-600">
                            {{ ucfirst(str_replace(['_', '-'], ' ', $modulTeraktif->modul)) }}
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            {{ number_format($modulTeraktif->total, 0, ',', '.') }} aktivitas
                        </p>

                    @else

                        <p class="mt-2 text-lg font-bold text-slate-400">
                            Belum ada data
                        </p>

                    @endif

                </div>


                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-purple-50 text-purple-600 transition duration-200 group-hover:scale-105">

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
                            d="M4.5 6.75h15M6.75 6.75v12.5h10.5V6.75M9 4.5h6"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.75 11.25h4.5M9.75 14.25h4.5"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- USER TERAKTIF --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-amber-100 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="min-w-0">

                    <p class="text-sm font-medium text-slate-500">
                        User Teraktif
                    </p>


                    @if($userTeraktif && $userTeraktif->user)

                        <p class="mt-2 truncate text-lg font-bold text-amber-600">
                            {{ $userTeraktif->user->name }}
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            {{ number_format($userTeraktif->total, 0, ',', '.') }} aktivitas
                        </p>

                    @else

                        <p class="mt-2 text-lg font-bold text-slate-400">
                            Belum ada data
                        </p>

                    @endif

                </div>


                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600 transition duration-200 group-hover:scale-105">

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
                            d="M15.75 19.5v-.75a3.75 3.75 0 00-3.75-3.75H8.25A3.75 3.75 0 004.5 18.75v.75"
                        />

                        <circle
                            cx="10.5"
                            cy="8.25"
                            r="3.75"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17.25 11.25a3 3 0 100-6"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 19.5v-.75a3.75 3.75 0 00-2.25-3.43"
                        />
                    </svg>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- AKTIVITAS HARI INI --}}
    {{-- ========================================================= --}}

    @if($aktivitasHariIni->count())

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="mb-5 flex items-start justify-between gap-4">

                <div class="flex items-start gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

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
                                d="M12 6.75v5.25l3.75 2.25"
                            />

                            <circle
                                cx="12"
                                cy="12"
                                r="8.25"
                            />
                        </svg>

                    </div>


                    <div>

                        <h2 class="text-sm font-bold text-slate-800">
                            Aktivitas Hari Ini
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Jenis aktivitas yang paling sering dilakukan hari ini.
                        </p>

                    </div>

                </div>


                <div class="hidden rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700 sm:inline-flex">
                    {{ number_format($logHariIni, 0, ',', '.') }} aktivitas
                </div>

            </div>


            <div class="grid grid-cols-2 gap-3 md:grid-cols-3 xl:grid-cols-5">

                @foreach($aktivitasHariIni as $aktivitasItem)

                    @php
                        $namaAktivitas = ucfirst(
                            str_replace(
                                ['_', '-'],
                                ' ',
                                $aktivitasItem->aktivitas ?? 'Aktivitas'
                            )
                        );
                    @endphp


                    <div class="rounded-xl border border-slate-100 bg-slate-50/70 p-4 transition duration-200 hover:border-blue-100 hover:bg-blue-50/30">

                        <p class="truncate text-xs font-semibold text-slate-500">
                            {{ $namaAktivitas }}
                        </p>

                        <p class="mt-1 text-xl font-bold text-slate-800">
                            {{ number_format($aktivitasItem->total, 0, ',', '.') }}
                        </p>

                        <p class="mt-1 text-[11px] text-slate-400">
                            aktivitas
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- FILTER --}}
    {{-- ========================================================= --}}

    <div class="relative z-30 rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-5 py-5">

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
                            d="M4.5 6.75h15M7.5 12h9m-6 5.25h3"
                        />
                    </svg>

                </div>


                <div>

                    <h2 class="text-sm font-bold text-slate-800">
                        Filter Aktivitas
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        Gunakan filter untuk menemukan aktivitas tertentu.
                    </p>

                </div>

            </div>

        </div>


        <form
            method="GET"
            action="{{ route('audit-log.index') }}"
            class="p-5"
        >

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">

                {{-- ================================================= --}}
                {{-- SEARCH --}}
                {{-- ================================================= --}}

                <div class="lg:col-span-2">

                    <label
                        for="search"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Pencarian
                    </label>


                    <div class="relative">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                            />
                        </svg>


                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari user, email, keterangan, route..."
                            class="block h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 px-4 pl-11 text-sm font-medium text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 hover:border-blue-300 hover:bg-blue-50/40 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- AKTIVITAS --}}
                {{-- ================================================= --}}

                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Aktivitas
                    </label>


                    <div
                        class="relative"
                        data-dropdown
                    >

                        <input
                            type="hidden"
                            name="aktivitas"
                            value="{{ request('aktivitas') }}"
                            data-dropdown-input
                        >


                        <button
                            type="button"
                            data-dropdown-button
                            aria-expanded="false"
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
                                        d="M12 6.75v5.25l3.75 2.25"
                                    />

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="8.25"
                                    />
                                </svg>

                            </span>


                            <span
                                data-dropdown-label
                                class="flex-1 truncate pr-3 text-sm font-medium text-slate-700"
                            >

                                @if(request('aktivitas'))

                                    {{ ucfirst(str_replace(['_', '-'], ' ', request('aktivitas'))) }}

                                @else

                                    Semua Aktivitas

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
                            class="absolute left-0 right-0 z-[100] mt-2 hidden max-h-64 overflow-y-auto overflow-x-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70"
                        >

                            <button
                                type="button"
                                data-dropdown-option
                                data-value=""
                                data-label="Semua Aktivitas"
                                class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >
                                Semua Aktivitas
                            </button>


                            @foreach($aktivitasTersedia as $aktivitas)

                                <button
                                    type="button"
                                    data-dropdown-option
                                    data-value="{{ $aktivitas }}"
                                    data-label="{{ ucfirst(str_replace(['_', '-'], ' ', $aktivitas)) }}"
                                    class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                                >
                                    {{ ucfirst(str_replace(['_', '-'], ' ', $aktivitas)) }}
                                </button>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- MODUL --}}
                {{-- ================================================= --}}

                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Modul
                    </label>


                    <div
                        class="relative"
                        data-dropdown
                    >

                        <input
                            type="hidden"
                            name="modul"
                            value="{{ request('modul') }}"
                            data-dropdown-input
                        >


                        <button
                            type="button"
                            data-dropdown-button
                            aria-expanded="false"
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
                                        d="M4.5 6.75h15M4.5 11.25h15M4.5 15.75h9"
                                    />
                                </svg>

                            </span>


                            <span
                                data-dropdown-label
                                class="flex-1 truncate pr-3 text-sm font-medium text-slate-700"
                            >

                                @if(request('modul'))

                                    {{ ucfirst(str_replace(['_', '-'], ' ', request('modul'))) }}

                                @else

                                    Semua Modul

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
                            class="absolute left-0 right-0 z-[100] mt-2 hidden max-h-64 overflow-y-auto overflow-x-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70"
                        >

                            <button
                                type="button"
                                data-dropdown-option
                                data-value=""
                                data-label="Semua Modul"
                                class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >
                                Semua Modul
                            </button>


                            @foreach($modulTersedia as $modul)

                                <button
                                    type="button"
                                    data-dropdown-option
                                    data-value="{{ $modul }}"
                                    data-label="{{ ucfirst(str_replace(['_', '-'], ' ', $modul)) }}"
                                    class="flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                                >
                                    {{ ucfirst(str_replace(['_', '-'], ' ', $modul)) }}
                                </button>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- BUTTON --}}
                {{-- ================================================= --}}

                <div class="flex items-end gap-2">

                    <a
                        href="{{ route('audit-log.index') }}"
                        class="inline-flex h-[52px] flex-1 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-600 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:bg-slate-50 hover:shadow-sm"
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
                                d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                            />
                        </svg>

                        Terapkan

                    </button>

                </div>

            </div>

        </form>

    </div>


    {{-- ========================================================= --}}
    {{-- FILTER AKTIF --}}
    {{-- ========================================================= --}}

    @if(
        request()->filled('search')
        || request()->filled('aktivitas')
        || request()->filled('modul')
    )

        <div class="flex flex-wrap items-center gap-2">

            <span class="text-sm font-semibold text-slate-600">
                Filter aktif:
            </span>


            @if(request()->filled('search'))

                <span class="inline-flex max-w-full items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-[#1769AA]">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                        />
                    </svg>

                    <span class="truncate">
                        {{ request('search') }}
                    </span>

                </span>

            @endif


            @if(request()->filled('aktivitas'))

                <span class="inline-flex items-center rounded-full bg-purple-50 px-3 py-1.5 text-xs font-semibold text-purple-700">

                    Aktivitas:

                    <span class="ml-1">
                        {{ ucfirst(str_replace(['_', '-'], ' ', request('aktivitas'))) }}
                    </span>

                </span>

            @endif


            @if(request()->filled('modul'))

                <span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">

                    Modul:

                    <span class="ml-1">
                        {{ ucfirst(str_replace(['_', '-'], ' ', request('modul'))) }}
                    </span>

                </span>

            @endif

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- TABLE --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-col gap-3 border-b border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <div class="flex items-center gap-2">

                    <div class="h-2 w-2 rounded-full bg-[#1769AA]"></div>

                    <h2 class="text-sm font-bold text-slate-800">
                        Log Aktivitas
                    </h2>

                </div>

                <p class="mt-1 text-xs text-slate-500">
                    Aktivitas terbaru ditampilkan terlebih dahulu.
                </p>

            </div>


            <div class="inline-flex w-fit items-center gap-1.5 rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">

                <span class="font-bold text-slate-700">
                    {{ number_format($auditLogs->total(), 0, ',', '.') }}
                </span>

                data

            </div>

        </div>


        @if($auditLogs->count() > 0)

            <div class="overflow-x-auto">

                <table class="min-w-[1200px] w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                No
                            </th>

                            <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                User
                            </th>

                            <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Aktivitas
                            </th>

                            <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Modul
                            </th>

                            <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Keterangan
                            </th>

                            <th class="px-5 py-3.5 text-left text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Waktu
                            </th>

                            <th class="px-5 py-3.5 text-right text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @foreach($auditLogs as $auditLog)

                            @php

                                $aktivitas = strtolower(
                                    $auditLog->aktivitas ?? ''
                                );

                                $namaAktivitas = ucfirst(
                                    str_replace(
                                        ['_', '-'],
                                        ' ',
                                        $auditLog->aktivitas ?? 'Aktivitas'
                                    )
                                );

                                $namaModul = ucfirst(
                                    str_replace(
                                        ['_', '-'],
                                        ' ',
                                        $auditLog->modul ?? '-'
                                    )
                                );

                            @endphp


                            <tr class="group transition duration-150 hover:bg-blue-50/30">

                                {{-- NO --}}
                                <td class="whitespace-nowrap px-5 py-4 text-sm font-medium text-slate-400">

                                    {{ $auditLogs->firstItem() + $loop->index }}

                                </td>


                                {{-- USER --}}
                                <td class="px-5 py-4">

                                    @if($auditLog->user)

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-full border border-slate-200 bg-blue-50 font-bold text-[#1769AA] shadow-sm">

                                                @if($auditLog->user->avatar)

                                                    <img
                                                        src="{{ asset('storage/' . $auditLog->user->avatar) }}"
                                                        alt="Foto {{ $auditLog->user->name }}"
                                                        class="h-full w-full object-cover"
                                                    >

                                                @else

                                                    <span class="text-sm font-bold">

                                                        {{ strtoupper(
                                                            substr(
                                                                $auditLog->user->name,
                                                                0,
                                                                1
                                                            )
                                                        ) }}

                                                    </span>

                                                @endif

                                            </div>


                                            <div class="min-w-0">

                                                <p class="truncate text-sm font-semibold text-slate-800">
                                                    {{ $auditLog->user->name }}
                                                </p>

                                                <p class="mt-0.5 truncate text-xs text-slate-400">
                                                    {{ $auditLog->user->email }}
                                                </p>

                                            </div>

                                        </div>

                                    @else

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-slate-100 text-sm font-bold text-slate-400">
                                                ?
                                            </div>

                                            <span class="text-sm text-slate-500">
                                                User tidak tersedia
                                            </span>

                                        </div>

                                    @endif

                                </td>


                                {{-- AKTIVITAS --}}
                                <td class="whitespace-nowrap px-5 py-4">

                                    @if(
                                        in_array(
                                            $aktivitas,
                                            ['login', 'logged_in', 'masuk']
                                        )
                                    )

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                            {{ $namaAktivitas }}

                                        </span>


                                    @elseif(
                                        in_array(
                                            $aktivitas,
                                            ['logout', 'logged_out', 'keluar']
                                        )
                                    )

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600">

                                            <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                            {{ $namaAktivitas }}

                                        </span>


                                    @elseif(
                                        in_array(
                                            $aktivitas,
                                            [
                                                'create',
                                                'created',
                                                'store',
                                                'tambah',
                                                'menambahkan data'
                                            ]
                                        )
                                    )

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-[#1769AA]">

                                            <span class="h-1.5 w-1.5 rounded-full bg-[#1769AA]"></span>

                                            {{ $namaAktivitas }}

                                        </span>


                                    @elseif(
                                        in_array(
                                            $aktivitas,
                                            [
                                                'update',
                                                'updated',
                                                'edit',
                                                'ubah',
                                                'mengubah data'
                                            ]
                                        )
                                    )

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                            {{ $namaAktivitas }}

                                        </span>


                                    @elseif(
                                        in_array(
                                            $aktivitas,
                                            [
                                                'delete',
                                                'deleted',
                                                'destroy',
                                                'hapus',
                                                'menghapus data'
                                            ]
                                        )
                                    )

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                            {{ $namaAktivitas }}

                                        </span>


                                    @else

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-purple-50 px-3 py-1.5 text-xs font-bold text-purple-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-purple-500"></span>

                                            {{ $namaAktivitas }}

                                        </span>

                                    @endif

                                </td>


                                {{-- MODUL --}}
                                <td class="whitespace-nowrap px-5 py-4">

                                    <span class="inline-flex items-center rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-semibold text-slate-600">

                                        {{ $namaModul }}

                                    </span>

                                </td>


                                {{-- KETERANGAN --}}
                                <td class="max-w-sm px-5 py-4">

                                    <p
                                        class="truncate text-sm font-medium text-slate-700"
                                        title="{{ $auditLog->keterangan ?? '-' }}"
                                    >
                                        {{ $auditLog->keterangan ?? '-' }}
                                    </p>


                                    @if($auditLog->route)

                                        <div class="mt-1 flex items-center gap-1.5">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3 w-3 shrink-0 text-slate-400"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M13.5 6.75L19.5 12l-6 5.25M4.5 12h15"
                                                />
                                            </svg>

                                            <p
                                                class="truncate text-xs text-slate-400"
                                                title="{{ $auditLog->route }}"
                                            >
                                                {{ $auditLog->route }}
                                            </p>

                                        </div>

                                    @endif

                                </td>


                                {{-- WAKTU --}}
                                <td class="whitespace-nowrap px-5 py-4">

                                    <div class="flex items-start gap-2">

                                        <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3.5 w-3.5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M12 6.75v5.25l3.75 2.25"
                                                />

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="8.25"
                                                />
                                            </svg>

                                        </div>


                                        <div>

                                            <p class="text-sm font-semibold text-slate-700">
                                                {{ $auditLog->created_at?->format('d M Y') ?? '-' }}
                                            </p>

                                            <p class="mt-0.5 text-xs text-slate-400">
                                                {{ $auditLog->created_at?->format('H:i:s') ?? '-' }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- AKSI --}}
                                <td class="whitespace-nowrap px-5 py-4 text-right">

                                    <a
                                        href="{{ route('audit-log.show', $auditLog) }}"
                                        class="inline-flex h-9 items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-600 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-200 hover:bg-blue-50 hover:text-[#1769AA] hover:shadow-sm"
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

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- ================================================= --}}
            {{-- PAGINATION --}}
            {{-- ================================================= --}}

            @if($auditLogs->hasPages())

                <div class="border-t border-slate-100 px-5 py-4">

                    {{ $auditLogs->links() }}

                </div>

            @endif


        @else

            {{-- ================================================= --}}
            {{-- EMPTY STATE --}}
            {{-- ================================================= --}}

            <div class="px-5 py-16 text-center">

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
                            d="M6.75 3.75h7.5L18.75 8.25v12H6.75a1.5 1.5 0 01-1.5-1.5V5.25a1.5 1.5 0 011.5-1.5z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M14.25 3.75v4.5h4.5"
                        />
                    </svg>

                </div>


                <h3 class="mt-4 text-lg font-bold text-slate-800">
                    Belum ada aktivitas
                </h3>


                <p class="mx-auto mt-2 max-w-md text-sm text-slate-500">
                    Belum terdapat riwayat aktivitas yang sesuai dengan filter yang dipilih.
                </p>


                @if(
                    request()->filled('search')
                    || request()->filled('aktivitas')
                    || request()->filled('modul')
                )

                    <a
                        href="{{ route('audit-log.index') }}"
                        class="mt-5 inline-flex h-10 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-600 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:bg-slate-50"
                    >

                        Reset Filter

                    </a>

                @endif

            </div>

        @endif

    </div>

</div>


{{-- ========================================================= --}}
{{-- CUSTOM DROPDOWN SCRIPT --}}
{{-- ========================================================= --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdowns = document.querySelectorAll('[data-dropdown]');


    function closeDropdown(dropdown) {

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

            button.setAttribute(
                'aria-expanded',
                'false'
            );

            button.classList.remove(
                'border-[#1769AA]',
                'bg-white',
                'ring-4',
                'ring-blue-50'
            );

        }


        if (chevron) {

            chevron.classList.remove(
                'rotate-180'
            );

        }

    }


    function openDropdown(dropdown) {

        dropdowns.forEach(function (otherDropdown) {

            if (otherDropdown !== dropdown) {

                closeDropdown(
                    otherDropdown
                );

            }

        });


        const menu =
            dropdown.querySelector('[data-dropdown-menu]');

        const button =
            dropdown.querySelector('[data-dropdown-button]');

        const chevron =
            dropdown.querySelector('[data-dropdown-chevron]');


        if (menu) {

            menu.classList.remove(
                'hidden'
            );

        }


        if (button) {

            button.setAttribute(
                'aria-expanded',
                'true'
            );

            button.classList.add(
                'border-[#1769AA]',
                'bg-white',
                'ring-4',
                'ring-blue-50'
            );

        }


        if (chevron) {

            chevron.classList.add(
                'rotate-180'
            );

        }

    }


    dropdowns.forEach(function (dropdown) {

        const button =
            dropdown.querySelector(
                '[data-dropdown-button]'
            );

        const menu =
            dropdown.querySelector(
                '[data-dropdown-menu]'
            );

        const label =
            dropdown.querySelector(
                '[data-dropdown-label]'
            );

        const input =
            dropdown.querySelector(
                '[data-dropdown-input]'
            );

        const options =
            dropdown.querySelectorAll(
                '[data-dropdown-option]'
            );


        if (
            !button ||
            !menu ||
            !label ||
            !input
        ) {

            return;

        }


        button.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                event.stopPropagation();


                if (
                    menu.classList.contains(
                        'hidden'
                    )
                ) {

                    openDropdown(
                        dropdown
                    );

                } else {

                    closeDropdown(
                        dropdown
                    );

                }

            }
        );


        options.forEach(function (option) {

            option.addEventListener(
                'click',
                function (event) {

                    event.preventDefault();

                    event.stopPropagation();


                    const value =
                        this.dataset.value ?? '';


                    const selectedLabel =
                        this.dataset.label ?? '';


                    input.value =
                        value;


                    label.textContent =
                        selectedLabel;


                    options.forEach(
                        function (otherOption) {

                            otherOption.classList.remove(
                                'bg-blue-50',
                                'text-[#1769AA]'
                            );

                        }
                    );


                    if (value !== '') {

                        this.classList.add(
                            'bg-blue-50',
                            'text-[#1769AA]'
                        );

                    }


                    closeDropdown(
                        dropdown
                    );

                }
            );

        });


        const currentValue =
            input.value;


        if (currentValue !== '') {

            options.forEach(
                function (option) {

                    if (
                        (option.dataset.value ?? '') ===
                        currentValue
                    ) {

                        option.classList.add(
                            'bg-blue-50',
                            'text-[#1769AA]'
                        );

                    }

                }
            );

        }

    });


    document.addEventListener(
        'click',
        function () {

            dropdowns.forEach(
                function (dropdown) {

                    closeDropdown(
                        dropdown
                    );

                }
            );

        }
    );


    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key === 'Escape') {

                dropdowns.forEach(
                    function (dropdown) {

                        closeDropdown(
                            dropdown
                        );

                    }
                );

            }

        }
    );

});
</script>

@endsection