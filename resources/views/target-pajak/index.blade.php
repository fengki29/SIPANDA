@extends('layouts.app')

@section('title', 'Target Pajak')

@section('content')

<div class="space-y-7">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">

        <div>

            <div class="mb-2 flex items-center gap-2">

                <span class="h-2 w-2 rounded-full bg-[#1769AA]"></span>

                <span class="text-xs font-bold uppercase tracking-widest text-[#1769AA]">
                    Perencanaan Penerimaan
                </span>

            </div>

            <h1 class="text-2xl font-bold tracking-tight text-gray-900">
                Target Pajak
            </h1>

            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Monitoring target penerimaan dan realisasi pajak daerah
                berdasarkan jenis pajak dan tahun anggaran.
            </p>

        </div>


        <a
            href="{{ route('target-pajak.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#1769AA] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#0D6EAD]"
        >

            <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4v16m8-8H4"
                />
            </svg>

            Tambah Target

        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4">

            <div class="flex items-center gap-3">

                <svg
                    class="h-5 w-5 text-emerald-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                <p class="text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    {{-- RINGKASAN --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

        {{-- TARGET --}}
        <div class="rounded-2xl border border-blue-100 bg-white p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wide text-gray-500">
                        Total Target
                    </p>

                    <p class="mt-2 text-xl font-bold text-[#1769AA]">
                        Rp {{ number_format(
                            (float) $totalTarget,
                            0,
                            ',',
                            '.'
                        ) }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Tahun {{ $tahun }}
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4FC] text-[#1769AA]">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V6m0 10v2m0-12a9 9 0 100 18 9 9 0 000-18z"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- REALISASI --}}
        <div class="rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wide text-gray-500">
                        Realisasi
                    </p>

                    <p class="mt-2 text-xl font-bold text-emerald-600">
                        Rp {{ number_format(
                            (float) $totalRealisasi,
                            0,
                            ',',
                            '.'
                        ) }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Pembayaran {{ $tahun }}
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- SISA --}}
        <div class="rounded-2xl border border-orange-100 bg-white p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wide text-gray-500">
                        Sisa Target
                    </p>

                    <p class="mt-2 text-xl font-bold text-orange-600">
                        Rp {{ number_format(
                            (float) $totalSisa,
                            0,
                            ',',
                            '.'
                        ) }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Target belum tercapai
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-50 text-orange-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- PENCAPAIAN --}}
        <div class="rounded-2xl border border-blue-100 bg-white p-5 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wide text-gray-500">
                        Pencapaian
                    </p>

                    <p class="mt-2 text-2xl font-bold text-gray-900">
                        {{ number_format(
                            (float) $persentaseTotal,
                            1,
                            ',',
                            '.'
                        ) }}%
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        {{ $jumlahTercapai }} dari {{ $jumlahTarget }} target tercapai
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4FC] text-[#1769AA]">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"
                        />
                    </svg>

                </div>

            </div>

        </div>

    </div>


    {{-- PROGRESS TOTAL --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <div>

                <p class="text-xs font-bold uppercase tracking-wide text-gray-500">
                    Progress Penerimaan {{ $tahun }}
                </p>

                <p class="mt-1 text-sm text-gray-500">
                    Perbandingan realisasi terhadap target penerimaan.
                </p>

            </div>

            <div class="text-right">

                <p class="text-2xl font-bold text-[#1769AA]">
                    {{ number_format(
                        (float) $persentaseTotal,
                        1,
                        ',',
                        '.'
                    ) }}%
                </p>

            </div>

        </div>


        <div class="mt-5 h-3 overflow-hidden rounded-full bg-gray-100">

            <div
                class="h-full rounded-full bg-[#1769AA] transition-all duration-500"
                style="width: {{ min((float) $persentaseTotal, 100) }}%"
            ></div>

        </div>


        <div class="mt-3 flex flex-col gap-1 text-xs text-gray-400 sm:flex-row sm:justify-between">

            <span>
                Realisasi:
                <strong class="text-gray-600">
                    Rp {{ number_format(
                        (float) $totalRealisasi,
                        0,
                        ',',
                        '.'
                    ) }}
                </strong>
            </span>

            <span>
                Target:
                <strong class="text-gray-600">
                    Rp {{ number_format(
                        (float) $totalTarget,
                        0,
                        ',',
                        '.'
                    ) }}
                </strong>
            </span>

        </div>

    </div>


    {{-- FILTER TAHUN --}}
    <div class="overflow-visible rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">

        <form
            method="GET"
            action="{{ route('target-pajak.index') }}"
            class="flex flex-col gap-4 sm:flex-row sm:items-end"
        >

            <div class="flex-1">

                <label
                    class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-600"
                >
                    Tahun Pajak
                </label>

                <div
                    class="custom-filter-dropdown relative z-[60]"
                    data-dropdown
                >

                    {{-- VALUE --}}
                    <input
                        type="hidden"
                        name="tahun"
                        value="{{ $tahun }}"
                    >

                    {{-- BUTTON --}}
                    <button
                        type="button"
                        data-dropdown-button
                        aria-expanded="false"
                        class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-gray-200 bg-slate-50 px-4 text-left text-sm font-medium text-slate-700 shadow-sm outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                        <span class="flex min-w-0 items-center gap-3">

                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H3a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>

                            </span>

                            <span
                                data-dropdown-label
                                class="truncate"
                            >
                                {{ $tahun }}
                            </span>

                        </span>


                        <svg
                            data-dropdown-chevron
                            class="h-4 w-4 shrink-0 text-slate-400 transition-transform duration-200"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 9l6 6 6-6"
                            />
                        </svg>

                    </button>


                    {{-- MENU --}}
                    <div
                        data-dropdown-menu
                        class="absolute left-0 right-0 z-[9999] mt-2 hidden max-h-64 overflow-y-auto overflow-x-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70"
                    >

                        {{-- CURRENT YEAR --}}
                        <button
                            type="button"
                            class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 {{ (string) $tahun === (string) now()->year ? 'bg-blue-50 text-blue-700' : 'text-slate-700' }}"
                            data-value="{{ now()->year }}"
                            data-label="{{ now()->year }}"
                        >
                            {{ now()->year }}
                        </button>


                        {{-- AVAILABLE YEARS --}}
                        @foreach($tahunTersedia as $tahunItem)

                            @if((string) $tahunItem !== (string) now()->year)

                                <button
                                    type="button"
                                    class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 {{ (string) $tahun === (string) $tahunItem ? 'bg-blue-50 text-blue-700' : 'text-slate-700' }}"
                                    data-value="{{ $tahunItem }}"
                                    data-label="{{ $tahunItem }}"
                                >
                                    {{ $tahunItem }}
                                </button>

                            @endif

                        @endforeach

                    </div>

                </div>

            </div>


            <button
                type="submit"
                class="inline-flex h-[52px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
            >

                <svg
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                    />
                </svg>

                Tampilkan

            </button>

        </form>

    </div>


    {{-- TABLE --}}
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        <div class="border-b border-gray-200 px-6 py-5">

            <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">

                <div>

                    <h2 class="text-base font-bold text-gray-800">
                        Pencapaian per Jenis Pajak
                    </h2>

                    <p class="mt-1 text-xs text-gray-500">
                        Target dan realisasi penerimaan tahun {{ $tahun }}.
                    </p>

                </div>

                <span class="text-xs font-medium text-gray-500">
                    {{ $targetPajaks->count() }} jenis pajak
                </span>

            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="whitespace-nowrap px-5 py-4 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500">
                            No
                        </th>

                        <th class="whitespace-nowrap px-5 py-4 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500">
                            Jenis Pajak
                        </th>

                        <th class="whitespace-nowrap px-5 py-4 text-right text-[11px] font-bold uppercase tracking-wider text-gray-500">
                            Target
                        </th>

                        <th class="whitespace-nowrap px-5 py-4 text-right text-[11px] font-bold uppercase tracking-wider text-gray-500">
                            Realisasi
                        </th>

                        <th class="whitespace-nowrap px-5 py-4 text-right text-[11px] font-bold uppercase tracking-wider text-gray-500">
                            Sisa
                        </th>

                        <th class="whitespace-nowrap px-5 py-4 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500">
                            Pencapaian
                        </th>

                        <th class="whitespace-nowrap px-5 py-4 text-center text-[11px] font-bold uppercase tracking-wider text-gray-500">
                            Status
                        </th>

                        <th class="whitespace-nowrap px-5 py-4 text-center text-[11px] font-bold uppercase tracking-wider text-gray-500">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($targetPajaks as $target)

                        @php

                            $persentase = (float) $target->persentase;

                            $persentaseAsli = (float) $target->persentase_asli;

                            if ($persentaseAsli >= 100) {
                                $statusLabel = 'Tercapai';
                                $statusClass = 'bg-emerald-50 text-emerald-700';
                                $dotClass = 'bg-emerald-500';
                            } elseif ($persentaseAsli > 0) {
                                $statusLabel = 'Berjalan';
                                $statusClass = 'bg-blue-50 text-blue-700';
                                $dotClass = 'bg-blue-500';
                            } else {
                                $statusLabel = 'Belum Ada Realisasi';
                                $statusClass = 'bg-red-50 text-red-700';
                                $dotClass = 'bg-red-500';
                            }

                        @endphp


                        <tr class="transition hover:bg-[#F8FBFE]">

                            {{-- NO --}}
                            <td class="whitespace-nowrap px-5 py-5 text-sm text-gray-400">
                                {{ $loop->iteration }}
                            </td>


                            {{-- JENIS --}}
                            <td class="px-5 py-5">

                                <div class="min-w-[170px]">

                                    <p class="text-sm font-bold text-gray-800">
                                        {{ $target->jenisPajak->nama ?? '-' }}
                                    </p>

                                    @if(!empty($target->jenisPajak?->kode))

                                        <p class="mt-1 text-[11px] text-gray-400">
                                            Kode {{ $target->jenisPajak->kode }}
                                        </p>

                                    @endif

                                </div>

                            </td>


                            {{-- TARGET --}}
                            <td class="whitespace-nowrap px-5 py-5 text-right">

                                <span class="text-sm font-semibold text-gray-800">
                                    Rp {{ number_format(
                                        (float) $target->target,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                </span>

                            </td>


                            {{-- REALISASI --}}
                            <td class="whitespace-nowrap px-5 py-5 text-right">

                                <span class="text-sm font-semibold text-emerald-600">
                                    Rp {{ number_format(
                                        (float) $target->realisasi,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                </span>

                            </td>


                            {{-- SISA --}}
                            <td class="whitespace-nowrap px-5 py-5 text-right">

                                @if((float) $target->sisa > 0)

                                    <span class="text-sm font-semibold text-orange-600">
                                        Rp {{ number_format(
                                            (float) $target->sisa,
                                            0,
                                            ',',
                                            '.'
                                        ) }}
                                    </span>

                                @else

                                    <span class="text-sm font-semibold text-emerald-600">
                                        Rp 0
                                    </span>

                                @endif

                            </td>


                            {{-- PROGRESS --}}
                            <td class="px-5 py-5">

                                <div class="min-w-[150px]">

                                    <div class="mb-1 flex items-center justify-between">

                                        <span class="text-xs font-bold text-gray-700">
                                            {{ number_format(
                                                $persentaseAsli,
                                                1,
                                                ',',
                                                '.'
                                            ) }}%
                                        </span>

                                    </div>

                                    <div class="h-2 overflow-hidden rounded-full bg-gray-100">

                                        <div
                                            class="h-full rounded-full {{ $persentaseAsli >= 100 ? 'bg-emerald-500' : 'bg-[#1769AA]' }}"
                                            style="width: {{ $persentase }}%"
                                        ></div>

                                    </div>

                                </div>

                            </td>


                            {{-- STATUS --}}
                            <td class="whitespace-nowrap px-5 py-5 text-center">

                                <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-[11px] font-bold {{ $statusClass }}">

                                    <span class="h-1.5 w-1.5 rounded-full {{ $dotClass }}"></span>

                                    {{ $statusLabel }}

                                </span>

                            </td>


                            {{-- AKSI --}}
                            <td class="whitespace-nowrap px-5 py-5">

                                <div class="flex items-center justify-center gap-2">

                                    <a
                                        href="{{ route('target-pajak.show', $target) }}"
                                        class="inline-flex items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-xs font-semibold text-gray-700 transition hover:bg-gray-50"
                                    >
                                        Detail
                                    </a>

                                    <a
                                        href="{{ route('target-pajak.edit', $target) }}"
                                        class="inline-flex items-center justify-center rounded-lg bg-[#1769AA] px-3 py-2 text-xs font-semibold text-white transition hover:bg-[#0D6EAD]"
                                    >
                                        Edit
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="px-6 py-16 text-center"
                            >

                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#E8F4FC] text-[#1769AA]">

                                    <svg
                                        class="h-7 w-7"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V6m0 10v2m0-12a9 9 0 100 18 9 9 0 000-18z"
                                        />
                                    </svg>

                                </div>

                                <h3 class="mt-4 text-sm font-bold text-gray-800">
                                    Belum Ada Target
                                </h3>

                                <p class="mx-auto mt-1 max-w-md text-sm text-gray-500">
                                    Belum ada target pajak yang dibuat untuk tahun {{ $tahun }}.
                                </p>

                                <a
                                    href="{{ route('target-pajak.create') }}"
                                    class="mt-5 inline-flex rounded-lg bg-[#1769AA] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0D6EAD]"
                                >
                                    Tambah Target
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

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
                        otherButton.setAttribute(
                            'aria-expanded',
                            'false'
                        );
                    }

                    if (otherChevron) {
                        otherChevron.classList.remove('rotate-180');
                    }

                }

            });


            const isHidden = menu.classList.contains('hidden');


            if (isHidden) {

                menu.classList.remove('hidden');

                button.setAttribute(
                    'aria-expanded',
                    'true'
                );

                if (chevron) {
                    chevron.classList.add('rotate-180');
                }

            } else {

                menu.classList.add('hidden');

                button.setAttribute(
                    'aria-expanded',
                    'false'
                );

                if (chevron) {
                    chevron.classList.remove('rotate-180');
                }

            }

        });


        options.forEach(function (option) {

            option.addEventListener('click', function (event) {

                event.stopPropagation();


                const value =
                    option.dataset.value ?? '';

                const selectedLabel =
                    option.dataset.label ?? '';


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


                option.classList.remove(
                    'text-slate-700'
                );

                option.classList.add(
                    'bg-blue-50',
                    'text-blue-700'
                );


                menu.classList.add('hidden');

                button.setAttribute(
                    'aria-expanded',
                    'false'
                );

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
                button.setAttribute(
                    'aria-expanded',
                    'false'
                );
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
                    button.setAttribute(
                        'aria-expanded',
                        'false'
                    );
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