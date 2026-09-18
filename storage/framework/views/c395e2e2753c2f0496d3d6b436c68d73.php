<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Bukti Pembayaran - <?php echo e($pembayaran->nomor_pembayaran); ?>

    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 32px;
            background: #f1f5f9;
            color: #1e293b;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }

        .print-wrapper {
            max-width: 800px;
            margin: 0 auto;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 18px;
        }

        .button {
            border: 0;
            border-radius: 7px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .button-primary {
            background: #1d4ed8;
            color: white;
        }

        .button-secondary {
            background: white;
            color: #475569;
            border: 1px solid #cbd5e1;
        }

        .receipt {
            background: white;
            border: 1px solid #cbd5e1;
            padding: 42px;
        }

        .header {
            display: flex;
            align-items: center;
            gap: 16px;
            padding-bottom: 22px;
            border-bottom: 3px solid #1d4ed8;
        }

        /*
        |--------------------------------------------------------------------------
        | LOGO SIPANDA
        |--------------------------------------------------------------------------
        */

        .logo {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eff6ff;
            border-radius: 10px;
            padding: 5px;
            overflow: hidden;
        }

        .logo img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: contain;
        }

        .brand h1 {
            margin: 0;
            color: #0f172a;
            font-size: 22px;
            letter-spacing: 0.3px;
        }

        .brand p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 12px;
        }

        .title {
            text-align: center;
            margin: 30px 0 25px;
        }

        .title h2 {
            margin: 0;
            color: #0f172a;
            font-size: 19px;
            letter-spacing: 0.5px;
        }

        .title p {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 12px;
        }

        .section {
            margin-top: 25px;
        }

        .section-title {
            margin: 0 0 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e2e8f0;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px 0;
            vertical-align: top;
        }

        td:first-child {
            width: 190px;
            color: #64748b;
        }

        td:last-child {
            color: #1e293b;
            font-weight: 600;
        }

        .amount-box {
            margin-top: 25px;
            border: 1px solid #bfdbfe;
            background: #eff6ff;
            padding: 20px;
        }

        .amount-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 8px 0;
        }

        .amount-row + .amount-row {
            border-top: 1px solid #dbeafe;
        }

        .amount-label {
            color: #475569;
        }

        .amount-value {
            font-weight: 700;
            text-align: right;
        }

        .amount-main {
            color: #1d4ed8;
            font-size: 17px;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 999px;
            background: #dcfce7;
            color: #166534;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        /*
        |--------------------------------------------------------------------------
        | PETUGAS
        |--------------------------------------------------------------------------
        */

        .signature {
            margin-top: 35px;
            display: flex;
            justify-content: flex-end;
        }

        .signature-box {
            width: 220px;
            text-align: center;
            color: #475569;
            font-size: 12px;
        }

        .signature-title {
            margin-bottom: 4px;
            color: #475569;
            font-size: 12px;
        }

        .signature-space {
            height: 55px;
        }

        .petugas-avatar {
            width: 52px;
            height: 52px;
            margin: 0 auto 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 50%;
            border: 2px solid #e2e8f0;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 17px;
            font-weight: 700;
        }

        .petugas-avatar img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        .signature-name {
            color: #0f172a;
            font-size: 13px;
            font-weight: 700;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .signature-role {
            margin-top: 5px;
            color: #64748b;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .footer {
            margin-top: 38px;
            padding-top: 18px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #64748b;
            font-size: 11px;
            line-height: 1.6;
        }

        @media print {

            @page {
                size: A4;
                margin: 12mm;
            }

            body {
                padding: 0;
                background: white;
            }

            .print-wrapper {
                max-width: none;
            }

            .actions {
                display: none;
            }

            .receipt {
                border: 0;
                padding: 15px;
            }

        }

    </style>

</head>


<body>

    <div class="print-wrapper">


        

        <div class="actions">

            <a
                href="<?php echo e(route('pembayaran.index')); ?>"
                class="button button-secondary"
            >
                ← Kembali
            </a>

            <button
                type="button"
                onclick="window.print()"
                class="button button-primary"
            >
                🖨 Cetak Bukti Pembayaran
            </button>

        </div>


        

        <div class="receipt">


            

            <div class="header">

                

                <div class="logo">

                    <img
                        src="<?php echo e(asset('images/sipanda-logo.png')); ?>"
                        alt="Logo SIPANDA"
                    >

                </div>


                

                <div class="brand">

                    <h1>
                        SIPANDA
                    </h1>

                    <p>
                        Sistem Informasi Pajak Daerah
                    </p>

                </div>

            </div>


            

            <div class="title">

                <h2>
                    BUKTI PEMBAYARAN PAJAK
                </h2>

                <p>
                    Dokumen resmi pencatatan pembayaran pajak daerah
                </p>

            </div>


            

            <div class="section">

                <h3 class="section-title">
                    Informasi Pembayaran
                </h3>

                <table>

                    <tr>

                        <td>
                            Nomor Pembayaran
                        </td>

                        <td>
                            <?php echo e($pembayaran->nomor_pembayaran); ?>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            Tanggal Pembayaran
                        </td>

                        <td>
                            <?php echo e($pembayaran->tanggal_pembayaran?->format('d F Y') ?? '-'); ?>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            Metode Pembayaran
                        </td>

                        <td>
                            <?php echo e(ucfirst($pembayaran->metode_pembayaran ?? '-')); ?>

                        </td>

                    </tr>

                </table>

            </div>


            

            <div class="section">

                <h3 class="section-title">
                    Data Wajib Pajak
                </h3>

                <table>

                    <tr>

                        <td>
                            NIK
                        </td>

                        <td>
                            <?php echo e($pembayaran->tagihan->wajibPajak->nik ?? '-'); ?>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            Nama
                        </td>

                        <td>
                            <?php echo e($pembayaran->tagihan->wajibPajak->nama ?? '-'); ?>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            Alamat
                        </td>

                        <td>
                            <?php echo e($pembayaran->tagihan->wajibPajak->alamat ?? '-'); ?>

                        </td>

                    </tr>

                </table>

            </div>


            

            <div class="section">

                <h3 class="section-title">
                    Data Tagihan
                </h3>

                <table>

                    <tr>

                        <td>
                            Nomor Tagihan
                        </td>

                        <td>
                            <?php echo e($pembayaran->tagihan->nomor_tagihan ?? '-'); ?>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            Jenis Pajak
                        </td>

                        <td>
                            <?php echo e($pembayaran->tagihan->jenisPajak->nama ?? '-'); ?>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            Objek Pajak
                        </td>

                        <td>
                            <?php echo e($pembayaran->tagihan->objekPajak->nama_objek ?? '-'); ?>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            Tahun Pajak
                        </td>

                        <td>
                            <?php echo e($pembayaran->tagihan->tahun_pajak ?? '-'); ?>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            Jatuh Tempo
                        </td>

                        <td>
                            <?php echo e($pembayaran->tagihan->tanggal_jatuh_tempo?->format('d F Y') ?? '-'); ?>

                        </td>

                    </tr>

                </table>

            </div>


            

            <div class="amount-box">


                <div class="amount-row">

                    <span class="amount-label">
                        Total Tagihan
                    </span>

                    <span class="amount-value">
                        Rp
                        <?php echo e(number_format(
                            $pembayaran->tagihan->total_tagihan,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </span>

                </div>


                <div class="amount-row">

                    <span class="amount-label">
                        Pembayaran Ini
                    </span>

                    <span class="amount-value amount-main">
                        Rp
                        <?php echo e(number_format(
                            $pembayaran->jumlah_bayar,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </span>

                </div>


                <div class="amount-row">

                    <span class="amount-label">
                        Total Sudah Dibayar
                    </span>

                    <span class="amount-value">
                        Rp
                        <?php echo e(number_format(
                            $totalSudahDibayar,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </span>

                </div>


                <div class="amount-row">

                    <span class="amount-label">
                        Sisa Tagihan
                    </span>

                    <span class="amount-value">
                        Rp
                        <?php echo e(number_format(
                            $sisaTagihan,
                            0,
                            ',',
                            '.'
                        )); ?>

                    </span>

                </div>


                <div class="amount-row">

                    <span class="amount-label">
                        Status
                    </span>

                    <span class="amount-value">

                        <span class="status">

                            <?php echo e(str_replace(
                                '_',
                                ' ',
                                ucfirst($pembayaran->tagihan->status)
                            )); ?>


                        </span>

                    </span>

                </div>

            </div>


            

            <?php if($pembayaran->keterangan): ?>

                <div class="section">

                    <h3 class="section-title">
                        Keterangan
                    </h3>

                    <p>
                        <?php echo e($pembayaran->keterangan); ?>

                    </p>

                </div>

            <?php endif; ?>


            

            <div class="signature">

                <div class="signature-box">

                    <div class="signature-title">
                        Petugas
                    </div>

                    <?php if($pembayaran->petugas): ?>

                        

                        <div class="petugas-avatar">

                            <?php if($pembayaran->petugas->avatar): ?>

                                <img
                                    src="<?php echo e(asset('storage/' . $pembayaran->petugas->avatar)); ?>"
                                    alt="Foto <?php echo e($pembayaran->petugas->name); ?>"
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


                        

                        <div class="signature-name">
                            <?php echo e($pembayaran->petugas->name); ?>

                        </div>


                        

                        <div class="signature-role">
                            <?php echo e($pembayaran->petugas->role); ?>

                        </div>

                    <?php else: ?>

                        <div class="signature-space"></div>

                        <div class="signature-name">
                            Petugas Tidak Tercatat
                        </div>

                        <div class="signature-role">
                            -
                        </div>

                    <?php endif; ?>

                </div>

            </div>


            

            <div class="footer">

                <p>
                    Bukti pembayaran ini dicetak dari
                    Sistem Informasi Pajak Daerah (SIPANDA).
                </p>

                <p>
                    Terima kasih telah memenuhi kewajiban pembayaran pajak daerah.
                </p>

            </div>


        </div>

    </div>

</body>

</html><?php /**PATH D:\PROJECT 1\sipanda\resources\views/pembayaran/print.blade.php ENDPATH**/ ?>