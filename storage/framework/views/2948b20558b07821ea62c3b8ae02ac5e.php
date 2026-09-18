

<?php $__env->startSection('title', 'Tambah Objek Pajak'); ?>

<?php $__env->startSection('content'); ?>

<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">
        Tambah Objek Pajak
    </h2>

    <p class="mt-1 text-sm text-gray-500">
        Tambahkan data objek pajak baru.
    </p>
</div>

<div class="rounded-xl bg-white p-6 shadow">

    <form action="<?php echo e(route('objek-pajak.store')); ?>" method="POST">

        <?php echo csrf_field(); ?>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            
            <div class="md:col-span-2">

                <label
                    for="wajib_pajak_id"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Wajib Pajak
                </label>

                <select
                    name="wajib_pajak_id"
                    id="wajib_pajak_id"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                >

                    <option value="">
                        -- Pilih Wajib Pajak --
                    </option>

                    <?php $__currentLoopData = $wajibPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wajibPajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option
                            value="<?php echo e($wajibPajak->id); ?>"
                            <?php echo e(old('wajib_pajak_id') == $wajibPajak->id ? 'selected' : ''); ?>

                        >

                            <?php echo e($wajibPajak->nama); ?> - NIK: <?php echo e($wajibPajak->nik); ?>


                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

                <?php $__errorArgs = ['wajib_pajak_id'];
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
                    for="nama_objek"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Nama Objek Pajak
                </label>

                <input
                    type="text"
                    name="nama_objek"
                    id="nama_objek"
                    value="<?php echo e(old('nama_objek')); ?>"
                    placeholder="Contoh: Rumah Budi Santoso"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                >

                <?php $__errorArgs = ['nama_objek'];
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
                    for="jenis_objek"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Jenis Objek
                </label>

                <select
                    name="jenis_objek"
                    id="jenis_objek"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                >

                    <option value="">
                        -- Pilih Jenis --
                    </option>

                    <option
                        value="Rumah"
                        <?php echo e(old('jenis_objek') == 'Rumah' ? 'selected' : ''); ?>

                    >
                        Rumah
                    </option>

                    <option
                        value="Tanah"
                        <?php echo e(old('jenis_objek') == 'Tanah' ? 'selected' : ''); ?>

                    >
                        Tanah
                    </option>

                    <option
                        value="Ruko"
                        <?php echo e(old('jenis_objek') == 'Ruko' ? 'selected' : ''); ?>

                    >
                        Ruko
                    </option>

                    <option
                        value="Usaha"
                        <?php echo e(old('jenis_objek') == 'Usaha' ? 'selected' : ''); ?>

                    >
                        Usaha
                    </option>

                    <option
                        value="Hotel"
                        <?php echo e(old('jenis_objek') == 'Hotel' ? 'selected' : ''); ?>

                    >
                        Hotel
                    </option>

                    <option
                        value="Restoran"
                        <?php echo e(old('jenis_objek') == 'Restoran' ? 'selected' : ''); ?>

                    >
                        Restoran
                    </option>

                    <option
                        value="Kendaraan"
                        <?php echo e(old('jenis_objek') == 'Kendaraan' ? 'selected' : ''); ?>

                    >
                        Kendaraan
                    </option>

                </select>

                <?php $__errorArgs = ['jenis_objek'];
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
                    for="alamat_objek"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Alamat Objek Pajak
                </label>

                <textarea
                    name="alamat_objek"
                    id="alamat_objek"
                    rows="4"
                    placeholder="Masukkan alamat objek pajak"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                ><?php echo e(old('alamat_objek')); ?></textarea>

                <?php $__errorArgs = ['alamat_objek'];
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
                    for="nilai_objek"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Nilai Objek
                </label>

                <input
                    type="number"
                    name="nilai_objek"
                    id="nilai_objek"
                    value="<?php echo e(old('nilai_objek')); ?>"
                    placeholder="Contoh: 250000000"
                    min="0"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                >

                <?php $__errorArgs = ['nilai_objek'];
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


        
        <div class="mt-8 flex items-center justify-end gap-3">

            <a
                href="<?php echo e(route('objek-pajak.index')); ?>"
                class="rounded-lg bg-gray-100 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-200"
            >
                Batal
            </a>

            <button
                type="submit"
                class="rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow hover:bg-blue-700"
            >
                Simpan
            </button>

        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/objek-pajak/create.blade.php ENDPATH**/ ?>