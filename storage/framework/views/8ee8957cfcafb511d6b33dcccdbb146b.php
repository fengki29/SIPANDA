

<?php $__env->startSection('title', 'Detail Tagihan'); ?>

<?php $__env->startSection('content'); ?>

<div class="mb-6">

    
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div class="flex items-center gap-3">

            <a
                href="<?php echo e(route('tagihan.index')); ?>"
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white text-gray-500 shadow-sm ring-1 ring-gray-200 transition hover:bg-gray-50 hover:text-gray-700"
                title="Kembali"
            >
                ←
            </a>

            <div>

                <h2 class="text-2xl font-bold text-gray-800">
                    Detail Tagihan
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Informasi lengkap tagihan pajak
                </p>

            </div>

        </div>


        <div class="flex flex-wrap items-center gap-2">

            
            <?php if($tagihan->status !== 'lunas'): ?>

                <a
                    href="<?php echo e(route('pembayaran.create', ['tagihan_id' => $tagihan->id])); ?>"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800"
                >
                    Bayar Tagihan
                </a>

            <?php endif; ?>


            
            <a
                href="<?php echo e(route('tagihan.edit', $tagihan)); ?>"
                class="inline-flex items-center justify-center rounded-lg bg-yellow-500 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-yellow-600"
            >
                Edit
            </a>


            
            <?php if($tagihan->pembayarans->count() === 0): ?>

                <form
                    action="<?php echo e(route('tagihan.destroy', $tagihan)); ?>"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus tagihan ini?')"
                >

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700"
                    >
                        Hapus
                    </button>

                </form>

            <?php endif; ?>

        </div>

    </div>

</div>



<div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

    <div class="border-b border-gray-200 bg-gray-50 px-6 py-5">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Nomor Tagihan
                </p>

                <h3 class="mt-1 text-xl font-bold text-gray-800">
                    <?php echo e($tagihan->nomor_tagihan); ?>

                </h3>

            </div>


            <div>

                <?php if($tagihan->status === 'lunas'): ?>

                    <span class="inline-flex rounded-full bg-green-100 px-4 py-1.5 text-xs font-semibold text-green-700">
                        Lunas
                    </span>

                <?php elseif($tagihan->status === 'sebagian'): ?>

                    <span class="inline-flex rounded-full bg-yellow-100 px-4 py-1.5 text-xs font-semibold text-yellow-700">
                        Sebagian Dibayar
                    </span>

                <?php elseif($tagihan->status === 'jatuh_tempo'): ?>

                    <span class="inline-flex rounded-full bg-red-100 px-4 py-1.5 text-xs font-semibold text-red-700">
                        Jatuh Tempo
                    </span>

                <?php else: ?>

                    <span class="inline-flex rounded-full bg-blue-100 px-4 py-1.5 text-xs font-semibold text-blue-700">
                        Belum Bayar
                    </span>

                <?php endif; ?>

            </div>

        </div>

    </div>


    <div class="p-6">

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Tahun Pajak
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    <?php echo e($tagihan->tahun_pajak); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Tanggal Jatuh Tempo
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    <?php echo e($tagihan->tanggal_jatuh_tempo?->format('d/m/Y') ?? '-'); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Jenis Pajak
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    <?php echo e($tagihan->jenisPajak->nama ?? '-'); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    ID Tagihan
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    #<?php echo e($tagihan->id); ?>

                </p>

            </div>

        </div>

    </div>

</div>



<div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

    <div class="border-b border-gray-200 px-6 py-5">

        <h3 class="text-base font-semibold text-gray-800">
            Informasi Wajib Pajak
        </h3>

    </div>


    <div class="p-6">

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Nama
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    <?php echo e($tagihan->wajibPajak->nama ?? '-'); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    NIK
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    <?php echo e($tagihan->wajibPajak->nik ?? '-'); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Nomor HP
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    <?php echo e($tagihan->wajibPajak->no_hp ?? '-'); ?>

                </p>

            </div>


            
            <div class="md:col-span-2 lg:col-span-3">

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Alamat
                </p>

                <p class="mt-1 text-sm text-gray-700">
                    <?php echo e($tagihan->wajibPajak->alamat ?? '-'); ?>

                </p>

            </div>

        </div>

    </div>

</div>



<div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

    <div class="border-b border-gray-200 px-6 py-5">

        <h3 class="text-base font-semibold text-gray-800">
            Informasi Objek Pajak
        </h3>

    </div>


    <div class="p-6">

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Nama Objek
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    <?php echo e($tagihan->objekPajak->nama_objek ?? '-'); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Jenis Pajak
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    <?php echo e($tagihan->jenisPajak->nama ?? '-'); ?>

                </p>

            </div>


            
            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                    Tarif
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-800">
                    <?php echo e($tagihan->jenisPajak->tarif ?? '-'); ?>%
                </p>

            </div>


            
            <?php if($tagihan->objekPajak?->alamat): ?>

                <div class="md:col-span-2 lg:col-span-3">

                    <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                        Alamat Objek Pajak
                    </p>

                    <p class="mt-1 text-sm text-gray-700">
                        <?php echo e($tagihan->objekPajak->alamat); ?>

                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>



<div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

    <div class="border-b border-gray-200 px-6 py-5">

        <h3 class="text-base font-semibold text-gray-800">
            Rincian Tagihan
        </h3>

    </div>


    <div class="p-6">

        <?php

            $totalDibayar = $tagihan->pembayarans->sum(
                'jumlah_bayar'
            );

            $sisaTagihan = max(
                (float) $tagihan->total_tagihan
                -
                (float) $totalDibayar,
                0
            );

            $persentaseBayar = (float) $tagihan->total_tagihan > 0
                ? min(
                    (
                        (float) $totalDibayar
                        /
                        (float) $tagihan->total_tagihan
                    ) * 100,
                    100
                )
                : 0;

        ?>


        <div class="space-y-4">

            
            <div class="flex items-center justify-between border-b border-gray-100 pb-4">

                <span class="text-sm text-gray-600">
                    Pokok Pajak
                </span>

                <span class="text-sm font-semibold text-gray-800">
                    Rp <?php echo e(number_format(
                        (float) $tagihan->pokok_pajak,
                        0,
                        ',',
                        '.'
                    )); ?>

                </span>

            </div>


            
            <div class="flex items-center justify-between border-b border-gray-100 pb-4">

                <span class="text-sm text-gray-600">
                    Denda
                </span>

                <span class="text-sm font-semibold text-gray-800">
                    Rp <?php echo e(number_format(
                        (float) ($tagihan->denda ?? 0),
                        0,
                        ',',
                        '.'
                    )); ?>

                </span>

            </div>


            
            <div class="flex items-center justify-between rounded-lg bg-blue-50 px-4 py-4">

                <span class="text-base font-semibold text-blue-700">
                    Total Tagihan
                </span>

                <span class="text-xl font-bold text-blue-700">
                    Rp <?php echo e(number_format(
                        (float) $tagihan->total_tagihan,
                        0,
                        ',',
                        '.'
                    )); ?>

                </span>

            </div>


            
            <div class="pt-2">

                <div class="mb-2 flex items-center justify-between">

                    <span class="text-xs font-medium text-gray-500">
                        Progress Pembayaran
                    </span>

                    <span class="text-xs font-bold text-gray-700">
                        <?php echo e(number_format($persentaseBayar, 0)); ?>%
                    </span>

                </div>

                <div class="h-2.5 overflow-hidden rounded-full bg-gray-200">

                    <div
                        class="h-full rounded-full bg-green-500 transition-all"
                        style="width: <?php echo e($persentaseBayar); ?>%"
                    ></div>

                </div>

            </div>

        </div>

    </div>

</div>



<div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

    <div class="border-b border-gray-200 px-6 py-5">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h3 class="text-base font-semibold text-gray-800">
                    Riwayat Pembayaran
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Daftar pembayaran yang berkaitan dengan tagihan ini.
                </p>

            </div>


            <?php if($tagihan->status !== 'lunas'): ?>

                <a
                    href="<?php echo e(route('pembayaran.create', ['tagihan_id' => $tagihan->id])); ?>"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-800"
                >
                    + Tambah Pembayaran
                </a>

            <?php endif; ?>

        </div>

    </div>


    <?php if($tagihan->pembayarans->count() > 0): ?>

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            No
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Nomor Pembayaran
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Tanggal
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Jumlah
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Metode
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Petugas
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100 bg-white">

                    <?php $__currentLoopData = $tagihan->pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembayaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr class="transition hover:bg-gray-50">

                            
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                <?php echo e($loop->iteration); ?>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="text-sm font-semibold text-gray-800">
                                    <?php echo e($pembayaran->nomor_pembayaran); ?>

                                </span>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">

                                <?php echo e($pembayaran->tanggal_pembayaran?->format('d/m/Y') ?? '-'); ?>


                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="text-sm font-semibold text-gray-800">
                                    Rp <?php echo e(number_format(
                                        (float) $pembayaran->jumlah_bayar,
                                        0,
                                        ',',
                                        '.'
                                    )); ?>

                                </span>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4">

                                <?php

                                    $metode = [
                                        'tunai' => 'Tunai',
                                        'transfer' => 'Transfer',
                                        'qris' => 'QRIS',
                                        'lainnya' => 'Lainnya',
                                    ];

                                ?>

                                <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                    <?php echo e($metode[$pembayaran->metode_pembayaran] ?? $pembayaran->metode_pembayaran); ?>

                                </span>

                            </td>


                            
                            <td class="px-6 py-4">

                                <?php if($pembayaran->petugas): ?>

                                    <div class="flex items-center gap-3">

                                        
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center overflow-hidden rounded-full border border-gray-200 bg-blue-100 font-bold text-blue-700 shadow-sm">

                                            <?php if($pembayaran->petugas->avatar): ?>

                                                <img
                                                    src="<?php echo e(asset('storage/' . $pembayaran->petugas->avatar)); ?>"
                                                    alt="Foto <?php echo e($pembayaran->petugas->name); ?>"
                                                    class="h-full w-full object-cover"
                                                >

                                            <?php else: ?>

                                                <span class="text-xs font-bold">
                                                    <?php echo e(strtoupper(
                                                        substr(
                                                            $pembayaran->petugas->name,
                                                            0,
                                                            1
                                                        )
                                                    )); ?>

                                                </span>

                                            <?php endif; ?>

                                        </div>


                                        <div class="min-w-0">

                                            <p class="whitespace-nowrap text-sm font-semibold text-gray-800">
                                                <?php echo e($pembayaran->petugas->name); ?>

                                            </p>

                                            <p class="text-xs capitalize text-gray-500">
                                                <?php echo e($pembayaran->petugas->role); ?>

                                            </p>

                                        </div>

                                    </div>

                                <?php else: ?>

                                    <div class="flex items-center gap-2">

                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-gray-200 bg-gray-100 text-sm font-bold text-gray-400">
                                            —
                                        </div>

                                        <div>

                                            <p class="whitespace-nowrap text-sm font-medium text-gray-500">
                                                Tidak tercatat
                                            </p>

                                            <p class="text-xs text-gray-400">
                                                Data pembayaran lama
                                            </p>

                                        </div>

                                    </div>

                                <?php endif; ?>

                            </td>


                            
                            <td class="whitespace-nowrap px-6 py-4 text-center">

                                <a
                                    href="<?php echo e(route('pembayaran.show', $pembayaran)); ?>"
                                    class="inline-flex rounded-md bg-gray-100 px-3 py-2 text-xs font-semibold text-gray-700 transition hover:bg-gray-200"
                                >
                                    Detail
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>


        
        <div class="border-t border-gray-200 bg-gray-50 px-6 py-5">

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                
                <div>

                    <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                        Total Tagihan
                    </p>

                    <p class="mt-1 text-lg font-bold text-gray-800">
                        Rp <?php echo e(number_format(
                            (float) $tagihan->total_tagihan,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </p>

                </div>


                
                <div>

                    <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                        Sudah Dibayar
                    </p>

                    <p class="mt-1 text-lg font-bold text-green-600">
                        Rp <?php echo e(number_format(
                            (float) $totalDibayar,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </p>

                </div>


                
                <div>

                    <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                        Sisa Tagihan
                    </p>

                    <p class="mt-1 text-lg font-bold <?php echo e($sisaTagihan > 0 ? 'text-red-600' : 'text-green-600'); ?>">
                        Rp <?php echo e(number_format(
                            (float) $sisaTagihan,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </p>

                </div>

            </div>

        </div>

    <?php else: ?>

        <div class="px-6 py-12 text-center">

            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 text-2xl">
                💳
            </div>

            <h3 class="mt-4 text-sm font-semibold text-gray-800">
                Belum Ada Pembayaran
            </h3>

            <p class="mt-1 text-sm text-gray-500">
                Belum ada pembayaran yang tercatat untuk tagihan ini.
            </p>


            <?php if($tagihan->status !== 'lunas'): ?>

                <a
                    href="<?php echo e(route('pembayaran.create', ['tagihan_id' => $tagihan->id])); ?>"
                    class="mt-5 inline-flex rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-800"
                >
                    + Tambah Pembayaran
                </a>

            <?php endif; ?>

        </div>

    <?php endif; ?>

</div>



<div class="mt-6 flex justify-end">

    <a
        href="<?php echo e(route('tagihan.index')); ?>"
        class="inline-flex items-center justify-center rounded-lg bg-gray-100 px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-200"
    >
        ← Kembali ke Tagihan
    </a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/tagihan/show.blade.php ENDPATH**/ ?>