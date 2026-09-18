

<?php $__env->startSection('title', 'Tunggakan Pajak'); ?>

<?php $__env->startSection('content'); ?>


<div class="mb-7 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <div class="flex items-center gap-3">

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-red-50 text-red-600">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path d="M12 3 2.8 19a1.5 1.5 0 0 0 1.3 2.2h15.8a1.5 1.5 0 0 0 1.3-2.2L12 3Z"></path>
                    <path d="M12 9v4M12 17h.01"></path>
                </svg>
            </div>

            <div>
                <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                    Tunggakan Pajak
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Daftar tagihan pajak yang belum diselesaikan oleh wajib pajak
                </p>
            </div>

        </div>
    </div>

</div>



<div class="mb-7 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

    
    <div class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Total Tunggakan
                </p>

                <p class="mt-2 text-xl font-bold tracking-tight text-red-600">
                    Rp <?php echo e(number_format($totalTunggakan, 0, ',', '.')); ?>

                </p>
            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-red-50 text-red-600 transition duration-200 group-hover:scale-105">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path d="M12 3 2.8 19a1.5 1.5 0 0 0 1.3 2.2h15.8a1.5 1.5 0 0 0 1.3-2.2L12 3Z"></path>
                    <path d="M12 9v4M12 17h.01"></path>
                </svg>

            </div>

        </div>

        <p class="mt-4 text-xs text-slate-400">
            Nilai yang masih harus dibayar
        </p>

    </div>


    
    <div class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Jumlah Tunggakan
                </p>

                <p class="mt-2 text-2xl font-bold tracking-tight text-slate-800">
                    <?php echo e(number_format($jumlahTunggakan, 0, ',', '.')); ?>

                </p>
            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-[#1769AA] transition duration-200 group-hover:scale-105">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path d="M4 5h16M4 9h16M4 13h16M4 17h10"></path>
                </svg>

            </div>

        </div>

        <p class="mt-4 text-xs text-slate-400">
            Tagihan yang belum lunas
        </p>

    </div>


    
    <div class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Jatuh Tempo
                </p>

                <p class="mt-2 text-2xl font-bold tracking-tight text-amber-600">
                    <?php echo e(number_format($jumlahJatuhTempo, 0, ',', '.')); ?>

                </p>
            </div>

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-amber-50 text-amber-600 transition duration-200 group-hover:scale-105">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <rect x="3.5" y="5" width="17" height="15" rx="2.5"></rect>
                    <path d="M7 3v4M17 3v4M3.5 9h17"></path>
                    <path d="M12 12v3l2 1"></path>
                </svg>

            </div>

        </div>

        <p class="mt-4 text-xs text-slate-400">
            Tagihan yang telah melewati jatuh tempo
        </p>

    </div>


    
    <div class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

        <div class="flex items-start justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Sudah Dibayar
                </p>

                <p class="mt-2 text-xl font-bold tracking-tight text-emerald-600">
                    Rp <?php echo e(number_format($totalSudahDibayar, 0, ',', '.')); ?>

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
                    <path d="M5 12.5 9.5 17 19 7.5"></path>
                </svg>

            </div>

        </div>

        <p class="mt-4 text-xs text-slate-400">
            Akumulasi pembayaran yang diterima
        </p>

    </div>

</div>



<div class="mb-7 overflow-visible rounded-2xl border border-slate-200/80 bg-white shadow-sm">

    
    <div class="border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white px-6 py-5">

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
                    Cari & Filter Tunggakan
                </h3>

                <p class="mt-0.5 text-xs text-slate-500">
                    Gunakan pencarian dan filter untuk menemukan data tunggakan dengan cepat.
                </p>

            </div>

        </div>

    </div>


    
    <div class="p-6">

        <form
            action="<?php echo e(route('tunggakan.index')); ?>"
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

                        <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-4 text-slate-400">

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
                            placeholder="Nomor tagihan, nama, NIK, atau objek pajak..."
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-12 pr-4 text-sm text-slate-700 outline-none transition duration-200 placeholder:text-slate-400 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>

                </div>


                
                <div class="lg:col-span-2">

                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Tahun Pajak
                    </label>

                    <div class="relative" data-dropdown>

                        <input
                            type="hidden"
                            name="tahun"
                            id="tahun"
                            value="<?php echo e(request('tahun')); ?>"
                        >

                        <button
                            type="button"
                            data-dropdown-button
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50/60 px-4 text-left text-sm font-medium text-slate-700 outline-none transition duration-200 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                            <span class="flex min-w-0 items-center gap-3">

                                <span class="flex h-5 w-5 shrink-0 items-center justify-center text-[#1769AA]">

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

                                </span>

                                <span
                                    data-dropdown-label
                                    class="truncate"
                                >
                                    <?php echo e(request('tahun') ?: 'Semua Tahun'); ?>

                                </span>

                            </span>

                            <svg
                                data-dropdown-chevron
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0 text-slate-400 transition duration-200"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>

                        </button>


                        <div
                            data-dropdown-menu
                            class="invisible absolute left-0 right-0 top-[58px] z-[80] origin-top scale-95 rounded-xl border border-slate-200 bg-white p-1.5 opacity-0 shadow-xl shadow-slate-200/50 transition duration-150"
                        >

                            <button
                                type="button"
                                data-dropdown-option
                                data-value=""
                                data-label="Semua Tahun"
                                class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >
                                <span>Semua Tahun</span>

                                <svg
                                    data-check
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="hidden h-4 w-4 text-[#1769AA]"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.5"
                                >
                                    <path d="m5 12 4 4L19 6"></path>
                                </svg>
                            </button>

                            <?php $__currentLoopData = $tahunTersedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <button
                                    type="button"
                                    data-dropdown-option
                                    data-value="<?php echo e($tahun); ?>"
                                    data-label="<?php echo e($tahun); ?>"
                                    class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                                >

                                    <span><?php echo e($tahun); ?></span>

                                    <svg
                                        data-check
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="hidden h-4 w-4 text-[#1769AA]"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2.5"
                                    >
                                        <path d="m5 12 4 4L19 6"></path>
                                    </svg>

                                </button>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>

                </div>


                
                <div class="lg:col-span-3">

                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Jenis Pajak
                    </label>

                    <div class="relative" data-dropdown>

                        <input
                            type="hidden"
                            name="jenis"
                            id="jenis"
                            value="<?php echo e(request('jenis')); ?>"
                        >

                        <button
                            type="button"
                            data-dropdown-button
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50/60 px-4 text-left text-sm font-medium text-slate-700 outline-none transition duration-200 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                            <span class="flex min-w-0 items-center gap-3">

                                <span class="flex h-5 w-5 shrink-0 items-center justify-center text-[#1769AA]">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-[18px] w-[18px]"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path d="M4 5h16M6 5v14M18 5v14M9 9h6M9 13h6M9 17h6"></path>
                                    </svg>

                                </span>

                                <span
                                    data-dropdown-label
                                    class="truncate"
                                >
                                    <?php if(request('jenis')): ?>
                                        <?php echo e(optional($jenisPajaks->firstWhere('id', request('jenis')))->nama ?? 'Jenis Pajak'); ?>

                                    <?php else: ?>
                                        Semua Jenis Pajak
                                    <?php endif; ?>
                                </span>

                            </span>

                            <svg
                                data-dropdown-chevron
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0 text-slate-400 transition duration-200"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>

                        </button>


                        <div
                            data-dropdown-menu
                            class="invisible absolute left-0 right-0 top-[58px] z-[80] max-h-64 origin-top scale-95 overflow-y-auto rounded-xl border border-slate-200 bg-white p-1.5 opacity-0 shadow-xl shadow-slate-200/50 transition duration-150"
                        >

                            <button
                                type="button"
                                data-dropdown-option
                                data-value=""
                                data-label="Semua Jenis Pajak"
                                class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >

                                <span>
                                    Semua Jenis Pajak
                                </span>

                                <svg
                                    data-check
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="hidden h-4 w-4 text-[#1769AA]"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.5"
                                >
                                    <path d="m5 12 4 4L19 6"></path>
                                </svg>

                            </button>

                            <?php $__currentLoopData = $jenisPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisPajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <button
                                    type="button"
                                    data-dropdown-option
                                    data-value="<?php echo e($jenisPajak->id); ?>"
                                    data-label="<?php echo e($jenisPajak->nama); ?>"
                                    class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                                >

                                    <span>
                                        <?php echo e($jenisPajak->nama); ?>

                                    </span>

                                    <svg
                                        data-check
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="hidden h-4 w-4 text-[#1769AA]"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2.5"
                                    >
                                        <path d="m5 12 4 4L19 6"></path>
                                    </svg>

                                </button>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>

                </div>


                
                <div class="lg:col-span-2">

                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Status
                    </label>

                    <div class="relative" data-dropdown>

                        <input
                            type="hidden"
                            name="status"
                            id="status"
                            value="<?php echo e(request('status')); ?>"
                        >

                        <button
                            type="button"
                            data-dropdown-button
                            class="flex h-[52px] w-full items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50/60 px-4 text-left text-sm font-medium text-slate-700 outline-none transition duration-200 hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                            <span class="flex min-w-0 items-center gap-3">

                                <span class="flex h-5 w-5 shrink-0 items-center justify-center text-[#1769AA]">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-[18px] w-[18px]"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <circle cx="12" cy="12" r="8.5"></circle>
                                        <path d="m8.5 12 2.3 2.3 4.8-5"></path>
                                    </svg>

                                </span>

                                <span
                                    data-dropdown-label
                                    class="truncate"
                                >
                                    <?php switch(request('status')):

                                        case ('belum_bayar'): ?>
                                            Belum Bayar
                                            <?php break; ?>

                                        <?php case ('sebagian'): ?>
                                            Sebagian
                                            <?php break; ?>

                                        <?php case ('jatuh_tempo'): ?>
                                            Jatuh Tempo
                                            <?php break; ?>

                                        <?php default: ?>
                                            Semua Status

                                    <?php endswitch; ?>
                                </span>

                            </span>

                            <svg
                                data-dropdown-chevron
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0 text-slate-400 transition duration-200"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>

                        </button>


                        <div
                            data-dropdown-menu
                            class="invisible absolute left-0 right-0 top-[58px] z-[80] origin-top rounded-xl border border-slate-200 bg-white p-1.5 opacity-0 shadow-xl shadow-slate-200/50 transition duration-150"
                        >

                            <button
                                type="button"
                                data-dropdown-option
                                data-value=""
                                data-label="Semua Status"
                                class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >

                                <span>Semua Status</span>

                                <svg
                                    data-check
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="hidden h-4 w-4 text-[#1769AA]"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.5"
                                >
                                    <path d="m5 12 4 4L19 6"></path>
                                </svg>

                            </button>


                            <button
                                type="button"
                                data-dropdown-option
                                data-value="belum_bayar"
                                data-label="Belum Bayar"
                                class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >

                                <span>Belum Bayar</span>

                                <svg
                                    data-check
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="hidden h-4 w-4 text-[#1769AA]"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.5"
                                >
                                    <path d="m5 12 4 4L19 6"></path>
                                </svg>

                            </button>


                            <button
                                type="button"
                                data-dropdown-option
                                data-value="sebagian"
                                data-label="Sebagian"
                                class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >

                                <span>Sebagian</span>

                                <svg
                                    data-check
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="hidden h-4 w-4 text-[#1769AA]"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.5"
                                >
                                    <path d="m5 12 4 4L19 6"></path>
                                </svg>

                            </button>


                            <button
                                type="button"
                                data-dropdown-option
                                data-value="jatuh_tempo"
                                data-label="Jatuh Tempo"
                                class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm font-medium text-slate-600 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >

                                <span>Jatuh Tempo</span>

                                <svg
                                    data-check
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="hidden h-4 w-4 text-[#1769AA]"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.5"
                                >
                                    <path d="m5 12 4 4L19 6"></path>
                                </svg>

                            </button>

                        </div>

                    </div>

                </div>

            </div>


            
            <div class="flex flex-col gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:items-center sm:justify-end">

                <div class="mr-auto hidden text-xs text-slate-400 lg:block">
                    Filter akan diterapkan pada tabel dan statistik.
                </div>


                <?php if(
                    request()->filled('search') ||
                    request()->filled('tahun') ||
                    request()->filled('jenis') ||
                    request()->filled('status')
                ): ?>

                    <a
                        href="<?php echo e(route('tunggakan.index')); ?>"
                        class="inline-flex h-[48px] items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 text-sm font-semibold text-slate-600 transition duration-200 hover:border-slate-300 hover:bg-slate-50"
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


                <button
                    type="submit"
                    class="group inline-flex h-[48px] items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-6 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md"
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

                    Terapkan Filter

                </button>

            </div>

        </form>

    </div>

</div>



<div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

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
                <?php echo e($tunggakans->total()); ?>

            </span>

            data tunggakan

            <?php if(
                request()->filled('search') ||
                request()->filled('tahun') ||
                request()->filled('jenis') ||
                request()->filled('status')
            ): ?>

                <span class="text-slate-400">
                    dari hasil filter
                </span>

            <?php endif; ?>

        </p>

    </div>

</div>



<div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm">

    <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-slate-100">

            <thead class="bg-slate-50/80">

                <tr>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        No
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Nomor Tagihan
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Wajib Pajak
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Jenis Pajak
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Tahun
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Total Tagihan
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Sudah Dibayar
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Sisa
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Jatuh Tempo
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Status
                    </th>

                    <th class="whitespace-nowrap px-6 py-4 text-center text-[11px] font-bold uppercase tracking-[0.08em] text-slate-500">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100 bg-white">

                <?php $__empty_1 = true; $__currentLoopData = $tunggakans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tunggakan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <?php

                        $totalTagihan = (float) $tunggakan->total_tagihan;

                        $totalDibayar = (float) (
                            $tunggakan->pembayarans_sum_jumlah_bayar ?? 0
                        );

                        $sisa = max(
                            $totalTagihan - $totalDibayar,
                            0
                        );

                    ?>


                    <tr class="group transition duration-150 hover:bg-blue-50/30">

                        
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                            <?php echo e($tunggakans->firstItem() + $loop->index); ?>

                        </td>


                        
                        <td class="whitespace-nowrap px-6 py-4">

                            <div class="font-semibold text-slate-800">
                                <?php echo e($tunggakan->nomor_tagihan); ?>

                            </div>

                            <div class="mt-1 text-xs text-slate-400">
                                ID #<?php echo e($tunggakan->id); ?>

                            </div>

                        </td>


                        
                        <td class="px-6 py-4">

                            <div class="whitespace-nowrap font-semibold text-slate-800">
                                <?php echo e($tunggakan->wajibPajak->nama ?? '-'); ?>

                            </div>

                            <?php if($tunggakan->wajibPajak?->nik): ?>

                                <div class="mt-1 text-xs text-slate-500">
                                    NIK: <?php echo e($tunggakan->wajibPajak->nik); ?>

                                </div>

                            <?php endif; ?>

                        </td>


                        
                        <td class="whitespace-nowrap px-6 py-4">

                            <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-[#1769AA]">
                                <?php echo e($tunggakan->jenisPajak->nama ?? '-'); ?>

                            </span>

                        </td>


                        
                        <td class="whitespace-nowrap px-6 py-4">

                            <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                                <?php echo e($tunggakan->tahun_pajak ?? '-'); ?>

                            </span>

                        </td>


                        
                        <td class="whitespace-nowrap px-6 py-4">

                            <span class="font-bold text-slate-800">
                                Rp <?php echo e(number_format($totalTagihan, 0, ',', '.')); ?>

                            </span>

                        </td>


                        
                        <td class="whitespace-nowrap px-6 py-4">

                            <span class="font-semibold text-emerald-600">
                                Rp <?php echo e(number_format($totalDibayar, 0, ',', '.')); ?>

                            </span>

                        </td>


                        
                        <td class="whitespace-nowrap px-6 py-4">

                            <span class="font-bold text-red-600">
                                Rp <?php echo e(number_format($sisa, 0, ',', '.')); ?>

                            </span>

                        </td>


                        
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">

                            <?php echo e($tunggakan->tanggal_jatuh_tempo?->format('d/m/Y') ?? '-'); ?>


                        </td>


                        
                        <td class="whitespace-nowrap px-6 py-4">

                            <?php if($tunggakan->status === 'jatuh_tempo'): ?>

                                <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">

                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                    Jatuh Tempo

                                </span>

                            <?php elseif($tunggakan->status === 'sebagian'): ?>

                                <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">

                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                    Sebagian

                                </span>

                            <?php else: ?>

                                <span class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-[#1769AA]">

                                    <span class="h-1.5 w-1.5 rounded-full bg-[#1769AA]"></span>

                                    Belum Bayar

                                </span>

                            <?php endif; ?>

                        </td>


                        
                        <td class="whitespace-nowrap px-6 py-4">

                            <div class="flex items-center justify-center gap-2">

                                <a
                                    href="<?php echo e(route('tagihan.show', $tunggakan)); ?>"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-200 hover:text-slate-800"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3.5 w-3.5"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"></path>
                                        <circle cx="12" cy="12" r="2.5"></circle>
                                    </svg>

                                    Detail

                                </a>


                                <a
                                    href="<?php echo e(route('pembayaran.create', ['tagihan_id' => $tunggakan->id])); ?>"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-[#1769AA]/10 px-3 py-2 text-xs font-semibold text-[#1769AA] transition hover:bg-[#1769AA]/15"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-3.5 w-3.5"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path d="M12 3v18"></path>
                                        <path d="M17 7.5c0-1.7-2.2-3-5-3s-5 1.3-5 3 2.2 3 5 3 5 1.3 5 3-2.2 3-5 3-5-1.3-5-3"></path>
                                    </svg>

                                    Bayar

                                </a>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td
                            colspan="11"
                            class="px-6 py-16 text-center"
                        >

                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-7 w-7"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                >
                                    <path d="m5 12 4 4L19 6"></path>
                                </svg>

                            </div>

                            <h3 class="mt-4 text-sm font-bold text-slate-800">
                                Tidak ada tunggakan
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Tidak ditemukan data tunggakan sesuai pencarian atau filter.
                            </p>

                            <?php if(
                                request()->filled('search') ||
                                request()->filled('tahun') ||
                                request()->filled('jenis') ||
                                request()->filled('status')
                            ): ?>

                                <a
                                    href="<?php echo e(route('tunggakan.index')); ?>"
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

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>


    
    <?php if($tunggakans->hasPages()): ?>

        <div class="border-t border-slate-100 px-6 py-4">

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                <p class="text-sm text-slate-500">

                    Menampilkan

                    <span class="font-semibold text-slate-700">
                        <?php echo e($tunggakans->firstItem()); ?>

                    </span>

                    -

                    <span class="font-semibold text-slate-700">
                        <?php echo e($tunggakans->lastItem()); ?>

                    </span>

                    dari

                    <span class="font-semibold text-slate-700">
                        <?php echo e($tunggakans->total()); ?>

                    </span>

                    tunggakan

                </p>

                <div>
                    <?php echo e($tunggakans->links()); ?>

                </div>

            </div>

        </div>

    <?php endif; ?>

</div>



<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdowns = document.querySelectorAll('[data-dropdown]');

    function closeAllDropdowns(except = null) {

        dropdowns.forEach(function (dropdown) {

            if (dropdown === except) {
                return;
            }

            const menu = dropdown.querySelector('[data-dropdown-menu]');
            const button = dropdown.querySelector('[data-dropdown-button]');
            const chevron = dropdown.querySelector('[data-dropdown-chevron]');

            if (!menu || !button) {
                return;
            }

            menu.classList.add('invisible', 'opacity-0', 'scale-95');
            menu.classList.remove('visible', 'opacity-100', 'scale-100');

            button.classList.remove(
                'border-[#1769AA]',
                'bg-white',
                'ring-4',
                'ring-blue-50'
            );

            if (chevron) {
                chevron.classList.remove('rotate-180');
            }
        });

    }


    dropdowns.forEach(function (dropdown) {

        const button = dropdown.querySelector('[data-dropdown-button]');
        const menu = dropdown.querySelector('[data-dropdown-menu]');
        const input = dropdown.querySelector('input[type="hidden"]');
        const label = dropdown.querySelector('[data-dropdown-label]');
        const chevron = dropdown.querySelector('[data-dropdown-chevron]');
        const options = dropdown.querySelectorAll('[data-dropdown-option]');

        if (!button || !menu || !input || !label) {
            return;
        }


        function updateSelectedOption() {

            const currentValue = input.value;

            options.forEach(function (option) {

                const check = option.querySelector('[data-check]');
                const optionValue = option.dataset.value;

                if (optionValue === currentValue) {

                    option.classList.add(
                        'bg-blue-50',
                        'text-[#1769AA]'
                    );

                    option.classList.remove(
                        'text-slate-600'
                    );

                    if (check) {
                        check.classList.remove('hidden');
                    }

                } else {

                    option.classList.remove(
                        'bg-blue-50',
                        'text-[#1769AA]'
                    );

                    option.classList.add(
                        'text-slate-600'
                    );

                    if (check) {
                        check.classList.add('hidden');
                    }

                }

            });

        }


        button.addEventListener('click', function (event) {

            event.stopPropagation();

            const isOpen = menu.classList.contains('visible');

            closeAllDropdowns(dropdown);

            if (isOpen) {

                menu.classList.add(
                    'invisible',
                    'opacity-0',
                    'scale-95'
                );

                menu.classList.remove(
                    'visible',
                    'opacity-100',
                    'scale-100'
                );

                button.classList.remove(
                    'border-[#1769AA]',
                    'bg-white',
                    'ring-4',
                    'ring-blue-50'
                );

                if (chevron) {
                    chevron.classList.remove('rotate-180');
                }

                return;
            }


            menu.classList.remove(
                'invisible',
                'opacity-0',
                'scale-95'
            );

            menu.classList.add(
                'visible',
                'opacity-100',
                'scale-100'
            );

            button.classList.add(
                'border-[#1769AA]',
                'bg-white',
                'ring-4',
                'ring-blue-50'
            );

            if (chevron) {
                chevron.classList.add('rotate-180');
            }

        });


        options.forEach(function (option) {

            option.addEventListener('click', function (event) {

                event.preventDefault();
                event.stopPropagation();

                const value = option.dataset.value ?? '';
                const text = option.dataset.label ?? '';

                input.value = value;

                label.textContent = text;

                updateSelectedOption();

                menu.classList.add(
                    'invisible',
                    'opacity-0',
                    'scale-95'
                );

                menu.classList.remove(
                    'visible',
                    'opacity-100',
                    'scale-100'
                );

                button.classList.remove(
                    'border-[#1769AA]',
                    'bg-white',
                    'ring-4',
                    'ring-blue-50'
                );

                if (chevron) {
                    chevron.classList.remove('rotate-180');
                }

            });

        });


        updateSelectedOption();

    });


    document.addEventListener('click', function () {
        closeAllDropdowns();
    });

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/tunggakan/index.blade.php ENDPATH**/ ?>