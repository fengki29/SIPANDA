@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')

<div class="mx-auto max-w-3xl space-y-6">

    {{-- HEADER --}}
    <div>

        <div class="mb-3">

            <a
                href="{{ route('users.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-blue-700"
            >
                ← Kembali ke Manajemen User
            </a>

        </div>

        <h2 class="text-2xl font-bold text-gray-800">
            Tambah User
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Tambahkan akun pengguna baru untuk mengakses sistem SIPANDA.
        </p>

    </div>


    {{-- VALIDATION ERROR --}}
    @if ($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 p-4">

            <div class="flex gap-3">

                <div class="mt-0.5 font-bold text-red-600">
                    !
                </div>

                <div>

                    <p class="text-sm font-semibold text-red-700">
                        Data belum dapat disimpan
                    </p>

                    <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-600">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- FORM CARD --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">


        {{-- CARD HEADER --}}
        <div class="border-b border-gray-200 bg-gray-50 px-6 py-4">

            <h3 class="font-semibold text-gray-800">
                Informasi Akun
            </h3>

            <p class="mt-1 text-sm text-gray-500">
                Isi data akun pengguna dengan lengkap.
            </p>

        </div>


        {{-- FORM --}}
        <form
            method="POST"
            action="{{ route('users.store') }}"
            enctype="multipart/form-data"
            class="space-y-6 p-6"
        >

            @csrf


            {{-- ================================================= --}}
            {{-- FOTO PROFIL --}}
            {{-- ================================================= --}}

            <div>

                <label class="mb-3 block text-sm font-semibold text-gray-700">
                    Foto Profil
                </label>


                <div class="flex flex-col items-center gap-5 rounded-xl border border-gray-200 bg-gray-50 p-6 sm:flex-row">


                    {{-- PREVIEW --}}
                    <div class="shrink-0">

                        <div
                            id="avatar-preview-wrapper"
                            class="flex h-28 w-28 items-center justify-center overflow-hidden rounded-full border-4 border-white bg-blue-100 text-3xl font-bold text-blue-700 shadow-md"
                        >

                            <span id="avatar-placeholder">
                                ?
                            </span>

                            <img
                                id="avatar-preview"
                                src=""
                                alt="Preview foto profil"
                                class="hidden h-full w-full object-cover"
                            >

                        </div>

                    </div>


                    {{-- UPLOAD --}}
                    <div class="flex-1 text-center sm:text-left">

                        <p class="text-sm font-semibold text-gray-800">
                            Tambahkan foto pengguna
                        </p>

                        <p class="mt-1 text-xs leading-relaxed text-gray-500">
                            Foto akan digunakan sebagai avatar Admin atau Petugas
                            di dalam sistem SIPANDA.
                        </p>


                        <div class="mt-4">

                            <label
                                for="avatar"
                                class="inline-flex cursor-pointer items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-blue-400 hover:bg-blue-50 hover:text-blue-700"
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
                                        d="M3.75 16.5l4.72-4.72a2.25 2.25 0 013.18 0l2.1 2.1m0 0l1.35-1.35a2.25 2.25 0 013.18 0l1.97 1.97M4.5 19.5h15a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5h-15A1.5 1.5 0 003 6v12a1.5 1.5 0 001.5 1.5z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 8.25h.008v.008H8.25V8.25z"
                                    />
                                </svg>

                                Pilih Foto

                            </label>

                            <input
                                type="file"
                                id="avatar"
                                name="avatar"
                                accept="image/jpeg,image/png,image/webp"
                                class="hidden"
                            >

                        </div>


                        <p
                            id="avatar-name"
                            class="mt-2 hidden text-xs font-medium text-blue-600"
                        ></p>

                        <p class="mt-2 text-xs text-gray-400">
                            JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                        </p>


                        @error('avatar')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>

            </div>


            {{-- NAMA --}}
            <div>

                <label
                    for="name"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Nama Lengkap
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    placeholder="Contoh: Budi Santoso"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none transition placeholder:text-gray-400 focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                >

                @error('name')

                    <p class="mt-1.5 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- EMAIL --}}
            <div>

                <label
                    for="email"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Email
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    placeholder="Contoh: petugas@bapenda.go.id"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none transition placeholder:text-gray-400 focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                >

                <p class="mt-1.5 text-xs text-gray-500">
                    Gunakan alamat email yang aktif dan belum digunakan akun lain.
                </p>

                @error('email')

                    <p class="mt-1.5 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ROLE --}}
            <div>

                <label
                    for="role"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Role Pengguna
                    <span class="text-red-500">*</span>
                </label>

                <select
                    id="role"
                    name="role"
                    required
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                >

                    <option value="">
                        -- Pilih Role --
                    </option>

                    <option
                        value="petugas"
                        {{ old('role') === 'petugas' ? 'selected' : '' }}
                    >
                        Petugas
                    </option>

                    <option
                        value="admin"
                        {{ old('role') === 'admin' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                </select>


                <div class="mt-2 rounded-lg bg-gray-50 px-3 py-2.5">

                    <p class="text-xs leading-relaxed text-gray-600">

                        <span class="font-semibold text-gray-700">
                            Petugas:
                        </span>

                        dapat mengelola proses operasional seperti Wajib Pajak,
                        Objek Pajak, Tagihan, Pembayaran, Tunggakan, dan Laporan.

                    </p>

                    <p class="mt-1 text-xs leading-relaxed text-gray-600">

                        <span class="font-semibold text-gray-700">
                            Admin:
                        </span>

                        memiliki akses tambahan untuk Manajemen User,
                        Jenis Pajak, Target Pajak, dan Riwayat Aktivitas.

                    </p>

                </div>


                @error('role')

                    <p class="mt-1.5 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- PASSWORD --}}
            <div>

                <label
                    for="password"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Password
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    minlength="8"
                    placeholder="Minimal 8 karakter"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none transition placeholder:text-gray-400 focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                >

                <p class="mt-1.5 text-xs text-gray-500">
                    Password harus memiliki minimal 8 karakter.
                </p>

                @error('password')

                    <p class="mt-1.5 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- CONFIRM PASSWORD --}}
            <div>

                <label
                    for="password_confirmation"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Konfirmasi Password
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    minlength="8"
                    placeholder="Masukkan ulang password"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none transition placeholder:text-gray-400 focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                >

                <p
                    id="password-match"
                    class="mt-1.5 hidden text-xs"
                ></p>

            </div>


            {{-- BUTTONS --}}
            <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('users.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800"
                >
                    Simpan User
                </button>

            </div>

        </form>

    </div>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | PREVIEW FOTO
    |--------------------------------------------------------------------------
    */

    const avatarInput =
        document.getElementById('avatar');

    const avatarPreview =
        document.getElementById('avatar-preview');

    const avatarPlaceholder =
        document.getElementById('avatar-placeholder');

    const avatarName =
        document.getElementById('avatar-name');


    avatarInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {

            avatarPreview.src = '';

            avatarPreview.classList.add('hidden');

            avatarPlaceholder.classList.remove('hidden');

            avatarName.classList.add('hidden');

            return;

        }


        const reader =
            new FileReader();


        reader.onload = function (event) {

            avatarPreview.src =
                event.target.result;

            avatarPreview.classList.remove('hidden');

            avatarPlaceholder.classList.add('hidden');

        };


        reader.readAsDataURL(file);


        avatarName.textContent =
            'File dipilih: ' + file.name;

        avatarName.classList.remove('hidden');

    });


    /*
    |--------------------------------------------------------------------------
    | PASSWORD MATCH
    |--------------------------------------------------------------------------
    */

    const password =
        document.getElementById('password');

    const confirmation =
        document.getElementById('password_confirmation');

    const matchMessage =
        document.getElementById('password-match');


    function checkPasswordMatch() {

        if (!confirmation.value) {

            matchMessage.classList.add('hidden');

            return;

        }


        matchMessage.classList.remove('hidden');


        if (password.value === confirmation.value) {

            matchMessage.textContent =
                '✓ Password cocok.';

            matchMessage.classList.remove(
                'text-red-600'
            );

            matchMessage.classList.add(
                'text-green-600'
            );

        } else {

            matchMessage.textContent =
                '✕ Password tidak cocok.';

            matchMessage.classList.remove(
                'text-green-600'
            );

            matchMessage.classList.add(
                'text-red-600'
            );

        }

    }


    password.addEventListener(
        'input',
        checkPasswordMatch
    );

    confirmation.addEventListener(
        'input',
        checkPasswordMatch
    );

</script>

@endsection