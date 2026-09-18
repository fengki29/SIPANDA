

<?php $__env->startSection('title', 'Detail User'); ?>

<?php $__env->startSection('content'); ?>

<div class="mx-auto max-w-4xl space-y-6">

    
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <div class="mb-3">

                <a
                    href="<?php echo e(route('users.index')); ?>"
                    class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-blue-700"
                >
                    ← Kembali ke Manajemen User
                </a>

            </div>

            <h2 class="text-2xl font-bold text-gray-800">
                Detail User
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Informasi lengkap akun pengguna SIPANDA.
            </p>

        </div>


        <div class="flex items-center gap-2">

            <a
                href="<?php echo e(route('users.edit', $user)); ?>"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800"
            >

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
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13l-3.105-3.105a4.5 4.5 0 011.13-1.897L16.862 4.487z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 7.125L16.875 4.5"
                    />
                </svg>

                Edit User

            </a>


            <?php if($user->id !== auth()->id()): ?>

                <button
                    type="button"
                    onclick="confirmDeleteUser()"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100"
                >

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
                            d="M6 7.5h12"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.75 7.5V5.25A1.5 1.5 0 0111.25 3.75h1.5a1.5 1.5 0 011.5 1.5V7.5"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8.25 7.5l.75 12h6l.75-12"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.5 11.25v4.5M13.5 11.25v4.5"
                        />
                    </svg>

                    Hapus

                </button>

            <?php endif; ?>

        </div>

    </div>


    
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        
        <div class="h-32 bg-gradient-to-r from-blue-700 via-blue-600 to-blue-500">
        </div>


        
        <div class="px-6 pb-7">

            <div class="-mt-16 flex flex-col items-center sm:flex-row sm:items-end sm:gap-5">


                
                <div class="relative shrink-0">

                    <div class="flex h-32 w-32 items-center justify-center overflow-hidden rounded-full border-4 border-white bg-blue-100 text-4xl font-bold text-blue-700 shadow-lg">

                        <?php if($user->avatar): ?>

                            <img
                                src="<?php echo e(asset('storage/' . $user->avatar)); ?>"
                                alt="Foto <?php echo e($user->name); ?>"
                                class="h-full w-full object-cover"
                            >

                        <?php else: ?>

                            <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>


                        <?php endif; ?>

                    </div>


                    
                    <div class="absolute bottom-2 right-2 flex h-7 w-7 items-center justify-center rounded-full border-4 border-white bg-green-500">
                    </div>

                </div>


                
                <div class="mt-4 flex-1 text-center sm:mb-2 sm:mt-0 sm:text-left">

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center">

                        <h3 class="text-2xl font-bold text-gray-800">
                            <?php echo e($user->name); ?>

                        </h3>


                        <?php if($user->id === auth()->id()): ?>

                            <span class="inline-flex self-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700 sm:self-auto">
                                Akun Anda
                            </span>

                        <?php endif; ?>

                    </div>


                    <p class="mt-1 text-sm text-gray-500">
                        <?php echo e($user->email); ?>

                    </p>

                </div>


                
                <div class="mt-4 sm:mb-3 sm:mt-0">

                    <?php if($user->role === 'admin'): ?>

                        <span class="inline-flex rounded-full bg-purple-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-purple-700">
                            ADMIN
                        </span>

                    <?php else: ?>

                        <span class="inline-flex rounded-full bg-green-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-green-700">
                            PETUGAS
                        </span>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>


    
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="border-b border-gray-200 px-6 py-4">

            <h3 class="font-semibold text-gray-800">
                Informasi Akun
            </h3>

            <p class="mt-1 text-sm text-gray-500">
                Detail informasi akun pengguna.
            </p>

        </div>


        <div class="grid grid-cols-1 gap-x-8 gap-y-6 p-6">


            
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Nama Lengkap
                </p>

                <p class="mt-1.5 text-sm font-semibold text-gray-800">
                    <?php echo e($user->name); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Email
                </p>

                <p class="mt-1.5 break-all text-sm font-semibold text-gray-800">
                    <?php echo e($user->email); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Role
                </p>

                <div class="mt-1.5">

                    <?php if($user->role === 'admin'): ?>

                        <span class="inline-flex rounded-full bg-purple-100 px-3 py-1 text-xs font-bold text-purple-700">
                            ADMIN
                        </span>

                    <?php else: ?>

                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
                            PETUGAS
                        </span>

                    <?php endif; ?>

                </div>

            </div>


            
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                    ID User
                </p>

                <p class="mt-1.5 text-sm font-semibold text-gray-800">
                    #<?php echo e($user->id); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Terdaftar
                </p>

                <p class="mt-1.5 text-sm font-semibold text-gray-800">
                    <?php echo e($user->created_at?->format('d F Y, H:i') ?? '-'); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Terakhir Diperbarui
                </p>

                <p class="mt-1.5 text-sm font-semibold text-gray-800">
                    <?php echo e($user->updated_at?->format('d F Y, H:i') ?? '-'); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Status Akun
                </p>

                <div class="mt-1.5">

                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">

                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                        AKTIF

                    </span>

                </div>

            </div>


            
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Foto Profil
                </p>

                <p class="mt-1.5 text-sm font-semibold text-gray-800">

                    <?php if($user->avatar): ?>

                        Sudah diatur

                    <?php else: ?>

                        Belum ada foto

                    <?php endif; ?>

                </p>

            </div>

        </div>

    </div>


    
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="border-b border-gray-200 px-6 py-4">

            <h3 class="font-semibold text-gray-800">
                Hak Akses Sistem
            </h3>

            <p class="mt-1 text-sm text-gray-500">
                Modul yang dapat diakses oleh pengguna berdasarkan role.
            </p>

        </div>


        <div class="grid grid-cols-1 gap-3 p-6">


            
            <div class="flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700">
                    ✓
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Dashboard
                </span>

            </div>


            
            <div class="flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700">
                    ✓
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Wajib Pajak
                </span>

            </div>


            
            <div class="flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700">
                    ✓
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Objek Pajak
                </span>

            </div>


            
            <div class="flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700">
                    ✓
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Tagihan
                </span>

            </div>


            
            <div class="flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700">
                    ✓
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Pembayaran
                </span>

            </div>


            
            <div class="flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700">
                    ✓
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Tunggakan
                </span>

            </div>


            
            <div class="flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700">
                    ✓
                </div>

                <span class="text-sm font-medium text-gray-700">
                    Laporan
                </span>

            </div>


            
            <?php if($user->role === 'admin'): ?>

                
                <div class="flex items-center gap-3 rounded-lg border border-purple-200 bg-purple-50 px-4 py-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-purple-100 text-purple-700">
                        ✓
                    </div>

                    <span class="text-sm font-medium text-purple-700">
                        Jenis Pajak
                    </span>

                </div>


                
                <div class="flex items-center gap-3 rounded-lg border border-purple-200 bg-purple-50 px-4 py-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-purple-100 text-purple-700">
                        ✓
                    </div>

                    <span class="text-sm font-medium text-purple-700">
                        Target Pajak
                    </span>

                </div>


                
                <div class="flex items-center gap-3 rounded-lg border border-purple-200 bg-purple-50 px-4 py-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-purple-100 text-purple-700">
                        ✓
                    </div>

                    <span class="text-sm font-medium text-purple-700">
                        Manajemen User
                    </span>

                </div>


                
                <div class="flex items-center gap-3 rounded-lg border border-purple-200 bg-purple-50 px-4 py-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-purple-100 text-purple-700">
                        ✓
                    </div>

                    <span class="text-sm font-medium text-purple-700">
                        Audit Log
                    </span>

                </div>

            <?php endif; ?>

        </div>

    </div>


    
    <?php if($user->id !== auth()->id()): ?>

        <form
            id="delete-user-form"
            method="POST"
            action="<?php echo e(route('users.destroy', $user)); ?>"
            class="hidden"
        >

            <?php echo csrf_field(); ?>

            <?php echo method_field('DELETE'); ?>

        </form>

    <?php endif; ?>

</div>


<script>

    function confirmDeleteUser() {

        const confirmed =
            confirm(
                'Yakin ingin menghapus user <?php echo e($user->name); ?>?'
            );

        if (confirmed) {

            document
                .getElementById('delete-user-form')
                .submit();

        }

    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/users/show.blade.php ENDPATH**/ ?>