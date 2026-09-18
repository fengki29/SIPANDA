

<?php $__env->startSection('title', 'Tagihan Pajak'); ?>

<?php $__env->startSection('content'); ?>

<div class="space-y-6">

    
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <div class="mb-2 flex items-center gap-2 text-xs text-slate-400">
                <span>Beranda</span>

                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 5l7 7-7 7"/>
                </svg>

                <span class="font-semibold text-[#1769AA]">
                    Tagihan Pajak
                </span>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                Tagihan Pajak
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Daftar seluruh tagihan pajak daerah
            </p>
        </div>

        <a
            href="<?php echo e(route('tagihan.create')); ?>"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 py-3 text-xs font-bold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#12598F] hover:shadow-md"
        >
            <svg class="h-4 w-4"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>

            Tambah Tagihan
        </a>

    </div>


    
    <?php if(session('success')): ?>
        <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700 shadow-sm">

            <svg class="mt-0.5 h-5 w-5 shrink-0"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M5 13l4 4L19 7"/>
            </svg>

            <span><?php echo e(session('success')); ?></span>

        </div>
    <?php endif; ?>


    <?php if(session('error')): ?>
        <div class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700 shadow-sm">

            <svg class="mt-0.5 h-5 w-5 shrink-0"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 9v4m0 4h.01M10.29 3.86l-7.07 12A2 2 0 004.93 19h14.14a2 2 0 001.71-3.14l-7.07-12a2 2 0 00-3.42 0z"/>
            </svg>

            <span><?php echo e(session('error')); ?></span>

        </div>
    <?php endif; ?>


    
    <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

        
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Total Tagihan
                    </p>

                    <p class="mt-3 text-2xl font-bold text-slate-800">
                        <?php echo e(number_format($totalTagihan, 0, ',', '.')); ?>

                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4FC] text-[#1769AA]">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zm3 5h4m-4 4h6m-6 4h3"/>
                    </svg>

                </div>

            </div>

            <p class="mt-3 text-[10px] text-slate-400">
                Rp <?php echo e(number_format($totalNominal, 0, ',', '.')); ?>

            </p>

        </div>


        
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Lunas
                    </p>

                    <p class="mt-3 text-2xl font-bold text-emerald-600">
                        <?php echo e(number_format($jumlahLunas, 0, ',', '.')); ?>

                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EDF8F4] text-[#29936B]">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>

                </div>

            </div>

            <p class="mt-3 text-[10px] text-slate-400">
                Rp <?php echo e(number_format($totalLunas, 0, ',', '.')); ?>

            </p>

        </div>


        
        <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Belum Bayar
                    </p>

                    <p class="mt-3 text-2xl font-bold text-[#1769AA]">
                        <?php echo e(number_format($jumlahBelumBayar, 0, ',', '.')); ?>

                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4FC] text-[#1769AA]">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M3 7h18M5 7v10a2 2 0 002 2h10a2 2 0 002-2V7M8 11h8"/>
                    </svg>

                </div>

            </div>

            <p class="mt-3 text-[10px] text-slate-400">
                Menunggu pembayaran
            </p>

        </div>


        
        <div class="group rounded-2xl border border-red-100 bg-red-50/50 p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-red-400">
                        Jatuh Tempo
                    </p>

                    <p class="mt-3 text-2xl font-bold text-red-600">
                        <?php echo e(number_format($jumlahJatuhTempo, 0, ',', '.')); ?>

                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-100 text-red-600">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M12 9v4m0 4h.01M10.29 3.86l-7.07 12A2 2 0 004.93 19h14.14a2 2 0 001.71-3.14l-7.07-12a2 2 0 00-3.42 0z"/>
                    </svg>

                </div>

            </div>

            <p class="mt-3 text-[10px] text-red-400">
                Perlu ditindaklanjuti
            </p>

        </div>

    </section>


    
    <section class="overflow-visible rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-6 py-5">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F4FC] text-[#1769AA]">

                    <svg class="h-5 w-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                    </svg>

                </div>

                <div>
                    <h2 class="text-sm font-bold text-slate-800">
                        Cari & Filter Tagihan
                    </h2>

                    <p class="mt-1 text-[11px] text-slate-400">
                        Gunakan pencarian dan filter untuk menemukan data tagihan.
                    </p>
                </div>

            </div>

        </div>


        <form
            action="<?php echo e(route('tagihan.index')); ?>"
            method="GET"
            id="filterTagihanForm"
            class="p-6"
        >

            <div class="grid grid-cols-1 gap-5 lg:grid-cols-5">

                
                <div class="lg:col-span-2">

                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-wider text-slate-500">
                        Pencarian
                    </label>

                    <div class="relative">

                        <svg
                            class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>

                        <input
                            type="text"
                            name="search"
                            value="<?php echo e(request('search')); ?>"
                            placeholder="Nomor tagihan, nama, atau NIK..."
                            class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 pl-11 pr-4 text-sm text-slate-700 outline-none transition duration-200 placeholder:text-slate-400 focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-[#1769AA]/10"
                        >

                    </div>

                </div>


                
                <div class="custom-dropdown relative">

                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-wider text-slate-500">
                        Tahun Pajak
                    </label>

                    <input
                        type="hidden"
                        name="tahun_pajak"
                        value="<?php echo e(request('tahun_pajak')); ?>"
                        data-dropdown-value
                    >

                    <button
                        type="button"
                        data-dropdown-button
                        class="flex h-12 w-full items-center justify-between rounded-xl border border-slate-200 bg-slate-50 px-4 text-left transition duration-200 hover:border-[#A9D5EF] hover:bg-white focus:outline-none"
                    >

                        <span
                            data-dropdown-label
                            class="text-sm font-medium text-slate-700"
                        >
                            <?php echo e(request('tahun_pajak') ?: 'Semua Tahun'); ?>

                        </span>

                        <svg
                            data-dropdown-arrow
                            class="h-4 w-4 text-slate-400 transition duration-200"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M6 9l6 6 6-6"/>
                        </svg>

                    </button>


                    <div
                        data-dropdown-menu
                        class="absolute left-0 right-0 z-50 mt-2 hidden overflow-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-300/30"
                    >

                        <button
                            type="button"
                            data-value=""
                            class="dropdown-option flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm transition hover:bg-blue-50 hover:text-[#1769AA]"
                        >
                            <span>Semua Tahun</span>

                            <svg data-check class="hidden h-4 w-4 text-[#1769AA]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>

                        <?php $__currentLoopData = $tahunPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <button
                                type="button"
                                data-value="<?php echo e($tahun); ?>"
                                class="dropdown-option flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm text-slate-700 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >
                                <span><?php echo e($tahun); ?></span>

                                <svg data-check class="hidden h-4 w-4 text-[#1769AA]"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </button>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>


                
                <div class="custom-dropdown relative">

                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-wider text-slate-500">
                        Jenis Pajak
                    </label>

                    <input
                        type="hidden"
                        name="jenis_pajak_id"
                        value="<?php echo e(request('jenis_pajak_id')); ?>"
                        data-dropdown-value
                    >

                    <button
                        type="button"
                        data-dropdown-button
                        class="flex h-12 w-full items-center justify-between rounded-xl border border-slate-200 bg-slate-50 px-4 text-left transition duration-200 hover:border-[#A9D5EF] hover:bg-white focus:outline-none"
                    >

                        <span
                            data-dropdown-label
                            class="truncate text-sm font-medium text-slate-700"
                        >
                            <?php if(request('jenis_pajak_id')): ?>
                                <?php echo e(optional($jenisPajaks->firstWhere('id', request('jenis_pajak_id')))->nama ?? 'Semua Jenis'); ?>

                            <?php else: ?>
                                Semua Jenis
                            <?php endif; ?>
                        </span>

                        <svg
                            data-dropdown-arrow
                            class="h-4 w-4 shrink-0 text-slate-400 transition duration-200"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M6 9l6 6 6-6"/>
                        </svg>

                    </button>


                    <div
                        data-dropdown-menu
                        class="absolute left-0 right-0 z-50 mt-2 hidden max-h-64 overflow-y-auto rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-300/30"
                    >

                        <button
                            type="button"
                            data-value=""
                            class="dropdown-option flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm transition hover:bg-blue-50 hover:text-[#1769AA]"
                        >
                            <span>Semua Jenis</span>

                            <svg data-check class="hidden h-4 w-4 text-[#1769AA]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>

                        <?php $__currentLoopData = $jenisPajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisPajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <button
                                type="button"
                                data-value="<?php echo e($jenisPajak->id); ?>"
                                class="dropdown-option flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm text-slate-700 transition hover:bg-blue-50 hover:text-[#1769AA]"
                            >
                                <span><?php echo e($jenisPajak->nama); ?></span>

                                <svg data-check class="hidden h-4 w-4 text-[#1769AA]"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </button>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>


                
                <div class="custom-dropdown relative">

                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-wider text-slate-500">
                        Status
                    </label>

                    <input
                        type="hidden"
                        name="status"
                        value="<?php echo e(request('status')); ?>"
                        data-dropdown-value
                    >

                    <button
                        type="button"
                        data-dropdown-button
                        class="flex h-12 w-full items-center justify-between rounded-xl border border-slate-200 bg-slate-50 px-4 text-left transition duration-200 hover:border-[#A9D5EF] hover:bg-white focus:outline-none"
                    >

                        <span
                            data-dropdown-label
                            class="text-sm font-medium text-slate-700"
                        >
                            <?php switch(request('status')):
                                case ('belum_bayar'): ?>
                                    Belum Bayar
                                    <?php break; ?>

                                <?php case ('sebagian'): ?>
                                    Sebagian
                                    <?php break; ?>

                                <?php case ('lunas'): ?>
                                    Lunas
                                    <?php break; ?>

                                <?php case ('jatuh_tempo'): ?>
                                    Jatuh Tempo
                                    <?php break; ?>

                                <?php default: ?>
                                    Semua Status
                            <?php endswitch; ?>
                        </span>

                        <svg
                            data-dropdown-arrow
                            class="h-4 w-4 text-slate-400 transition duration-200"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M6 9l6 6 6-6"/>
                        </svg>

                    </button>


                    <div
                        data-dropdown-menu
                        class="absolute left-0 right-0 z-50 mt-2 overflow-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-300/30"
                    >

                        <button
                            type="button"
                            data-value=""
                            class="dropdown-option flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm transition hover:bg-blue-50 hover:text-[#1769AA]"
                        >
                            <span>Semua Status</span>

                            <svg data-check class="hidden h-4 w-4 text-[#1769AA]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>


                        <button
                            type="button"
                            data-value="belum_bayar"
                            class="dropdown-option flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm text-slate-700 transition hover:bg-blue-50 hover:text-[#1769AA]"
                        >
                            <span>Belum Bayar</span>

                            <svg data-check class="hidden h-4 w-4 text-[#1769AA]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>


                        <button
                            type="button"
                            data-value="sebagian"
                            class="dropdown-option flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm text-slate-700 transition hover:bg-blue-50 hover:text-[#1769AA]"
                        >
                            <span>Sebagian</span>

                            <svg data-check class="hidden h-4 w-4 text-[#1769AA]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>


                        <button
                            type="button"
                            data-value="lunas"
                            class="dropdown-option flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm text-slate-700 transition hover:bg-blue-50 hover:text-[#1769AA]"
                        >
                            <span>Lunas</span>

                            <svg data-check class="hidden h-4 w-4 text-[#1769AA]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>


                        <button
                            type="button"
                            data-value="jatuh_tempo"
                            class="dropdown-option flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-left text-sm text-slate-700 transition hover:bg-blue-50 hover:text-[#1769AA]"
                        >
                            <span>Jatuh Tempo</span>

                            <svg data-check class="hidden h-4 w-4 text-[#1769AA]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>

                    </div>

                </div>

            </div>


            
            <div class="mt-5 flex flex-wrap items-center gap-2">

                <button
                    type="submit"
                    class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 text-xs font-bold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#12598F] hover:shadow-md"
                >
                    <svg class="h-4 w-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                    </svg>

                    Cari Tagihan
                </button>


                <?php if(
                    request()->filled('search') ||
                    request()->filled('tahun_pajak') ||
                    request()->filled('jenis_pajak_id') ||
                    request()->filled('status')
                ): ?>

                    <a
                        href="<?php echo e(route('tagihan.index')); ?>"
                        class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 text-xs font-bold text-slate-600 transition duration-200 hover:border-slate-300 hover:bg-slate-50"
                    >
                        <svg class="h-4 w-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M6 6l12 12M18 6L6 18"/>
                        </svg>

                        Reset
                    </a>

                <?php endif; ?>

            </div>

        </form>

    </section>


    
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-xs text-slate-500">

                Menampilkan

                <span class="font-bold text-slate-700">
                    <?php echo e($tagihans->total()); ?>

                </span>

                tagihan

                <?php if(
                    request()->filled('search') ||
                    request()->filled('tahun_pajak') ||
                    request()->filled('jenis_pajak_id') ||
                    request()->filled('status')
                ): ?>

                    dari hasil filter.

                <?php endif; ?>

            </p>
        </div>

    </div>


    
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            No
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Nomor Tagihan
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Wajib Pajak
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Jenis Pajak
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Tahun
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Total
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Jatuh Tempo
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Status
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-center text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    <?php $__empty_1 = true; $__currentLoopData = $tagihans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagihan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="transition duration-150 hover:bg-slate-50">

                            
                            <td class="whitespace-nowrap px-6 py-4 text-xs text-slate-400">
                                <?php echo e($tagihans->firstItem() + $loop->index); ?>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4">

                                <p class="text-xs font-bold text-slate-700">
                                    <?php echo e($tagihan->nomor_tagihan); ?>

                                </p>

                                <p class="mt-1 text-[9px] text-slate-400">
                                    ID #<?php echo e($tagihan->id); ?>

                                </p>

                            </td>


                            
                            <td class="px-6 py-4">

                                <p class="whitespace-nowrap text-xs font-bold text-slate-700">
                                    <?php echo e($tagihan->wajibPajak->nama ?? '-'); ?>

                                </p>

                                <?php if($tagihan->wajibPajak?->nik): ?>

                                    <p class="mt-1 text-[9px] text-slate-400">
                                        NIK: <?php echo e($tagihan->wajibPajak->nik); ?>

                                    </p>

                                <?php endif; ?>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="text-xs text-slate-600">
                                    <?php echo e($tagihan->jenisPajak->nama ?? '-'); ?>

                                </span>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="inline-flex rounded-full bg-[#E8F4FC] px-3 py-1 text-[10px] font-bold text-[#1769AA]">
                                    <?php echo e($tagihan->tahun_pajak); ?>

                                </span>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4">

                                <p class="text-xs font-bold text-slate-700">
                                    Rp <?php echo e(number_format((float) $tagihan->total_tagihan, 0, ',', '.')); ?>

                                </p>

                                <p class="mt-1 text-[9px] text-slate-400">
                                    Pokok: Rp <?php echo e(number_format((float) $tagihan->pokok_pajak, 0, ',', '.')); ?>

                                </p>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4 text-xs text-slate-600">

                                <?php echo e($tagihan->tanggal_jatuh_tempo?->format('d/m/Y') ?? '-'); ?>


                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4">

                                <?php if($tagihan->status === 'lunas'): ?>

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-[10px] font-bold text-emerald-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                        Lunas

                                    </span>

                                <?php elseif($tagihan->status === 'sebagian'): ?>

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-[10px] font-bold text-amber-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                        Sebagian

                                    </span>

                                <?php elseif($tagihan->status === 'jatuh_tempo'): ?>

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-[10px] font-bold text-red-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                        Jatuh Tempo

                                    </span>

                                <?php else: ?>

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-[10px] font-bold text-slate-600">

                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                        Belum Bayar

                                    </span>

                                <?php endif; ?>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    <a
                                        href="<?php echo e(route('tagihan.show', $tagihan)); ?>"
                                        class="rounded-lg bg-slate-100 px-3 py-2 text-[10px] font-bold text-slate-600 transition hover:bg-slate-200"
                                    >
                                        Detail
                                    </a>

                                    <a
                                        href="<?php echo e(route('tagihan.edit', $tagihan)); ?>"
                                        class="rounded-lg bg-amber-50 px-3 py-2 text-[10px] font-bold text-amber-700 transition hover:bg-amber-100"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="<?php echo e(route('tagihan.destroy', $tagihan)); ?>"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus tagihan ini?')"
                                    >

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button
                                            type="submit"
                                            class="rounded-lg bg-red-50 px-3 py-2 text-[10px] font-bold text-red-600 transition hover:bg-red-100"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="9" class="px-6 py-16 text-center">

                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">

                                    <svg class="h-6 w-6"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.8"
                                              d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zm3 5h4m-4 4h6m-6 4h3"/>
                                    </svg>

                                </div>

                                <h3 class="mt-4 text-sm font-bold text-slate-700">
                                    Data tagihan tidak ditemukan
                                </h3>

                                <p class="mt-1 text-xs text-slate-400">
                                    Tidak ada tagihan yang sesuai dengan pencarian atau filter.
                                </p>

                                <a
                                    href="<?php echo e(route('tagihan.index')); ?>"
                                    class="mt-5 inline-flex rounded-lg border border-slate-200 bg-white px-5 py-2.5 text-xs font-bold text-slate-600 transition hover:bg-slate-50"
                                >
                                    Reset Filter
                                </a>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>


        
        <?php if($tagihans->hasPages()): ?>

            <div class="border-t border-slate-100 px-6 py-4">

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <p class="text-[10px] text-slate-400">

                        Menampilkan

                        <span class="font-bold text-slate-600">
                            <?php echo e($tagihans->firstItem()); ?>

                        </span>

                        -

                        <span class="font-bold text-slate-600">
                            <?php echo e($tagihans->lastItem()); ?>

                        </span>

                        dari

                        <span class="font-bold text-slate-600">
                            <?php echo e($tagihans->total()); ?>

                        </span>

                        tagihan

                    </p>

                    <div>
                        <?php echo e($tagihans->links()); ?>

                    </div>

                </div>

            </div>

        <?php endif; ?>

    </div>

</div>



<script>
document.addEventListener('DOMContentLoaded', function () {

    const dropdowns = document.querySelectorAll('.custom-dropdown');

    dropdowns.forEach(function (dropdown) {

        const button = dropdown.querySelector('[data-dropdown-button]');
        const menu = dropdown.querySelector('[data-dropdown-menu]');
        const valueInput = dropdown.querySelector('[data-dropdown-value]');
        const label = dropdown.querySelector('[data-dropdown-label]');
        const arrow = dropdown.querySelector('[data-dropdown-arrow]');
        const options = dropdown.querySelectorAll('.dropdown-option');

        if (!button || !menu || !valueInput || !label) {
            return;
        }


        function closeDropdown() {

            menu.classList.add('hidden');

            button.classList.remove(
                'border-[#1769AA]',
                'bg-white',
                'ring-4',
                'ring-[#1769AA]/10'
            );

            arrow?.classList.remove('rotate-180');

        }


        function openDropdown() {

            document.querySelectorAll('[data-dropdown-menu]').forEach(function (otherMenu) {

                if (otherMenu !== menu) {
                    otherMenu.classList.add('hidden');
                }

            });


            document.querySelectorAll('[data-dropdown-arrow]').forEach(function (otherArrow) {

                if (otherArrow !== arrow) {
                    otherArrow.classList.remove('rotate-180');
                }

            });


            menu.classList.remove('hidden');

            button.classList.add(
                'border-[#1769AA]',
                'bg-white',
                'ring-4',
                'ring-[#1769AA]/10'
            );

            arrow?.classList.add('rotate-180');

        }


        function updateActiveOption() {

            const currentValue = valueInput.value;

            options.forEach(function (option) {

                const optionValue = option.dataset.value;

                const check = option.querySelector('[data-check]');

                if (optionValue === currentValue) {

                    option.classList.add(
                        'bg-blue-50',
                        'text-[#1769AA]',
                        'font-semibold'
                    );

                    check?.classList.remove('hidden');

                } else {

                    option.classList.remove(
                        'bg-blue-50',
                        'text-[#1769AA]',
                        'font-semibold'
                    );

                    check?.classList.add('hidden');

                }

            });

        }


        button.addEventListener('click', function (event) {

            event.stopPropagation();

            if (menu.classList.contains('hidden')) {
                openDropdown();
            } else {
                closeDropdown();
            }

        });


        options.forEach(function (option) {

            option.addEventListener('click', function () {

                const value = option.dataset.value;
                const optionText = option.querySelector('span')?.textContent.trim() || '';

                valueInput.value = value;
                label.textContent = optionText;

                updateActiveOption();
                closeDropdown();

            });

        });


        updateActiveOption();

    });


    document.addEventListener('click', function () {

        document.querySelectorAll('[data-dropdown-menu]').forEach(function (menu) {
            menu.classList.add('hidden');
        });

        document.querySelectorAll('[data-dropdown-arrow]').forEach(function (arrow) {
            arrow.classList.remove('rotate-180');
        });

        document.querySelectorAll('[data-dropdown-button]').forEach(function (button) {

            button.classList.remove(
                'border-[#1769AA]',
                'bg-white',
                'ring-4',
                'ring-[#1769AA]/10'
            );

        });

    });

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/tagihan/index.blade.php ENDPATH**/ ?>