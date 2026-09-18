@extends('layouts.app')

@section('title', 'Tambah Pembayaran')

@section('content')

<div class="mb-6">

    <h2 class="text-2xl font-bold text-gray-800">
        Tambah Pembayaran
    </h2>

    <p class="text-sm text-gray-500 mt-1">
        Catat pembayaran pajak dari wajib pajak
    </p>

</div>


{{-- ERROR VALIDASI --}}
@if($errors->any())

    <div class="mb-6 rounded-lg bg-red-100 border border-red-200 px-5 py-4 text-red-800">

        <p class="font-semibold mb-2">
            Terdapat kesalahan:
        </p>

        <ul class="list-disc list-inside text-sm space-y-1">

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


<form
    action="{{ route('pembayaran.store') }}"
    method="POST"
    id="form-pembayaran"
>

    @csrf


    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


            {{-- TAGIHAN --}}
            <div class="md:col-span-2">

                <label
                    for="tagihan_id"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Tagihan
                </label>

                <select
                    name="tagihan_id"
                    id="tagihan_id"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                >

                    <option value="">
                        -- Pilih Tagihan --
                    </option>


                    @foreach($tagihans as $tagihan)

                        @php

                            $sudahDibayar = $tagihan
                                ->pembayarans()
                                ->sum('jumlah_bayar');

                            $totalTagihanValue =
                                (float) $tagihan->total_tagihan;

                            $sisaTagihanValue = max(
                                $totalTagihanValue -
                                (float) $sudahDibayar,
                                0
                            );

                            $isSelected =
                                old('tagihan_id') == $tagihan->id
                                ||
                                (
                                    !old('tagihan_id')
                                    &&
                                    isset($selectedTagihanId)
                                    &&
                                    $selectedTagihanId == $tagihan->id
                                );

                        @endphp


                        <option
                            value="{{ $tagihan->id }}"
                            data-total="{{ $totalTagihanValue }}"
                            data-dibayar="{{ $sudahDibayar }}"
                            data-sisa="{{ $sisaTagihanValue }}"
                            {{ $isSelected ? 'selected' : '' }}
                        >

                            {{ $tagihan->nomor_tagihan }}
                            -
                            {{ $tagihan->wajibPajak->nama ?? '-' }}

                        </option>

                    @endforeach

                </select>


                @if($tagihans->isEmpty())

                    <p class="mt-2 text-sm text-red-600">
                        Tidak ada tagihan yang dapat dibayar saat ini.
                    </p>

                @else

                    <p class="mt-2 text-xs text-gray-500">
                        Pilih tagihan yang ingin dibayar.
                    </p>

                @endif

            </div>


            {{-- INFORMASI TAGIHAN --}}
            <div
                id="informasi-tagihan"
                class="md:col-span-2 hidden"
            >

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                    {{-- TOTAL --}}
                    <div class="rounded-lg bg-gray-50 border border-gray-200 p-4">

                        <p class="text-xs text-gray-500">
                            Total Tagihan
                        </p>

                        <p
                            id="total-tagihan"
                            class="text-lg font-bold text-gray-800 mt-1"
                        >
                            Rp 0
                        </p>

                    </div>


                    {{-- SUDAH DIBAYAR --}}
                    <div class="rounded-lg bg-gray-50 border border-gray-200 p-4">

                        <p class="text-xs text-gray-500">
                            Sudah Dibayar
                        </p>

                        <p
                            id="sudah-dibayar"
                            class="text-lg font-bold text-gray-800 mt-1"
                        >
                            Rp 0
                        </p>

                    </div>


                    {{-- SISA --}}
                    <div class="rounded-lg bg-blue-50 border border-blue-200 p-4">

                        <p class="text-xs text-blue-600">
                            Sisa Tagihan
                        </p>

                        <p
                            id="sisa-tagihan"
                            class="text-lg font-bold text-blue-700 mt-1"
                        >
                            Rp 0
                        </p>

                    </div>

                </div>

            </div>


            {{-- NOMOR PEMBAYARAN --}}
            <div>

                <label
                    for="nomor_pembayaran"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Nomor Pembayaran
                </label>

                <input
                    type="text"
                    name="nomor_pembayaran"
                    id="nomor_pembayaran"
                    value="{{ old('nomor_pembayaran') }}"
                    placeholder="Contoh: PAY-2026-0001"
                    required
                    maxlength="255"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('nomor_pembayaran')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- TANGGAL PEMBAYARAN --}}
            <div>

                <label
                    for="tanggal_pembayaran"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Tanggal Pembayaran
                </label>

                <input
                    type="date"
                    name="tanggal_pembayaran"
                    id="tanggal_pembayaran"
                    value="{{ old('tanggal_pembayaran', date('Y-m-d')) }}"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                >

                @error('tanggal_pembayaran')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- JUMLAH BAYAR --}}
            <div>

                <label
                    for="jumlah_bayar"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Jumlah Pembayaran
                </label>

                <input
                    type="number"
                    name="jumlah_bayar"
                    id="jumlah_bayar"
                    value="{{ old('jumlah_bayar') }}"
                    min="0.01"
                    step="0.01"
                    placeholder="Contoh: 500000"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                >

                <p
                    id="batas-pembayaran"
                    class="text-xs text-gray-500 mt-1"
                >
                    Pilih tagihan terlebih dahulu.
                </p>

                @error('jumlah_bayar')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- METODE PEMBAYARAN --}}
            <div>

                <label
                    for="metode_pembayaran"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Metode Pembayaran
                </label>

                <select
                    name="metode_pembayaran"
                    id="metode_pembayaran"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                >

                    <option value="">
                        -- Pilih Metode --
                    </option>

                    <option
                        value="tunai"
                        {{ old('metode_pembayaran') == 'tunai' ? 'selected' : '' }}
                    >
                        Tunai
                    </option>

                    <option
                        value="transfer"
                        {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}
                    >
                        Transfer
                    </option>

                    <option
                        value="qris"
                        {{ old('metode_pembayaran') == 'qris' ? 'selected' : '' }}
                    >
                        QRIS
                    </option>

                    <option
                        value="lainnya"
                        {{ old('metode_pembayaran') == 'lainnya' ? 'selected' : '' }}
                    >
                        Lainnya
                    </option>

                </select>

                @error('metode_pembayaran')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- KETERANGAN --}}
            <div class="md:col-span-2">

                <label
                    for="keterangan"
                    class="block text-sm font-medium text-gray-700 mb-2"
                >
                    Keterangan
                </label>

                <textarea
                    name="keterangan"
                    id="keterangan"
                    rows="3"
                    maxlength="255"
                    placeholder="Keterangan pembayaran (opsional)"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                >{{ old('keterangan') }}</textarea>

                @error('keterangan')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


        </div>


        {{-- BUTTON --}}
        <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">

            <a
                href="{{ route('pembayaran.index') }}"
                class="px-5 py-2.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium transition"
            >
                Batal
            </a>

            <button
                type="submit"
                id="tombol-simpan"
                class="px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition"
            >
                Simpan Pembayaran
            </button>

        </div>

    </div>

</form>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const tagihanSelect =
        document.getElementById('tagihan_id');

    const informasiTagihan =
        document.getElementById('informasi-tagihan');

    const totalTagihan =
        document.getElementById('total-tagihan');

    const sudahDibayar =
        document.getElementById('sudah-dibayar');

    const sisaTagihan =
        document.getElementById('sisa-tagihan');

    const jumlahBayar =
        document.getElementById('jumlah_bayar');

    const batasPembayaran =
        document.getElementById('batas-pembayaran');

    const formPembayaran =
        document.getElementById('form-pembayaran');


    function formatRupiah(angka) {

        return 'Rp ' +
            new Intl.NumberFormat('id-ID').format(
                Number(angka) || 0
            );

    }


    function tampilkanInformasiTagihan() {

        const option =
            tagihanSelect.options[
                tagihanSelect.selectedIndex
            ];


        if (!option || !option.value) {

            informasiTagihan.classList.add('hidden');

            jumlahBayar.removeAttribute('max');

            batasPembayaran.textContent =
                'Pilih tagihan terlebih dahulu.';

            return;

        }


        const total =
            parseFloat(
                option.dataset.total || 0
            );

        const dibayar =
            parseFloat(
                option.dataset.dibayar || 0
            );

        const sisa =
            Math.max(
                parseFloat(
                    option.dataset.sisa || 0
                ),
                0
            );


        totalTagihan.textContent =
            formatRupiah(total);

        sudahDibayar.textContent =
            formatRupiah(dibayar);

        sisaTagihan.textContent =
            formatRupiah(sisa);


        jumlahBayar.max = sisa;


        batasPembayaran.textContent =
            'Maksimal pembayaran: ' +
            formatRupiah(sisa);


        informasiTagihan.classList.remove('hidden');


        if (
            jumlahBayar.value &&
            parseFloat(jumlahBayar.value) > sisa
        ) {

            jumlahBayar.value = '';

        }

    }


    tagihanSelect.addEventListener(
        'change',
        function () {

            tagihanSelect.setCustomValidity('');

            tampilkanInformasiTagihan();

        }
    );


    jumlahBayar.addEventListener(
        'input',
        function () {

            const option =
                tagihanSelect.options[
                    tagihanSelect.selectedIndex
                ];

            if (!option || !option.value) {
                return;
            }


            const sisa =
                parseFloat(
                    option.dataset.sisa || 0
                );

            const nilai =
                parseFloat(
                    jumlahBayar.value || 0
                );


            if (nilai > sisa) {

                jumlahBayar.setCustomValidity(
                    'Jumlah pembayaran melebihi sisa tagihan.'
                );

            } else {

                jumlahBayar.setCustomValidity('');

            }

        }
    );


    formPembayaran.addEventListener(
        'submit',
        function (event) {

            const option =
                tagihanSelect.options[
                    tagihanSelect.selectedIndex
                ];


            if (!option || !option.value) {

                event.preventDefault();

                tagihanSelect.setCustomValidity(
                    'Silakan pilih tagihan terlebih dahulu.'
                );

                tagihanSelect.reportValidity();

                return;

            }


            const sisa =
                parseFloat(
                    option.dataset.sisa || 0
                );

            const nilai =
                parseFloat(
                    jumlahBayar.value || 0
                );


            if (nilai <= 0) {

                event.preventDefault();

                jumlahBayar.setCustomValidity(
                    'Jumlah pembayaran harus lebih dari 0.'
                );

                jumlahBayar.reportValidity();

                return;

            }


            if (nilai > sisa) {

                event.preventDefault();

                jumlahBayar.setCustomValidity(
                    'Jumlah pembayaran melebihi sisa tagihan.'
                );

                jumlahBayar.reportValidity();

                return;

            }


            tagihanSelect.setCustomValidity('');

            jumlahBayar.setCustomValidity('');

        }
    );


    tampilkanInformasiTagihan();

});

</script>

@endsection