@extends('layouts.app')

@section('title', 'Jenis Pajak')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA]">
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
                            d="M9 12h6m-6 4h6m2.25-13.5H6.75A2.25 2.25 0 004.5 4.75v14.5A2.25 2.25 0 006.75 21.5h10.5a2.25 2.25 0 002.25-2.25V7.5l-4.5-5z"
                        />
                    </svg>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-slate-800">
                        Data Jenis Pajak
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola jenis dan tarif pajak daerah.
                    </p>
                </div>
            </div>
        </div>

        <a
            href="{{ route('jenis-pajak.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 5v14M5 12h14"
                />
            </svg>

            Tambah Jenis Pajak
        </a>

    </div>


    {{-- SUCCESS ALERT --}}
    @if(session('success'))

        <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700 shadow-sm">

            <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

            </div>

            <div>
                <p class="font-semibold">
                    Berhasil
                </p>

                <p class="mt-0.5">
                    {{ session('success') }}
                </p>
            </div>

        </div>

    @endif


    {{-- SUMMARY CARDS --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

        {{-- TOTAL --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total Jenis Pajak
                    </p>

                    <p class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $jenisPajaks->count() }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA]">

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
                            d="M9 12h6m-6 4h6m2.25-13.5H6.75A2.25 2.25 0 004.5 4.75v14.5A2.25 2.25 0 006.75 21.5h10.5a2.25 2.25 0 002.25-2.25V7.5l-4.5-5z"
                        />
                    </svg>

                </div>

            </div>

            <div class="mt-3 text-xs text-slate-400">
                Seluruh jenis pajak terdaftar
            </div>

        </div>


        {{-- AKTIF --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Pajak Aktif
                    </p>

                    <p class="mt-2 text-2xl font-bold text-emerald-600">
                        {{ $jenisPajaks->where('status', true)->count() }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

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
                            d="M9 12.75l2 2 4-4.5M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"
                        />
                    </svg>

                </div>

            </div>

            <div class="mt-3 text-xs text-slate-400">
                Jenis pajak yang sedang aktif
            </div>

        </div>


        {{-- NONAKTIF --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Pajak Nonaktif
                    </p>

                    <p class="mt-2 text-2xl font-bold text-red-600">
                        {{ $jenisPajaks->where('status', false)->count() }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-600">

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
                            d="M9 12.75l2 2 4-4.5M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"
                        />
                    </svg>

                </div>

            </div>

            <div class="mt-3 text-xs text-slate-400">
                Jenis pajak yang tidak aktif
            </div>

        </div>

    </div>


    {{-- TABLE CARD --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- TABLE HEADER --}}
        <div class="flex flex-col gap-2 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h3 class="text-base font-bold text-slate-800">
                    Daftar Jenis Pajak
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    Informasi kode, tarif, deskripsi, dan status pajak.
                </p>
            </div>

            <div class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-[#1769AA]">
                {{ $jenisPajaks->count() }} jenis pajak
            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full min-w-[1000px] text-left">

                <thead class="border-b border-slate-100 bg-slate-50/80">

                    <tr class="text-xs font-semibold uppercase tracking-wide text-slate-500">

                        <th class="px-6 py-4">
                            No
                        </th>

                        <th class="px-6 py-4">
                            Kode
                        </th>

                        <th class="px-6 py-4">
                            Nama Pajak
                        </th>

                        <th class="px-6 py-4">
                            Tarif
                        </th>

                        <th class="px-6 py-4">
                            Deskripsi
                        </th>

                        <th class="px-6 py-4">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($jenisPajaks as $jenisPajak)

                        <tr class="transition duration-150 hover:bg-blue-50/30">

                            {{-- NO --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="text-sm font-medium text-slate-500">
                                    {{ $loop->iteration }}
                                </span>

                            </td>


                            {{-- KODE --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="inline-flex items-center rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold tracking-wide text-slate-700">
                                    {{ $jenisPajak->kode }}
                                </span>

                            </td>


                            {{-- NAMA --}}
                            <td class="px-6 py-4">

                                <div class="whitespace-nowrap text-sm font-semibold text-slate-800">
                                    {{ $jenisPajak->nama }}
                                </div>

                            </td>


                            {{-- TARIF --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="inline-flex items-center rounded-lg bg-blue-50 px-3 py-1.5 text-sm font-bold text-[#1769AA]">
                                    {{ number_format($jenisPajak->tarif, 2, ',', '.') }}%
                                </span>

                            </td>


                            {{-- DESKRIPSI --}}
                            <td class="max-w-md px-6 py-4">

                                <p
                                    class="max-w-md truncate text-sm text-slate-600"
                                    title="{{ $jenisPajak->deskripsi ?? '-' }}"
                                >
                                    {{ $jenisPajak->deskripsi ?? '-' }}
                                </p>

                            </td>


                            {{-- STATUS --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                @if($jenisPajak->status)

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
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('jenis-pajak.show', $jenisPajak) }}"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600 shadow-sm transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700"
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
                                                d="M2.25 12s3.5-6.75 9.75-6.75S21.75 12 21.75 12 18.25 18.75 12 18.75 2.25 12 2.25 12z"
                                            />

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="2.75"
                                            />
                                        </svg>

                                        Detail

                                    </a>


                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('jenis-pajak.edit', $jenisPajak) }}"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-amber-200 bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 shadow-sm transition hover:bg-amber-100"
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
                                                d="M16.862 4.487l1.65-1.65a2.25 2.25 0 113.182 3.182l-1.65 1.65M15.75 6.75l-8.25 8.25L6 18l3-.75 8.25-8.25M14.25 4.5l5.25 5.25"
                                            />
                                        </svg>

                                        Edit

                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('jenis-pajak.destroy', $jenisPajak) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus jenis pajak ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 shadow-sm transition hover:bg-red-100"
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
                                                    d="M6 7.5h12M9.75 7.5V5.25h4.5V7.5m-6.75 0v11.25A1.5 1.5 0 009 20.25h6a1.5 1.5 0 001.5-1.5V7.5M10.5 11v5.25m3-5.25v5.25"
                                                />
                                            </svg>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="px-6 py-16 text-center"
                            >

                                <div class="mx-auto flex max-w-sm flex-col items-center">

                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-7 w-7"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.7"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 12h6m-6 4h6m2.25-13.5H6.75A2.25 2.25 0 004.5 4.75v14.5A2.25 2.25 0 006.75 21.5h10.5a2.25 2.25 0 002.25-2.25V7.5l-4.5-5z"
                                            />
                                        </svg>

                                    </div>

                                    <h3 class="mt-4 text-sm font-bold text-slate-700">
                                        Belum ada jenis pajak
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Silakan tambahkan jenis pajak baru untuk mulai mengelola data.
                                    </p>

                                    <a
                                        href="{{ route('jenis-pajak.create') }}"
                                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-[#1769AA] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0D6EAD]"
                                    >
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
                                                d="M12 5v14M5 12h14"
                                            />
                                        </svg>

                                        Tambah Jenis Pajak
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection