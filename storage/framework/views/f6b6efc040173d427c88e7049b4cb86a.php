<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="csrf-token"
        content="<?php echo e(csrf_token()); ?>"
    >

    <title>
        <?php echo $__env->yieldContent('title', config('app.name', 'SIPANDA')); ?>
    </title>

    <?php echo app('Illuminate\Foundation\Vite')([
        'resources/css/app.css',
        'resources/js/app.js'
    ]); ?>

</head>


<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">


    <div class="min-h-screen flex flex-col">


        <?php if(auth()->guard()->check()): ?>

            
            
            

            <header class="sticky top-0 z-40 border-t-4 border-blue-700 bg-white/95 shadow-sm backdrop-blur">

                <div class="mx-auto flex min-h-[72px] w-full max-w-[1440px] items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">


                    
                    
                    

                    <a
                        href="<?php echo e(route('dashboard')); ?>"
                        class="group flex min-w-0 shrink-0 items-center gap-3"
                    >

                        
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-blue-50 p-1.5 ring-1 ring-blue-100 transition duration-200 group-hover:bg-blue-100 group-hover:ring-blue-200">

                            <img
                                src="<?php echo e(asset('images/sipanda-logo.png')); ?>"
                                alt="Logo SIPANDA"
                                class="h-full w-full object-contain"
                            >

                        </div>


                        
                        <div class="min-w-0 leading-none">

                            <div class="flex items-center gap-2">

                                <h1 class="text-[19px] font-extrabold tracking-tight text-slate-900 sm:text-[20px]">
                                    SIPANDA
                                </h1>

                                <span class="hidden rounded-md border border-blue-100 bg-blue-50 px-2 py-1 text-[9px] font-bold uppercase tracking-wider text-blue-700 sm:inline-flex">
                                    BAPENDA
                                </span>

                            </div>

                            <p class="mt-1.5 hidden truncate text-[10px] font-medium tracking-wide text-slate-500 sm:block sm:text-[11px]">
                                Sistem Informasi Pajak Daerah
                            </p>

                        </div>

                    </a>


                    
                    
                    

                    <div class="flex shrink-0 items-center gap-2 sm:gap-3">


                        
                        
                        

                        <a
                            href="<?php echo e(route('notifikasi.index')); ?>"
                            title="Notifikasi"
                            aria-label="Notifikasi"
                            class="group relative inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-slate-50 text-slate-500 transition-all duration-200 hover:-translate-y-0.5 hover:bg-blue-50 hover:text-blue-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-100
                            <?php echo e(request()->routeIs('notifikasi.*') ? 'bg-blue-50 text-blue-700 shadow-sm' : ''); ?>"
                        >
                            <span class="relative flex h-7 w-7 items-center justify-center">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-[25px] w-[25px] transition-all duration-200 group-hover:scale-110 group-hover:-rotate-3"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                >
                                    <path d="M12 2.75a6.25 6.25 0 00-6.25 6.25v3.04c0 .72-.22 1.42-.63 2.01l-1.03 1.5A1.75 1.75 0 005.53 18.3h12.94a1.75 1.75 0 001.44-2.75l-1.03-1.5a3.5 3.5 0 01-.63-2.01V9A6.25 6.25 0 0012 2.75z"/>
                                    <path d="M9.15 20.05a3 3 0 005.7 0h-5.7z"/>
                                </svg>

                                <?php if(($jumlahNotifikasi ?? 0) > 0): ?>
                                    <span class="absolute -right-1 -top-1 flex h-[18px] min-w-[18px] items-center justify-center rounded-full bg-red-600 px-1 text-[8px] font-black leading-none text-white shadow-md ring-2 ring-white">
                                        <?php echo e(($jumlahNotifikasi ?? 0) > 99 ? '99+' : $jumlahNotifikasi); ?>

                                    </span>
                                <?php endif; ?>
                            </span>
                        </a>


                        
                        <div class="hidden h-9 w-px bg-slate-200 sm:block"></div>


                        
                        <div class="hidden text-right md:block">

                            <p class="max-w-[180px] truncate text-sm font-bold leading-tight text-slate-800">
                                <?php echo e(auth()->user()->name); ?>

                            </p>

                            <p class="mt-1 max-w-[180px] truncate text-[11px] text-slate-500">
                                <?php echo e(auth()->user()->email); ?>

                            </p>

                        </div>


                        
                        
                        

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-white bg-blue-100 font-bold text-blue-700 shadow-sm ring-1 ring-slate-200 sm:h-11 sm:w-11">

                            <?php if(auth()->user()->avatar): ?>

                                <img
                                    src="<?php echo e(asset('storage/' . auth()->user()->avatar)); ?>"
                                    alt="Foto <?php echo e(auth()->user()->name); ?>"
                                    class="h-full w-full object-cover"
                                >

                            <?php else: ?>

                                <span class="text-sm font-bold">
                                    <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                                </span>

                            <?php endif; ?>

                        </div>


                        
                        
                        

                        <?php if(auth()->user()->isAdmin()): ?>

                            <span class="hidden items-center gap-1.5 rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-[10px] font-bold tracking-wide text-blue-700 sm:inline-flex">

                                <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>

                                ADMIN

                            </span>

                        <?php else: ?>

                            <span class="hidden items-center gap-1.5 rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-[10px] font-bold tracking-wide text-slate-600 sm:inline-flex">

                                <span class="h-1.5 w-1.5 rounded-full bg-slate-500"></span>

                                PETUGAS

                            </span>

                        <?php endif; ?>


                        
                        
                        

                        <form
                            method="POST"
                            action="<?php echo e(route('logout')); ?>"
                        >

                            <?php echo csrf_field(); ?>

                            <button
                                type="submit"
                                title="Logout"
                                class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-600 shadow-sm transition duration-200 hover:border-red-200 hover:bg-red-50 hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-red-100 sm:px-3.5"
                            >

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
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 12h9m0 0l-3-3m3 3l-3 3"
                                    />
                                </svg>

                                <span class="hidden sm:inline">
                                    Logout
                                </span>

                            </button>

                        </form>


                    </div>

                </div>

            </header>


            
            
            

            <nav class="sticky top-[76px] z-30 border-b border-slate-200 bg-white shadow-[0_1px_2px_rgba(15,23,42,0.03)]">

                <div class="mx-auto w-full max-w-[1440px] px-3 sm:px-6 lg:px-8">

                    <div class="flex h-[56px] items-center gap-1 overflow-x-auto scrollbar-thin">


                        
                        
                        

                        <a
                            href="<?php echo e(route('dashboard')); ?>"
                            class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                            <?php echo e(request()->routeIs('dashboard')
                                ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 13.5l9-9 9 9M5.25 11.25V21h5.25v-5.25h3V21h5.25v-9.75"
                                />
                            </svg>

                            Dashboard

                        </a>


                        
                        
                        

                        <a
                            href="<?php echo e(route('wajib-pajak.index')); ?>"
                            class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                            <?php echo e(request()->routeIs('wajib-pajak.*')
                                ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 003.75.772A9.38 9.38 0 0022.5 19.128M15 19.128v-.75a6 6 0 00-6-6H6a6 6 0 00-6 6v.75m15 0a9.38 9.38 0 01-7.5 0M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z"
                                />
                            </svg>

                            Wajib Pajak

                        </a>


                        
                        
                        

                        <a
                            href="<?php echo e(route('objek-pajak.index')); ?>"
                            class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                            <?php echo e(request()->routeIs('objek-pajak.*')
                                ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3.75 21h16.5M4.5 21V9.75L12 4.5l7.5 5.25V21M8.25 21v-6h7.5v6"
                                />
                            </svg>

                            Objek Pajak

                        </a>


                        
                        
                        

                        <?php if(auth()->user()->isAdmin()): ?>


                            

                            <a
                                href="<?php echo e(route('jenis-pajak.index')); ?>"
                                class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                                <?php echo e(request()->routeIs('jenis-pajak.*')
                                    ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                    : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 shrink-0"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 12h6m-6 4h6m2.25-13.5H6.75A2.25 2.25 0 004.5 4.75v14.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V7.5l-4.5-5z"
                                    />
                                </svg>

                                Jenis Pajak

                            </a>


                            

                            <a
                                href="<?php echo e(route('target-pajak.index')); ?>"
                                class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                                <?php echo e(request()->routeIs('target-pajak.*')
                                    ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                    : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 shrink-0"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.75 13.5l5.25-5.25 3.75 3.75L20.25 4.5M20.25 4.5v5.25m0-5.25H15"
                                    />
                                </svg>

                                Target Pajak

                            </a>


                            

                            <a
                                href="<?php echo e(route('users.index')); ?>"
                                class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                                <?php echo e(request()->routeIs('users.*')
                                    ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                    : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 shrink-0"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16.5 21v-1.875a4.125 4.125 0 00-4.125-4.125h-4.5a4.125 4.125 0 00-4.125 4.125V21m10.5-13.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm3.75 2.625a3 3 0 110-6m0 10.5a4.5 4.5 0 014.5 4.5"
                                    />
                                </svg>

                                Manajemen User

                            </a>


                            

                            <a
                                href="<?php echo e(route('audit-log.index')); ?>"
                                class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                                <?php echo e(request()->routeIs('audit-log.*')
                                    ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                    : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 shrink-0"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"
                                    />
                                </svg>

                                Riwayat Aktivitas

                            </a>

                        <?php endif; ?>


                        
                        
                        

                        <div class="mx-1 hidden h-7 w-px bg-slate-200 xl:block"></div>


                        
                        
                        

                        <a
                            href="<?php echo e(route('tagihan.index')); ?>"
                            class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                            <?php echo e(request()->routeIs('tagihan.*')
                                ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M7.5 3.75h9A2.25 2.25 0 0118.75 6v12a2.25 2.25 0 01-2.25 2.25h-9A2.25 2.25 0 015.25 18V6A2.25 2.25 0 017.5 3.75zM8.25 8.25h7.5M8.25 12h7.5M8.25 15.75h4.5"
                                />
                            </svg>

                            Tagihan

                        </a>


                        
                        
                        

                        <a
                            href="<?php echo e(route('pembayaran.index')); ?>"
                            class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                            <?php echo e(request()->routeIs('pembayaran.*')
                                ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0"
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

                            Pembayaran

                        </a>


                        
                        
                        

                        <a
                            href="<?php echo e(route('tunggakan.index')); ?>"
                            class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                            <?php echo e(request()->routeIs('tunggakan.*')
                                ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 9v3.75m0 3.75h.007v.008H12v-.008zM10.29 3.86L2.82 17.25A1.875 1.875 0 004.45 20h15.1a1.875 1.875 0 001.63-2.75L13.71 3.86a1.875 1.875 0 00-3.42 0z"
                                />
                            </svg>

                            Tunggakan

                        </a>


                        
                        
                        

                        <a
                            href="<?php echo e(route('laporan.index')); ?>"
                            class="group inline-flex h-[42px] shrink-0 items-center gap-2 rounded-lg border-b-2 px-3 text-[13px] font-semibold transition duration-200
                            <?php echo e(request()->routeIs('laporan.*')
                                ? 'border-blue-700 bg-blue-50 text-blue-700 shadow-sm'
                                : 'border-transparent text-slate-500 hover:bg-slate-50 hover:text-slate-800'); ?>"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 shrink-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4.5 19.5V10.5m5 9V4.5m5 15v-6m5 6V7.5"
                                />
                            </svg>

                            Laporan

                        </a>


                    </div>

                </div>

            </nav>


        <?php endif; ?>


        
        
        

        <?php if(session('success')): ?>

            <div class="mx-auto w-full max-w-[1440px] px-4 pt-5 sm:px-6 lg:px-8">

                <div class="flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3.5 text-sm text-green-700 shadow-sm">

                    <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-green-100">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>

                    </div>

                    <span class="pt-0.5">
                        <?php echo e(session('success')); ?>

                    </span>

                </div>

            </div>

        <?php endif; ?>


        <?php if(session('error')): ?>

            <div class="mx-auto w-full max-w-[1440px] px-4 pt-5 sm:px-6 lg:px-8">

                <div class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3.5 text-sm text-red-700 shadow-sm">

                    <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-red-100">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 9v3.75m0 3.75h.007v.008H12v-.008zM10.29 3.86L2.82 17.25A1.875 1.875 0 004.45 20h15.1a1.875 1.875 0 001.63-2.75L13.71 3.86z"
                            />
                        </svg>

                    </div>

                    <span class="pt-0.5">
                        <?php echo e(session('error')); ?>

                    </span>

                </div>

            </div>

        <?php endif; ?>


        <?php if(isset($errors) && $errors->any()): ?>

            <div class="mx-auto w-full max-w-[1440px] px-4 pt-5 sm:px-6 lg:px-8">

                <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3.5 shadow-sm">

                    <div class="flex items-center gap-2">

                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-red-100">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-red-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 9v3.75m0 3.75h.007v.008H12v-.008zM10.29 3.86L2.82 17.25a1.875 1.875 0 001.63-2.75L13.71 3.86a1.875 1.875 0 00-3.42 0z"
                                />
                            </svg>

                        </div>

                        <p class="text-sm font-semibold text-red-700">
                            Terjadi kesalahan:
                        </p>

                    </div>

                    <ul class="mt-2 list-inside list-disc space-y-1 pl-2 text-sm text-red-600">

                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>
                                <?php echo e($error); ?>

                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                </div>

            </div>

        <?php endif; ?>


        
        
        

        <main class="flex-1">

            <div class="mx-auto w-full max-w-[1440px] px-4 py-6 sm:px-6 sm:py-7 lg:px-8 lg:py-8">

                <?php echo $__env->yieldContent('content'); ?>

            </div>

        </main>


        
        
        

        <?php if(auth()->guard()->check()): ?>

            <footer class="mt-auto border-t border-slate-200 bg-white">

                <div class="mx-auto flex min-h-[64px] w-full max-w-[1440px] flex-col items-center justify-between gap-2 px-4 py-4 text-[11px] text-slate-400 sm:flex-row sm:px-6 lg:px-8">

                    <p>
                        &copy; <?php echo e(date('Y')); ?> <span class="font-semibold text-slate-500">SIPANDA</span>
                    </p>

                    <div class="flex items-center gap-2">

                        <span>
                            Sistem Informasi Pajak Daerah
                        </span>

                        <span class="hidden h-1 w-1 rounded-full bg-slate-300 sm:block"></span>

                        <span class="hidden sm:block">
                            BAPENDA
                        </span>

                    </div>

                </div>

            </footer>

        <?php endif; ?>


    </div>


</body>

</html><?php /**PATH D:\PROJECT 1\sipanda\resources\views/layouts/app.blade.php ENDPATH**/ ?>