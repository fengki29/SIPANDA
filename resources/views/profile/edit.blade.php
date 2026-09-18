@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')

<div class="space-y-6">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div>
        <div class="flex items-center gap-3">

            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA] ring-1 ring-blue-100">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"
                    />
                </svg>

            </div>

            <div>

                <h2 class="text-2xl font-bold text-slate-800">
                    Profil Saya
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola informasi akun dan keamanan profil Anda.
                </p>

            </div>

        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- SUCCESS --}}
    {{-- ========================================================= --}}

    @if(session('status') === 'profile-updated')

        <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4">

            <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">

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
                        d="M5 13l4 4L19 7"
                    />
                </svg>

            </div>

            <div>

                <p class="text-sm font-semibold text-emerald-800">
                    Profil berhasil diperbarui.
                </p>

                <p class="mt-0.5 text-xs text-emerald-700">
                    Perubahan informasi akun Anda telah disimpan.
                </p>

            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- ERROR --}}
    {{-- ========================================================= --}}

    @if($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 px-5 py-4">

            <div class="flex items-start gap-3">

                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-600">

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
                            d="M12 9v3.75m0 3.75h.007v.008H12v-.008z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.29 3.86l-7.82 13.5A1.75 1.75 0 003.99 20h16.02a1.75 1.75 0 001.52-2.64l-7.82-13.5a1.75 1.75 0 00-3.04 0z"
                        />
                    </svg>

                </div>

                <div>

                    <p class="text-sm font-semibold text-red-800">
                        Periksa kembali data Anda.
                    </p>

                    <ul class="mt-1 space-y-1 text-xs text-red-700">

                        @foreach($errors->all() as $error)

                            <li>
                                • {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- PROFILE INFORMATION --}}
    {{-- ========================================================= --}}

    <div class="overflow-visible rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-6 py-5 sm:px-7">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-[#1769AA]">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"
                        />
                    </svg>

                </div>

                <div>

                    <h3 class="text-base font-bold text-slate-800">
                        Informasi Profil
                    </h3>

                    <p class="mt-0.5 text-xs text-slate-500">
                        Informasi dasar akun yang digunakan untuk mengakses SIPANDA.
                    </p>

                </div>

            </div>

        </div>


        <form
            method="POST"
            action="{{ route('profile.update') }}"
            enctype="multipart/form-data"
            class="p-6 sm:p-7"
        >

            @csrf
            @method('PATCH')


            {{-- ================================================= --}}
            {{-- AVATAR --}}
            {{-- ================================================= --}}

            <div class="flex flex-col gap-6 border-b border-slate-100 pb-7 sm:flex-row sm:items-center">

                <div class="relative shrink-0">

                    <div
                        id="avatar-preview"
                        class="flex h-28 w-28 items-center justify-center overflow-hidden rounded-2xl border-4 border-white bg-blue-100 text-3xl font-bold text-blue-700 shadow-md ring-1 ring-slate-200"
                    >

                        @if($user->avatar)

                            <img
                                src="{{ asset('storage/' . $user->avatar) }}"
                                alt="Foto {{ $user->name }}"
                                class="h-full w-full object-cover"
                            >

                        @else

                            {{ strtoupper(substr($user->name, 0, 1)) }}

                        @endif

                    </div>

                    <label
                        for="avatar"
                        class="absolute -bottom-2 -right-2 flex h-10 w-10 cursor-pointer items-center justify-center rounded-xl bg-[#1769AA] text-white shadow-lg ring-4 ring-white transition hover:bg-[#0D6EAD]"
                        title="Ganti foto"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 7.5h1.386a1.5 1.5 0 001.342-.83l.294-.588A1.5 1.5 0 0111.114 5h1.772a1.5 1.5 0 011.342.83l.294.588a1.5 1.5 0 001.342.83h1.386A2.25 2.25 0 0119.5 9.75v8.25a2.25 2.25 0 01-2.25 2.25h-10.5a2.25 2.25 0 01-2.25-2.25V9.75A2.25 2.25 0 016.75 7.5z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 14.25a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                            />
                        </svg>

                    </label>

                    <input
                        id="avatar"
                        name="avatar"
                        type="file"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                        class="hidden"
                    >

                </div>


                <div>

                    <h4 class="text-sm font-bold text-slate-800">
                        Foto Profil
                    </h4>

                    <p class="mt-1 max-w-lg text-sm leading-6 text-slate-500">
                        Gunakan foto yang jelas agar mudah dikenali oleh petugas lainnya.
                    </p>

                    <p class="mt-2 text-xs font-medium text-slate-400">
                        JPG, JPEG, PNG, atau WEBP • Maksimal 2 MB
                    </p>

                    <p
                        id="selected-file"
                        class="mt-2 hidden text-xs font-semibold text-[#1769AA]"
                    ></p>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- FORM --}}
            {{-- ================================================= --}}

            <div class="mt-7 grid grid-cols-1 gap-6 lg:grid-cols-2">

                {{-- NAMA --}}

                <div>

                    <label
                        for="name"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Lengkap
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"
                                />
                            </svg>

                        </div>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $user->name) }}"
                            required
                            autocomplete="name"
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-12 pr-4 text-sm font-medium text-slate-700 outline-none transition hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>

                </div>


                {{-- EMAIL --}}

                <div>

                    <label
                        for="email"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Email
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 7.5A2.25 2.25 0 015.25 5.25h13.5A2.25 2.25 0 0121 7.5v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 16.5v-9z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3.75 6.75L12 13.5l8.25-6.75"
                                />
                            </svg>

                        </div>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', $user->email) }}"
                            required
                            autocomplete="username"
                            class="h-[52px] w-full rounded-xl border border-slate-200 bg-slate-50/60 pl-12 pr-4 text-sm font-medium text-slate-700 outline-none transition hover:border-slate-300 hover:bg-white focus:border-[#1769AA] focus:bg-white focus:ring-4 focus:ring-blue-50"
                        >

                    </div>

                </div>


                {{-- ROLE --}}

                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Role Sistem
                    </label>

                    <div class="flex h-[52px] items-center gap-3 rounded-xl border border-slate-200 bg-slate-50/60 px-4">

                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-[#1769AA]">

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
                                    d="M12 12a4.5 4.5 0 100-9 4.5 4.5 0 000 9zM4.5 21a7.5 7.5 0 0115 0"
                                />
                            </svg>

                        </div>

                        <span class="text-sm font-semibold capitalize text-slate-700">
                            {{ $user->role }}
                        </span>

                        @if($user->isAdmin())

                            <span class="ml-auto rounded-full border border-blue-100 bg-blue-50 px-3 py-1 text-[10px] font-bold uppercase tracking-wide text-blue-700">
                                ADMIN
                            </span>

                        @else

                            <span class="ml-auto rounded-full border border-slate-200 bg-slate-100 px-3 py-1 text-[10px] font-bold uppercase tracking-wide text-slate-600">
                                PETUGAS
                            </span>

                        @endif

                    </div>

                    <p class="mt-2 text-xs text-slate-400">
                        Role akun hanya dapat diubah melalui Manajemen User.
                    </p>

                </div>


                {{-- STATUS EMAIL --}}

                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Status Email
                    </label>

                    <div class="flex h-[52px] items-center gap-3 rounded-xl border border-slate-200 bg-slate-50/60 px-4">

                        @if($user->email_verified_at)

                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">

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
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                            </div>

                            <span class="text-sm font-semibold text-slate-700">
                                Email terverifikasi
                            </span>

                            <span class="ml-auto rounded-full bg-emerald-50 px-3 py-1 text-[10px] font-bold uppercase tracking-wide text-emerald-700">
                                Terverifikasi
                            </span>

                        @else

                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">

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
                                        d="M12 9v3.75m0 3.75h.007v.008H12v-.008z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M10.29 3.86l-7.82 13.5A1.75 1.75 0 003.99 20h16.02a1.75 1.75 0 001.52-2.64l-7.82-13.5a1.75 1.75 0 00-3.04 0z"
                                    />
                                </svg>

                            </div>

                            <span class="text-sm font-semibold text-slate-700">
                                Email belum diverifikasi
                            </span>

                            <span class="ml-auto rounded-full bg-amber-50 px-3 py-1 text-[10px] font-bold uppercase tracking-wide text-amber-700">
                                Belum
                            </span>

                        @endif

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- SAVE --}}
            {{-- ================================================= --}}

            <div class="mt-7 flex flex-col gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:items-center sm:justify-between">

                <p class="text-xs text-slate-400">
                    Perubahan profil akan langsung diterapkan pada akun Anda.
                </p>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#1769AA] px-5 py-3 text-sm font-bold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#0D6EAD] hover:shadow-md focus:outline-none focus:ring-4 focus:ring-blue-100"
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
                            d="M5.25 12.75l4.5 4.5 9-10.5"
                        />
                    </svg>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>


    {{-- ========================================================= --}}
    {{-- PASSWORD --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-6 py-5 sm:px-7">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.5 10.5V7.75a4.5 4.5 0 00-9 0v2.75"
                        />
                        <rect
                            width="15"
                            height="10.5"
                            x="4.5"
                            y="10.5"
                            rx="2.25"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 14.25v2.25"
                        />
                    </svg>

                </div>

                <div>

                    <h3 class="text-base font-bold text-slate-800">
                        Keamanan Akun
                    </h3>

                    <p class="mt-0.5 text-xs text-slate-500">
                        Perbarui password untuk menjaga keamanan akun SIPANDA.
                    </p>

                </div>

            </div>

        </div>

        <div class="p-6 sm:p-7">

            @include('profile.partials.update-password-form')

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- DELETE ACCOUNT --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-2xl border border-red-200 bg-white shadow-sm">

        <div class="border-b border-red-100 bg-red-50/50 px-6 py-5 sm:px-7">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-100 text-red-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 6.75h16.5M9.75 10.5v6m4.5-6v6M6.75 6.75l.75 12a2.25 2.25 0 002.25 2.25h4.5a2.25 2.25 0 002.25-2.25l.75-12M9 6.75V4.5A1.5 1.5 0 0110.5 3h3A1.5 1.5 0 0115 4.5v2.25"
                        />
                    </svg>

                </div>

                <div>

                    <h3 class="text-base font-bold text-red-800">
                        Zona Berbahaya
                    </h3>

                    <p class="mt-0.5 text-xs text-red-600">
                        Tindakan berikut bersifat permanen.
                    </p>

                </div>

            </div>

        </div>

        <div class="p-6 sm:p-7">

            @include('profile.partials.delete-user-form')

        </div>

    </div>

</div>


{{-- ============================================================= --}}
{{-- AVATAR PREVIEW --}}
{{-- ============================================================= --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const avatarInput = document.getElementById('avatar');
    const avatarPreview = document.getElementById('avatar-preview');
    const selectedFile = document.getElementById('selected-file');

    if (!avatarInput || !avatarPreview) {
        return;
    }

    avatarInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        if (selectedFile) {
            selectedFile.textContent = 'File dipilih: ' + file.name;
            selectedFile.classList.remove('hidden');
        }

        const reader = new FileReader();

        reader.onload = function (event) {

            avatarPreview.innerHTML = `
                <img
                    src="${event.target.result}"
                    alt="Preview avatar"
                    class="h-full w-full object-cover"
                >
            `;

        };

        reader.readAsDataURL(file);

    });

});
</script>

@endsection