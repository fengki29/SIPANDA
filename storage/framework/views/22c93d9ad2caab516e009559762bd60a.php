

<?php $__env->startSection('title', 'Pembayaran Pajak'); ?>

<?php $__env->startSection('content'); ?>


<div class="mb-7 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <div class="flex items-center gap-3">

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-blue-700">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <rect x="4" y="3" width="16" height="18" rx="3"></rect>
                    <path d="M8 7h8M8 11h8M8 15h5"></path>
                </svg>

            </div>

            <div>

                <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                    Pembayaran Pajak
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Daftar pembayaran pajak yang telah dicatat
                </p>

            </div>

        </div>
    </div>


    <a
        href="<?php echo e(route('pembayaran.create')); ?>"
        class="group inline-flex items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
    >

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 transition-transform duration-200 group-hover:rotate-90"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
        >
            <path d="M12 5v14M5 12h14"></path>
        </svg>

        Tambah Pembayaran

    </a>

</div>



<?php if(session('success')): ?>

    <div class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-100 bg-emerald-50 px-5 py-4 text-sm text-emerald-700 shadow-sm">

        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-emerald-100">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="m5 12 4 4L19 6"></path>
            </svg>

        </div>

        <div class="pt-1">

            <p class="font-semibold">
                Berhasil
            </p>

            <p class="mt-0.5 text-emerald-600">
                <?php echo e(session('success')); ?>

            </p>

        </div>

    </div>

<?php endif; ?>



<?php if($errors->any()): ?>

    <div class="mb-6 flex items-start gap-3 rounded-2xl border border-red-100 bg-red-50 px-5 py-4 text-sm text-red-700 shadow-sm">

        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-red-100">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M12 8v4M12 16h.01"></path>
                <circle cx="12" cy="12" r="9"></circle>
            </svg>

        </div>

        <div>

            <p class="font-semibold">
                Terjadi kesalahan
            </p>

            <ul class="mt-1 list-inside list-disc space-y-1 text-red-600">

                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li>
                        <?php echo e($error); ?>

                    </li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

        </div>

    </div>

<?php endif; ?>



<div class="mb-7 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

    
    <div class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    Total Transaksi
                </p>

                <p class="mt-2 text-2xl font-bold tracking-tight text-slate-800">
                    <?php echo e(number_format($totalPembayaran, 0, ',', '.')); ?>

                </p>

            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-blue-700 transition duration-200 group-hover:scale-105">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                    <path d="M3 10h18"></path>
                    <path d="M7 15h3"></path>
                </svg>

            </div>

        </div>

        <p class="mt-4 text-xs text-slate-400">
            Seluruh pembayaran tercatat
        </p>

    </div>


    
    <div class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    Total Nominal
                </p>

                <p class="mt-2 text-xl font-bold tracking-tight text-emerald-600">
                    Rp <?php echo e(number_format($totalNominal, 0, ',', '.')); ?>

                </p>

            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 transition duration-200 group-hover:scale-105">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path d="M12 3v18"></path>
                    <path d="M17 7.5c0-1.7-2.2-3-5-3s-5 1.3-5 3 2.2 3 5 3 5 1.3 5 3-2.2 3-5 3-5-1.3-5-3"></path>
                </svg>

            </div>

        </div>

        <p class="mt-4 text-xs text-slate-400">
            Akumulasi seluruh pembayaran
        </p>

    </div>


    
    <div class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    Transfer
                </p>

                <p class="mt-2 text-2xl font-bold tracking-tight text-indigo-600">
                    <?php echo e(number_format($jumlahTransfer, 0, ',', '.')); ?>

                </p>

            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 transition duration-200 group-hover:scale-105">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                    <path d="M7 9h10M7 13h4"></path>
                </svg>

            </div>

        </div>

        <p class="mt-4 text-xs text-slate-400">
            Transaksi melalui transfer
        </p>

    </div>


    
    <div class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    QRIS
                </p>

                <p class="mt-2 text-2xl font-bold tracking-tight text-purple-600">
                    <?php echo e(number_format($jumlahQris, 0, ',', '.')); ?>

                </p>

            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-purple-50 text-purple-600 transition duration-200 group-hover:scale-105">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                    <path d="M8 7h.01M12 7h.01M16 7h.01M8 11h.01M12 11h.01M16 11h.01M8 15h.01M12 15h4"></path>
                </svg>

            </div>

        </div>

        <p class="mt-4 text-xs text-slate-400">
            Transaksi melalui QRIS
        </p>

    </div>

</div>



<div class="relative z-30 mb-7 overflow-visible rounded-2xl border border-slate-200/80 bg-white shadow-sm">

    
    <div class="rounded-t-2xl border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white px-6 py-5">

        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA]">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path d="M4 6h16M7 12h10M10 18h4"></path>
                </svg>

            </div>

            <div>

                <h3 class="text-sm font-bold text-slate-800">
                    Cari & Filter Pembayaran
                </h3>

                <p class="mt-0.5 text-xs text-slate-500">
                    Gunakan pencarian dan filter untuk menemukan transaksi dengan cepat.
                </p>

            </div>

        </div>

    </div>


    
    <div class="relative z-30 overflow-visible p-6">

        <form
            action="<?php echo e(route('pembayaran.index')); ?>"
            method="GET"
            class="space-y-5"
        >

            
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-12">

                
                <div class="lg:col-span-5">

                    <label
                        for="search"
                        class="mb-2 block text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500"
                    >
                        Pencarian
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <circle cx="11" cy="11" r="6.5"></circle>
                                <path d="m16 16 4 4"></path>
                            </svg>

                        </div>

                        <input
                            type="text"
                            name="search"
                            id="search"
                            value="<?php echo e(request('search')); ?>"
                            placeholder="Nomor pembayaran, tagihan, nama, atau NIK..."
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-12 pr-4 text-sm text-slate-700 outline-none transition duration-200 placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>

                </div>


                
                <div class="relative z-40 lg:col-span-2">

                    <label
                        class="mb-2 block text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500"
                    >
                        Tahun Pajak
                    </label>

                    <div class="custom-filter-dropdown relative" data-dropdown>

                        <input
                            type="hidden"
                            name="tahun_pajak"
                            id="tahun_pajak"
                            value="<?php echo e(request('tahun_pajak')); ?>"
                        >

                        <button
                            type="button"
                            data-dropdown-button
                            aria-haspopup="listbox"
                            aria-expanded="false"
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-gray-200 bg-slate-50 px-4 text-left text-sm font-medium text-slate-700 shadow-sm outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                        >

                            <span class="flex min-w-0 items-center gap-2.5">

                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6.75 3.75v3m10.5-3v3M4.5 8.25h15M5.25 5.25h13.5A1.75 1.75 0 0120.5 7v12a1.75 1.75 0 01-1.75 1.75H5.25A1.75 1.75 0 013.5 19V7a1.75 1.75 0 011.75-1.75z"
                                        />
                                    </svg>

                                </span>

                                <span
                                    data-dropdown-label
                                    class="truncate"
                                >
                                    <?php echo e(request('tahun_pajak') ?: 'Semua Tahun'); ?>

                                </span>

                            </span>

                            <svg
                                data-dropdown-chevron
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0 text-slate-400 transition-transform duration-200"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="m6 9 6 6 6-6"/>
                            </svg>

                        </button>


                        <div
                            data-dropdown-menu
                            class="absolute left-0 right-0 z-[100] mt-2 hidden max-h-64 overflow-y-auto overflow-x-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70"
                        >

                            <button
                                type="button"
                                data-value=""
                                data-label="Semua Tahun"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Semua Tahun
                            </button>

                            <?php $__currentLoopData = $tahunPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <button
                                    type="button"
                                    data-value="<?php echo e($tahun); ?>"
                                    data-label="<?php echo e($tahun); ?>"
                                    class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                                >
                                    <?php echo e($tahun); ?>

                                </button>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>

                </div>


                
                <div class="relative z-50 lg:col-span-2">

                    <label
                        class="mb-2 block text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500"
                    >
                        Metode Pembayaran
                    </label>

                    <div class="custom-filter-dropdown relative" data-dropdown>

                        <input
                            type="hidden"
                            name="metode_pembayaran"
                            id="metode_pembayaran"
                            value="<?php echo e(request('metode_pembayaran')); ?>"
                        >

                        <button
                            type="button"
                            data-dropdown-button
                            aria-haspopup="listbox"
                            aria-expanded="false"
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-gray-200 bg-slate-50 px-4 text-left text-sm font-medium text-slate-700 shadow-sm outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                        >

                            <span class="flex min-w-0 items-center gap-2.5">

                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M3.75 6.75h16.5v10.5H3.75V6.75zm0 3h16.5M7.5 15h2.25"
                                        />
                                    </svg>

                                </span>

                                <span
                                    data-dropdown-label
                                    class="truncate"
                                >
                                    <?php echo e([
                                            'tunai' => 'Tunai',
                                            'transfer' => 'Transfer',
                                            'qris' => 'QRIS',
                                            'lainnya' => 'Lainnya'
                                        ][request('metode_pembayaran')] ?? 'Semua Metode'); ?>

                                </span>

                            </span>

                            <svg
                                data-dropdown-chevron
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0 text-slate-400 transition-transform duration-200"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="m6 9 6 6 6-6"/>
                            </svg>

                        </button>


                        <div
                            data-dropdown-menu
                            class="absolute left-0 right-0 z-[100] mt-2 hidden overflow-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70"
                        >

                            <button
                                type="button"
                                data-value=""
                                data-label="Semua Metode"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Semua Metode
                            </button>

                            <button
                                type="button"
                                data-value="tunai"
                                data-label="Tunai"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Tunai
                            </button>

                            <button
                                type="button"
                                data-value="transfer"
                                data-label="Transfer"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Transfer
                            </button>

                            <button
                                type="button"
                                data-value="qris"
                                data-label="QRIS"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                QRIS
                            </button>

                            <button
                                type="button"
                                data-value="lainnya"
                                data-label="Lainnya"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Lainnya
                            </button>

                        </div>

                    </div>

                </div>


                
                <div class="relative z-40 lg:col-span-3">

                    <label
                        class="mb-2 block text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500"
                    >
                        Status Tagihan
                    </label>

                    <div class="custom-filter-dropdown relative" data-dropdown>

                        <input
                            type="hidden"
                            name="status"
                            id="status"
                            value="<?php echo e(request('status')); ?>"
                        >

                        <button
                            type="button"
                            data-dropdown-button
                            aria-haspopup="listbox"
                            aria-expanded="false"
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-gray-200 bg-slate-50 px-4 text-left text-sm font-medium text-slate-700 shadow-sm outline-none transition hover:border-blue-300 hover:bg-blue-50/60 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                        >

                            <span class="flex min-w-0 items-center gap-2.5">

                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-700">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="8.5"
                                        ></circle>

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="m8.5 12 2.3 2.3 4.8-5"
                                        ></path>
                                    </svg>

                                </span>

                                <span
                                    data-dropdown-label
                                    class="truncate"
                                >
                                    <?php echo e([
                                            'belum_bayar' => 'Belum Bayar',
                                            'sebagian' => 'Sebagian',
                                            'lunas' => 'Lunas',
                                            'jatuh_tempo' => 'Jatuh Tempo'
                                        ][request('status')] ?? 'Semua Status'); ?>

                                </span>

                            </span>

                            <svg
                                data-dropdown-chevron
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0 text-slate-400 transition-transform duration-200"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="m6 9 6 6 6-6"/>
                            </svg>

                        </button>


                        <div
                            data-dropdown-menu
                            class="absolute left-0 right-0 z-[100] mt-2 hidden overflow-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-200/70"
                        >

                            <button
                                type="button"
                                data-value=""
                                data-label="Semua Status"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Semua Status
                            </button>

                            <button
                                type="button"
                                data-value="belum_bayar"
                                data-label="Belum Bayar"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Belum Bayar
                            </button>

                            <button
                                type="button"
                                data-value="sebagian"
                                data-label="Sebagian"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Sebagian
                            </button>

                            <button
                                type="button"
                                data-value="lunas"
                                data-label="Lunas"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Lunas
                            </button>

                            <button
                                type="button"
                                data-value="jatuh_tempo"
                                data-label="Jatuh Tempo"
                                class="custom-option w-full rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-700 transition hover:bg-blue-50 hover:text-blue-700"
                            >
                                Jatuh Tempo
                            </button>

                        </div>

                    </div>

                </div>

            </div>


            
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-12">

                
                <div class="lg:col-span-3">

                    <label
                        for="tanggal_mulai"
                        class="mb-2 block text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500"
                    >
                        Dari Tanggal
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-[18px] w-[18px]"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <rect x="3.5" y="5" width="17" height="15" rx="2.5"></rect>
                                <path d="M7 3v4M17 3v4M3.5 9h17"></path>
                            </svg>

                        </div>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            id="tanggal_mulai"
                            value="<?php echo e(request('tanggal_mulai')); ?>"
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition duration-200 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>

                </div>


                
                <div class="lg:col-span-3">

                    <label
                        for="tanggal_selesai"
                        class="mb-2 block text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500"
                    >
                        Sampai Tanggal
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-[18px] w-[18px]"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <rect x="3.5" y="5" width="17" height="15" rx="2.5"></rect>
                                <path d="M7 3v4M17 3v4M3.5 9h17"></path>
                            </svg>

                        </div>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            id="tanggal_selesai"
                            value="<?php echo e(request('tanggal_selesai')); ?>"
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition duration-200 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>

                </div>


                <div class="hidden lg:col-span-3 lg:block"></div>


                
                <div class="flex items-end gap-2 lg:col-span-3">

                    <button
                        type="submit"
                        class="group inline-flex h-[52px] flex-1 items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 transition-transform duration-200 group-hover:scale-110"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <circle cx="11" cy="11" r="6.5"></circle>
                            <path d="m16 16 4 4"></path>
                        </svg>

                        Cari

                    </button>


                    <?php if(
                        request()->filled('search') ||
                        request()->filled('tahun_pajak') ||
                        request()->filled('metode_pembayaran') ||
                        request()->filled('tanggal_mulai') ||
                        request()->filled('tanggal_selesai') ||
                        request()->filled('status')
                    ): ?>

                        <a
                            href="<?php echo e(route('pembayaran.index')); ?>"
                            class="inline-flex h-[52px] items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-600 transition duration-200 hover:border-slate-300 hover:bg-slate-50"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path d="M3 12a9 9 0 1 0 3-6.7"></path>
                                <path d="M3 4v5h5"></path>
                            </svg>

                            Reset

                        </a>

                    <?php endif; ?>

                </div>

            </div>

        </form>

    </div>

</div>



<div class="relative z-10 mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

    <div class="flex items-center gap-2">

        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-[#1769AA]">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <path d="M4 6h16M4 12h16M4 18h10"></path>
            </svg>

        </div>

        <p class="text-sm text-slate-500">

            Menampilkan

            <span class="font-bold text-slate-700">
                <?php echo e($pembayarans->total()); ?>

            </span>

            pembayaran

            <?php if(
                request()->filled('search') ||
                request()->filled('tahun_pajak') ||
                request()->filled('metode_pembayaran') ||
                request()->filled('tanggal_mulai') ||
                request()->filled('tanggal_selesai') ||
                request()->filled('status')
            ): ?>

                <span class="text-slate-400">
                    dari hasil filter
                </span>

            <?php endif; ?>

        </p>

    </div>

</div>



<div class="relative z-10 overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm">

    <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-slate-100">

            <thead class="bg-slate-50/80">

                <tr>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        No
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Nomor Pembayaran
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Wajib Pajak
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Objek Pajak
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Tanggal
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Jumlah
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Metode
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Petugas
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-center text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100 bg-white">

                <?php $__empty_1 = true; $__currentLoopData = $pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembayaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="group transition duration-150 hover:bg-blue-50/30">

                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                            <?php echo e($pembayarans->firstItem() + $loop->index); ?>

                        </td>


                        <td class="whitespace-nowrap px-6 py-4">

                            <div class="font-semibold text-slate-800">
                                <?php echo e($pembayaran->nomor_pembayaran); ?>

                            </div>

                            <div class="mt-1 text-xs text-slate-400">
                                ID #<?php echo e($pembayaran->id); ?>

                            </div>

                        </td>


                        <td class="px-6 py-4">

                            <div class="whitespace-nowrap font-semibold text-slate-800">
                                <?php echo e($pembayaran->tagihan->wajibPajak->nama ?? '-'); ?>

                            </div>

                            <?php if($pembayaran->tagihan?->wajibPajak?->nik): ?>

                                <div class="mt-1 text-xs text-slate-500">
                                    NIK:
                                    <?php echo e($pembayaran->tagihan->wajibPajak->nik); ?>

                                </div>

                            <?php endif; ?>

                            <?php if($pembayaran->tagihan?->nomor_tagihan): ?>

                                <div class="mt-1 text-xs text-slate-400">
                                    Tagihan:
                                    <?php echo e($pembayaran->tagihan->nomor_tagihan); ?>

                                </div>

                            <?php endif; ?>

                        </td>


                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">
                            <?php echo e($pembayaran->tagihan->objekPajak->nama_objek ?? '-'); ?>

                        </td>


                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">
                            <?php echo e($pembayaran->tanggal_pembayaran?->format('d/m/Y') ?? '-'); ?>

                        </td>


                        <td class="whitespace-nowrap px-6 py-4">

                            <span class="font-bold text-slate-800">

                                Rp
                                <?php echo e(number_format(
                                    (float) $pembayaran->jumlah_bayar,
                                    0,
                                    ',',
                                    '.'
                                )); ?>


                            </span>

                        </td>


                        <td class="whitespace-nowrap px-6 py-4">

                            <?php

                                $metode = [
                                    'tunai' => 'Tunai',
                                    'transfer' => 'Transfer',
                                    'qris' => 'QRIS',
                                    'lainnya' => 'Lainnya',
                                ];

                            ?>


                            <?php if($pembayaran->metode_pembayaran === 'transfer'): ?>

                                <span class="inline-flex items-center gap-2 rounded-full bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-700">

                                    <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>

                                    Transfer

                                </span>

                            <?php elseif($pembayaran->metode_pembayaran === 'qris'): ?>

                                <span class="inline-flex items-center gap-2 rounded-full bg-purple-50 px-3 py-1.5 text-xs font-semibold text-purple-700">

                                    <span class="h-1.5 w-1.5 rounded-full bg-purple-500"></span>

                                    QRIS

                                </span>

                            <?php elseif($pembayaran->metode_pembayaran === 'tunai'): ?>

                                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">

                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                    Tunai

                                </span>

                            <?php else: ?>

                                <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">

                                    <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                    <?php echo e($metode[$pembayaran->metode_pembayaran] ?? $pembayaran->metode_pembayaran); ?>


                                </span>

                            <?php endif; ?>

                        </td>


                        <td class="px-6 py-4">

                            <?php if($pembayaran->petugas): ?>

                                <div class="flex items-center gap-3">

                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center overflow-hidden rounded-full border border-slate-200 bg-blue-50 font-bold text-blue-700">

                                        <?php if($pembayaran->petugas->avatar): ?>

                                            <img
                                                src="<?php echo e(asset('storage/' . $pembayaran->petugas->avatar)); ?>"
                                                alt="Foto <?php echo e($pembayaran->petugas->name); ?>"
                                                class="h-full w-full object-cover"
                                            >

                                        <?php else: ?>

                                            <?php echo e(strtoupper(
                                                substr(
                                                    $pembayaran->petugas->name,
                                                    0,
                                                    1
                                                )
                                            )); ?>


                                        <?php endif; ?>

                                    </div>


                                    <div class="min-w-0">

                                        <div class="whitespace-nowrap font-semibold text-slate-800">
                                            <?php echo e($pembayaran->petugas->name); ?>

                                        </div>

                                        <div class="text-xs capitalize text-slate-400">
                                            <?php echo e($pembayaran->petugas->role); ?>

                                        </div>

                                    </div>

                                </div>

                            <?php else: ?>

                                <div class="flex items-center gap-2">

                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-slate-50 text-slate-400">
                                        —
                                    </div>

                                    <div>

                                        <div class="whitespace-nowrap text-sm font-medium text-slate-500">
                                            Tidak tercatat
                                        </div>

                                        <div class="text-xs text-slate-400">
                                            Data lama
                                        </div>

                                    </div>

                                </div>

                            <?php endif; ?>

                        </td>


                        <td class="whitespace-nowrap px-6 py-4">

                            <div class="flex items-center justify-center gap-2">

                                <a
                                    href="<?php echo e(route('pembayaran.show', $pembayaran)); ?>"
                                    class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-200 hover:text-slate-800"
                                >
                                    Detail
                                </a>

                                <a
                                    href="<?php echo e(route('pembayaran.edit', $pembayaran)); ?>"
                                    class="rounded-lg bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-100"
                                >
                                    Edit
                                </a>

                                <form
                                    action="<?php echo e(route('pembayaran.destroy', $pembayaran)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')"
                                >

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button
                                        type="submit"
                                        class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td
                            colspan="9"
                            class="px-6 py-16 text-center"
                        >

                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-[#1769AA]">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-7 w-7"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                >
                                    <rect x="4" y="3" width="16" height="18" rx="3"></rect>
                                    <path d="M8 7h8M8 11h8M8 15h5"></path>
                                </svg>

                            </div>

                            <h3 class="mt-4 text-sm font-bold text-slate-800">
                                Data pembayaran tidak ditemukan
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Tidak ada pembayaran yang sesuai dengan pencarian atau filter.
                            </p>

                            <a
                                href="<?php echo e(route('pembayaran.index')); ?>"
                                class="mt-5 inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path d="M3 12a9 9 0 1 0 3-6.7"></path>
                                    <path d="M3 4v5h5"></path>
                                </svg>

                                Reset Filter

                            </a>

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>


    
    <?php if($pembayarans->hasPages()): ?>

        <div class="border-t border-slate-100 px-6 py-4">

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                <p class="text-sm text-slate-500">

                    Menampilkan

                    <span class="font-semibold text-slate-700">
                        <?php echo e($pembayarans->firstItem()); ?>

                    </span>

                    -

                    <span class="font-semibold text-slate-700">
                        <?php echo e($pembayarans->lastItem()); ?>

                    </span>

                    dari

                    <span class="font-semibold text-slate-700">
                        <?php echo e($pembayarans->total()); ?>

                    </span>

                    pembayaran

                </p>

                <div>
                    <?php echo e($pembayarans->links()); ?>

                </div>

            </div>

        </div>

    <?php endif; ?>

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
                        otherDropdown.querySelector('[data-dropdown-menu]');

                    const otherButton =
                        otherDropdown.querySelector('[data-dropdown-button]');

                    const otherChevron =
                        otherDropdown.querySelector('[data-dropdown-chevron]');


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
                        otherChevron.classList.remove('rotate-180');
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
                    chevron.classList.add('rotate-180');
                }

            } else {

                menu.classList.add('hidden');

                button.setAttribute(
                    'aria-expanded',
                    'false'
                );


                if (chevron) {
                    chevron.classList.remove('rotate-180');
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


                menu.classList.add('hidden');


                button.setAttribute(
                    'aria-expanded',
                    'false'
                );


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

                button.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }


            if (chevron) {
                chevron.classList.remove('rotate-180');
            }

        });

    });


    document.addEventListener('keydown', function (event) {

        if (event.key !== 'Escape') {
            return;
        }


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

                button.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }


            if (chevron) {
                chevron.classList.remove('rotate-180');
            }

        });

    });

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/pembayaran/index.blade.php ENDPATH**/ ?>