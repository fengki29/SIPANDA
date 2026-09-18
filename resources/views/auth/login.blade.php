<x-guest-layout>

    <div class="min-h-screen bg-slate-100">

        {{-- ===================================================== --}}
        {{-- TOP BRAND BAR --}}
        {{-- ===================================================== --}}

        <div class="border-t-4 border-blue-700 bg-white shadow-sm">

            <div class="mx-auto flex h-16 max-w-7xl items-center px-6">

                <div class="flex items-center gap-3">

                    {{-- LOGO SIPANDA --}}
                    <img
                        src="{{ asset('images/sipanda-logo.png') }}"
                        alt="Logo SIPANDA"
                        class="h-11 w-11 object-contain"
                    >

                    {{-- BRAND --}}
                    <div>

                        <div class="flex items-center gap-2">

                            <h1 class="text-lg font-extrabold tracking-tight text-slate-900">
                                SIPANDA
                            </h1>

                            <span class="rounded bg-blue-50 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-blue-700">
                                BAPENDA
                            </span>

                        </div>

                        <p class="text-[10px] font-medium tracking-wide text-slate-500">
                            Sistem Informasi Pajak Daerah
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- LOGIN AREA --}}
        {{-- ===================================================== --}}

        <div class="flex min-h-[calc(100vh-68px)] items-center justify-center px-6 py-12">

            <div class="w-full max-w-md">


                {{-- LOGIN CARD --}}
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-200/60">


                    {{-- ================================================= --}}
                    {{-- CARD HEADER --}}
                    {{-- ================================================= --}}

                    <div class="border-b border-slate-100 px-8 pb-6 pt-8">

                        {{-- LOGO BESAR --}}
                        <div class="mb-5 flex h-20 w-20 items-center justify-center rounded-2xl bg-blue-50 p-3">

                            <img
                                src="{{ asset('images/sipanda-logo.png') }}"
                                alt="Logo SIPANDA"
                                class="h-full w-full object-contain"
                            >

                        </div>


                        <h2 class="text-2xl font-extrabold tracking-tight text-slate-900">
                            Selamat Datang
                        </h2>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Silakan masuk untuk mengakses Sistem Informasi Pajak Daerah.
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FORM --}}
                    {{-- ================================================= --}}

                    <div class="px-8 py-7">


                        {{-- SESSION STATUS --}}
                        @if (session('status'))

                            <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">

                                {{ session('status') }}

                            </div>

                        @endif


                        {{-- VALIDATION ERROR --}}
                        @if ($errors->any())

                            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3">

                                <div class="flex items-start gap-3">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="mt-0.5 h-5 w-5 shrink-0 text-red-600"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 9v3.75m0 3.75h.007v.008H12v-.008zM10.29 3.86L2.82 17.25A1.875 1.875 0 004.45 20h15.1a1.875 1.875 0 001.63-2.75L13.71 3.86z"
                                        />
                                    </svg>

                                    <div>

                                        <p class="text-sm font-semibold text-red-700">
                                            Login gagal
                                        </p>

                                        <p class="mt-1 text-xs text-red-600">
                                            Email atau password yang Anda masukkan tidak sesuai.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        @endif


                        <form
                            method="POST"
                            action="{{ route('login') }}"
                        >

                            @csrf


                            {{-- ================================================= --}}
                            {{-- EMAIL --}}
                            {{-- ================================================= --}}

                            <div>

                                <label
                                    for="email"
                                    class="mb-2 block text-sm font-semibold text-slate-700"
                                >
                                    Email
                                </label>

                                <div class="relative">

                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-slate-400"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.7"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M21.75 6.75v10.5A2.25 2.25 0 0119.5 19.5h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0l-9.75 6.75L2.25 6.75"
                                            />
                                        </svg>

                                    </div>


                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                        autocomplete="username"
                                        placeholder="Masukkan email Anda"
                                        class="block w-full rounded-xl border border-slate-300 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-100"
                                    >

                                </div>


                                @if ($errors->has('email'))

                                    <p class="mt-2 text-xs font-medium text-red-600">
                                        {{ $errors->first('email') }}
                                    </p>

                                @endif

                            </div>


                            {{-- ================================================= --}}
                            {{-- PASSWORD --}}
                            {{-- ================================================= --}}

                            <div class="mt-5">

                                <label
                                    for="password"
                                    class="mb-2 block text-sm font-semibold text-slate-700"
                                >
                                    Password
                                </label>


                                <div class="relative">

                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-slate-400"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.7"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16.5 10.5V7.875a4.5 4.5 0 10-9 0V10.5m-1.5 0h12a1.5 1.5 0 011.5 1.5v7.5a1.5 1.5 0 01-1.5 1.5H6a1.5 1.5 0 01-1.5-1.5V12A1.5 1.5 0 016 10.5z"
                                            />
                                        </svg>

                                    </div>


                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        required
                                        autocomplete="current-password"
                                        placeholder="Masukkan password Anda"
                                        class="block w-full rounded-xl border border-slate-300 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-100"
                                    >

                                </div>


                                @if ($errors->has('password'))

                                    <p class="mt-2 text-xs font-medium text-red-600">
                                        {{ $errors->first('password') }}
                                    </p>

                                @endif

                            </div>


                            {{-- ================================================= --}}
                            {{-- REMEMBER + FORGOT PASSWORD --}}
                            {{-- ================================================= --}}

                            <div class="mt-5 flex items-center justify-between gap-4">


                                {{-- REMEMBER ME --}}
                                <label class="inline-flex cursor-pointer items-center gap-2.5">

                                    <input
                                        id="remember_me"
                                        name="remember"
                                        type="checkbox"
                                        class="h-4 w-4 rounded border-slate-300 text-blue-700 focus:ring-blue-600"
                                    >

                                    <span class="text-sm font-medium text-slate-500">
                                        Ingat saya
                                    </span>

                                </label>


                                {{-- FORGOT PASSWORD --}}
                                @if (Route::has('password.request'))

                                    <a
                                        href="{{ route('password.request') }}"
                                        class="text-sm font-semibold text-blue-700 transition hover:text-blue-800 hover:underline"
                                    >
                                        Lupa password?
                                    </a>

                                @endif

                            </div>


                            {{-- ================================================= --}}
                            {{-- LOGIN BUTTON --}}
                            {{-- ================================================= --}}

                            <button
                                type="submit"
                                class="mt-7 flex w-full items-center justify-center gap-2 rounded-xl bg-blue-700 px-5 py-3.5 text-sm font-bold text-white shadow-sm shadow-blue-700/20 transition hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-100 active:bg-blue-900"
                            >

                                <span>
                                    Masuk ke SIPANDA
                                </span>

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
                                        d="M13.5 6.75L18.75 12l-5.25 5.25M18.75 12H5.25"
                                    />
                                </svg>

                            </button>

                        </form>

                    </div>


                    {{-- ================================================= --}}
                    {{-- CARD FOOTER --}}
                    {{-- ================================================= --}}

                    <div class="border-t border-slate-100 bg-slate-50 px-8 py-4">

                        <div class="flex items-center justify-center gap-2">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 15v2.25m-6.75 0h13.5a1.5 1.5 0 001.5-1.5V10.5a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v5.25a1.5 1.5 0 001.5 1.5zm10.5-6.75V6a4.5 4.5 0 00-9 0v2.25"
                                />
                            </svg>

                            <p class="text-[11px] font-medium text-slate-500">
                                Akses sistem dilindungi dan hanya untuk pengguna terdaftar
                            </p>

                        </div>

                    </div>


                </div>


                {{-- ================================================= --}}
                {{-- PAGE FOOTER --}}
                {{-- ================================================= --}}

                <div class="mt-6 text-center">

                    <p class="text-xs text-slate-400">
                        &copy; {{ date('Y') }} SIPANDA
                    </p>

                    <p class="mt-1 text-[11px] text-slate-400">
                        Sistem Informasi Pajak Daerah
                    </p>

                </div>


            </div>

        </div>

    </div>

</x-guest-layout>