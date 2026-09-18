@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="space-y-6">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-[#1769AA]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>

                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                        Manajemen User
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola akun pengguna dan hak akses sistem SIPANDA.
                    </p>
                </div>
            </div>
        </div>

        <a href="{{ route('users.create') }}"
           class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md">

            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.9" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 5v14M5 12h14"/>
            </svg>

            Tambah User
        </a>
    </div>


    {{-- =========================================================
        SUCCESS MESSAGE
    ========================================================== --}}
    @if(session('success'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4">
            <div class="flex items-start gap-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m5 12 4 4L19 6"/>
                    </svg>
                </div>

                <div>
                    <p class="text-sm font-semibold text-emerald-800">
                        Berhasil
                    </p>

                    <p class="mt-0.5 text-sm text-emerald-700">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif


    {{-- =========================================================
        ERROR MESSAGE
    ========================================================== --}}
    @if($errors->any())
        <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4">
            <div class="flex items-start gap-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v4"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 17h.01"/>
                        <circle cx="12" cy="12" r="9"/>
                    </svg>
                </div>

                <div>
                    <p class="text-sm font-semibold text-red-800">
                        Terjadi kesalahan
                    </p>

                    <ul class="mt-1 space-y-0.5 text-sm text-red-700">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif


    {{-- =========================================================
        STATISTIK
    ========================================================== --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

        {{-- TOTAL USER --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total User
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-800">
                        {{ number_format($totalUser) }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Seluruh pengguna sistem
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-[#1769AA] transition group-hover:scale-105">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
            </div>
        </div>


        {{-- ADMIN --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Administrator
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-800">
                        {{ number_format($totalAdmin) }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Pengguna dengan akses admin
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-50 text-violet-600 transition group-hover:scale-105">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m9 12 2 2 4-4"/>
                    </svg>
                </div>
            </div>
        </div>


        {{-- PETUGAS --}}
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Petugas
                    </p>

                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-800">
                        {{ number_format($totalPetugas) }}
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Pengguna operasional
                    </p>
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 transition group-hover:scale-105">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>


    {{-- =========================================================
        FILTER
    ========================================================== --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

        <div class="mb-5 flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-4.35-4.35"/>
                    <circle cx="11" cy="11" r="6"/>
                </svg>
            </div>

            <div>
                <h2 class="text-sm font-bold text-slate-800">
                    Filter Data User
                </h2>

                <p class="text-xs text-slate-500">
                    Cari pengguna berdasarkan nama, email, atau role.
                </p>
            </div>
        </div>


        <form method="GET" action="{{ route('users.index') }}">

            <div class="grid grid-cols-1 gap-4 md:grid-cols-[1fr_260px_auto] md:items-end">

                {{-- SEARCH --}}
                <div>
                    <label for="search"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Pencarian
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 21l-4.35-4.35"/>
                                <circle cx="11" cy="11" r="6"/>
                            </svg>
                        </div>

                        <input
                            id="search"
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama atau email..."
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>
                </div>


                {{-- ROLE CUSTOM DROPDOWN --}}
                <div class="relative" id="roleDropdown">

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Role
                    </label>

                    <input type="hidden"
                           name="role"
                           id="roleInput"
                           value="{{ request('role') }}">

                    <button
                        type="button"
                        id="roleDropdownButton"
                        class="flex h-[52px] w-full items-center justify-between rounded-xl border border-slate-200 bg-slate-50/60 px-4 text-left text-sm text-slate-700 transition hover:border-slate-300 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                    >

                        <span class="flex items-center gap-3">

                            <span class="text-slate-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </span>

                            <span id="roleDropdownLabel">
                                @if(request('role') === 'admin')
                                    Administrator
                                @elseif(request('role') === 'petugas')
                                    Petugas
                                @else
                                    Semua Role
                                @endif
                            </span>

                        </span>

                        <svg id="roleChevron"
                             class="h-5 w-5 shrink-0 text-slate-400 transition-transform duration-200"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.8"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m6 9 6 6 6-6"/>
                        </svg>

                    </button>


                    {{-- MENU --}}
                    <div
                        id="roleDropdownMenu"
                        class="absolute left-0 right-0 z-40 mt-2 hidden overflow-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/60"
                    >

                        <button
                            type="button"
                            data-value=""
                            data-label="Semua Role"
                            class="role-option flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm transition hover:bg-blue-50 hover:text-[#1769AA] {{ !request('role') ? 'bg-blue-50 text-[#1769AA]' : 'text-slate-700' }}"
                        >
                            <span class="mr-3 flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </span>

                            Semua Role
                        </button>


                        <button
                            type="button"
                            data-value="admin"
                            data-label="Administrator"
                            class="role-option flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm transition hover:bg-blue-50 hover:text-[#1769AA] {{ request('role') === 'admin' ? 'bg-blue-50 text-[#1769AA]' : 'text-slate-700' }}"
                        >
                            <span class="mr-3 flex h-8 w-8 items-center justify-center rounded-lg bg-violet-50 text-violet-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m9 12 2 2 4-4"/>
                                </svg>
                            </span>

                            Administrator
                        </button>


                        <button
                            type="button"
                            data-value="petugas"
                            data-label="Petugas"
                            class="role-option flex w-full items-center rounded-lg px-3 py-2.5 text-left text-sm transition hover:bg-blue-50 hover:text-[#1769AA] {{ request('role') === 'petugas' ? 'bg-blue-50 text-[#1769AA]' : 'text-slate-700' }}"
                        >
                            <span class="mr-3 flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </span>

                            Petugas
                        </button>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="flex gap-2">

                    <a
                        href="{{ route('users.index') }}"
                        class="inline-flex h-[52px] items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 12a9 9 0 1 0 3-6.7"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 4v6h6"/>
                        </svg>

                        Reset
                    </a>

                    <button
                        type="submit"
                        class="inline-flex h-[52px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#0D6EAD] hover:shadow-md"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.9" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 21l-4.35-4.35"/>
                            <circle cx="11" cy="11" r="6"/>
                        </svg>

                        Cari
                    </button>

                </div>

            </div>

        </form>
    </div>


    {{-- =========================================================
        HASIL FILTER
    ========================================================== --}}
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-sm text-slate-500">
                Menampilkan
                <span class="font-semibold text-slate-700">
                    {{ $users->total() }}
                </span>
                pengguna
            </p>
        </div>

        @if(request('search') || request('role'))
            <div class="flex flex-wrap items-center gap-2">

                <span class="text-xs font-medium text-slate-400">
                    Filter aktif:
                </span>

                @if(request('search'))
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-[#1769AA]">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 21l-4.35-4.35"/>
                            <circle cx="11" cy="11" r="6"/>
                        </svg>

                        {{ request('search') }}
                    </span>
                @endif

                @if(request('role'))
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-violet-50 px-3 py-1.5 text-xs font-semibold text-violet-700">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>

                        {{ request('role') === 'admin' ? 'Administrator' : 'Petugas' }}
                    </span>
                @endif

            </div>
        @endif

    </div>


    {{-- =========================================================
        TABLE
    ========================================================== --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- TABLE HEADER --}}
        <div class="border-b border-slate-200 px-5 py-4">
            <div class="flex items-center justify-between gap-4">

                <div>
                    <h2 class="text-sm font-bold text-slate-800">
                        Daftar Pengguna
                    </h2>

                    <p class="mt-0.5 text-xs text-slate-500">
                        Data akun pengguna yang terdaftar di SIPANDA.
                    </p>
                </div>

                <div class="hidden items-center gap-2 rounded-xl bg-slate-50 px-3 py-2 text-xs font-medium text-slate-500 sm:flex">
                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                    </svg>

                    {{ $users->total() }} User
                </div>

            </div>
        </div>


        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50/70">

                        <th class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            No
                        </th>

                        <th class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Nama
                        </th>

                        <th class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Email
                        </th>

                        <th class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Role
                        </th>

                        <th class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Terdaftar
                        </th>

                        <th class="px-5 py-3.5 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>

                    </tr>
                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($users as $user)

                        <tr class="group transition hover:bg-slate-50/70">

                            {{-- NO --}}
                            <td class="whitespace-nowrap px-5 py-4 text-sm font-medium text-slate-500">
                                {{ $users->firstItem() + $loop->index }}
                            </td>


                            {{-- NAMA --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center gap-3">

                                    @if($user->avatar)
                                        <img
                                            src="{{ asset('storage/' . $user->avatar) }}"
                                            alt="{{ $user->name }}"
                                            class="h-11 w-11 rounded-full object-cover ring-2 ring-white shadow-sm"
                                        >
                                    @else
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-blue-100 to-blue-50 text-sm font-bold text-[#1769AA] ring-2 ring-white shadow-sm">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    @endif

                                    <div class="min-w-0">

                                        <div class="flex items-center gap-2">

                                            <p class="truncate text-sm font-semibold text-slate-800">
                                                {{ $user->name }}
                                            </p>

                                            @if($user->id === auth()->id())
                                                <span class="inline-flex shrink-0 items-center rounded-full bg-blue-50 px-2 py-0.5 text-[10px] font-bold text-[#1769AA]">
                                                    Akun Anda
                                                </span>
                                            @endif

                                        </div>

                                        <p class="mt-0.5 text-xs text-slate-400">
                                            ID #{{ $user->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- EMAIL --}}
                            <td class="whitespace-nowrap px-5 py-4">

                                <div class="flex items-center gap-2 text-sm text-slate-600">

                                    <svg class="h-4 w-4 shrink-0 text-slate-400"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="1.8"
                                         viewBox="0 0 24 24">
                                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m3 7 9 6 9-6"/>
                                    </svg>

                                    {{ $user->email }}

                                </div>

                            </td>


                            {{-- ROLE --}}
                            <td class="whitespace-nowrap px-5 py-4">

                                @if($user->role === 'admin')

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-violet-50 px-3 py-1.5 text-xs font-bold text-violet-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-violet-500"></span>

                                        Administrator
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                        Petugas
                                    </span>

                                @endif

                            </td>


                            {{-- TERDAFTAR --}}
                            <td class="whitespace-nowrap px-5 py-4">

                                <div class="flex items-center gap-2">

                                    <svg class="h-4 w-4 text-slate-400"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="1.8"
                                         viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="17" rx="2"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16 2v4M8 2v4M3 10h18"/>
                                    </svg>

                                    <span class="text-sm text-slate-600">
                                        {{ $user->created_at?->format('d M Y') }}
                                    </span>

                                </div>

                            </td>


                            {{-- AKSI --}}
                            <td class="whitespace-nowrap px-5 py-4">

                                <div class="flex items-center justify-end gap-1.5">

                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('users.show', $user) }}"
                                        title="Detail"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-blue-50 hover:text-[#1769AA]"
                                    >
                                        <svg class="h-4.5 w-4.5"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="1.8"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6z"/>
                                            <circle cx="12" cy="12" r="2.5"/>
                                        </svg>
                                    </a>


                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('users.edit', $user) }}"
                                        title="Edit"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-amber-50 hover:text-amber-600"
                                    >
                                        <svg class="h-4.5 w-4.5"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="1.8"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 20h9"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4L16.5 3.5z"/>
                                        </svg>
                                    </a>


                                    {{-- HAPUS --}}
                                    @if($user->id !== auth()->id())

                                        <form
                                            method="POST"
                                            action="{{ route('users.destroy', $user) }}"
                                            onsubmit="return confirm('Yakin ingin menghapus user {{ $user->name }}?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                title="Hapus"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-red-50 hover:text-red-600"
                                            >
                                                <svg class="h-4.5 w-4.5"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     stroke-width="1.8"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M4 7h16"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M10 11v6M14 11v6"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M6 7l1 14h10l1-14"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M9 7V4h6v3"/>
                                                </svg>
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        {{-- EMPTY STATE --}}
                        <tr>
                            <td colspan="6" class="px-6 py-16">

                                <div class="flex flex-col items-center justify-center text-center">

                                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                        <svg class="h-8 w-8"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="1.7"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                            <circle cx="9" cy="7" r="4"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                        </svg>

                                    </div>

                                    <h3 class="mt-4 text-sm font-bold text-slate-800">
                                        Tidak ada user ditemukan
                                    </h3>

                                    <p class="mt-1 max-w-sm text-sm text-slate-500">
                                        Belum ada data pengguna yang sesuai dengan filter pencarian.
                                    </p>

                                    <div class="mt-5 flex flex-wrap justify-center gap-2">

                                        @if(request('search') || request('role'))

                                            <a
                                                href="{{ route('users.index') }}"
                                                class="inline-flex h-10 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                                            >
                                                <svg class="h-4 w-4"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     stroke-width="1.8"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M3 12a9 9 0 1 0 3-6.7"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M3 4v6h6"/>
                                                </svg>

                                                Reset Filter
                                            </a>

                                        @endif

                                        <a
                                            href="{{ route('users.create') }}"
                                            class="inline-flex h-10 items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-4 text-sm font-semibold text-white transition hover:bg-[#0D6EAD]"
                                        >
                                            <svg class="h-4 w-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="1.9"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 5v14M5 12h14"/>
                                            </svg>

                                            Tambah User
                                        </a>

                                    </div>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($users->hasPages())

            <div class="border-t border-slate-200 px-5 py-4">
                {{ $users->links() }}
            </div>

        @endif

    </div>

</div>


{{-- =========================================================
    CUSTOM ROLE DROPDOWN SCRIPT
========================================================== --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdown = document.getElementById('roleDropdown');
    const button = document.getElementById('roleDropdownButton');
    const menu = document.getElementById('roleDropdownMenu');
    const input = document.getElementById('roleInput');
    const label = document.getElementById('roleDropdownLabel');
    const chevron = document.getElementById('roleChevron');
    const options = document.querySelectorAll('.role-option');

    if (!dropdown || !button || !menu) {
        return;
    }

    function openDropdown() {
        menu.classList.remove('hidden');
        chevron.classList.add('rotate-180');
    }

    function closeDropdown() {
        menu.classList.add('hidden');
        chevron.classList.remove('rotate-180');
    }

    function toggleDropdown() {
        if (menu.classList.contains('hidden')) {
            openDropdown();
        } else {
            closeDropdown();
        }
    }

    button.addEventListener('click', function (event) {
        event.stopPropagation();
        toggleDropdown();
    });


    options.forEach(function (option) {

        option.addEventListener('click', function (event) {

            event.stopPropagation();

            const value = this.dataset.value;
            const selectedLabel = this.dataset.label;

            input.value = value;
            label.textContent = selectedLabel;

            options.forEach(function (item) {
                item.classList.remove(
                    'bg-blue-50',
                    'text-[#1769AA]'
                );

                item.classList.add('text-slate-700');
            });

            this.classList.remove('text-slate-700');
            this.classList.add(
                'bg-blue-50',
                'text-[#1769AA]'
            );

            closeDropdown();
        });

    });


    document.addEventListener('click', function (event) {

        if (!dropdown.contains(event.target)) {
            closeDropdown();
        }

    });


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {
            closeDropdown();
        }

    });

});
</script>
@endsection