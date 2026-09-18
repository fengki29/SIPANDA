

<?php $__env->startSection('title', 'Objek Pajak - SIPANDA'); ?>

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
                Data Objek Pajak
            </h1>

            <p class="mt-1 max-w-2xl text-sm text-slate-500">
                Kelola data objek pajak daerah yang terdaftar pada sistem.
            </p>

        </div>


        <a
            href="<?php echo e(route('objek-pajak.create')); ?>"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
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
                    d="M12 4v16m8-8H4"
                />
            </svg>

            Tambah Objek Pajak

        </a>

    </div>


    
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

        
        <div class="rounded-2xl border border-blue-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wide text-slate-500">
                        Total Objek Pajak
                    </p>

                    <p class="mt-2 text-2xl font-bold text-[#1769AA]">
                        <?php echo e(number_format($totalObjekPajak, 0, ',', '.')); ?>

                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Seluruh objek terdaftar
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4FC] text-[#1769AA]">

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
                            d="M3 10l9-7 9 7v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10z"
                        />
                    </svg>

                </div>

            </div>

        </div>


        
        <div class="rounded-2xl border border-emerald-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wide text-slate-500">
                        Objek Pajak Aktif
                    </p>

                    <p class="mt-2 text-2xl font-bold text-emerald-600">
                        <?php echo e(number_format($jumlahAktif, 0, ',', '.')); ?>

                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Status aktif
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

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

                </div>

            </div>

        </div>


        
        <div class="rounded-2xl border border-red-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wide text-slate-500">
                        Objek Pajak Nonaktif
                    </p>

                    <p class="mt-2 text-2xl font-bold text-red-600">
                        <?php echo e(number_format($jumlahNonaktif, 0, ',', '.')); ?>

                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Status nonaktif
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-600">

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
                            d="M12 9v4m0 4h.01M10.29 3.86l-7.6 13.17A2 2 0 004.42 20h15.16a2 2 0 001.73-2.97l-7.6-13.17a2 2 0 00-3.42 0z"
                        />
                    </svg>

                </div>

            </div>

        </div>

    </div>


    
    <div class="overflow-visible rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

        <div class="mb-5">

            <div class="flex items-center gap-2">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#E8F4FC] text-[#1769AA]">

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
                            d="M3 4h18M6 8h12M9 12h6M11 16h2M12 20v-4"
                        />
                    </svg>

                </div>

                <div>

                    <h3 class="text-sm font-bold text-slate-900">
                        Cari & Filter Data
                    </h3>

                    <p class="mt-0.5 text-xs text-slate-500">
                        Cari berdasarkan nama objek, alamat, nama wajib pajak, atau NIK.
                    </p>

                </div>

            </div>

        </div>


        <form
            action="<?php echo e(route('objek-pajak.index')); ?>"
            method="GET"
        >

            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">

                
                <div class="md:col-span-2">

                    <label
                        for="search"
                        class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600"
                    >
                        Pencarian
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
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                                />
                            </svg>

                        </span>

                        <input
                            type="text"
                            name="search"
                            id="search"
                            value="<?php echo e(request('search')); ?>"
                            placeholder="Cari nama objek, alamat, nama WP, atau NIK..."
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>

                </div>


                
                <div>

                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                        Jenis Objek
                    </label>

                    <div
                        class="relative z-[60]"
                        data-dropdown
                    >

                        <input
                            type="hidden"
                            name="jenis_objek"
                            value="<?php echo e(request('jenis_objek')); ?>"
                        >

                        <button
                            type="button"
                            data-dropdown-button
                            aria-expanded="false"
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50/60 px-4 text-left text-sm font-medium text-slate-700 outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
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

                                <span
                                    data-dropdown-label
                                    class="truncate"
                                >
                                    <?php echo e(request('jenis_objek') ?: 'Semua Jenis'); ?>

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

                            <button
                                type="button"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 <?php echo e(!request('jenis_objek') ? 'bg-blue-50 text-blue-700' : 'text-slate-700'); ?>"
                                data-value=""
                                data-label="Semua Jenis"
                            >
                                Semua Jenis
                            </button>

                            <?php $__currentLoopData = $jenisObjeks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <button
                                    type="button"
                                    class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 <?php echo e(request('jenis_objek') == $jenis ? 'bg-blue-50 text-blue-700' : 'text-slate-700'); ?>"
                                    data-value="<?php echo e($jenis); ?>"
                                    data-label="<?php echo e($jenis); ?>"
                                >
                                    <?php echo e($jenis); ?>

                                </button>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>

                </div>


                
                <div>

                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                        Status
                    </label>

                    <div
                        class="relative z-[50]"
                        data-dropdown
                    >

                        <input
                            type="hidden"
                            name="status"
                            value="<?php echo e(request('status')); ?>"
                        >

                        <button
                            type="button"
                            data-dropdown-button
                            aria-expanded="false"
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50/60 px-4 text-left text-sm font-medium text-slate-700 outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
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
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 12c0 5.591 3.824 10.29 9 11.622C17.176 22.29 21 17.591 21 12c0-1.41-.24-2.764-.682-4.016z"
                                        />
                                    </svg>

                                </span>

                                <span
                                    data-dropdown-label
                                    class="truncate"
                                >
                                    <?php if(request('status') === '1'): ?>
                                        Aktif
                                    <?php elseif(request('status') === '0'): ?>
                                        Nonaktif
                                    <?php else: ?>
                                        Semua Status
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
                            class="absolute left-0 right-0 z-[9999] mt-2 hidden max-h-64 overflow-y-auto overflow-x-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70"
                        >

                            <button
                                type="button"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 <?php echo e(!request()->filled('status') ? 'bg-blue-50 text-blue-700' : 'text-slate-700'); ?>"
                                data-value=""
                                data-label="Semua Status"
                            >
                                Semua Status
                            </button>

                            <button
                                type="button"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 <?php echo e(request('status') === '1' ? 'bg-blue-50 text-blue-700' : 'text-slate-700'); ?>"
                                data-value="1"
                                data-label="Aktif"
                            >
                                Aktif
                            </button>

                            <button
                                type="button"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium transition hover:bg-blue-50 hover:text-blue-700 <?php echo e(request('status') === '0' ? 'bg-blue-50 text-blue-700' : 'text-slate-700'); ?>"
                                data-value="0"
                                data-label="Nonaktif"
                            >
                                Nonaktif
                            </button>

                        </div>

                    </div>

                </div>

            </div>


            
            <div class="mt-4 flex flex-col gap-2 sm:flex-row sm:justify-end">

                <a
                    href="<?php echo e(route('objek-pajak.index')); ?>"
                    class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-50"
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

                    Reset

                </a>


                <button
                    type="submit"
                    class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
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
                            d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                        />
                    </svg>

                    Cari Data

                </button>

            </div>

        </form>

    </div>


    
    <?php if(
        request()->filled('search') ||
        request()->filled('jenis_objek') ||
        request()->filled('status')
    ): ?>

        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

            <p class="text-sm text-slate-600">

                Menampilkan

                <span class="font-semibold text-slate-900">
                    <?php echo e($objekPajaks->total()); ?>

                </span>

                data hasil pencarian.

            </p>

            <a
                href="<?php echo e(route('objek-pajak.index')); ?>"
                class="text-sm font-semibold text-[#1769AA] transition hover:text-[#0D6EAD] hover:underline"
            >
                Hapus semua filter
            </a>

        </div>

    <?php endif; ?>


    
    <?php if(session('success')): ?>

        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4">

            <div class="flex items-center gap-3">

                <svg
                    class="h-5 w-5 text-emerald-600"
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

                <p class="text-sm font-medium text-emerald-700">
                    <?php echo e(session('success')); ?>

                </p>

            </div>

        </div>

    <?php endif; ?>


    
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <?php if($objekPajaks->count() > 0): ?>

            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                No
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Nama Objek
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Wajib Pajak
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Jenis Objek
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Nilai Objek
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        <?php $__currentLoopData = $objekPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $objekPajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr class="transition hover:bg-[#F8FBFE]">

                                <td class="whitespace-nowrap px-6 py-5 text-sm text-slate-400">
                                    <?php echo e($objekPajaks->firstItem() + $index); ?>

                                </td>


                                <td class="px-6 py-5">

                                    <div class="min-w-[180px]">

                                        <p class="text-sm font-bold text-slate-800">
                                            <?php echo e($objekPajak->nama_objek); ?>

                                        </p>

                                        <p class="mt-1 max-w-xs truncate text-xs text-slate-500">
                                            <?php echo e($objekPajak->alamat_objek); ?>

                                        </p>

                                    </div>

                                </td>


                                <td class="px-6 py-5">

                                    <div class="min-w-[170px]">

                                        <p class="text-sm font-semibold text-slate-800">
                                            <?php echo e($objekPajak->wajibPajak->nama ?? '-'); ?>

                                        </p>

                                        <p class="mt-1 text-xs text-slate-500">
                                            NIK: <?php echo e($objekPajak->wajibPajak->nik ?? '-'); ?>

                                        </p>

                                    </div>

                                </td>


                                <td class="whitespace-nowrap px-6 py-5">

                                    <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-[#1769AA]">
                                        <?php echo e($objekPajak->jenis_objek); ?>

                                    </span>

                                </td>


                                <td class="whitespace-nowrap px-6 py-5">

                                    <?php if($objekPajak->nilai_objek !== null): ?>

                                        <span class="text-sm font-semibold text-slate-700">
                                            Rp <?php echo e(number_format($objekPajak->nilai_objek, 0, ',', '.')); ?>

                                        </span>

                                    <?php else: ?>

                                        <span class="text-sm text-slate-400">
                                            -
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <td class="whitespace-nowrap px-6 py-5">

                                    <?php if($objekPajak->status): ?>

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                            Aktif

                                        </span>

                                    <?php else: ?>

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-xs font-bold text-red-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                            Nonaktif

                                        </span>

                                    <?php endif; ?>

                                </td>


                                <td class="whitespace-nowrap px-6 py-5">

                                    <div class="flex items-center gap-2">

                                        <a
                                            href="<?php echo e(route('objek-pajak.show', $objekPajak)); ?>"
                                            class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-700 transition hover:border-blue-200 hover:bg-blue-50 hover:text-[#1769AA]"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="<?php echo e(route('objek-pajak.edit', $objekPajak)); ?>"
                                            class="inline-flex items-center justify-center rounded-lg bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-100"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="<?php echo e(route('objek-pajak.destroy', $objekPajak)); ?>"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus objek pajak ini?')"
                                        >

                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button
                                                type="submit"
                                                class="inline-flex items-center justify-center rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-100"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>

            </div>


            
            <div class="border-t border-slate-200 px-6 py-4">

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <p class="text-sm text-slate-500">

                        Menampilkan

                        <span class="font-semibold text-slate-700">
                            <?php echo e($objekPajaks->firstItem() ?? 0); ?>

                        </span>

                        sampai

                        <span class="font-semibold text-slate-700">
                            <?php echo e($objekPajaks->lastItem() ?? 0); ?>

                        </span>

                        dari

                        <span class="font-semibold text-slate-700">
                            <?php echo e($objekPajaks->total()); ?>

                        </span>

                        data.

                    </p>

                    <div>
                        <?php echo e($objekPajaks->links()); ?>

                    </div>

                </div>

            </div>

        <?php else: ?>

            
            <div class="px-6 py-16 text-center">

                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#E8F4FC] text-[#1769AA]">

                    <svg
                        class="h-7 w-7"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                        />
                    </svg>

                </div>


                <?php if(
                    request()->filled('search') ||
                    request()->filled('jenis_objek') ||
                    request()->filled('status')
                ): ?>

                    <h3 class="mt-4 text-lg font-bold text-slate-800">
                        Data tidak ditemukan
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Tidak ada objek pajak yang sesuai dengan pencarian atau filter.
                    </p>

                    <a
                        href="<?php echo e(route('objek-pajak.index')); ?>"
                        class="mt-5 inline-flex rounded-xl bg-[#1769AA] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0D6EAD]"
                    >
                        Reset Filter
                    </a>

                <?php else: ?>

                    <h3 class="mt-4 text-lg font-bold text-slate-800">
                        Belum ada data objek pajak
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Silakan tambahkan data objek pajak terlebih dahulu.
                    </p>

                    <a
                        href="<?php echo e(route('objek-pajak.create')); ?>"
                        class="mt-5 inline-flex rounded-xl bg-[#1769AA] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0D6EAD]"
                    >
                        + Tambah Objek Pajak
                    </a>

                <?php endif; ?>

            </div>

        <?php endif; ?>

    </div>

</div>



<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdowns = document.querySelectorAll('[data-dropdown]');

    dropdowns.forEach(function (dropdown) {

        const button = dropdown.querySelector('[data-dropdown-button]');
        const menu = dropdown.querySelector('[data-dropdown-menu]');
        const label = dropdown.querySelector('[data-dropdown-label]');
        const input = dropdown.querySelector('input[type="hidden"]');
        const chevron = dropdown.querySelector('[data-dropdown-chevron]');
        const options = dropdown.querySelectorAll('.custom-option');

        if (!button || !menu || !label || !input) {
            return;
        }

        button.addEventListener('click', function (event) {

            event.stopPropagation();

            dropdowns.forEach(function (otherDropdown) {

                if (otherDropdown !== dropdown) {

                    const otherMenu =
                        otherDropdown.querySelector('[data-dropdown-menu]');

                    const otherButton =
                        otherDropdown.querySelector('[data-dropdown-button]');

                    const otherChevron =
                        otherDropdown.querySelector('[data-dropdown-chevron]');

                    if (otherMenu) {
                        otherMenu.classList.add('hidden');
                    }

                    if (otherButton) {
                        otherButton.setAttribute('aria-expanded', 'false');
                    }

                    if (otherChevron) {
                        otherChevron.classList.remove('rotate-180');
                    }

                }

            });

            const isHidden = menu.classList.contains('hidden');

            if (isHidden) {

                menu.classList.remove('hidden');

                button.setAttribute('aria-expanded', 'true');

                if (chevron) {
                    chevron.classList.add('rotate-180');
                }

            } else {

                menu.classList.add('hidden');

                button.setAttribute('aria-expanded', 'false');

                if (chevron) {
                    chevron.classList.remove('rotate-180');
                }

            }

        });


        options.forEach(function (option) {

            option.addEventListener('click', function (event) {

                event.stopPropagation();

                const value = option.dataset.value ?? '';
                const selectedLabel = option.dataset.label ?? '';

                input.value = value;
                label.textContent = selectedLabel;

                options.forEach(function (otherOption) {

                    otherOption.classList.remove(
                        'bg-blue-50',
                        'text-blue-700'
                    );

                    otherOption.classList.add(
                        'text-slate-700'
                    );

                });

                option.classList.remove('text-slate-700');

                option.classList.add(
                    'bg-blue-50',
                    'text-blue-700'
                );

                menu.classList.add('hidden');

                button.setAttribute('aria-expanded', 'false');

                if (chevron) {
                    chevron.classList.remove('rotate-180');
                }

            });

        });

    });


    document.addEventListener('click', function () {

        dropdowns.forEach(function (dropdown) {

            const menu =
                dropdown.querySelector('[data-dropdown-menu]');

            const button =
                dropdown.querySelector('[data-dropdown-button]');

            const chevron =
                dropdown.querySelector('[data-dropdown-chevron]');

            if (menu) {
                menu.classList.add('hidden');
            }

            if (button) {
                button.setAttribute('aria-expanded', 'false');
            }

            if (chevron) {
                chevron.classList.remove('rotate-180');
            }

        });

    });


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            dropdowns.forEach(function (dropdown) {

                const menu =
                    dropdown.querySelector('[data-dropdown-menu]');

                const button =
                    dropdown.querySelector('[data-dropdown-button]');

                const chevron =
                    dropdown.querySelector('[data-dropdown-chevron]');

                if (menu) {
                    menu.classList.add('hidden');
                }

                if (button) {
                    button.setAttribute('aria-expanded', 'false');
                }

                if (chevron) {
                    chevron.classList.remove('rotate-180');
                }

            });

        }

    });

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/objek-pajak/index.blade.php ENDPATH**/ ?>