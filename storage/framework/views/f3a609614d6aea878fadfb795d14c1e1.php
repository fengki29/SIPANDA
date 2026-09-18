

<?php $__env->startSection('title', 'Detail Target Pajak'); ?>

<?php $__env->startSection('content'); ?>

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">

        
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <a
                    href="<?php echo e(route('target-pajak.index', ['tahun' => $targetPajak->tahun])); ?>"
                    class="mb-4 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-indigo-600"
                >
                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>

                    Kembali ke Target Pajak
                </a>

                <h1 class="text-2xl font-bold text-slate-800">
                    Detail Target Pajak
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi lengkap target penerimaan pajak.
                </p>

            </div>


            <div class="flex flex-col gap-2 sm:flex-row">

                <a
                    href="<?php echo e(route('target-pajak.edit', $targetPajak)); ?>"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700"
                >

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M16.862 4.487l1.687-1.688a2.121 2.121 0 013 3l-1.688 1.687M16.862 4.487L8.84 12.51a4.5 4.5 0 00-1.06 1.83l-.6 2.26 2.26-.6a4.5 4.5 0 001.83-1.06l8.022-8.022M16.862 4.487l3 3"
                        />
                    </svg>

                    Edit

                </a>

            </div>

        </div>


        
        <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200">

            
            <div class="border-b border-slate-200 bg-gradient-to-r from-indigo-50 to-white px-6 py-6 sm:px-8">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                    <div class="flex items-center gap-4">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-indigo-100 text-indigo-600">

                            <svg
                                class="h-7 w-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.105 0 2.05.447 2.598 1.1M12 8V6m0 2c-1.105 0-2.05.447-2.598 1.1M12 16v2m0-2c1.105 0 2.05-.447 2.598-1.1M12 16c-1.105 0-2.05-.447-2.598-1.1M18 12a6 6 0 11-12 0 6 6 0 0112 0z"
                                />
                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-medium text-slate-500">
                                Jenis Pajak
                            </p>

                            <h2 class="text-xl font-bold text-slate-800">
                                <?php echo e($targetPajak->jenisPajak->nama ?? '-'); ?>

                            </h2>

                            <?php if(!empty($targetPajak->jenisPajak?->kode)): ?>

                                <p class="mt-1 text-xs font-medium text-slate-400">
                                    Kode: <?php echo e($targetPajak->jenisPajak->kode); ?>

                                </p>

                            <?php endif; ?>

                        </div>

                    </div>


                    <div>

                        <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1.5 text-xs font-bold text-indigo-700">

                            Tahun <?php echo e($targetPajak->tahun); ?>


                        </span>

                    </div>

                </div>

            </div>


            
            <div class="p-6 sm:p-8">

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Tahun Pajak
                        </p>

                        <p class="mt-2 text-xl font-bold text-slate-800">
                            <?php echo e($targetPajak->tahun); ?>

                        </p>

                    </div>


                    
                    <div class="rounded-xl border border-indigo-100 bg-indigo-50 p-5">

                        <p class="text-xs font-semibold uppercase tracking-wider text-indigo-500">
                            Target Penerimaan
                        </p>

                        <p class="mt-2 text-xl font-bold text-indigo-700">
                            Rp <?php echo e(number_format((float) $targetPajak->target, 0, ',', '.')); ?>

                        </p>

                    </div>

                </div>


                
                <div class="mt-5 rounded-xl border border-slate-200 p-5">

                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Jenis Pajak
                    </p>

                    <div class="mt-2 flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">

                        <p class="text-base font-semibold text-slate-800">
                            <?php echo e($targetPajak->jenisPajak->nama ?? '-'); ?>

                        </p>

                        <?php if(!empty($targetPajak->jenisPajak?->kode)): ?>

                            <span class="inline-flex w-fit rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                <?php echo e($targetPajak->jenisPajak->kode); ?>

                            </span>

                        <?php endif; ?>

                    </div>

                </div>


                
                <div class="mt-5 rounded-xl border border-slate-200 p-5">

                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Keterangan
                    </p>

                    <?php if($targetPajak->keterangan): ?>

                        <p class="mt-3 whitespace-pre-line text-sm leading-6 text-slate-700">
                            <?php echo e($targetPajak->keterangan); ?>

                        </p>

                    <?php else: ?>

                        <p class="mt-3 text-sm text-slate-400">
                            Tidak ada keterangan.
                        </p>

                    <?php endif; ?>

                </div>


                
                <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2">

                    <div class="rounded-xl border border-slate-200 p-4">

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            ID Target
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            #<?php echo e($targetPajak->id); ?>

                        </p>

                    </div>


                    <div class="rounded-xl border border-slate-200 p-4">

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Dibuat
                        </p>

                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            <?php echo e($targetPajak->created_at?->format('d/m/Y H:i') ?? '-'); ?>

                        </p>

                    </div>

                </div>

            </div>


            
            <div class="flex flex-col gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">

                <a
                    href="<?php echo e(route('target-pajak.index', ['tahun' => $targetPajak->tahun])); ?>"
                    class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                >
                    Kembali
                </a>


                <form
                    action="<?php echo e(route('target-pajak.destroy', $targetPajak)); ?>"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus target pajak ini?')"
                >

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-red-50 px-5 py-2.5 text-sm font-semibold text-red-700 transition hover:bg-red-100 sm:w-auto"
                    >

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4h6v3m-9 0h12"
                            />
                        </svg>

                        Hapus Target

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/target-pajak/show.blade.php ENDPATH**/ ?>