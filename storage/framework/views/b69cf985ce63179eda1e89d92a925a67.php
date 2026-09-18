

<?php $__env->startSection('title', 'Edit Objek Pajak - SIPANDA'); ?>

<?php $__env->startSection('content'); ?>

<div class="space-y-7">

    
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <div>

            <div class="mb-2 flex items-center gap-2">

                <span class="h-2 w-2 rounded-full bg-[#1769AA]"></span>

                <span class="text-xs font-bold uppercase tracking-widest text-[#1769AA]">
                    Data Perpajakan
                </span>

            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                Edit Objek Pajak
            </h1>

            <p class="mt-1 max-w-2xl text-sm text-slate-500">
                Perbarui informasi objek pajak yang terdaftar pada sistem.
            </p>

        </div>


        <a
            href="<?php echo e(route('objek-pajak.index')); ?>"
            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-50"
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
                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                />
            </svg>

            Kembali

        </a>

    </div>


    
    <?php if($errors->any()): ?>

        <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4">

            <div class="flex items-start gap-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">

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
                            d="M12 8v4m0 4h.01M10.29 3.86l-7.6 13.17A2 2 0 004.42 20h15.16a2 2 0 001.73-2.97l-7.6-13.17a2 2 0 00-3.42 0z"
                        />
                    </svg>

                </div>


                <div>

                    <p class="text-sm font-bold text-red-800">
                        Data belum dapat diperbarui
                    </p>

                    <ul class="mt-1 space-y-0.5 text-sm text-red-700">

                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>
                                <?php echo e($error); ?>

                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                </div>

            </div>

        </div>

    <?php endif; ?>


    
    <div class="overflow-visible rounded-2xl border border-slate-200 bg-white shadow-sm">

        
        <div class="border-b border-slate-100 px-6 py-5">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F4FC] text-[#1769AA]">

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
                            d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                        />
                    </svg>

                </div>


                <div>

                    <h2 class="text-sm font-bold text-slate-900">
                        Informasi Objek Pajak
                    </h2>

                    <p class="mt-0.5 text-xs text-slate-500">
                        Perbarui data sesuai kondisi objek pajak saat ini.
                    </p>

                </div>

            </div>

        </div>


        <form
            action="<?php echo e(route('objek-pajak.update', $objekPajak)); ?>"
            method="POST"
            class="p-6"
        >

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>


            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                
                <div class="md:col-span-2">

                    <label
                        class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600"
                    >
                        Wajib Pajak
                    </label>


                    <div
                        class="custom-filter-dropdown relative z-[60]"
                        data-dropdown
                    >

                        <input
                            type="hidden"
                            name="wajib_pajak_id"
                            value="<?php echo e(old('wajib_pajak_id', $objekPajak->wajib_pajak_id)); ?>"
                        >


                        <button
                            type="button"
                            data-dropdown-button
                            aria-expanded="false"
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 text-left text-sm font-medium text-slate-700 shadow-sm outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                            <span class="flex min-w-0 items-center gap-3">

                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">

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
                                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-10a4 4 0 100-8 4 4 0 000 8zm7 10v-2a4 4 0 00-3-3.87m4-10a4 4 0 010 7.75"
                                        />
                                    </svg>

                                </span>


                                <span
                                    data-dropdown-label
                                    class="truncate"
                                >
                                    <?php
                                        $selectedWajibPajakId = old(
                                            'wajib_pajak_id',
                                            $objekPajak->wajib_pajak_id
                                        );

                                        $selectedWajibPajak = $wajibPajaks->firstWhere(
                                            'id',
                                            $selectedWajibPajakId
                                        );
                                    ?>

                                    <?php if($selectedWajibPajak): ?>

                                        <?php echo e($selectedWajibPajak->nama); ?>

                                        - NIK: <?php echo e($selectedWajibPajak->nik); ?>


                                    <?php else: ?>

                                        Pilih Wajib Pajak

                                    <?php endif; ?>

                                </span>

                            </span>


                            <svg
                                data-dropdown-chevron
                                class="h-4 w-4 shrink-0 text-slate-400 transition-transform duration-200"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 9l6 6 6-6"
                                />
                            </svg>

                        </button>


                        <div
                            data-dropdown-menu
                            class="absolute left-0 right-0 z-[9999] mt-2 hidden max-h-72 overflow-y-auto overflow-x-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70"
                        >

                            <?php $__currentLoopData = $wajibPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wajibPajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <button
                                    type="button"
                                    class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 <?php echo e((string) old('wajib_pajak_id', $objekPajak->wajib_pajak_id) === (string) $wajibPajak->id ? 'bg-blue-50 text-blue-700' : 'text-slate-700'); ?>"
                                    data-value="<?php echo e($wajibPajak->id); ?>"
                                    data-label="<?php echo e($wajibPajak->nama); ?> - NIK: <?php echo e($wajibPajak->nik); ?>"
                                >

                                    <div class="flex items-center gap-3">

                                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">

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
                                                    d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-10a4 4 0 100-8 4 4 0 000 8zm7 10v-2a4 4 0 00-3-3.87m4-10a4 4 0 000 7.75"
                                                />
                                            </svg>

                                        </span>


                                        <span class="min-w-0">

                                            <span class="block truncate font-semibold">
                                                <?php echo e($wajibPajak->nama); ?>

                                            </span>

                                            <span class="mt-0.5 block text-xs text-slate-400">
                                                NIK: <?php echo e($wajibPajak->nik); ?>

                                            </span>

                                        </span>

                                    </div>

                                </button>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>


                    <?php $__errorArgs = ['wajib_pajak_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                        <p class="mt-2 text-sm font-medium text-red-600">
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
                        class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600"
                    >
                        Nama Objek Pajak
                    </label>


                    <div class="relative">

                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">

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
                                    d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"
                                />
                            </svg>

                        </span>


                        <input
                            type="text"
                            name="nama_objek"
                            id="nama_objek"
                            value="<?php echo e(old('nama_objek', $objekPajak->nama_objek)); ?>"
                            placeholder="Contoh: Rumah Budi Santoso"
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                    </div>


                    <?php $__errorArgs = ['nama_objek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                        <p class="mt-2 text-sm font-medium text-red-600">
                            <?php echo e($message); ?>

                        </p>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>


                
                <div>

                    <label
                        class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600"
                    >
                        Jenis Objek
                    </label>


                    <div
                        class="custom-filter-dropdown relative z-[50]"
                        data-dropdown
                    >

                        <input
                            type="hidden"
                            name="jenis_objek"
                            value="<?php echo e(old('jenis_objek', $objekPajak->jenis_objek)); ?>"
                        >


                        <button
                            type="button"
                            data-dropdown-button
                            aria-expanded="false"
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 text-left text-sm font-medium text-slate-700 shadow-sm outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                            <span class="flex min-w-0 items-center gap-3">

                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">

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
                                            d="M4 19V5m0 14h16M8 17V9m4 8V6m4 11V4"
                                        />
                                    </svg>

                                </span>


                                <span data-dropdown-label class="truncate">
                                    <?php echo e(old('jenis_objek', $objekPajak->jenis_objek) ?: 'Pilih Jenis Objek'); ?>

                                </span>

                            </span>


                            <svg
                                data-dropdown-chevron
                                class="h-4 w-4 shrink-0 text-slate-400 transition-transform duration-200"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 9l6 6 6-6"
                                />
                            </svg>

                        </button>


                        <div
                            data-dropdown-menu
                            class="absolute left-0 right-0 z-[9999] mt-2 hidden max-h-64 overflow-y-auto overflow-x-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70"
                        >

                            <?php
                                $jenisObjekOptions = [
                                    'Rumah',
                                    'Tanah',
                                    'Ruko',
                                    'Usaha',
                                    'Hotel',
                                    'Restoran',
                                    'Kendaraan',
                                ];

                                $selectedJenisObjek = old(
                                    'jenis_objek',
                                    $objekPajak->jenis_objek
                                );
                            ?>


                            <?php $__currentLoopData = $jenisObjekOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <button
                                    type="button"
                                    class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 <?php echo e($selectedJenisObjek === $jenis ? 'bg-blue-50 text-blue-700' : 'text-slate-700'); ?>"
                                    data-value="<?php echo e($jenis); ?>"
                                    data-label="<?php echo e($jenis); ?>"
                                >

                                    <div class="flex items-center gap-3">

                                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-500">

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
                                                    d="M4 19V5m0 14h16M8 17V9m4 8V6m4 11V4"
                                                />
                                            </svg>

                                        </span>


                                        <span>
                                            <?php echo e($jenis); ?>

                                        </span>

                                    </div>

                                </button>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>


                    <?php $__errorArgs = ['jenis_objek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                        <p class="mt-2 text-sm font-medium text-red-600">
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
                        class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600"
                    >
                        Alamat Objek Pajak
                    </label>


                    <div class="relative">

                        <span class="pointer-events-none absolute left-4 top-5 text-slate-400">

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
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>

                        </span>


                        <textarea
                            name="alamat_objek"
                            id="alamat_objek"
                            rows="4"
                            placeholder="Masukkan alamat lengkap objek pajak..."
                            class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50/60 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-100"
                        ><?php echo e(old('alamat_objek', $objekPajak->alamat_objek)); ?></textarea>

                    </div>


                    <?php $__errorArgs = ['alamat_objek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                        <p class="mt-2 text-sm font-medium text-red-600">
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
                        class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600"
                    >
                        Nilai Objek
                    </label>


                    <div class="relative">

                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs font-bold">
                            Rp
                        </span>


                        <input
                            type="number"
                            name="nilai_objek"
                            id="nilai_objek"
                            value="<?php echo e(old('nilai_objek', $objekPajak->nilai_objek)); ?>"
                            placeholder="Contoh: 250000000"
                            min="0"
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                    </div>


                    <p class="mt-1.5 text-xs text-slate-400">
                        Masukkan nilai objek dalam rupiah.
                    </p>


                    <?php $__errorArgs = ['nilai_objek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                        <p class="mt-2 text-sm font-medium text-red-600">
                            <?php echo e($message); ?>

                        </p>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>


            </div>


            
            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">

                <a
                    href="<?php echo e(route('objek-pajak.index')); ?>"
                    class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-6 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-50"
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
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                    Batal

                </a>


                <button
                    type="submit"
                    class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-6 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
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
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>



<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdowns = document.querySelectorAll('[data-dropdown]');


    dropdowns.forEach(function (dropdown) {

        const button =
            dropdown.querySelector('[data-dropdown-button]');

        const menu =
            dropdown.querySelector('[data-dropdown-menu]');

        const label =
            dropdown.querySelector('[data-dropdown-label]');

        const input =
            dropdown.querySelector('input[type="hidden"]');

        const chevron =
            dropdown.querySelector('[data-dropdown-chevron]');

        const options =
            dropdown.querySelectorAll('.custom-option');


        if (!button || !menu || !label || !input) {
            return;
        }


        button.addEventListener('click', function (event) {

            event.stopPropagation();


            dropdowns.forEach(function (otherDropdown) {

                if (otherDropdown !== dropdown) {

                    const otherMenu =
                        otherDropdown.querySelector(
                            '[data-dropdown-menu]'
                        );

                    const otherButton =
                        otherDropdown.querySelector(
                            '[data-dropdown-button]'
                        );

                    const otherChevron =
                        otherDropdown.querySelector(
                            '[data-dropdown-chevron]'
                        );


                    if (otherMenu) {
                        otherMenu.classList.add('hidden');
                    }


                    if (otherButton) {

                        otherButton.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                    }


                    if (otherChevron) {

                        otherChevron.classList.remove(
                            'rotate-180'
                        );

                    }

                }

            });


            const isHidden =
                menu.classList.contains('hidden');


            if (isHidden) {

                menu.classList.remove('hidden');

                button.setAttribute(
                    'aria-expanded',
                    'true'
                );


                if (chevron) {

                    chevron.classList.add(
                        'rotate-180'
                    );

                }

            } else {

                menu.classList.add('hidden');

                button.setAttribute(
                    'aria-expanded',
                    'false'
                );


                if (chevron) {

                    chevron.classList.remove(
                        'rotate-180'
                    );

                }

            }

        });


        options.forEach(function (option) {

            option.addEventListener('click', function (event) {

                event.stopPropagation();


                const value =
                    option.dataset.value ?? '';

                const selectedLabel =
                    option.dataset.label ?? '';


                input.value =
                    value;

                label.textContent =
                    selectedLabel;


                options.forEach(function (otherOption) {

                    otherOption.classList.remove(
                        'bg-blue-50',
                        'text-blue-700'
                    );

                    otherOption.classList.add(
                        'text-slate-700'
                    );

                });


                option.classList.remove(
                    'text-slate-700'
                );

                option.classList.add(
                    'bg-blue-50',
                    'text-blue-700'
                );


                menu.classList.add('hidden');


                button.setAttribute(
                    'aria-expanded',
                    'false'
                );


                if (chevron) {

                    chevron.classList.remove(
                        'rotate-180'
                    );

                }

            });

        });

    });


    document.addEventListener('click', function () {

        dropdowns.forEach(function (dropdown) {

            const menu =
                dropdown.querySelector(
                    '[data-dropdown-menu]'
                );

            const button =
                dropdown.querySelector(
                    '[data-dropdown-button]'
                );

            const chevron =
                dropdown.querySelector(
                    '[data-dropdown-chevron]'
                );


            if (menu) {

                menu.classList.add(
                    'hidden'
                );

            }


            if (button) {

                button.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }


            if (chevron) {

                chevron.classList.remove(
                    'rotate-180'
                );

            }

        });

    });


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            dropdowns.forEach(function (dropdown) {

                const menu =
                    dropdown.querySelector(
                        '[data-dropdown-menu]'
                    );

                const button =
                    dropdown.querySelector(
                        '[data-dropdown-button]'
                    );

                const chevron =
                    dropdown.querySelector(
                        '[data-dropdown-chevron]'
                    );


                if (menu) {

                    menu.classList.add(
                        'hidden'
                    );

                }


                if (button) {

                    button.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                }


                if (chevron) {

                    chevron.classList.remove(
                        'rotate-180'
                    );

                }

            });

        }

    });

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/objek-pajak/edit.blade.php ENDPATH**/ ?>