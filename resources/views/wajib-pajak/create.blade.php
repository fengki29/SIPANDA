@extends('layouts.app')

@section('title', 'Tambah Wajib Pajak')

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
                        Tambah Wajib Pajak
                    </h1>
                    <p class="mt-1 text-sm text-slate-500">
                        Tambahkan data wajib pajak baru ke dalam sistem SIPANDA.
                    </p>
                </div>
            </div>
        </div>

        <a href="{{ route('wajib-pajak.index') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-800">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-4 w-4"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Kembali
        </a>
    </div>

    {{-- VALIDATION ERROR --}}
    @if ($errors->any())
        <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4">
            <div class="flex items-start gap-3">
                <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">
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
                        Data belum dapat disimpan
                    </p>

                    <ul class="mt-1 list-disc space-y-1 pl-5 text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    {{-- FORM CARD --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- CARD HEADER --}}
        <div class="border-b border-slate-100 bg-slate-50/70 px-6 py-5 sm:px-8">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-[#1769AA]">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7.17a2 2 0 011.42.59l3.82 3.82A2 2 0 0120 8.83V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-base font-bold text-slate-900">
                        Informasi Wajib Pajak
                    </h2>
                    <p class="mt-0.5 text-sm text-slate-500">
                        Lengkapi informasi wajib pajak dengan data yang benar.
                    </p>
                </div>
            </div>
        </div>

        <form action="{{ route('wajib-pajak.store') }}"
              method="POST"
              class="p-6 sm:p-8">
            @csrf

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                {{-- NIK --}}
                <div>
                    <label for="nik"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        NIK
                        <span class="text-red-500">*</span>
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
                                      d="M15 19a4 4 0 00-8 0m8 0h3.5a1.5 1.5 0 001.5-1.5v-.5A4 4 0 0016 13.13M9 8a3 3 0 110-6 3 3 0 010 6zm8 4a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"/>
                            </svg>
                        </div>

                        <input type="text"
                               id="nik"
                               name="nik"
                               value="{{ old('nik') }}"
                               maxlength="16"
                               inputmode="numeric"
                               placeholder="Masukkan NIK"
                               class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50">
                    </div>

                    @error('nik')
                        <p class="mt-1.5 text-xs font-medium text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- NAMA --}}
                <div>
                    <label for="nama"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Wajib Pajak
                        <span class="text-red-500">*</span>
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
                                      d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"/>
                            </svg>
                        </div>

                        <input type="text"
                               id="nama"
                               name="nama"
                               value="{{ old('nama') }}"
                               placeholder="Masukkan nama wajib pajak"
                               class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50">
                    </div>

                    @error('nama')
                        <p class="mt-1.5 text-xs font-medium text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- NO HP --}}
                <div>
                    <label for="no_hp"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Nomor HP
                        <span class="text-red-500">*</span>
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
                                      d="M7.5 3h9A1.5 1.5 0 0118 4.5v15a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 016 19.5v-15A1.5 1.5 0 017.5 3z"/>
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M10 18h4"/>
                            </svg>
                        </div>

                        <input type="text"
                               id="no_hp"
                               name="no_hp"
                               value="{{ old('no_hp') }}"
                               inputmode="tel"
                               placeholder="Contoh: 081234567890"
                               class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50">
                    </div>

                    @error('no_hp')
                        <p class="mt-1.5 text-xs font-medium text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- JENIS WP --}}
                <div>
                    <label for="jenis_wp"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Jenis Wajib Pajak
                        <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-3.5 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M15 19a4 4 0 00-8 0m8 0h3.5a1.5 1.5 0 001.5-1.5v-.5A4 4 0 0016 13.13M9 8a3 3 0 110-6 3 3 0 010 6zm8 4a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"/>
                            </svg>
                        </div>

                        <select id="jenis_wp"
                                name="jenis_wp"
                                class="h-[52px] w-full appearance-none rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-11 text-sm text-slate-700 outline-none transition focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50">
                            <option value="">Pilih jenis wajib pajak</option>
                            <option value="Perorangan" {{ old('jenis_wp') === 'Perorangan' ? 'selected' : '' }}>
                                Perorangan
                            </option>
                            <option value="Badan" {{ old('jenis_wp') === 'Badan' ? 'selected' : '' }}>
                                Badan
                            </option>
                        </select>

                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6.75 9.75L12 15l5.25-5.25"/>
                            </svg>
                        </div>
                    </div>

                    @error('jenis_wp')
                        <p class="mt-1.5 text-xs font-medium text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- ALAMAT --}}
                <div class="md:col-span-2">
                    <label for="alamat"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Alamat
                        <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <div class="pointer-events-none absolute left-0 top-3.5 pl-3.5 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 21s7-6.2 7-12a7 7 0 10-14 0c0 5.8 7 12 7 12z"/>
                                <circle cx="12" cy="9" r="2.25"/>
                            </svg>
                        </div>

                        <textarea id="alamat"
                                  name="alamat"
                                  rows="4"
                                  placeholder="Masukkan alamat lengkap wajib pajak"
                                  class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50/60 py-3.5 pl-11 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50">{{ old('alamat') }}</textarea>
                    </div>

                    @error('alamat')
                        <p class="mt-1.5 text-xs font-medium text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

            {{-- ACTION --}}
            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                <a href="{{ route('wajib-pajak.index') }}"
                   class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-800">
                    Batal
                </a>

                <button type="submit"
                        class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-6 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md focus:outline-none focus:ring-4 focus:ring-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    Simpan Data
                </button>
            </div>

        </form>
    </div>

    {{-- INFO --}}
    <div class="rounded-2xl border border-blue-100 bg-blue-50/60 px-5 py-4">
        <div class="flex items-start gap-3">
            <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-[#1769AA]">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">
                    <circle cx="12" cy="12" r="9"/>
                    <path stroke-linecap="round" d="M12 10v6"/>
                    <path stroke-linecap="round" d="M12 7.5h.01"/>
                </svg>
            </div>

            <div>
                <p class="text-sm font-semibold text-blue-900">
                    Perhatikan kelengkapan data
                </p>
                <p class="mt-1 text-sm leading-6 text-blue-800">
                    Pastikan NIK, nama, nomor HP, jenis wajib pajak, dan alamat
                    sudah sesuai sebelum data disimpan.
                </p>
            </div>
        </div>
    </div>

</div>
@endsection