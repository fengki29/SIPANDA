@extends('layouts.app')

@section('title', 'Detail Audit Log')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <div class="flex items-center gap-3">

                <a
                    href="{{ route('audit-log.index') }}"
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:bg-slate-50 hover:text-slate-900"
                >
                    ←
                </a>

                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                        Detail Audit Log
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Informasi lengkap aktivitas sistem.
                    </p>
                </div>

            </div>
        </div>

    </div>


    {{-- INFORMASI AKTIVITAS --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- DETAIL UTAMA --}}
        <div class="lg:col-span-2">

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- TITLE --}}
                <div class="border-b border-slate-200 px-6 py-5">

                    <h2 class="text-base font-bold text-slate-900">
                        Informasi Aktivitas
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Detail aktivitas yang tercatat pada sistem.
                    </p>

                </div>


                <div class="divide-y divide-slate-100">

                    {{-- AKTIVITAS --}}
                    <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 sm:gap-6">

                        <div class="text-sm font-medium text-slate-500">
                            Aktivitas
                        </div>

                        <div class="sm:col-span-2">

                            @php
                                $aktivitasClass = match ($auditLog->aktivitas) {

                                    'Menambahkan data' =>
                                        'bg-emerald-50 text-emerald-700 border-emerald-200',

                                    'Mengubah data' =>
                                        'bg-blue-50 text-blue-700 border-blue-200',

                                    'Menghapus data' =>
                                        'bg-red-50 text-red-700 border-red-200',

                                    'Melihat data',
                                    'Melihat detail',
                                    'Mengakses halaman',
                                    'Membuka form tambah',
                                    'Membuka form edit' =>
                                        'bg-slate-50 text-slate-700 border-slate-200',

                                    default =>
                                        'bg-slate-50 text-slate-700 border-slate-200',
                                };
                            @endphp

                            <span class="inline-flex rounded-full border px-3 py-1 text-xs font-bold {{ $aktivitasClass }}">
                                {{ $auditLog->aktivitas }}
                            </span>

                        </div>

                    </div>


                    {{-- MODUL --}}
                    <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 sm:gap-6">

                        <div class="text-sm font-medium text-slate-500">
                            Modul
                        </div>

                        <div class="sm:col-span-2 text-sm font-semibold text-slate-900">
                            {{ $auditLog->modul ?: '-' }}
                        </div>

                    </div>


                    {{-- METHOD --}}
                    <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 sm:gap-6">

                        <div class="text-sm font-medium text-slate-500">
                            HTTP Method
                        </div>

                        <div class="sm:col-span-2">

                            @if ($auditLog->method)

                                <span class="inline-flex rounded-lg bg-slate-100 px-3 py-1.5 font-mono text-xs font-bold text-slate-700">
                                    {{ $auditLog->method }}
                                </span>

                            @else

                                <span class="text-sm text-slate-400">
                                    -
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- ROUTE --}}
                    <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 sm:gap-6">

                        <div class="text-sm font-medium text-slate-500">
                            Route
                        </div>

                        <div class="sm:col-span-2">

                            @if ($auditLog->route)

                                <code class="inline-block break-all rounded-lg bg-slate-100 px-3 py-2 text-xs text-slate-700">
                                    {{ $auditLog->route }}
                                </code>

                            @else

                                <span class="text-sm text-slate-400">
                                    -
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- KETERANGAN --}}
                    <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 sm:gap-6">

                        <div class="text-sm font-medium text-slate-500">
                            Keterangan
                        </div>

                        <div class="sm:col-span-2 text-sm leading-6 text-slate-700">
                            {{ $auditLog->keterangan ?: '-' }}
                        </div>

                    </div>


                    {{-- IP ADDRESS --}}
                    <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 sm:gap-6">

                        <div class="text-sm font-medium text-slate-500">
                            IP Address
                        </div>

                        <div class="sm:col-span-2">

                            @if ($auditLog->ip_address)

                                <code class="rounded-lg bg-slate-100 px-3 py-2 font-mono text-xs text-slate-700">
                                    {{ $auditLog->ip_address }}
                                </code>

                            @else

                                <span class="text-sm text-slate-400">
                                    -
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- USER AGENT --}}
                    <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 sm:gap-6">

                        <div class="text-sm font-medium text-slate-500">
                            User Agent
                        </div>

                        <div class="sm:col-span-2">

                            <div class="break-all rounded-xl bg-slate-50 p-3 font-mono text-xs leading-5 text-slate-600">
                                {{ $auditLog->user_agent ?: '-' }}
                            </div>

                        </div>

                    </div>


                    {{-- WAKTU --}}
                    <div class="grid grid-cols-1 gap-2 px-6 py-5 sm:grid-cols-3 sm:gap-6">

                        <div class="text-sm font-medium text-slate-500">
                            Waktu
                        </div>

                        <div class="sm:col-span-2">

                            <div class="text-sm font-semibold text-slate-900">
                                {{ $auditLog->created_at?->format('d F Y, H:i:s') }}
                            </div>

                            <div class="mt-1 text-xs text-slate-500">
                                {{ $auditLog->created_at?->diffForHumans() }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- USER --}}
        <div class="space-y-6">

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- USER HEADER --}}
                <div class="border-b border-slate-200 px-6 py-5">

                    <h2 class="text-base font-bold text-slate-900">
                        Pengguna
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Akun yang melakukan aktivitas.
                    </p>

                </div>


                {{-- USER CONTENT --}}
                <div class="p-6">

                    @if ($auditLog->user)

                        <div class="flex items-center gap-4">

                            {{-- AVATAR --}}
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-white bg-blue-100 font-bold text-blue-700 shadow-sm ring-1 ring-slate-200">

                                @if ($auditLog->user->avatar)

                                    <img
                                        src="{{ asset('storage/' . $auditLog->user->avatar) }}"
                                        alt="Foto {{ $auditLog->user->name }}"
                                        class="h-full w-full object-cover"
                                    >

                                @else

                                    <span class="text-lg font-bold">
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


                            {{-- USER INFO --}}
                            <div class="min-w-0">

                                <p class="truncate font-bold text-slate-900">
                                    {{ $auditLog->user->name }}
                                </p>

                                <p class="mt-1 break-all text-xs text-slate-500">
                                    {{ $auditLog->user->email }}
                                </p>

                                <span class="mt-2 inline-flex rounded-full bg-blue-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-blue-700">
                                    {{ $auditLog->user->role }}
                                </span>

                            </div>

                        </div>

                    @else

                        <div class="flex items-center gap-4">

                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-slate-100 text-lg font-bold text-slate-400">
                                ?
                            </div>

                            <div>

                                <p class="font-semibold text-slate-500">
                                    Pengguna Tidak Ditemukan
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Akun mungkin sudah dihapus.
                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>


            {{-- ID LOG --}}
            <div class="rounded-2xl border border-blue-100 bg-blue-50 p-5">

                <div class="text-xs font-bold uppercase tracking-wide text-blue-700">
                    Audit Log ID
                </div>

                <div class="mt-2 font-mono text-lg font-bold text-blue-900">
                    #{{ $auditLog->id }}
                </div>

                <p class="mt-2 text-xs leading-5 text-blue-700">
                    ID digunakan sebagai identitas unik
                    untuk setiap aktivitas yang tercatat.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection