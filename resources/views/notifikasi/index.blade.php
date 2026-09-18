@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')

    {{-- HEADER --}}
    <div class="mb-7">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

            <div>
                <div class="mb-2 flex items-center gap-2">

                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
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
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75V9a6 6 0 00-12 0v.75a8.967 8.967 0 01-2.31 6.022c1.733.64 3.557 1.09 5.454 1.31m5.713 0a24.255 24.255 0 01-5.713 0m5.713 0a3 3 0 11-5.713 0"
                            />
                        </svg>
                    </span>

                    <span class="text-xs font-bold uppercase tracking-wider text-blue-700">
                        Monitoring Sistem
                    </span>

                </div>

                <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">
                    Notifikasi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Peringatan penting terkait tagihan, tunggakan, dan target pajak.
                </p>
            </div>

            {{-- FILTER TAHUN --}}
            <form
                action="{{ route('notifikasi.index') }}"
                method="GET"
                class="flex items-center gap-2"
            >
                <label
                    for="tahun"
                    class="text-sm font-medium text-slate-600"
                >
                    Tahun
                </label>

                <select
                    name="tahun"
                    id="tahun"
                    onchange="this.form.submit()"
                    class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-700 shadow-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >
                    @if($tahunTersedia->isEmpty())

                        <option value="{{ $tahun }}">
                            {{ $tahun }}
                        </option>

                    @else

                        @foreach($tahunTersedia as $tahunItem)

                            <option
                                value="{{ $tahunItem }}"
                                @selected($tahun == $tahunItem)
                            >
                                {{ $tahunItem }}
                            </option>

                        @endforeach

                    @endif
                </select>
            </form>

        </div>
    </div>


    {{-- STATISTIK --}}
    <div class="mb-7 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

        {{-- TOTAL --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Total Peringatan
                    </p>

                    <p class="mt-2 text-3xl font-extrabold text-slate-900">
                        {{ number_format($totalNotifikasi) }}
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Perlu diperhatikan
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
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
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75V9a6 6 0 00-12 0v.75a8.967 8.967 0 01-2.31 6.022c1.733.64 3.557 1.09 5.454 1.31m5.713 0a24.255 24.255 0 01-5.713 0m5.713 0a3 3 0 11-5.713 0"
                        />
                    </svg>
                </div>

            </div>
        </div>


        {{-- JATUH TEMPO --}}
        <div class="rounded-2xl border border-red-100 bg-white p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-red-500">
                        Jatuh Tempo
                    </p>

                    <p class="mt-2 text-3xl font-extrabold text-red-600">
                        {{ number_format($jumlahJatuhTempo) }}
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Tagihan melewati batas
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
        </div>


        {{-- SEGERA JATUH TEMPO --}}
        <div class="rounded-2xl border border-orange-100 bg-white p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-orange-500">
                        Segera Jatuh Tempo
                    </p>

                    <p class="mt-2 text-3xl font-extrabold text-orange-600">
                        {{ number_format($jumlahSegeraJatuhTempo) }}
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Dalam 7 hari
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-50 text-orange-600">
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
                            d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"
                        />
                    </svg>
                </div>

            </div>
        </div>


        {{-- TARGET RENDAH --}}
        <div class="rounded-2xl border border-amber-100 bg-white p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-amber-600">
                        Target Rendah
                    </p>

                    <p class="mt-2 text-3xl font-extrabold text-amber-600">
                        {{ number_format($jumlahTargetRendah) }}
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Realisasi di bawah 50%
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
        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- TAGIHAN JATUH TEMPO --}}
    {{-- ========================================================= --}}

    <div class="mb-7 overflow-hidden rounded-2xl border border-red-100 bg-white shadow-sm">

        <div class="border-b border-red-100 bg-red-50/70 px-6 py-5">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex items-start gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">
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

                    <div>
                        <h3 class="font-bold text-red-800">
                            Tagihan Jatuh Tempo
                        </h3>

                        <p class="mt-1 text-sm text-red-600">
                            Terdapat {{ number_format($jumlahJatuhTempo) }}
                            tagihan yang melewati tanggal jatuh tempo.
                        </p>
                    </div>

                </div>

                <a
                    href="{{ route('tunggakan.index', ['tahun' => $tahun]) }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-red-600 px-4 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-red-700 hover:shadow-md"
                >
                    Lihat Tunggakan

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>
                </a>

            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-100">

                <thead class="bg-slate-50">
                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Wajib Pajak
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Jenis Pajak
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Jatuh Tempo
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Sisa
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($tagihanJatuhTempo as $tagihan)

                        @php
                            $totalTagihan = (float) $tagihan->total_tagihan;
                            $totalDibayar = (float) ($tagihan->pembayarans_sum_jumlah_bayar ?? 0);
                            $sisa = max($totalTagihan - $totalDibayar, 0);
                        @endphp

                        <tr class="transition hover:bg-red-50/30">

                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-slate-800">
                                    {{ $tagihan->wajibPajak->nama ?? '-' }}
                                </div>

                                <div class="mt-1 text-xs text-slate-500">
                                    {{ $tagihan->nomor_tagihan }}
                                </div>
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $tagihan->jenisPajak->nama ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
                                    {{ $tagihan->tanggal_jatuh_tempo?->format('d/m/Y') ?? '-' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right text-sm font-bold text-red-600">
                                Rp {{ number_format($sisa, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 text-right">

                                <a
                                    href="{{ route('tagihan.show', $tagihan) }}"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-700 transition hover:bg-red-100"
                                >
                                    Detail

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3.5 w-3.5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="5"
                                class="px-6 py-12 text-center"
                            >
                                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-50 text-green-600">

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
                                            d="M5 13l4 4L19 7"
                                        />
                                    </svg>

                                </div>

                                <p class="mt-3 text-sm font-semibold text-slate-700">
                                    Tidak ada tagihan jatuh tempo.
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Kondisi tagihan tahun {{ $tahun }} aman.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SEGERA JATUH TEMPO --}}
    {{-- ========================================================= --}}

    <div class="mb-7 overflow-hidden rounded-2xl border border-orange-100 bg-white shadow-sm">

        <div class="border-b border-orange-100 bg-orange-50/70 px-6 py-5">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex items-start gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-100 text-orange-600">

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
                                d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"
                            />
                        </svg>

                    </div>

                    <div>

                        <h3 class="font-bold text-orange-800">
                            Segera Jatuh Tempo
                        </h3>

                        <p class="mt-1 text-sm text-orange-600">
                            Tagihan yang jatuh tempo dalam 7 hari ke depan.
                        </p>

                    </div>

                </div>

                <a
                    href="{{ route('tagihan.index', ['tahun' => $tahun]) }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-4 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-orange-600 hover:shadow-md"
                >
                    Lihat Tagihan

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>
                </a>

            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-100">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Wajib Pajak
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Jenis Pajak
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Jatuh Tempo
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Sisa
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($tagihanSegeraJatuhTempo as $tagihan)

                        @php
                            $totalTagihan = (float) $tagihan->total_tagihan;
                            $totalDibayar = (float) ($tagihan->pembayarans_sum_jumlah_bayar ?? 0);
                            $sisa = max($totalTagihan - $totalDibayar, 0);
                        @endphp

                        <tr class="transition hover:bg-orange-50/30">

                            <td class="px-6 py-4">

                                <div class="text-sm font-semibold text-slate-800">
                                    {{ $tagihan->wajibPajak->nama ?? '-' }}
                                </div>

                                <div class="mt-1 text-xs text-slate-500">
                                    {{ $tagihan->nomor_tagihan }}
                                </div>

                            </td>

                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $tagihan->jenisPajak->nama ?? '-' }}
                            </td>

                            <td class="px-6 py-4">

                                <span class="rounded-full bg-orange-100 px-3 py-1 text-xs font-bold text-orange-700">
                                    {{ $tagihan->tanggal_jatuh_tempo?->format('d/m/Y') ?? '-' }}
                                </span>

                            </td>

                            <td class="px-6 py-4 text-right text-sm font-bold text-orange-600">
                                Rp {{ number_format($sisa, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 text-right">

                                <a
                                    href="{{ route('tagihan.show', $tagihan) }}"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-orange-50 px-3 py-2 text-xs font-bold text-orange-700 transition hover:bg-orange-100"
                                >
                                    Detail

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3.5 w-3.5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-10 text-center text-sm text-slate-500"
                            >
                                Tidak ada tagihan yang jatuh tempo dalam 7 hari.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- TUNGGAKAN TERBESAR --}}
    {{-- ========================================================= --}}

    <div class="mb-7 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 px-6 py-5">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h3 class="font-bold text-slate-800">
                        Tunggakan Terbesar
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Lima tagihan dengan sisa pembayaran terbesar.
                    </p>

                </div>

                <a
                    href="{{ route('tunggakan.index', ['tahun' => $tahun]) }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-800 px-4 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-slate-900 hover:shadow-md"
                >
                    Lihat Semua

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>
                </a>

            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-100">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Wajib Pajak
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Jenis Pajak
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Nomor Tagihan
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Sisa
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($tunggakanTerbesar as $tagihan)

                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-4 text-sm font-semibold text-slate-800">
                                {{ $tagihan->wajibPajak->nama ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ $tagihan->jenisPajak->nama ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-xs text-slate-500">
                                {{ $tagihan->nomor_tagihan }}
                            </td>

                            <td class="px-6 py-4 text-right text-sm font-bold text-red-600">
                                Rp {{ number_format($tagihan->sisa_pembayaran, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 text-right">

                                <a
                                    href="{{ route('tagihan.show', $tagihan) }}"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100 px-3 py-2 text-xs font-bold text-slate-700 transition hover:bg-slate-200"
                                >
                                    Detail

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3.5 w-3.5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-10 text-center text-sm text-slate-500"
                            >
                                Belum ada tunggakan.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- TARGET RENDAH --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-2xl border border-amber-100 bg-white shadow-sm">

        <div class="border-b border-amber-100 bg-amber-50/60 px-6 py-5">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h3 class="font-bold text-amber-800">
                        Target Pajak Perlu Perhatian
                    </h3>

                    <p class="mt-1 text-sm text-amber-700">
                        Jenis pajak dengan realisasi di bawah 50% dari target tahun {{ $tahun }}.
                    </p>

                </div>

                <a
                    href="{{ route('target-pajak.index', ['tahun' => $tahun]) }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-amber-600 px-4 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-amber-700 hover:shadow-md"
                >
                    Lihat Target

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>
                </a>

            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-slate-100">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Jenis Pajak
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Target
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Realisasi
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Persentase
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($targetRendah as $target)

                        <tr class="transition hover:bg-amber-50/30">

                            <td class="px-6 py-4">

                                <div class="text-sm font-semibold text-slate-800">
                                    {{ $target->jenisPajak->nama ?? '-' }}
                                </div>

                                @if($target->jenisPajak?->kode)

                                    <div class="mt-1 text-xs text-slate-500">
                                        {{ $target->jenisPajak->kode }}
                                    </div>

                                @endif

                            </td>

                            <td class="px-6 py-4 text-right text-sm text-slate-700">
                                Rp {{ number_format($target->target, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 text-right text-sm font-semibold text-blue-700">
                                Rp {{ number_format($target->realisasi, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 text-right">

                                <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-700">
                                    {{ number_format($target->persentase_realisasi, 1, ',', '.') }}%
                                </span>

                            </td>

                            <td class="px-6 py-4 text-right">

                                <a
                                    href="{{ route('target-pajak.index', ['tahun' => $tahun]) }}"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-amber-50 px-3 py-2 text-xs font-bold text-amber-700 transition hover:bg-amber-100"
                                >
                                    Lihat

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3.5 w-3.5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-10 text-center"
                            >

                                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-50 text-green-600">

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
                                            d="M5 13l4 4L19 7"
                                        />
                                    </svg>

                                </div>

                                <p class="mt-3 text-sm font-semibold text-slate-700">
                                    Tidak ada target yang perlu perhatian khusus.
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Semua target yang tersedia berada pada minimal 50% realisasi.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection