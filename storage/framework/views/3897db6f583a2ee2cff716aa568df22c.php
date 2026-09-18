

<?php $__env->startSection('title', 'Detail Pembayaran - SIPANDA'); ?>

<?php $__env->startSection('content'); ?>

    <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>
            <p class="mb-1 text-sm font-medium text-blue-700">
                Pembayaran Pajak
            </p>

            <h2 class="text-2xl font-bold tracking-tight text-slate-900">
                Detail Pembayaran
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Informasi lengkap transaksi pembayaran pajak.
            </p>
        </div>

        <div class="flex flex-wrap gap-2">

            <a
                href="<?php echo e(route('pembayaran.index')); ?>"
                class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50"
            >
                ← Kembali
            </a>

            <a
                href="<?php echo e(route('pembayaran.edit', $pembayaran)); ?>"
                class="inline-flex items-center gap-2 rounded-lg border border-yellow-200 bg-yellow-50 px-4 py-2.5 text-sm font-semibold text-yellow-700 transition hover:bg-yellow-100"
            >
                Edit
            </a>

            <a
                href="<?php echo e(route('pembayaran.print', $pembayaran)); ?>"
                class="inline-flex items-center gap-2 rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800"
            >
                🖨 Cetak Bukti
            </a>

        </div>

    </div>


    

    <div class="mb-6 grid gap-5 md:grid-cols-3">

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                Nomor Pembayaran
            </p>

            <p class="mt-2 text-lg font-bold text-slate-900">
                <?php echo e($pembayaran->nomor_pembayaran); ?>

            </p>

        </div>


        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                Tanggal Pembayaran
            </p>

            <p class="mt-2 text-lg font-bold text-slate-900">
                <?php echo e($pembayaran->tanggal_pembayaran?->format('d F Y') ?? '-'); ?>

            </p>

        </div>


        <div class="rounded-xl border border-blue-100 bg-blue-50 p-5 shadow-sm">

            <p class="text-xs font-semibold uppercase tracking-wider text-blue-500">
                Jumlah Pembayaran
            </p>

            <p class="mt-2 text-xl font-bold text-blue-700">
                Rp <?php echo e(number_format($pembayaran->jumlah_bayar, 0, ',', '.')); ?>

            </p>

        </div>

    </div>


    

    <div class="grid gap-6 lg:grid-cols-3">


        

        <div class="lg:col-span-2">

            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="font-bold text-slate-900">
                        Informasi Pembayaran
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Detail transaksi pembayaran yang tercatat dalam sistem.
                    </p>

                </div>


                <div class="px-6 py-5">

                    <dl class="divide-y divide-slate-100">

                        <div class="grid gap-2 py-4 sm:grid-cols-3">

                            <dt class="text-sm font-medium text-slate-500">
                                Nomor Pembayaran
                            </dt>

                            <dd class="text-sm font-semibold text-slate-900 sm:col-span-2">
                                <?php echo e($pembayaran->nomor_pembayaran); ?>

                            </dd>

                        </div>


                        <div class="grid gap-2 py-4 sm:grid-cols-3">

                            <dt class="text-sm font-medium text-slate-500">
                                Tanggal Pembayaran
                            </dt>

                            <dd class="text-sm font-semibold text-slate-900 sm:col-span-2">
                                <?php echo e($pembayaran->tanggal_pembayaran?->format('d F Y') ?? '-'); ?>

                            </dd>

                        </div>


                        <div class="grid gap-2 py-4 sm:grid-cols-3">

                            <dt class="text-sm font-medium text-slate-500">
                                Metode Pembayaran
                            </dt>

                            <dd class="text-sm font-semibold capitalize text-slate-900 sm:col-span-2">
                                <?php echo e($pembayaran->metode_pembayaran ?? '-'); ?>

                            </dd>

                        </div>


                        <div class="grid gap-2 py-4 sm:grid-cols-3">

                            <dt class="text-sm font-medium text-slate-500">
                                Jumlah Dibayar
                            </dt>

                            <dd class="text-base font-bold text-blue-700 sm:col-span-2">
                                Rp <?php echo e(number_format($pembayaran->jumlah_bayar, 0, ',', '.')); ?>

                            </dd>

                        </div>


                        <?php if($pembayaran->keterangan): ?>

                            <div class="grid gap-2 py-4 sm:grid-cols-3">

                                <dt class="text-sm font-medium text-slate-500">
                                    Keterangan
                                </dt>

                                <dd class="text-sm text-slate-700 sm:col-span-2">
                                    <?php echo e($pembayaran->keterangan); ?>

                                </dd>

                            </div>

                        <?php endif; ?>

                    </dl>

                </div>

            </div>

        </div>


        

        <div class="space-y-6">


            

            <div>

                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-6 py-5">

                        <h3 class="font-bold text-slate-900">
                            Wajib Pajak
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Pemilik kewajiban pajak.
                        </p>

                    </div>


                    <div class="px-6 py-5">

                        <div class="mb-5 flex items-center gap-3">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-blue-100 text-sm font-bold text-blue-700">

                                <?php echo e(strtoupper(substr(
                                    $pembayaran->tagihan->wajibPajak->nama ?? 'W',
                                    0,
                                    1
                                ))); ?>


                            </div>

                            <div class="min-w-0">

                                <p class="font-bold text-slate-900">
                                    <?php echo e($pembayaran->tagihan->wajibPajak->nama ?? '-'); ?>

                                </p>

                                <p class="text-xs text-slate-500">
                                    NIK: <?php echo e($pembayaran->tagihan->wajibPajak->nik ?? '-'); ?>

                                </p>

                            </div>

                        </div>


                        <div class="space-y-4 text-sm">

                            <div>

                                <p class="text-xs font-medium text-slate-400">
                                    Alamat
                                </p>

                                <p class="mt-1 text-slate-700">
                                    <?php echo e($pembayaran->tagihan->wajibPajak->alamat ?? '-'); ?>

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            

            <div>

                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-200 px-6 py-5">

                        <h3 class="font-bold text-slate-900">
                            Petugas
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Petugas yang mencatat transaksi ini.
                        </p>

                    </div>


                    <div class="px-6 py-5">

                        <?php if($pembayaran->petugas): ?>

                            <div class="flex items-center gap-4">

                                

                                <div class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-white bg-blue-100 text-lg font-bold text-blue-700 shadow-sm ring-1 ring-slate-200">

                                    <?php if($pembayaran->petugas->avatar): ?>

                                        <img
                                            src="<?php echo e(asset('storage/' . $pembayaran->petugas->avatar)); ?>"
                                            alt="Foto <?php echo e($pembayaran->petugas->name); ?>"
                                            class="h-full w-full object-cover"
                                        >

                                    <?php else: ?>

                                        <?php echo e(strtoupper(
                                            substr(
                                                $pembayaran->petugas->name,
                                                0,
                                                1
                                            )
                                        )); ?>


                                    <?php endif; ?>

                                </div>


                                

                                <div class="min-w-0">

                                    <p class="font-bold text-slate-900">
                                        <?php echo e($pembayaran->petugas->name); ?>

                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        <?php echo e($pembayaran->petugas->email); ?>

                                    </p>

                                    <span class="mt-2 inline-flex rounded-full bg-blue-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-blue-700">

                                        <?php echo e($pembayaran->petugas->role); ?>


                                    </span>

                                </div>

                            </div>

                        <?php else: ?>

                            

                            <div class="flex items-center gap-4">

                                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-slate-100 text-lg font-bold text-slate-400">

                                    —

                                </div>

                                <div>

                                    <p class="font-semibold text-slate-500">
                                        Tidak Tercatat
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Pembayaran dibuat sebelum pencatatan petugas diterapkan.
                                    </p>

                                </div>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </div>


    

    <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 px-6 py-5">

            <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">

                <div>

                    <h3 class="font-bold text-slate-900">
                        Informasi Tagihan
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Tagihan yang terkait dengan transaksi pembayaran ini.
                    </p>

                </div>


                <a
                    href="<?php echo e(route('tagihan.show', $pembayaran->tagihan)); ?>"
                    class="text-sm font-semibold text-blue-700 hover:text-blue-800 hover:underline"
                >
                    Lihat Detail Tagihan →
                </a>

            </div>

        </div>


        <div class="grid gap-6 px-6 py-6 md:grid-cols-2 lg:grid-cols-4">

            <div>

                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Nomor Tagihan
                </p>

                <p class="mt-2 text-sm font-bold text-slate-900">
                    <?php echo e($pembayaran->tagihan->nomor_tagihan ?? '-'); ?>

                </p>

            </div>


            <div>

                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Jenis Pajak
                </p>

                <p class="mt-2 text-sm font-semibold text-slate-900">
                    <?php echo e($pembayaran->tagihan->jenisPajak->nama ?? '-'); ?>

                </p>

            </div>


            <div>

                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Tahun Pajak
                </p>

                <p class="mt-2 text-sm font-bold text-slate-900">
                    <?php echo e($pembayaran->tagihan->tahun_pajak ?? '-'); ?>

                </p>

            </div>


            <div>

                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Status
                </p>

                <div class="mt-2">

                    <?php
                        $status = $pembayaran->tagihan->status;
                    ?>

                    <?php if($status === 'lunas'): ?>

                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
                            Lunas
                        </span>

                    <?php elseif($status === 'sebagian'): ?>

                        <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-bold text-yellow-700">
                            Sebagian
                        </span>

                    <?php elseif($status === 'jatuh_tempo'): ?>

                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">
                            Jatuh Tempo
                        </span>

                    <?php else: ?>

                        <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-700">
                            Belum Bayar
                        </span>

                    <?php endif; ?>

                </div>

            </div>

        </div>


        

        <div class="border-t border-slate-200 bg-slate-50 px-6 py-5">

            <div class="grid gap-5 md:grid-cols-3">

                <div>

                    <p class="text-xs font-medium text-slate-500">
                        Total Tagihan
                    </p>

                    <p class="mt-1 text-lg font-bold text-slate-900">
                        Rp
                        <?php echo e(number_format(
                            $pembayaran->tagihan->total_tagihan,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </p>

                </div>


                <div>

                    <p class="text-xs font-medium text-slate-500">
                        Pembayaran Saat Ini
                    </p>

                    <p class="mt-1 text-lg font-bold text-blue-700">
                        Rp
                        <?php echo e(number_format(
                            $pembayaran->jumlah_bayar,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </p>

                </div>


                <div>

                    <?php
                        $totalDibayar = $pembayaran->tagihan
                            ->pembayarans()
                            ->sum('jumlah_bayar');

                        $sisaTagihan = max(
                            (float) $pembayaran->tagihan->total_tagihan
                            - (float) $totalDibayar,
                            0
                        );
                    ?>

                    <p class="text-xs font-medium text-slate-500">
                        Sisa Tagihan
                    </p>

                    <p class="mt-1 text-lg font-bold <?php echo e($sisaTagihan > 0 ? 'text-red-600' : 'text-green-600'); ?>">
                        Rp
                        <?php echo e(number_format(
                            $sisaTagihan,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </p>

                </div>

            </div>

        </div>

    </div>


    

    <div class="mt-6 flex flex-col items-center justify-between gap-4 rounded-xl border border-blue-100 bg-blue-50 px-6 py-5 sm:flex-row">

        <div>

            <p class="font-semibold text-blue-900">
                Bukti pembayaran tersedia
            </p>

            <p class="mt-1 text-sm text-blue-700">
                Cetak bukti ini untuk diberikan kepada wajib pajak.
            </p>

        </div>


        <a
            href="<?php echo e(route('pembayaran.print', $pembayaran)); ?>"
            class="inline-flex shrink-0 items-center gap-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-blue-800"
        >
            🖨 Cetak Bukti Pembayaran
        </a>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PROJECT 1\sipanda\resources\views/pembayaran/show.blade.php ENDPATH**/ ?>