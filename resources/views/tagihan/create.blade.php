@extends('layouts.app')

@section('title', 'Tambah Tagihan')

@section('content')

<div class="mb-6">
    <div class="flex items-center gap-3">
        <a
            href="{{ route('tagihan.index') }}"
            class="flex h-9 w-9 items-center justify-center rounded-lg bg-white text-gray-500 shadow-sm ring-1 ring-gray-200 transition hover:bg-gray-50 hover:text-gray-700"
            title="Kembali"
        >
            ←
        </a>

        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Tambah Tagihan
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Buat tagihan pajak baru untuk wajib pajak
            </p>
        </div>
    </div>
</div>


@if($errors->any())
    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-5 py-4 text-red-800">

        <p class="mb-2 font-semibold">
            Terdapat kesalahan:
        </p>

        <ul class="list-inside list-disc space-y-1 text-sm">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif


<form action="{{ route('tagihan.store') }}" method="POST" id="form-tagihan">

    @csrf

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        {{-- HEADER FORM --}}
        <div class="border-b border-gray-200 bg-gray-50 px-6 py-5">
            <h3 class="text-base font-semibold text-gray-800">
                Informasi Tagihan
            </h3>

            <p class="mt-1 text-sm text-gray-500">
                Lengkapi data wajib pajak, objek pajak, dan nominal tagihan.
            </p>
        </div>


        <div class="p-6">

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                {{-- WAJIB PAJAK --}}
                <div>

                    <label
                        for="wajib_pajak_id"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Wajib Pajak
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="wajib_pajak_id"
                        id="wajib_pajak_id"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                        <option value="">
                            -- Pilih Wajib Pajak --
                        </option>

                        @foreach($wajibPajaks as $wajibPajak)

                            <option
                                value="{{ $wajibPajak->id }}"
                                {{ old('wajib_pajak_id') == $wajibPajak->id ? 'selected' : '' }}
                            >
                                {{ $wajibPajak->nama }}
                                - {{ $wajibPajak->nik }}
                            </option>

                        @endforeach

                    </select>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Pilih wajib pajak yang akan dikenakan tagihan.
                    </p>

                </div>


                {{-- OBJEK PAJAK --}}
                <div>

                    <label
                        for="objek_pajak_id"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Objek Pajak
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="objek_pajak_id"
                        id="objek_pajak_id"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                        <option value="">
                            -- Pilih Objek Pajak --
                        </option>

                        @foreach($objekPajaks as $objekPajak)

                            <option
                                value="{{ $objekPajak->id }}"
                                data-wajib-pajak="{{ $objekPajak->wajib_pajak_id }}"
                                {{ old('objek_pajak_id') == $objekPajak->id ? 'selected' : '' }}
                            >
                                {{ $objekPajak->nama_objek }}
                                -
                                {{ $objekPajak->wajibPajak->nama ?? '-' }}
                            </option>

                        @endforeach

                    </select>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Hanya objek pajak milik wajib pajak yang dipilih yang akan ditampilkan.
                    </p>

                </div>


                {{-- JENIS PAJAK --}}
                <div>

                    <label
                        for="jenis_pajak_id"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Jenis Pajak
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="jenis_pajak_id"
                        id="jenis_pajak_id"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                        <option value="">
                            -- Pilih Jenis Pajak --
                        </option>

                        @foreach($jenisPajaks as $jenisPajak)

                            <option
                                value="{{ $jenisPajak->id }}"
                                data-tarif="{{ $jenisPajak->tarif }}"
                                {{ old('jenis_pajak_id') == $jenisPajak->id ? 'selected' : '' }}
                            >
                                {{ $jenisPajak->kode }}
                                -
                                {{ $jenisPajak->nama }}
                                ({{ $jenisPajak->tarif }}%)
                            </option>

                        @endforeach

                    </select>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Pilih jenis pajak sesuai objek pajak.
                    </p>

                </div>


                {{-- TAHUN PAJAK --}}
                <div>

                    <label
                        for="tahun_pajak"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Tahun Pajak
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="number"
                        name="tahun_pajak"
                        id="tahun_pajak"
                        value="{{ old('tahun_pajak', date('Y')) }}"
                        min="2000"
                        max="2100"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    <p class="mt-1.5 text-xs text-gray-500">
                        Tahun pajak yang digunakan untuk tagihan ini.
                    </p>

                </div>


                {{-- NOMOR TAGIHAN --}}
                <div>

                    <label
                        for="nomor_tagihan"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Nomor Tagihan
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nomor_tagihan"
                        id="nomor_tagihan"
                        value="{{ old('nomor_tagihan') }}"
                        placeholder="Contoh: TAG-2026-0001"
                        maxlength="255"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    <p class="mt-1.5 text-xs text-gray-500">
                        Nomor tagihan harus unik.
                    </p>

                </div>


                {{-- POKOK PAJAK --}}
                <div>

                    <label
                        for="pokok_pajak"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Pokok Pajak
                        <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm text-gray-500">
                            Rp
                        </span>

                        <input
                            type="number"
                            name="pokok_pajak"
                            id="pokok_pajak"
                            value="{{ old('pokok_pajak') }}"
                            min="0"
                            step="0.01"
                            placeholder="500000"
                            required
                            class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-11 pr-4 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                </div>


                {{-- DENDA --}}
                <div>

                    <label
                        for="denda"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Denda
                    </label>

                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm text-gray-500">
                            Rp
                        </span>

                        <input
                            type="number"
                            name="denda"
                            id="denda"
                            value="{{ old('denda', 0) }}"
                            min="0"
                            step="0.01"
                            placeholder="0"
                            class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-11 pr-4 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Isi 0 jika tidak ada denda.
                    </p>

                </div>


                {{-- TOTAL TAGIHAN --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Total Tagihan
                    </label>

                    <div
                        id="total-display"
                        class="flex min-h-[42px] items-center rounded-lg border border-blue-200 bg-blue-50 px-4 py-2.5 text-lg font-bold text-blue-700"
                    >
                        Rp 0
                    </div>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Total = Pokok Pajak + Denda.
                    </p>

                </div>


                {{-- JATUH TEMPO --}}
                <div>

                    <label
                        for="tanggal_jatuh_tempo"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Tanggal Jatuh Tempo
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="date"
                        name="tanggal_jatuh_tempo"
                        id="tanggal_jatuh_tempo"
                        value="{{ old('tanggal_jatuh_tempo') }}"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    <p class="mt-1.5 text-xs text-gray-500">
                        Tanggal terakhir pembayaran tagihan.
                    </p>

                </div>


                {{-- STATUS --}}
                <div class="md:col-span-2">

                    <label
                        for="status"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Status Tagihan
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="status"
                        id="status"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                        <option
                            value="belum_bayar"
                            {{ old('status', 'belum_bayar') == 'belum_bayar' ? 'selected' : '' }}
                        >
                            Belum Bayar
                        </option>

                        <option
                            value="sebagian"
                            {{ old('status') == 'sebagian' ? 'selected' : '' }}
                        >
                            Sebagian
                        </option>

                        <option
                            value="lunas"
                            {{ old('status') == 'lunas' ? 'selected' : '' }}
                        >
                            Lunas
                        </option>

                        <option
                            value="jatuh_tempo"
                            {{ old('status') == 'jatuh_tempo' ? 'selected' : '' }}
                        >
                            Jatuh Tempo
                        </option>

                    </select>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Status awal tagihan. Status pembayaran dapat berubah setelah transaksi pembayaran.
                    </p>

                </div>

            </div>


            {{-- FOOTER FORM --}}
            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:items-center sm:justify-end">

                <a
                    href="{{ route('tagihan.index') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-gray-100 px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-200"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800"
                >
                    Simpan Tagihan
                </button>

            </div>

        </div>

    </div>

</form>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const pokokPajak = document.getElementById('pokok_pajak');
    const denda = document.getElementById('denda');
    const totalDisplay = document.getElementById('total-display');

    const wajibPajakSelect = document.getElementById('wajib_pajak_id');
    const objekPajakSelect = document.getElementById('objek_pajak_id');

    const objekPajakOptions = Array.from(
        objekPajakSelect.querySelectorAll('option')
    );


    function formatRupiah(angka) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(
            Number(angka) || 0
        );
    }


    function hitungTotal() {

        const pokok = parseFloat(
            pokokPajak.value
        ) || 0;

        const nilaiDenda = parseFloat(
            denda.value
        ) || 0;

        const total = pokok + nilaiDenda;

        totalDisplay.textContent =
            formatRupiah(total);
    }


    function filterObjekPajak(resetPilihan = true) {

        const wajibPajakId =
            wajibPajakSelect.value;

        const objekPajakLama =
            objekPajakSelect.value;


        objekPajakOptions.forEach(function (option) {

            if (!option.value) {
                option.hidden = false;
                return;
            }

            const cocok =
                option.dataset.wajibPajak ===
                wajibPajakId;

            option.hidden = !cocok;

        });


        if (resetPilihan) {

            objekPajakSelect.value = '';

        } else {

            const pilihanMasihValid =
                objekPajakOptions.some(function (option) {

                    return (
                        option.value === objekPajakLama &&
                        !option.hidden
                    );

                });

            if (pilihanMasihValid) {
                objekPajakSelect.value =
                    objekPajakLama;
            }
        }
    }


    pokokPajak.addEventListener(
        'input',
        hitungTotal
    );

    denda.addEventListener(
        'input',
        hitungTotal
    );


    wajibPajakSelect.addEventListener(
        'change',
        function () {
            filterObjekPajak(true);
        }
    );


    hitungTotal();

    /*
     * Saat halaman pertama kali dibuka,
     * pertahankan old('objek_pajak_id') jika
     * validasi sebelumnya gagal.
     */
    filterObjekPajak(false);

});
</script>

@endsection