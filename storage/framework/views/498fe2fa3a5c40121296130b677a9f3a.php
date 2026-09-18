<?php $__env->startSection('title', 'Tambah Pembayaran'); ?>

<?php $__env->startSection('content'); ?>

<div class="mb-6">

    <h2 class="text-2xl font-bold text-gray-800">
        Tambah Pembayaran
    </h2>

    <p class="text-sm text-gray-500 mt-1">
        Catat pembayaran pajak dari wajib pajak
    </p>

</div>



<?php if($errors->any()): ?>

    <div class="mb-6 rounded-lg bg-red-100 border border-red-200 px-5 py-4 text-red-800">

        <p class="font-semibold mb-2">
            Terdapat kesalahan:
        </p>

        <ul class="list-disc list-inside text-sm space-y-1">

            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li>
                    <?php echo e($error); ?>

                </li>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

    </div>

<?php endif; ?>


<form
    action="<?php echo e(route('pembayaran.store')); ?>"
    method="POST"
    id="form-pembayaran"
>

    <?php echo csrf_field(); ?>


    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


            
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


                    <?php $__currentLoopData = $tagihans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagihan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php

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

                        ?>


                        <option
                            value="<?php echo e($tagihan->id); ?>"
                            data-total="<?php echo e($totalTagihanValue); ?>"
                            data-dibayar="<?php echo e($sudahDibayar); ?>"
                            data-sisa="<?php echo e($sisaTagihanValue); ?>"
                            <?php echo e($isSelected ? 'selected' : ''); ?>

                        >

                            <?php echo e($tagihan->nomor_tagihan); ?>

                            -
                            <?php echo e($tagihan->wajibPajak->nama ?? '-'); ?>


                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>


                <?php if($tagihans->isEmpty()): ?>

                    <p class="mt-2 text-sm text-red-600">
                        Tidak ada tagihan yang dapat dibayar saat ini.
                    </p>

                <?php else: ?>

                    <p class="mt-2 text-xs text-gray-500">
                        Pilih tagihan yang ingin dibayar.
                    </p>

                <?php endif; ?>

            </div>


            
            <div
                id="informasi-tagihan"
                class="md:col-span-2 hidden"
            >

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                    
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
                    value="<?php echo e(old('nomor_pembayaran')); ?>"
                    placeholder="Contoh: PAY-2026-0001"
                    required
                    maxlength="255"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                >

                <?php $__errorArgs = ['nomor_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                    <p class="mt-2 text-sm text-red-600">
                        <?php echo e($message); ?>

                    </p>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


            
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
                    value="<?php echo e(old('tanggal_pembayaran', date('Y-m-d'))); ?>"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                >

                <?php $__errorArgs = ['tanggal_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                    <p class="mt-2 text-sm text-red-600">
                        <?php echo e($message); ?>

                    </p>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


            
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
                    value="<?php echo e(old('jumlah_bayar')); ?>"
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

                <?php $__errorArgs = ['jumlah_bayar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                    <p class="mt-2 text-sm text-red-600">
                        <?php echo e($message); ?>

                    </p>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


            
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
                        <?php echo e(old('metode_pembayaran') == 'tunai' ? 'selected' : ''); ?>

                    >
                        Tunai
                    </option>

                    <option
                        value="transfer"
                        <?php echo e(old('metode_pembayaran') == 'transfer' ? 'selected' : ''); ?>

                    >
                        Transfer
                    </option>

                    <option
                        value="qris"
                        <?php echo e(old('metode_pembayaran') == 'qris' ? 'selected' : ''); ?>

                    >
                        QRIS
                    </option>

                    <option
                        value="lainnya"
                        <?php echo e(old('metode_pembayaran') == 'lainnya' ? 'selected' : ''); ?>

                    >
                        Lainnya
                    </option>

                </select>

                <?php $__errorArgs = ['metode_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                    <p class="mt-2 text-sm text-red-600">
                        <?php echo e($message); ?>

                    </p>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


            
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
                ><?php echo e(old('keterangan')); ?></textarea>

                <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                    <p class="mt-2 text-sm text-red-600">
                        <?php echo e($message); ?>

                    </p>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


        </div>


        
        <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">

            <a
                href="<?php echo e(route('pembayaran.index')); ?>"
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/pembayaran/create.blade.php ENDPATH**/ ?>