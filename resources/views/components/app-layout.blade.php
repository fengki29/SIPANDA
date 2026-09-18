<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>SIPANDA</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

    <div class="min-h-screen flex flex-col">

        {{-- HEADER --}}
        <header class="bg-white border-b border-gray-200 shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4">

                <div class="flex items-center justify-between">

                    {{-- LOGO SIPANDA --}}
                    <a
                        href="{{ route('dashboard') }}"
                        class="flex items-center gap-3"
                    >
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-700 text-white font-bold text-lg">
                            S
                        </div>

                        <div>
                            <h1 class="font-bold text-lg text-gray-800">
                                SIPANDA
                            </h1>

                            <p class="text-xs text-gray-500">
                                Sistem Informasi Pajak Daerah
                            </p>
                        </div>
                    </a>

                    {{-- USER --}}
                    @auth
                        <div class="flex items-center gap-4">

                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ auth()->user()->name }}
                                </p>

                                <p class="text-xs text-gray-500">
                                    {{ auth()->user()->role }}
                                </p>
                            </div>

                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold uppercase">
                                {{ auth()->user()->role }}
                            </span>

                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                            >
                                @csrf

                                <button
                                    type="submit"
                                    class="px-3 py-2 rounded-lg bg-red-50 text-red-600 text-sm font-medium hover:bg-red-100 transition"
                                >
                                    Logout
                                </button>
                            </form>

                        </div>
                    @endauth

                </div>

            </div>
        </header>


        {{-- NAVIGATION --}}
        @auth
            <nav class="bg-white border-b border-gray-200">

                <div class="max-w-7xl mx-auto px-6">

                    <div class="flex gap-1 overflow-x-auto">

                        <a
                            href="{{ route('dashboard') }}"
                            class="px-4 py-3 text-sm font-medium whitespace-nowrap
                            {{ request()->routeIs('dashboard')
                                ? 'text-blue-700 border-b-2 border-blue-700'
                                : 'text-gray-700 hover:text-blue-700' }}"
                        >
                            Dashboard
                        </a>

                        <a
                            href="{{ route('wajib-pajak.index') }}"
                            class="px-4 py-3 text-sm font-medium whitespace-nowrap
                            {{ request()->routeIs('wajib-pajak.*')
                                ? 'text-blue-700 border-b-2 border-blue-700'
                                : 'text-gray-700 hover:text-blue-700' }}"
                        >
                            Wajib Pajak
                        </a>

                        <a
                            href="{{ route('objek-pajak.index') }}"
                            class="px-4 py-3 text-sm font-medium whitespace-nowrap
                            {{ request()->routeIs('objek-pajak.*')
                                ? 'text-blue-700 border-b-2 border-blue-700'
                                : 'text-gray-700 hover:text-blue-700' }}"
                        >
                            Objek Pajak
                        </a>

                        @if (auth()->user()->isAdmin())

                            <a
                                href="{{ route('jenis-pajak.index') }}"
                                class="px-4 py-3 text-sm font-medium whitespace-nowrap
                                {{ request()->routeIs('jenis-pajak.*')
                                    ? 'text-blue-700 border-b-2 border-blue-700'
                                    : 'text-gray-700 hover:text-blue-700' }}"
                            >
                                Jenis Pajak
                            </a>

                            <a
                                href="{{ route('target-pajak.index') }}"
                                class="px-4 py-3 text-sm font-medium whitespace-nowrap
                                {{ request()->routeIs('target-pajak.*')
                                    ? 'text-blue-700 border-b-2 border-blue-700'
                                    : 'text-gray-700 hover:text-blue-700' }}"
                            >
                                Target Pajak
                            </a>

                            <a
                                href="{{ route('users.index') }}"
                                class="px-4 py-3 text-sm font-medium whitespace-nowrap
                                {{ request()->routeIs('users.*')
                                    ? 'text-blue-700 border-b-2 border-blue-700'
                                    : 'text-gray-700 hover:text-blue-700' }}"
                            >
                                Manajemen User
                            </a>

                            <a
                                href="{{ route('audit-log.index') }}"
                                class="px-4 py-3 text-sm font-medium whitespace-nowrap
                                {{ request()->routeIs('audit-log.*')
                                    ? 'text-blue-700 border-b-2 border-blue-700'
                                    : 'text-gray-700 hover:text-blue-700' }}"
                            >
                                Riwayat Aktivitas
                            </a>

                        @endif

                        <a
                            href="{{ route('tagihan.index') }}"
                            class="px-4 py-3 text-sm font-medium whitespace-nowrap
                            {{ request()->routeIs('tagihan.*')
                                ? 'text-blue-700 border-b-2 border-blue-700'
                                : 'text-gray-700 hover:text-blue-700' }}"
                        >
                            Tagihan
                        </a>

                        <a
                            href="{{ route('pembayaran.index') }}"
                            class="px-4 py-3 text-sm font-medium whitespace-nowrap
                            {{ request()->routeIs('pembayaran.*')
                                ? 'text-blue-700 border-b-2 border-blue-700'
                                : 'text-gray-700 hover:text-blue-700' }}"
                        >
                            Pembayaran
                        </a>

                        <a
                            href="{{ route('tunggakan.index') }}"
                            class="px-4 py-3 text-sm font-medium whitespace-nowrap
                            {{ request()->routeIs('tunggakan.*')
                                ? 'text-blue-700 border-b-2 border-blue-700'
                                : 'text-gray-700 hover:text-blue-700' }}"
                        >
                            Tunggakan
                        </a>

                        <a
                            href="{{ route('laporan.index') }}"
                            class="px-4 py-3 text-sm font-medium whitespace-nowrap
                            {{ request()->routeIs('laporan.*')
                                ? 'text-blue-700 border-b-2 border-blue-700'
                                : 'text-gray-700 hover:text-blue-700' }}"
                        >
                            Laporan
                        </a>

                    </div>

                </div>

            </nav>
        @endauth


        {{-- CONTENT UTAMA --}}
        <main class="flex-1">

            <div class="max-w-7xl mx-auto px-6 py-6">

                {{ $slot }}

            </div>

        </main>


        {{-- FOOTER --}}
        <footer class="bg-white border-t border-gray-200">

            <div class="max-w-7xl mx-auto px-6 py-6">

                <div class="flex items-center justify-between text-sm text-gray-500">

                    <p>
                        © {{ date('Y') }} SIPANDA
                    </p>

                    <p>
                        Sistem Informasi Pajak Daerah
                    </p>

                </div>

            </div>

        </footer>

    </div>

</body>

</html>