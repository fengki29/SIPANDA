@extends('layouts.app')

@section('title', 'Tambah Wajib Pajak - SIPANDA')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div class="flex items-center gap-3">

            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-[#1769AA]">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19 8v6M16 11h6"/>
                </svg>
            </div>

            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                    Tambah Wajib Pajak
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Tambahkan data wajib pajak baru ke dalam sistem SIPANDA.
                </p>
            </div>

        </div>

        <a
            href="{{ route('wajib-pajak.index') }}"
            class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50 hover:text-slate-800"
        >
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15 18l-6-6 6-6"/>
            </svg>

            Kembali
        </a>

    </div>


    {{-- FORM --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- FORM HEADER --}}
        <div class="border-b border-slate-200 bg-slate-50/50 px-6 py-5">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 20h9"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-sm font-bold text-slate-800">
                        Informasi Wajib Pajak
                    </h2>

                    <p class="text-xs text-slate-500">
                        Isi seluruh data yang diperlukan.
                    </p>
                </div>

            </div>

        </div>


        <form action="{{ route('wajib-pajak.store') }}" method="POST">

            @csrf

            <div class="space-y-6 p-6">

                {{-- IDENTITAS --}}
                <div>

                    <div class="mb-4 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-[#1769AA]"></span>

                        <h3 class="text-sm font-bold text-slate-800">
                            Identitas
                        </h3>
                    </div>


                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- NIK --}}
                        <div>
                            <label for="nik" class="mb-2 block text-sm font-semibold text-slate-700">
                                NIK
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4 5h16v14H4z"/>
                                        <circle cx="8" cy="10" r="1.5"/>
                                        <path stroke-linecap="round" d="M12 9h5M12 13h5"/>
                                    </svg>
                                </div>

                                <input
                                    id="nik"
                                    type="text"
                                    name="nik"
                                    value="{{ old('nik') }}"
                                    placeholder="Masukkan NIK"
                                    maxlength="20"
                                    class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                                >
                            </div>

                            @error('nik')
                                <p class="mt-2 flex items-center gap-1.5 text-xs font-medium text-red-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9"/>
                                        <path stroke-linecap="round" d="M12 8v4M12 16h.01"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- NAMA --}}
                        <div>
                            <label for="nama" class="mb-2 block text-sm font-semibold text-slate-700">
                                Nama Wajib Pajak
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                        <circle cx="9" cy="7" r="4"/>
                                    </svg>
                                </div>

                                <input
                                    id="nama"
                                    type="text"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    placeholder="Masukkan nama lengkap"
                                    class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                                >
                            </div>

                            @error('nama')
                                <p class="mt-2 flex items-center gap-1.5 text-xs font-medium text-red-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9"/>
                                        <path stroke-linecap="round" d="M12 8v4M12 16h.01"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- NO HP --}}
                        <div>
                            <label for="no_hp" class="mb-2 block text-sm font-semibold text-slate-700">
                                No. HP
                            </label>

                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <rect x="6" y="3" width="12" height="18" rx="2"/>
                                        <path stroke-linecap="round" d="M10 18h4"/>
                                    </svg>
                                </div>

                                <input
                                    id="no_hp"
                                    type="text"
                                    name="no_hp"
                                    value="{{ old('no_hp') }}"
                                    placeholder="Contoh: 081234567890"
                                    maxlength="20"
                                    class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                                >
                            </div>

                            @error('no_hp')
                                <p class="mt-2 flex items-center gap-1.5 text-xs font-medium text-red-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9"/>
                                        <path stroke-linecap="round" d="M12 8v4M12 16h.01"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- JENIS WP --}}
                        <div>

                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Jenis Wajib Pajak
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">

                                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-4 text-slate-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                        <circle cx="9" cy="7" r="4"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                    </svg>
                                </div>

                                <select
                                    name="jenis_wp"
                                    class="h-[52px] w-full appearance-none rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-11 text-sm text-slate-700 outline-none transition focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                                >
                                    <option value="">Pilih jenis wajib pajak</option>

                                    <option
                                        value="Perorangan"
                                        {{ old('jenis_wp') === 'Perorangan' ? 'selected' : '' }}
                                    >
                                        Perorangan
                                    </option>

                                    <option
                                        value="Badan"
                                        {{ old('jenis_wp') === 'Badan' ? 'selected' : '' }}
                                    >
                                        Badan
                                    </option>
                                </select>

                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m6 9 6 6 6-6"/>
                                    </svg>
                                </div>

                            </div>

                            @error('jenis_wp')
                                <p class="mt-2 flex items-center gap-1.5 text-xs font-medium text-red-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9"/>
                                        <path stroke-linecap="round" d="M12 8v4M12 16h.01"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- ALAMAT --}}
                <div>

                    <div class="mb-4 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-[#1769AA]"></span>

                        <h3 class="text-sm font-bold text-slate-800">
                            Alamat
                        </h3>
                    </div>

                    <label for="alamat" class="mb-2 block text-sm font-semibold text-slate-700">
                        Alamat Lengkap
                        <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute left-0 top-0 flex pt-4 pl-4 text-slate-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 21s7-6.1 7-12a7 7 0 1 0-14 0c0 5.9 7 12 7 12z"/>
                                <circle cx="12" cy="9" r="2.2"/>
                            </svg>
                        </div>

                        <textarea
                            id="alamat"
                            name="alamat"
                            rows="4"
                            placeholder="Masukkan alamat lengkap wajib pajak"
                            class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50/60 py-3.5 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >{{ old('alamat') }}</textarea>

                    </div>

                    @error('alamat')
                        <p class="mt-2 flex items-center gap-1.5 text-xs font-medium text-red-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9"/>
                                <path stroke-linecap="round" d="M12 8v4M12 16h.01"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50/50 px-6 py-5 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('wajib-pajak.index') }}"
                    class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
                >
                    <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" stroke-width="1.9" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m5 12 4 4L19 6"/>
                    </svg>

                    Simpan Data
                </button>

            </div>

        </form>

    </div>

</div>

@endsection