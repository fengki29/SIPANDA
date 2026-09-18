@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="mx-auto max-w-3xl px-4 py-6 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-6">

            <a
                href="{{ route('target-pajak.index') }}"
                class="mb-4 inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-indigo-600"
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
                        d="M15 19l-7-7 7-7"
                    />
                </svg>

                Kembali ke Target Pajak
            </a>

            <h1 class="text-2xl font-bold text-slate-800">
                Tambah Target Pajak
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Masukkan target penerimaan pajak untuk jenis dan tahun tertentu.
            </p>

        </div>


        {{-- VALIDATION ERROR --}}
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">

                <p class="font-semibold text-red-700">
                    Terdapat kesalahan pada data:
                </p>

                <ul class="mt-2 list-inside list-disc text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        {{-- FORM --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">

            <form
                action="{{ route('target-pajak.store') }}"
                method="POST"
            >

                @csrf


                {{-- JENIS PAJAK --}}
                <div class="mb-5">

                    <label
                        for="jenis_pajak_id"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Jenis Pajak
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        id="jenis_pajak_id"
                        name="jenis_pajak_id"
                        required
                        class="w-full rounded-lg border-slate-300 bg-white px-3 py-2.5 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >

                        <option value="">
                            -- Pilih Jenis Pajak --
                        </option>

                        @foreach ($jenisPajaks as $jenisPajak)

                            <option
                                value="{{ $jenisPajak->id }}"
                                {{ old('jenis_pajak_id') == $jenisPajak->id ? 'selected' : '' }}
                            >
                                {{ $jenisPajak->nama }}
                                @if (!empty($jenisPajak->kode))
                                    ({{ $jenisPajak->kode }})
                                @endif
                            </option>

                        @endforeach

                    </select>

                    @error('jenis_pajak_id')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- TAHUN --}}
                <div class="mb-5">

                    <label
                        for="tahun"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Tahun Pajak
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        id="tahun"
                        type="number"
                        name="tahun"
                        value="{{ old('tahun', now()->year) }}"
                        min="2000"
                        max="2100"
                        required
                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >

                    @error('tahun')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- TARGET --}}
                <div class="mb-5">

                    <label
                        for="target"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Target Penerimaan
                        <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">

                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-sm font-medium text-slate-500">
                            Rp
                        </span>

                        <input
                            id="target"
                            type="number"
                            name="target"
                            value="{{ old('target') }}"
                            min="0"
                            step="0.01"
                            required
                            placeholder="Contoh: 5000000000"
                            class="w-full rounded-lg border-slate-300 py-2.5 pl-10 pr-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        >

                    </div>

                    <p class="mt-1 text-xs text-slate-400">
                        Masukkan nominal target tanpa tanda titik atau koma.
                    </p>

                    @error('target')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- KETERANGAN --}}
                <div class="mb-6">

                    <label
                        for="keterangan"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Keterangan
                    </label>

                    <textarea
                        id="keterangan"
                        name="keterangan"
                        rows="4"
                        placeholder="Tambahkan keterangan jika diperlukan..."
                        class="w-full rounded-lg border-slate-300 px-3 py-2.5 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('target-pajak.index') }}"
                        class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700"
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
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                        Simpan Target
                    </button>

                </div>

            </form>

        </div>

    </div>
</div>
@endsection