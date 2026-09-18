@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

@php
    $targetPercent = min(max((float) $persentaseTarget, 0), 100);

    $statusConfig = [
        'belum_bayar' => [
            'label' => 'Belum Bayar',
            'color' => 'text-slate-600',
            'bg' => 'bg-slate-100',
            'dot' => 'bg-slate-400',
        ],
        'sebagian' => [
            'label' => 'Sebagian',
            'color' => 'text-amber-700',
            'bg' => 'bg-amber-50',
            'dot' => 'bg-amber-500',
        ],
        'lunas' => [
            'label' => 'Lunas',
            'color' => 'text-emerald-700',
            'bg' => 'bg-emerald-50',
            'dot' => 'bg-emerald-500',
        ],
        'jatuh_tempo' => [
            'label' => 'Jatuh Tempo',
            'color' => 'text-red-700',
            'bg' => 'bg-red-50',
            'dot' => 'bg-red-500',
        ],
    ];
@endphp


<div class="space-y-6">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <div>
            <div class="mb-2 flex items-center gap-2 text-xs text-slate-400">

                <span>Beranda</span>

                <svg class="h-3 w-3"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 5l7 7-7 7"/>

                </svg>

                <span class="font-semibold text-[#1769AA]">
                    Dashboard
                </span>

            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                Dashboard SIPANDA
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Sistem Informasi Pajak Daerah — Tahun {{ $tahun }}
            </p>
        </div>


        {{-- =====================================================
            CUSTOM YEAR DROPDOWN
        ====================================================== --}}
        <form method="GET"
              action="{{ route('dashboard') }}"
              id="dashboardYearForm">

            <div class="relative">

                {{-- BUTTON --}}
                <button
                    type="button"
                    id="yearDropdownButton"
                    class="group flex min-w-[188px] items-center gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-2.5 text-left shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-[#B9DDF2] hover:shadow-md focus:outline-none focus:ring-2 focus:ring-[#1769AA]/10"
                >

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#E8F4FC] text-[#1769AA] transition duration-200 group-hover:bg-[#DCEFFD]">

                        <svg class="h-[18px] w-[18px]"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M8 7V3m8 4V3M4 11h16M5 21h14a1 1 0 001-1V6a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>

                        </svg>

                    </div>


                    <div class="min-w-0 flex-1">

                        <p class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">
                            Tahun Pajak
                        </p>

                        <p class="mt-0.5 text-sm font-bold text-slate-700">
                            {{ $tahun }}
                        </p>

                    </div>


                    <svg
                        id="yearDropdownIcon"
                        class="h-4 w-4 shrink-0 text-slate-500 transition-transform duration-200"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 9l6 6 6-6"/>

                    </svg>

                </button>


                {{-- DROPDOWN --}}
                <div
                    id="yearDropdownMenu"
                    class="invisible absolute right-0 z-50 mt-2 w-full min-w-[188px] origin-top scale-95 rounded-2xl border border-slate-200 bg-white p-1.5 opacity-0 shadow-xl shadow-slate-200/60 transition-all duration-150"
                >

                    <div class="px-2.5 pb-1.5 pt-1">

                        <p class="text-[9px] font-bold uppercase tracking-[0.14em] text-slate-400">
                            Pilih Tahun
                        </p>

                    </div>


                    @foreach($tahunTersedia as $tahunItem)

                        <button
                            type="button"
                            data-year="{{ $tahunItem }}"
                            class="year-option group flex w-full items-center justify-between rounded-xl px-3 py-2.5 text-left transition duration-150
                            {{ (int) $tahunItem === (int) $tahun
                                ? 'bg-[#E8F4FC] text-[#1769AA]'
                                : 'text-slate-600 hover:bg-slate-50 hover:text-[#1769AA]' }}"
                        >

                            <span class="text-sm font-semibold">
                                {{ $tahunItem }}
                            </span>


                            @if((int) $tahunItem === (int) $tahun)

                                <svg class="h-4 w-4 text-[#1769AA]"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                            @else

                                <svg class="h-4 w-4 text-transparent transition group-hover:text-[#1769AA]"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                            @endif

                        </button>

                    @endforeach

                </div>


                {{-- REAL SELECT --}}
                <select
                    name="tahun"
                    id="dashboardYearSelect"
                    class="hidden"
                >

                    @foreach($tahunTersedia as $tahunItem)

                        <option
                            value="{{ $tahunItem }}"
                            {{ (int) $tahunItem === (int) $tahun ? 'selected' : '' }}
                        >
                            {{ $tahunItem }}
                        </option>

                    @endforeach

                </select>

            </div>

        </form>

    </div>


    {{-- =========================================================
        HERO
    ========================================================== --}}
    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#0D6EAD] via-[#1778B5] to-[#2695CF] shadow-lg">

        <div class="pointer-events-none absolute -right-16 -top-24 h-72 w-72 rounded-full bg-white/10"></div>

        <div class="pointer-events-none absolute -bottom-28 right-28 h-56 w-56 rounded-full bg-white/5"></div>

        <div class="pointer-events-none absolute left-1/2 top-0 h-full w-px bg-white/5"></div>


        <div class="relative grid grid-cols-1 lg:grid-cols-3">

            <div class="p-6 sm:p-8 lg:col-span-2 lg:p-10">

                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5">

                    <span class="h-2 w-2 rounded-full bg-emerald-300"></span>

                    <span class="text-[10px] font-bold uppercase tracking-widest text-white">
                        Monitoring Penerimaan
                    </span>

                </div>


                <h2 class="mt-5 max-w-xl text-3xl font-bold leading-tight text-white sm:text-4xl">

                    Penerimaan Pajak Daerah

                    <span class="text-[#C8EDFF]">
                        {{ $tahun }}
                    </span>

                </h2>


                <p class="mt-3 max-w-xl text-sm leading-6 text-blue-50/90">

                    Pantau target, realisasi, tagihan, dan pembayaran pajak daerah
                    secara terpusat melalui SIPANDA.

                </p>


                <div class="mt-8 flex flex-wrap gap-3">

                    <a href="{{ route('tagihan.create') }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2.5 text-xs font-bold text-[#1769AA] shadow-sm transition hover:bg-blue-50">

                        <svg class="h-4 w-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"/>

                        </svg>

                        Buat Tagihan

                    </a>


                    <a href="{{ route('pembayaran.index') }}"
                       class="inline-flex items-center gap-2 rounded-lg border border-white/25 bg-white/10 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-white/15">

                        Lihat Pembayaran

                        <svg class="h-3.5 w-3.5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 5l7 7-7 7"/>

                        </svg>

                    </a>

                </div>

            </div>


            {{-- TARGET --}}
            <div class="flex items-center justify-center border-t border-white/10 bg-black/5 p-6 lg:border-l lg:border-t-0">

                <div class="w-full max-w-xs">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-[10px] font-bold uppercase tracking-widest text-blue-100/80">
                                Capaian Target
                            </p>

                            <p class="mt-1 text-sm font-semibold text-white">
                                Realisasi {{ $tahun }}
                            </p>

                        </div>


                        <div class="flex h-12 w-12 items-center justify-center rounded-full border-2 border-white/20 bg-white/10">

                            <span class="text-xs font-bold text-white">
                                {{ number_format($persentaseTarget, 1, ',', '.') }}%
                            </span>

                        </div>

                    </div>


                    <div class="mt-5 h-2 overflow-hidden rounded-full bg-white/15">

                        <div
                            class="h-full rounded-full bg-white transition-all"
                            style="width: {{ $targetPercent }}%"
                        ></div>

                    </div>


                    <div class="mt-3 flex justify-between">

                        <div>

                            <p class="text-[9px] text-blue-100/70">
                                Realisasi
                            </p>

                            <p class="mt-0.5 text-sm font-bold text-white">
                                Rp {{ number_format($totalPembayaran, 0, ',', '.') }}
                            </p>

                        </div>


                        <div class="text-right">

                            <p class="text-[9px] text-blue-100/70">
                                Target
                            </p>

                            <p class="mt-0.5 text-sm font-bold text-white">
                                Rp {{ number_format($totalTarget, 0, ',', '.') }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        KPI CARDS
    ========================================================== --}}
    <section class="grid grid-cols-2 gap-4 xl:grid-cols-5">

        {{-- WP --}}
        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#E8F4FC] text-[#1769AA]">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-8a4 4 0 100-8 4 4 0 000 8zm7-4h4m-2-2v4"/>

                    </svg>

                </div>


                <span class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                    WP
                </span>

            </div>


            <p class="mt-4 text-2xl font-bold text-slate-800">
                {{ number_format($totalWajibPajak, 0, ',', '.') }}
            </p>

            <p class="mt-1 text-[10px] text-slate-400">
                {{ number_format($wajibPajakAktif, 0, ',', '.') }} wajib pajak aktif
            </p>

        </div>


        {{-- OBJEK --}}
        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#EAF6FB] text-[#2386AE]">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-7h6v7"/>

                    </svg>

                </div>


                <span class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                    OBJEK
                </span>

            </div>


            <p class="mt-4 text-2xl font-bold text-slate-800">
                {{ number_format($totalObjekPajak, 0, ',', '.') }}
            </p>

            <p class="mt-1 text-[10px] text-slate-400">
                {{ number_format($objekPajakAktif, 0, ',', '.') }} objek aktif
            </p>

        </div>


        {{-- TAGIHAN --}}
        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#FFF7E6] text-[#D08A18]">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zm3 5h4m-4 4h6m-6 4h3"/>

                    </svg>

                </div>


                <span class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                    TAGIHAN
                </span>

            </div>


            <p class="mt-4 text-2xl font-bold text-slate-800">
                {{ number_format($totalTagihan, 0, ',', '.') }}
            </p>

            <p class="mt-1 text-[10px] text-slate-400">
                Tagihan tahun {{ $tahun }}
            </p>

        </div>


        {{-- NILAI --}}
        <div class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#EDF8F4] text-[#29936B]">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M12 8c-3 0-5 1.343-5 3s2 3 5 3 5 1.343 5 3-2 3-5 3m0-12c3 0 5 1.343 5 3"/>

                    </svg>

                </div>


                <span class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                    NILAI
                </span>

            </div>


            <p class="mt-4 truncate text-xl font-bold text-slate-800">
                Rp {{ number_format($totalNilaiTagihan, 0, ',', '.') }}
            </p>

            <p class="mt-1 text-[10px] text-slate-400">
                Total nilai tagihan
            </p>

        </div>


        {{-- TUNGGAKAN --}}
        <div class="col-span-2 rounded-xl border border-red-100 bg-red-50/50 p-5 shadow-sm xl:col-span-1">

            <div class="flex items-start justify-between">

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 text-red-600">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M12 9v4m0 4h.01M10.29 3.86l-7.07 12A2 2 0 004.93 19h14.14a2 2 0 001.71-3.14l-7.07-12a2 2 0 00-3.42 0z"/>

                    </svg>

                </div>


                <span class="text-[9px] font-bold uppercase tracking-wider text-red-400">
                    TUNGGAKAN
                </span>

            </div>


            <p class="mt-4 truncate text-xl font-bold text-red-700">
                Rp {{ number_format($totalTunggakan, 0, ',', '.') }}
            </p>

            <p class="mt-1 text-[10px] text-red-400">
                Perlu ditindaklanjuti
            </p>

        </div>

    </section>


    {{-- =========================================================
        CHART + PAYMENT SUMMARY
    ========================================================== --}}
    <section class="grid grid-cols-1 gap-5 xl:grid-cols-3">

        {{-- CHART --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm xl:col-span-2">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">

                <div>

                    <h2 class="text-sm font-bold text-slate-800">
                        Tren Pembayaran
                    </h2>

                    <p class="mt-1 text-[11px] text-slate-400">
                        Pergerakan realisasi pembayaran dalam enam periode terakhir.
                    </p>

                </div>


                <div class="flex items-center gap-2">

                    <span class="h-2 w-2 rounded-full bg-[#1769AA]"></span>

                    <span class="text-[10px] font-semibold text-slate-500">
                        Realisasi
                    </span>

                </div>

            </div>


            <div class="p-6">

                <div class="h-[300px]">

                    <canvas id="chartPembayaran"></canvas>

                </div>

            </div>

        </div>


        {{-- PAYMENT SUMMARY --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 px-6 py-5">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-sm font-bold text-slate-800">
                            Ringkasan Pembayaran
                        </h2>

                        <p class="mt-1 text-[11px] text-slate-400">
                            Aktivitas penerimaan {{ $tahun }}.
                        </p>

                    </div>


                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#E8F4FC] text-[#1769AA]">

                        <svg class="h-4 w-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M12 8c-3 0-5 1.343-5 3s2 3 5 3 5 1.343 5 3-2 3-5 3m0-12c3 0 5 1.343 5 3"/>

                        </svg>

                    </div>

                </div>

            </div>


            <div class="p-6">

                <div class="rounded-xl bg-[#F4F9FD] p-5">

                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Total Pembayaran
                    </p>

                    <p class="mt-2 text-2xl font-bold text-[#1769AA]">
                        Rp {{ number_format($totalPembayaran, 0, ',', '.') }}
                    </p>

                </div>


                <div class="mt-4 divide-y divide-slate-100">

                    <div class="flex items-center justify-between py-3">

                        <span class="text-[11px] text-slate-500">
                            Hari ini
                        </span>

                        <span class="text-[11px] font-bold text-slate-700">
                            Rp {{ number_format($pembayaranHariIni, 0, ',', '.') }}
                        </span>

                    </div>


                    <div class="flex items-center justify-between py-3">

                        <span class="text-[11px] text-slate-500">
                            Bulan ini
                        </span>

                        <span class="text-[11px] font-bold text-slate-700">
                            Rp {{ number_format($pembayaranBulanIni, 0, ',', '.') }}
                        </span>

                    </div>


                    <div class="flex items-center justify-between py-3">

                        <span class="text-[11px] text-slate-500">
                            Total Tagihan
                        </span>

                        <span class="text-[11px] font-bold text-slate-700">
                            {{ number_format($totalTagihan, 0, ',', '.') }}
                        </span>

                    </div>


                    <div class="flex items-center justify-between py-3">

                        <span class="text-[11px] text-slate-500">
                            Belum Bayar
                        </span>

                        <span class="text-[11px] font-bold text-amber-600">
                            {{ number_format($tagihanBelumBayar, 0, ',', '.') }}
                        </span>

                    </div>

                </div>


                <a href="{{ route('pembayaran.index') }}"
                   class="mt-4 flex items-center justify-center gap-2 rounded-lg bg-[#1769AA] px-4 py-3 text-[10px] font-bold text-white transition hover:bg-[#12598F]">

                    Kelola Pembayaran

                    <svg class="h-3.5 w-3.5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 5l7 7-7 7"/>

                    </svg>

                </a>

            </div>

        </div>

    </section>


    {{-- =========================================================
        STATUS + TARGET
    ========================================================== --}}
    <section class="grid grid-cols-1 gap-5 xl:grid-cols-3">

        {{-- STATUS --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 px-6 py-5">

                <h2 class="text-sm font-bold text-slate-800">
                    Status Tagihan
                </h2>

                <p class="mt-1 text-[11px] text-slate-400">
                    Kondisi tagihan tahun {{ $tahun }}.
                </p>

            </div>


            <div class="space-y-3 p-6">

                @foreach($statusConfig as $key => $config)

                    @php

                        $jumlah = match($key) {

                            'belum_bayar' => $tagihanBelumBayar,

                            'sebagian' => $tagihanSebagian,

                            'lunas' => $tagihanLunas,

                            'jatuh_tempo' => $tagihanJatuhTempo,

                            default => 0,

                        };


                        $percentage = $totalTagihan > 0
                            ? ($jumlah / $totalTagihan) * 100
                            : 0;

                    @endphp


                    <div class="rounded-xl border border-slate-100 bg-slate-50/50 p-4">

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-2">

                                <span class="h-2 w-2 rounded-full {{ $config['dot'] }}"></span>

                                <span class="text-[11px] font-semibold text-slate-600">
                                    {{ $config['label'] }}
                                </span>

                            </div>


                            <span class="text-sm font-bold text-slate-800">
                                {{ number_format($jumlah, 0, ',', '.') }}
                            </span>

                        </div>


                        <div class="mt-3 h-1.5 overflow-hidden rounded-full bg-slate-200">

                            <div
                                class="h-full rounded-full {{ $config['dot'] }}"
                                style="width: {{ min($percentage, 100) }}%">
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>


        {{-- TARGET TABLE --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm xl:col-span-2">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">

                <div>

                    <h2 class="text-sm font-bold text-slate-800">
                        Target per Jenis Pajak
                    </h2>

                    <p class="mt-1 text-[11px] text-slate-400">
                        Perbandingan target dengan realisasi penerimaan.
                    </p>

                </div>


                <span class="rounded-full bg-[#E8F4FC] px-3 py-1 text-[9px] font-bold text-[#1769AA]">
                    {{ $tahun }}
                </span>

            </div>


            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-6 py-3 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                                Jenis Pajak
                            </th>

                            <th class="px-6 py-3 text-right text-[9px] font-bold uppercase tracking-wider text-slate-400">
                                Target
                            </th>

                            <th class="px-6 py-3 text-right text-[9px] font-bold uppercase tracking-wider text-slate-400">
                                Realisasi
                            </th>

                            <th class="px-6 py-3 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                                Capaian
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse($targetRealisasi as $item)

                            <tr class="transition hover:bg-slate-50">

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#E8F4FC] text-[8px] font-bold text-[#1769AA]">
                                            {{ $item['kode'] }}
                                        </div>


                                        <div>

                                            <p class="text-[11px] font-bold text-slate-700">
                                                {{ $item['nama'] }}
                                            </p>

                                            <p class="mt-0.5 text-[9px] text-slate-400">
                                                {{ $item['kode'] }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <td class="whitespace-nowrap px-6 py-4 text-right text-[10px] font-medium text-slate-500">
                                    Rp {{ number_format($item['target'], 0, ',', '.') }}
                                </td>


                                <td class="whitespace-nowrap px-6 py-4 text-right text-[10px] font-bold text-emerald-600">
                                    Rp {{ number_format($item['realisasi'], 0, ',', '.') }}
                                </td>


                                <td class="min-w-[180px] px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="h-1.5 flex-1 overflow-hidden rounded-full bg-slate-100">

                                            <div
                                                class="h-full rounded-full bg-[#2A9D6F]"
                                                style="width: {{ min(max((float) $item['persentase'], 0), 100) }}%">
                                            </div>

                                        </div>


                                        <span class="w-12 text-right text-[10px] font-bold text-slate-600">
                                            {{ number_format($item['persentase'], 1, ',', '.') }}%
                                        </span>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="px-6 py-12 text-center">

                                    <p class="text-xs font-semibold text-slate-500">
                                        Belum ada data target.
                                    </p>

                                    <p class="mt-1 text-[10px] text-slate-400">
                                        Target pajak tahun {{ $tahun }} belum tersedia.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </section>


    {{-- =========================================================
        RECENT ACTIVITY
    ========================================================== --}}
    <section class="grid grid-cols-1 gap-5 xl:grid-cols-2">

        {{-- RECENT TAGIHAN --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">

                <div>

                    <h2 class="text-sm font-bold text-slate-800">
                        Tagihan Terbaru
                    </h2>

                    <p class="mt-1 text-[11px] text-slate-400">
                        Lima tagihan terbaru.
                    </p>

                </div>


                <a href="{{ route('tagihan.index') }}"
                   class="text-[10px] font-bold text-[#1769AA] hover:text-[#12598F]">
                    Lihat Semua →
                </a>

            </div>


            <div class="divide-y divide-slate-100">

                @forelse($recentTagihans as $tagihan)

                    @php
                        $status = $statusConfig[$tagihan->status] ?? $statusConfig['belum_bayar'];
                    @endphp


                    <a href="{{ route('tagihan.show', $tagihan) }}"
                       class="group flex items-center gap-4 px-6 py-4 transition hover:bg-slate-50">

                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#E8F4FC] text-[#1769AA]">

                            <svg class="h-4 w-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M9 14h6m-6 4h6M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>

                            </svg>

                        </div>


                        <div class="min-w-0 flex-1">

                            <p class="truncate text-[11px] font-bold text-slate-700">
                                {{ $tagihan->nomor_tagihan }}
                            </p>

                            <p class="mt-1 truncate text-[10px] text-slate-500">
                                {{ $tagihan->wajibPajak->nama ?? '-' }}
                            </p>

                            <p class="mt-0.5 truncate text-[9px] text-slate-400">
                                {{ $tagihan->jenisPajak->nama ?? '-' }}
                            </p>

                        </div>


                        <div class="shrink-0 text-right">

                            <p class="text-[10px] font-bold text-slate-700">
                                Rp {{ number_format((float) $tagihan->total_tagihan, 0, ',', '.') }}
                            </p>


                            <span class="mt-1 inline-flex items-center gap-1 rounded-full {{ $status['bg'] }} px-2 py-1 text-[8px] font-bold {{ $status['color'] }}">

                                <span class="h-1.5 w-1.5 rounded-full {{ $status['dot'] }}"></span>

                                {{ $status['label'] }}

                            </span>

                        </div>

                    </a>

                @empty

                    <div class="px-6 py-12 text-center text-xs text-slate-400">
                        Belum ada tagihan.
                    </div>

                @endforelse

            </div>

        </div>


        {{-- RECENT PAYMENT --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">

                <div>

                    <h2 class="text-sm font-bold text-slate-800">
                        Pembayaran Terbaru
                    </h2>

                    <p class="mt-1 text-[11px] text-slate-400">
                        Lima transaksi pembayaran terbaru.
                    </p>

                </div>


                <a href="{{ route('pembayaran.index') }}"
                   class="text-[10px] font-bold text-[#1769AA] hover:text-[#12598F]">
                    Lihat Semua →
                </a>

            </div>


            <div class="divide-y divide-slate-100">

                @forelse($recentPembayarans as $pembayaran)

                    <a href="{{ route('pembayaran.show', $pembayaran) }}"
                       class="group flex items-center gap-4 px-6 py-4 transition hover:bg-slate-50">

                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#EDF8F4] text-[#29936B]">

                            <svg class="h-4 w-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M12 8c-3 0-5 1.343-5 3s2 3 5 3 5 1.343 5 3-2 3-5 3m0-12c3 0 5 1.343 5 3"/>

                            </svg>

                        </div>


                        <div class="min-w-0 flex-1">

                            <p class="truncate text-[11px] font-bold text-slate-700">
                                {{ $pembayaran->nomor_pembayaran }}
                            </p>

                            <p class="mt-1 truncate text-[10px] text-slate-500">
                                {{ $pembayaran->tagihan->wajibPajak->nama ?? '-' }}
                            </p>

                            <p class="mt-0.5 text-[9px] text-slate-400">

                                {{ $pembayaran->tanggal_pembayaran
                                    ? \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d/m/Y')
                                    : '-' }}

                                @if($pembayaran->metode_pembayaran)

                                    • {{ ucfirst($pembayaran->metode_pembayaran) }}

                                @endif

                            </p>

                        </div>


                        <div class="shrink-0 text-right">

                            <p class="text-[10px] font-bold text-emerald-600">
                                + Rp {{ number_format((float) $pembayaran->jumlah_bayar, 0, ',', '.') }}
                            </p>


                            @if($pembayaran->petugas)

                                <p class="mt-1 max-w-[100px] truncate text-[9px] text-slate-400">
                                    {{ $pembayaran->petugas->name }}
                                </p>

                            @endif

                        </div>

                    </a>

                @empty

                    <div class="px-6 py-12 text-center text-xs text-slate-400">
                        Belum ada pembayaran.
                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================================================
        QUICK ACTIONS
    ========================================================== --}}
    <section>

        <div class="mb-4">

            <h2 class="text-sm font-bold text-slate-800">
                Akses Cepat
            </h2>

            <p class="mt-1 text-[11px] text-slate-400">
                Akses fitur operasional SIPANDA.
            </p>

        </div>


        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-5">

            {{-- WP --}}
            <a href="{{ route('wajib-pajak.create') }}"
               class="group rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-[#A9D5EF] hover:shadow-md">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#E8F4FC] text-[#1769AA] transition group-hover:bg-[#1769AA] group-hover:text-white">

                    <svg class="h-4 w-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 4v16m8-8H4"/>

                    </svg>

                </div>


                <p class="mt-3 text-[11px] font-bold text-slate-700">
                    Wajib Pajak
                </p>

                <p class="mt-1 text-[9px] text-slate-400">
                    Tambah data baru
                </p>

            </a>


            {{-- TAGIHAN --}}
            <a href="{{ route('tagihan.create') }}"
               class="group rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-[#F0D69E] hover:shadow-md">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#FFF7E6] text-[#D08A18] transition group-hover:bg-[#D08A18] group-hover:text-white">

                    <svg class="h-4 w-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 4v16m8-8H4"/>

                    </svg>

                </div>


                <p class="mt-3 text-[11px] font-bold text-slate-700">
                    Buat Tagihan
                </p>

                <p class="mt-1 text-[9px] text-slate-400">
                    Terbitkan tagihan
                </p>

            </a>


            {{-- PAYMENT --}}
            <a href="{{ route('pembayaran.index') }}"
               class="group rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-[#B8DECF] hover:shadow-md">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#EDF8F4] text-[#29936B] transition group-hover:bg-[#29936B] group-hover:text-white">

                    <svg class="h-4 w-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2m-5-3h9m0 0l-3-3m3 3l-3 3"/>

                    </svg>

                </div>


                <p class="mt-3 text-[11px] font-bold text-slate-700">
                    Pembayaran
                </p>

                <p class="mt-1 text-[9px] text-slate-400">
                    Kelola transaksi
                </p>

            </a>


            {{-- TUNGGAKAN --}}
            <a href="{{ route('tunggakan.index') }}"
               class="group rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:shadow-md">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-red-50 text-red-600 transition group-hover:bg-red-600 group-hover:text-white">

                    <svg class="h-4 w-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 9v4m0 4h.01M10.29 3.86l-7.07 12A2 2 0 004.93 19h14.14a2 2 0 001.71-3.14l-7.07-12a2 2 0 00-3.42 0z"/>

                    </svg>

                </div>


                <p class="mt-3 text-[11px] font-bold text-slate-700">
                    Tunggakan
                </p>

                <p class="mt-1 text-[9px] text-slate-400">
                    Monitoring piutang
                </p>

            </a>


            {{-- DATA TAGIHAN --}}
            <a href="{{ route('tagihan.index') }}"
               class="group rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-[#A9D5EF] hover:shadow-md">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-100 text-slate-600 transition group-hover:bg-[#1769AA] group-hover:text-white">

                    <svg class="h-4 w-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2m-1-3H9a1 1 0 00-1 1v2h8V3a1 1 0 00-1-1z"/>

                    </svg>

                </div>


                <p class="mt-3 text-[11px] font-bold text-slate-700">
                    Data Tagihan
                </p>

                <p class="mt-1 text-[9px] text-slate-400">
                    Kelola seluruh tagihan
                </p>

            </a>

        </div>

    </section>

</div>


{{-- =========================================================
    YEAR DROPDOWN JS
========================================================== --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const yearButton = document.getElementById('yearDropdownButton');
    const yearMenu = document.getElementById('yearDropdownMenu');
    const yearIcon = document.getElementById('yearDropdownIcon');
    const yearSelect = document.getElementById('dashboardYearSelect');
    const yearForm = document.getElementById('dashboardYearForm');
    const yearOptions = document.querySelectorAll('.year-option');


    if (
        !yearButton ||
        !yearMenu ||
        !yearIcon ||
        !yearSelect ||
        !yearForm
    ) {
        return;
    }


    let isOpen = false;


    function openYearDropdown() {

        isOpen = true;

        yearMenu.classList.remove(
            'invisible',
            'opacity-0',
            'scale-95'
        );

        yearMenu.classList.add(
            'visible',
            'opacity-100',
            'scale-100'
        );

        yearIcon.classList.add('rotate-180');

    }


    function closeYearDropdown() {

        isOpen = false;

        yearMenu.classList.add(
            'invisible',
            'opacity-0',
            'scale-95'
        );

        yearMenu.classList.remove(
            'visible',
            'opacity-100',
            'scale-100'
        );

        yearIcon.classList.remove('rotate-180');

    }


    yearButton.addEventListener('click', function (event) {

        event.stopPropagation();

        if (isOpen) {

            closeYearDropdown();

        } else {

            openYearDropdown();

        }

    });


    yearOptions.forEach(function (option) {

        option.addEventListener('click', function (event) {

            event.stopPropagation();

            const selectedYear = this.dataset.year;

            if (!selectedYear) {
                return;
            }

            yearSelect.value = selectedYear;

            closeYearDropdown();

            yearForm.submit();

        });

    });


    document.addEventListener('click', function (event) {

        if (
            !yearButton.contains(event.target) &&
            !yearMenu.contains(event.target)
        ) {

            closeYearDropdown();

        }

    });


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            closeYearDropdown();

        }

    });

});


</script>


{{-- =========================================================
    CHART JS
========================================================== --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const canvas = document.getElementById('chartPembayaran');

    if (!canvas) {
        return;
    }


    const labels = @json($chartLabels);
    const values = @json($chartPembayaran);

    const formatter = new Intl.NumberFormat('id-ID');


    new Chart(canvas, {

        type: 'line',


        data: {

            labels: labels,


            datasets: [{

                label: 'Realisasi',

                data: values,

                borderColor: '#1769AA',

                backgroundColor: 'rgba(23, 105, 170, 0.08)',

                borderWidth: 2.5,

                tension: 0.4,

                fill: true,

                pointRadius: 3,

                pointHoverRadius: 5,

                pointBackgroundColor: '#FFFFFF',

                pointBorderColor: '#1769AA',

                pointBorderWidth: 2

            }]

        },


        options: {

            responsive: true,

            maintainAspectRatio: false,


            interaction: {

                mode: 'index',

                intersect: false

            },


            plugins: {

                legend: {

                    display: false

                },


                tooltip: {

                    backgroundColor: '#1769AA',

                    titleColor: '#FFFFFF',

                    bodyColor: '#FFFFFF',

                    padding: 11,

                    cornerRadius: 8,

                    displayColors: false,


                    callbacks: {

                        label: function (context) {

                            return 'Rp ' +
                                formatter.format(context.parsed.y || 0);

                        }

                    }

                }

            },


            scales: {

                y: {

                    beginAtZero: true,


                    border: {

                        display: false

                    },


                    grid: {

                        color: 'rgba(148, 163, 184, 0.12)'

                    },


                    ticks: {

                        color: '#94A3B8',


                        font: {

                            size: 10

                        },


                        padding: 8,


                        callback: function (value) {

                            return 'Rp ' +

                                new Intl.NumberFormat('id-ID', {

                                    notation: 'compact',

                                    maximumFractionDigits: 1

                                }).format(value);

                        }

                    }

                },


                x: {

                    border: {

                        display: false

                    },


                    grid: {

                        display: false

                    },


                    ticks: {

                        color: '#94A3B8',


                        font: {

                            size: 10

                        },


                        padding: 8

                    }

                }

            }

        }

    });

});

</script>

@endsection