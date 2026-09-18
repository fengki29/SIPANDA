<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>Laporan Pajak Daerah</title>

    <style>
        @page {
            margin: 24px 28px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
            color: #1e293b;
            margin: 0;
        }

        .header {
            width: 100%;
            border-bottom: 3px solid #1d4ed8;
            padding-bottom: 12px;
            margin-bottom: 14px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .logo-cell {
            width: 65px;
            vertical-align: middle;
        }

        .logo {
            width: 52px;
            height: 52px;
            object-fit: contain;
        }

        .title-cell {
            vertical-align: middle;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            color: #1e3a8a;
            margin: 0 0 4px;
        }

        .subtitle {
            font-size: 9px;
            color: #64748b;
            margin: 0;
        }

        .date-cell {
            width: 170px;
            text-align: right;
            vertical-align: middle;
            color: #64748b;
            font-size: 8px;
        }

        .section-title {
            font-size: 11px;
            font-weight: bold;
            color: #1e3a8a;
            margin: 16px 0 8px;
        }

        .filter-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        .filter-table td {
            border: 1px solid #e2e8f0;
            padding: 6px 8px;
        }

        .filter-label {
            width: 100px;
            background: #f8fafc;
            color: #64748b;
            font-weight: bold;
        }

        .stats-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 7px;
            margin: 0 -7px 8px;
        }

        .stat {
            width: 20%;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 9px;
            vertical-align: top;
        }

        .stat-label {
            font-size: 7px;
            color: #64748b;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 12px;
            font-weight: bold;
            color: #0f172a;
        }

        .stat-blue {
            border-top: 3px solid #2563eb;
        }

        .stat-green {
            border-top: 3px solid #16a34a;
        }

        .stat-orange {
            border-top: 3px solid #ea580c;
        }

        .stat-red {
            border-top: 3px solid #dc2626;
        }

        .stat-purple {
            border-top: 3px solid #7c3aed;
        }

        .progress-wrapper {
            margin-top: 5px;
        }

        .progress-bg {
            width: 100%;
            height: 7px;
            background: #e2e8f0;
            border-radius: 5px;
            overflow: hidden;
        }

        .progress-bar {
            height: 7px;
            background: #2563eb;
            border-radius: 5px;
        }

        .progress-text {
            margin-top: 4px;
            font-size: 7px;
            color: #64748b;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
        }

        .summary-table th {
            background: #1e3a8a;
            color: white;
            padding: 6px;
            text-align: left;
            font-size: 8px;
        }

        .summary-table td {
            border: 1px solid #e2e8f0;
            padding: 6px;
            font-size: 8px;
        }

        .summary-table tr:nth-child(even) td {
            background: #f8fafc;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .main-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .main-table th {
            background: #1e3a8a;
            color: white;
            border: 1px solid #1e3a8a;
            padding: 5px 4px;
            font-size: 7px;
            text-align: left;
        }

        .main-table td {
            border: 1px solid #cbd5e1;
            padding: 5px 4px;
            font-size: 7px;
            vertical-align: top;
        }

        .main-table tr:nth-child(even) td {
            background: #f8fafc;
        }

        .col-no {
            width: 3%;
            text-align: center;
        }

        .col-number {
            width: 9%;
        }

        .col-taxpayer {
            width: 12%;
        }

        .col-object {
            width: 11%;
        }

        .col-type {
            width: 10%;
        }

        .col-year {
            width: 5%;
            text-align: center;
        }

        .col-money {
            width: 9%;
            text-align: right;
        }

        .col-status {
            width: 8%;
            text-align: center;
        }

        .status {
            display: inline-block;
            padding: 3px 5px;
            border-radius: 4px;
            font-size: 6px;
            font-weight: bold;
        }

        .status-lunas {
            background: #dcfce7;
            color: #166534;
        }

        .status-belum {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-sebagian {
            background: #fef3c7;
            color: #92400e;
        }

        .status-jatuh {
            background: #ffedd5;
            color: #9a3412;
        }

        .empty {
            text-align: center;
            padding: 20px;
            color: #64748b;
        }

        .footer-summary {
            margin-top: 14px;
            border-top: 2px solid #1d4ed8;
            padding-top: 9px;
        }

        .footer-summary-table {
            width: 100%;
            border-collapse: collapse;
        }

        .footer-summary-table td {
            padding: 4px 0;
        }

        .footer-label {
            width: 75%;
            color: #64748b;
            text-align: right;
            padding-right: 15px !important;
        }

        .footer-value {
            font-weight: bold;
            text-align: right;
        }

        .footer {
            margin-top: 18px;
            border-top: 1px solid #e2e8f0;
            padding-top: 8px;
            font-size: 7px;
            color: #94a3b8;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .footer-right {
            text-align: right;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">
        <table class="header-table">
            <tr>

                <td class="logo-cell">
                    @php
                        $logoPath = public_path(
                            'images/sipanda-logo.png'
                        );
                    @endphp

                    @if (file_exists($logoPath))
                        <img
                            src="{{ $logoPath }}"
                            class="logo"
                            alt="SIPANDA"
                        >
                    @endif
                </td>

                <td class="title-cell">
                    <div class="title">
                        LAPORAN PAJAK DAERAH
                    </div>

                    <div class="subtitle">
                        SIPANDA — Sistem Informasi Pajak Daerah
                    </div>
                </td>

                <td class="date-cell">
                    Dicetak:
                    {{ now()->format('d-m-Y H:i') }}
                </td>

            </tr>
        </table>
    </div>

    {{-- FILTER --}}
    <div class="section-title">
        Informasi Laporan
    </div>

    <table class="filter-table">
        <tr>
            <td class="filter-label">
                Tahun Pajak
            </td>

            <td>
                {{ $tahun ?: 'Semua Tahun' }}
            </td>

            <td class="filter-label">
                Jenis Pajak
            </td>

            <td>
                {{ $jenisPajakNama }}
            </td>

            <td class="filter-label">
                Status
            </td>

            <td>
                @switch($status)
                    @case('lunas')
                        Lunas
                        @break

                    @case('belum_bayar')
                        Belum Bayar
                        @break

                    @case('sebagian')
                        Sebagian
                        @break

                    @case('jatuh_tempo')
                        Jatuh Tempo
                        @break

                    @default
                        Semua Status
                @endswitch
            </td>
        </tr>
    </table>

    {{-- STATISTIK --}}
    <div class="section-title">
        Ringkasan Penerimaan
    </div>

    <table class="stats-table">
        <tr>

            <td class="stat stat-purple">
                <div class="stat-label">
                    Target Pajak
                </div>

                <div class="stat-value">
                    Rp {{ number_format(
                        $totalTarget,
                        0,
                        ',',
                        '.'
                    ) }}
                </div>
            </td>

            <td class="stat stat-blue">
                <div class="stat-label">
                    Nilai Tagihan
                </div>

                <div class="stat-value">
                    Rp {{ number_format(
                        $totalTagihan,
                        0,
                        ',',
                        '.'
                    ) }}
                </div>
            </td>

            <td class="stat stat-green">
                <div class="stat-label">
                    Realisasi Pembayaran
                </div>

                <div class="stat-value">
                    Rp {{ number_format(
                        $totalPembayaran,
                        0,
                        ',',
                        '.'
                    ) }}
                </div>
            </td>

            <td class="stat stat-orange">
                <div class="stat-label">
                    Pencapaian
                </div>

                <div class="stat-value">
                    {{ number_format(
                        $persentasePencapaian,
                        1,
                        ',',
                        '.'
                    ) }}%
                </div>

                <div class="progress-wrapper">
                    <div class="progress-bg">
                        <div
                            class="progress-bar"
                            style="width: {{ min(
                                $persentasePencapaian,
                                100
                            ) }}%;"
                        ></div>
                    </div>

                    <div class="progress-text">
                        Realisasi dibanding target
                    </div>
                </div>
            </td>

            <td class="stat stat-red">
                <div class="stat-label">
                    Total Tunggakan
                </div>

                <div class="stat-value">
                    Rp {{ number_format(
                        $totalTunggakan,
                        0,
                        ',',
                        '.'
                    ) }}
                </div>
            </td>

        </tr>
    </table>

    {{-- STATUS --}}
    <div class="section-title">
        Status Tagihan
    </div>

    <table class="summary-table">
        <tr>
            <th>
                Total Tagihan
            </th>

            <th>
                Lunas
            </th>

            <th>
                Belum Lunas
            </th>

            <th>
                Total Realisasi
            </th>

            <th>
                Total Tunggakan
            </th>
        </tr>

        <tr>
            <td>
                {{ number_format(
                    $jumlahTagihan,
                    0,
                    ',',
                    '.'
                ) }}
                Tagihan
            </td>

            <td>
                {{ number_format(
                    $jumlahLunas,
                    0,
                    ',',
                    '.'
                ) }}
                Tagihan
            </td>

            <td>
                {{ number_format(
                    $jumlahBelumLunas,
                    0,
                    ',',
                    '.'
                ) }}
                Tagihan
            </td>

            <td class="text-right">
                Rp {{ number_format(
                    $totalPembayaran,
                    0,
                    ',',
                    '.'
                ) }}
            </td>

            <td class="text-right">
                Rp {{ number_format(
                    $totalTunggakan,
                    0,
                    ',',
                    '.'
                ) }}
            </td>
        </tr>
    </table>

    {{-- PER JENIS PAJAK --}}
    @if ($jenisPajakRingkasan->count())
        <div class="section-title">
            Pencapaian Per Jenis Pajak
        </div>

        <table class="summary-table">
            <thead>
                <tr>
                    <th style="width: 5%;">
                        No
                    </th>

                    <th style="width: 20%;">
                        Jenis Pajak
                    </th>

                    <th style="width: 10%;">
                        Kode
                    </th>

                    <th style="width: 20%; text-align:right;">
                        Target
                    </th>

                    <th style="width: 20%; text-align:right;">
                        Realisasi
                    </th>

                    <th style="width: 10%; text-align:center;">
                        Pencapaian
                    </th>

                    <th style="width: 15%; text-align:right;">
                        Selisih
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($jenisPajakRingkasan as $index => $item)
                    <tr>
                        <td class="text-center">
                            {{ $index + 1 }}
                        </td>

                        <td>
                            {{ $item['nama'] }}
                        </td>

                        <td>
                            {{ $item['kode'] }}
                        </td>

                        <td class="text-right">
                            Rp {{ number_format(
                                $item['target'],
                                0,
                                ',',
                                '.'
                            ) }}
                        </td>

                        <td class="text-right">
                            Rp {{ number_format(
                                $item['realisasi'],
                                0,
                                ',',
                                '.'
                            ) }}
                        </td>

                        <td class="text-center">
                            {{ number_format(
                                $item['persentase'],
                                1,
                                ',',
                                '.'
                            ) }}%
                        </td>

                        <td class="text-right">
                            Rp {{ number_format(
                                $item['selisih'],
                                0,
                                ',',
                                '.'
                            ) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- DATA TAGIHAN --}}
    <div class="section-title">
        Detail Data Tagihan
    </div>

    @if ($tagihans->count())

        <table class="main-table">
            <thead>
                <tr>

                    <th class="col-no">
                        No
                    </th>

                    <th class="col-number">
                        Nomor Tagihan
                    </th>

                    <th class="col-taxpayer">
                        Wajib Pajak
                    </th>

                    <th class="col-object">
                        Objek Pajak
                    </th>

                    <th class="col-type">
                        Jenis Pajak
                    </th>

                    <th class="col-year">
                        Tahun
                    </th>

                    <th class="col-money">
                        Pokok
                    </th>

                    <th class="col-money">
                        Denda
                    </th>

                    <th class="col-money">
                        Total
                    </th>

                    <th class="col-money">
                        Dibayar
                    </th>

                    <th class="col-money">
                        Sisa
                    </th>

                    <th class="col-status">
                        Status
                    </th>

                </tr>
            </thead>

            <tbody>

                @foreach ($tagihans as $index => $tagihan)

                    @php
                        $totalTagihanItem =
                            (float) $tagihan->total_tagihan;

                        $totalDibayar =
                            (float) $tagihan
                                ->pembayarans
                                ->sum('jumlah_bayar');

                        $sisa =
                            max(
                                $totalTagihanItem
                                -
                                $totalDibayar,
                                0
                            );

                        $statusClass = match (
                            $tagihan->status
                        ) {
                            'lunas' =>
                                'status-lunas',

                            'sebagian' =>
                                'status-sebagian',

                            'jatuh_tempo' =>
                                'status-jatuh',

                            default =>
                                'status-belum',
                        };

                        $statusLabel = match (
                            $tagihan->status
                        ) {
                            'lunas' =>
                                'Lunas',

                            'sebagian' =>
                                'Sebagian',

                            'jatuh_tempo' =>
                                'Jatuh Tempo',

                            'belum_bayar' =>
                                'Belum Bayar',

                            default =>
                                $tagihan->status,
                        };
                    @endphp

                    <tr>

                        <td class="col-no">
                            {{ $index + 1 }}
                        </td>

                        <td>
                            {{ $tagihan->nomor_tagihan }}
                        </td>

                        <td>
                            <strong>
                                {{ $tagihan->wajibPajak?->nama ?? '-' }}
                            </strong>

                            <br>

                            <span style="color:#64748b;">
                                NIK:
                                {{ $tagihan->wajibPajak?->nik ?? '-' }}
                            </span>
                        </td>

                        <td>
                            {{ $tagihan->objekPajak?->nama_objek ?? '-' }}

                            <br>

                            <span style="color:#64748b;">
                                {{ $tagihan->objekPajak?->alamat_objek ?? '-' }}
                            </span>
                        </td>

                        <td>
                            {{ $tagihan->jenisPajak?->nama ?? '-' }}
                        </td>

                        <td class="text-center">
                            {{ $tagihan->tahun_pajak }}
                        </td>

                        <td class="text-right">
                            Rp {{ number_format(
                                $tagihan->pokok_pajak,
                                0,
                                ',',
                                '.'
                            ) }}
                        </td>

                        <td class="text-right">
                            Rp {{ number_format(
                                $tagihan->denda,
                                0,
                                ',',
                                '.'
                            ) }}
                        </td>

                        <td class="text-right">
                            Rp {{ number_format(
                                $totalTagihanItem,
                                0,
                                ',',
                                '.'
                            ) }}
                        </td>

                        <td class="text-right">
                            Rp {{ number_format(
                                $totalDibayar,
                                0,
                                ',',
                                '.'
                            ) }}
                        </td>

                        <td class="text-right">
                            Rp {{ number_format(
                                $sisa,
                                0,
                                ',',
                                '.'
                            ) }}
                        </td>

                        <td class="text-center">
                            <span class="status {{ $statusClass }}">
                                {{ $statusLabel }}
                            </span>
                        </td>

                    </tr>

                @endforeach

            </tbody>
        </table>

    @else

        <div class="empty">
            Tidak ada data tagihan yang sesuai
            dengan filter laporan.
        </div>

    @endif

    {{-- FOOTER SUMMARY --}}
    <div class="footer-summary">

        <table class="footer-summary-table">

            <tr>
                <td class="footer-label">
                    Total Nilai Tagihan:
                </td>

                <td class="footer-value">
                    Rp {{ number_format(
                        $totalTagihan,
                        0,
                        ',',
                        '.'
                    ) }}
                </td>
            </tr>

            <tr>
                <td class="footer-label">
                    Total Pembayaran:
                </td>

                <td class="footer-value">
                    Rp {{ number_format(
                        $totalPembayaran,
                        0,
                        ',',
                        '.'
                    ) }}
                </td>
            </tr>

            <tr>
                <td class="footer-label">
                    Total Tunggakan:
                </td>

                <td class="footer-value">
                    Rp {{ number_format(
                        $totalTunggakan,
                        0,
                        ',',
                        '.'
                    ) }}
                </td>
            </tr>

            <tr>
                <td class="footer-label">
                    Pencapaian Target:
                </td>

                <td class="footer-value">
                    {{ number_format(
                        $persentasePencapaian,
                        1,
                        ',',
                        '.'
                    ) }}%
                </td>
            </tr>

        </table>

    </div>

    {{-- FOOTER --}}
    <div class="footer">

        <table class="footer-table">
            <tr>

                <td>
                    SIPANDA — Sistem Informasi Pajak Daerah
                </td>

                <td class="footer-right">
                    Dokumen laporan pajak daerah
                </td>

            </tr>
        </table>

    </div>

</body>

</html>