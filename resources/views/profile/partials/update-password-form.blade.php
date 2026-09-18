<section>
    <header>
        <div class="flex items-start gap-3">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 5.25a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.5a7.5 7.5 0 0115 0"
                    />
                </svg>
            </div>

            <div>
                <h2 class="text-lg font-bold text-slate-900">
                    Ubah Password
                </h2>

                <p class="mt-1 text-sm leading-6 text-slate-500">
                    Gunakan password yang kuat dan sulit ditebak untuk menjaga keamanan akun.
                </p>
            </div>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        {{-- PASSWORD SAAT INI --}}
        <div>
            <x-input-label
                for="update_password_current_password"
                value="Password Saat Ini"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-2 block w-full rounded-xl border-slate-300 bg-slate-50 px-4 py-3 text-sm shadow-sm transition focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />
        </div>

        {{-- PASSWORD BARU --}}
        <div>
            <x-input-label
                for="update_password_password"
                value="Password Baru"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-2 block w-full rounded-xl border-slate-300 bg-slate-50 px-4 py-3 text-sm shadow-sm transition focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />
        </div>

        {{-- KONFIRMASI PASSWORD --}}
        <div>
            <x-input-label
                for="update_password_password_confirmation"
                value="Konfirmasi Password Baru"
                class="text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-2 block w-full rounded-xl border-slate-300 bg-slate-50 px-4 py-3 text-sm shadow-sm transition focus:border-blue-500 focus:bg-white focus:ring-blue-500"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        {{-- BUTTON --}}
        <div class="flex items-center gap-4 pt-2">
            <button
                type="submit"
                class="inline-flex items-center gap-2 rounded-xl bg-blue-700 px-5 py-2.5 text-sm font-bold text-white shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:bg-blue-800 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-200"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 12h14M12 5l7 7-7 7"
                    />
                </svg>

                Simpan Password
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="text-sm font-semibold text-emerald-600"
                >
                    Password berhasil diperbarui.
                </p>
            @endif
        </div>
    </form>
</section>