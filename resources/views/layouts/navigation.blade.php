<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">

            {{-- Logo / Nama Aplikasi --}}
            <div class="flex">
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}">
                        <div class="text-xl font-bold text-blue-700">
                            SIPANDA
                        </div>
                    </a>
                </div>
            </div>

            {{-- Menu kanan --}}
            <div class="hidden sm:ms-6 sm:flex sm:items-center">

                {{-- Nama user --}}
                <div class="me-4 text-sm text-gray-600">
                    {{ Auth::user()->name }}

                    <span class="ml-2 rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                </div>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700"
                    >
                        Logout
                    </button>
                </form>

            </div>

            {{-- Hamburger mobile --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500"
                >
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden"
    >
        <div class="space-y-1 pb-3 pt-2">

            <a
                href="{{ route('dashboard') }}"
                class="block border-l-4 border-blue-500 bg-blue-50 px-4 py-2 text-base font-medium text-blue-700"
            >
                Dashboard
            </a>

        </div>

        <div class="border-t border-gray-200 pb-3 pt-4">

            <div class="px-4">
                <div class="text-base font-medium text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="text-sm font-medium text-gray-500">
                    {{ Auth::user()->email }}
                </div>

                <div class="mt-2">
                    <span class="rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="block w-full rounded-md bg-red-600 px-4 py-2 text-left text-sm font-medium text-white hover:bg-red-700"
                    >
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>