<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WajibPajakController;
use App\Http\Controllers\ObjekPajakController;
use App\Http\Controllers\JenisPajakController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TunggakanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\TargetPajakController;
use App\Http\Controllers\ProfileController;

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'audit'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/',
        [DashboardController::class, 'index']
    )->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | WAJIB PAJAK
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'wajib-pajak',
        WajibPajakController::class
    );


    /*
    |--------------------------------------------------------------------------
    | OBJEK PAJAK
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'objek-pajak',
        ObjekPajakController::class
    );


    /*
    |--------------------------------------------------------------------------
    | TAGIHAN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'tagihan',
        TagihanController::class
    );


    /*
    |--------------------------------------------------------------------------
    | PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/pembayaran/{pembayaran}/print',
        [PembayaranController::class, 'print']
    )->name('pembayaran.print');

    Route::resource(
        'pembayaran',
        PembayaranController::class
    );


    /*
    |--------------------------------------------------------------------------
    | TUNGGAKAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/tunggakan',
        [TunggakanController::class, 'index']
    )->name('tunggakan.index');


    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/laporan',
        [LaporanController::class, 'index']
    )->name('laporan.index');

    Route::get(
        '/laporan/export/excel',
        [LaporanController::class, 'exportExcel']
    )->name('laporan.export.excel');

    Route::get(
        '/laporan/export/pdf',
        [LaporanController::class, 'exportPdf']
    )->name('laporan.export.pdf');


    /*
    |--------------------------------------------------------------------------
    | NOTIFIKASI
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/notifikasi',
        [\App\Http\Controllers\NotifikasiController::class, 'index']
    )->name('notifikasi.index');


    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {

        Route::resource(
            'jenis-pajak',
            JenisPajakController::class
        );

        Route::resource(
            'target-pajak',
            TargetPajakController::class
        );

        Route::resource(
            'users',
            UserController::class
        );

        Route::get(
            '/audit-log',
            [AuditLogController::class, 'index']
        )->name('audit-log.index');

        Route::get(
            '/audit-log/{auditLog}',
            [AuditLogController::class, 'show']
        )->name('audit-log.show');
    });

});