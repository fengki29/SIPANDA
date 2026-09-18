

<?php $__env->startSection('title', 'Tambah Tagihan'); ?>

<?php $__env->startSection('content'); ?>

<div class="mb-6">
    <div class="flex items-center gap-3">
        <a
            href="<?php echo e(route('tagihan.index')); ?>"
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


<?php if($errors->any()): ?>
    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-5 py-4 text-red-800">

        <p class="mb-2 font-semibold">
            Terdapat kesalahan:
        </p>

        <ul class="list-inside list-disc space-y-1 text-sm">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

    </div>
<?php endif; ?>


<form action="<?php echo e(route('tagihan.store')); ?>" method="POST" id="form-tagihan">

    <?php echo csrf_field(); ?>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        
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

                        <?php $__currentLoopData = $wajibPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wajibPajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option
                                value="<?php echo e($wajibPajak->id); ?>"
                                <?php echo e(old('wajib_pajak_id') == $wajibPajak->id ? 'selected' : ''); ?>

                            >
                                <?php echo e($wajibPajak->nama); ?>

                                - <?php echo e($wajibPajak->nik); ?>

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Pilih wajib pajak yang akan dikenakan tagihan.
                    </p>

                </div>


                
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

                        <?php $__currentLoopData = $objekPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objekPajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option
                                value="<?php echo e($objekPajak->id); ?>"
                                data-wajib-pajak="<?php echo e($objekPajak->wajib_pajak_id); ?>"
                                <?php echo e(old('objek_pajak_id') == $objekPajak->id ? 'selected' : ''); ?>

                            >
                                <?php echo e($objekPajak->nama_objek); ?>

                                -
                                <?php echo e($objekPajak->wajibPajak->nama ?? '-'); ?>

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Hanya objek pajak milik wajib pajak yang dipilih yang akan ditampilkan.
                    </p>

                </div>


                
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

                        <?php $__currentLoopData = $jenisPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisPajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option
                                value="<?php echo e($jenisPajak->id); ?>"
                                data-tarif="<?php echo e($jenisPajak->tarif); ?>"
                                <?php echo e(old('jenis_pajak_id') == $jenisPajak->id ? 'selected' : ''); ?>

                            >
                                <?php echo e($jenisPajak->kode); ?>

                                -
                                <?php echo e($jenisPajak->nama); ?>

                                (<?php echo e($jenisPajak->tarif); ?>%)
                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Pilih jenis pajak sesuai objek pajak.
                    </p>

                </div>


                
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
                        value="<?php echo e(old('tahun_pajak', date('Y'))); ?>"
                        min="2000"
                        max="2100"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    <p class="mt-1.5 text-xs text-gray-500">
                        Tahun pajak yang digunakan untuk tagihan ini.
                    </p>

                </div>


                
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
                        value="<?php echo e(old('nomor_tagihan')); ?>"
                        placeholder="Contoh: TAG-2026-0001"
                        maxlength="255"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    <p class="mt-1.5 text-xs text-gray-500">
                        Nomor tagihan harus unik.
                    </p>

                </div>


                
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
                            value="<?php echo e(old('pokok_pajak')); ?>"
                            min="0"
                            step="0.01"
                            placeholder="500000"
                            required
                            class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-11 pr-4 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                </div>


                
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
                            value="<?php echo e(old('denda', 0)); ?>"
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
                        value="<?php echo e(old('tanggal_jatuh_tempo')); ?>"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    <p class="mt-1.5 text-xs text-gray-500">
                        Tanggal terakhir pembayaran tagihan.
                    </p>

                </div>


                
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
                            <?php echo e(old('status', 'belum_bayar') == 'belum_bayar' ? 'selected' : ''); ?>

                        >
                            Belum Bayar
                        </option>

                        <option
                            value="sebagian"
                            <?php echo e(old('status') == 'sebagian' ? 'selected' : ''); ?>

                        >
                            Sebagian
                        </option>

                        <option
                            value="lunas"
                            <?php echo e(old('status') == 'lunas' ? 'selected' : ''); ?>

                        >
                            Lunas
                        </option>

                        <option
                            value="jatuh_tempo"
                            <?php echo e(old('status') == 'jatuh_tempo' ? 'selected' : ''); ?>

                        >
                            Jatuh Tempo
                        </option>

                    </select>

                    <p class="mt-1.5 text-xs text-gray-500">
                        Status awal tagihan. Status pembayaran dapat berubah setelah transaksi pembayaran.
                    </p>

                </div>

            </div>


            
            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:items-center sm:justify-end">

                <a
                    href="<?php echo e(route('tagihan.index')); ?>"
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/tagihan/create.blade.php ENDPATH**/ ?>