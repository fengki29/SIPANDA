<?php

namespace App\Http\Middleware;

use App\Models\AuditLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuditLogMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $response = $next($request);

        /*
        |--------------------------------------------------------------------------
        | Pastikan user sudah login
        |--------------------------------------------------------------------------
        */

        if (!auth()->check()) {
            return $response;
        }

        /*
        |--------------------------------------------------------------------------
        | Pastikan route tersedia
        |--------------------------------------------------------------------------
        */

        $route = $request->route();

        if (!$route) {
            return $response;
        }

        $routeName = $route->getName();

        if (!$routeName) {
            return $response;
        }

        /*
        |--------------------------------------------------------------------------
        | Jangan mencatat halaman Audit Log sendiri
        |--------------------------------------------------------------------------
        */

        if (str_starts_with($routeName, 'audit-log.')) {
            return $response;
        }

        /*
        |--------------------------------------------------------------------------
        | Buat audit log
        |--------------------------------------------------------------------------
        */

        $this->createLog(
            $request,
            $routeName
        );

        return $response;
    }

    /*
    |--------------------------------------------------------------------------
    | Membuat Audit Log
    |--------------------------------------------------------------------------
    */

    private function createLog(
        Request $request,
        string $routeName
    ): void {
        $method = strtoupper(
            $request->method()
        );

        $modul = $this->getModul(
            $routeName
        );

        $aktivitas = $this->getAktivitas(
            $method,
            $routeName
        );

        $keterangan = $this->getKeterangan(
            $request,
            $method,
            $modul,
            $routeName
        );

        AuditLog::create([
            'user_id' => auth()->id(),

            'aktivitas' => $aktivitas,

            'modul' => $modul,

            'method' => $method,

            'route' => $routeName,

            'keterangan' => $keterangan,

            'ip_address' => $request->ip(),

            'user_agent' => $request->userAgent(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Aktivitas
    |--------------------------------------------------------------------------
    */

    private function getAktivitas(
        string $method,
        string $routeName
    ): string {
        if ($method === 'GET') {

            if (
                str_ends_with(
                    $routeName,
                    '.show'
                )
            ) {
                return 'Melihat detail';
            }

            if (
                str_ends_with(
                    $routeName,
                    '.create'
                )
            ) {
                return 'Membuka form tambah';
            }

            if (
                str_ends_with(
                    $routeName,
                    '.edit'
                )
            ) {
                return 'Membuka form edit';
            }

            if (
                str_ends_with(
                    $routeName,
                    '.index'
                )
            ) {
                return 'Melihat data';
            }

            return 'Mengakses halaman';
        }

        return match ($method) {
            'POST' => 'Menambahkan data',

            'PUT',
            'PATCH' => 'Mengubah data',

            'DELETE' => 'Menghapus data',

            default => 'Melakukan aktivitas',
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Modul
    |--------------------------------------------------------------------------
        */

    private function getModul(
        string $routeName
    ): string {
        return match (true) {

            str_starts_with(
                $routeName,
                'wajib-pajak.'
            ) => 'Wajib Pajak',

            str_starts_with(
                $routeName,
                'objek-pajak.'
            ) => 'Objek Pajak',

            str_starts_with(
                $routeName,
                'jenis-pajak.'
            ) => 'Jenis Pajak',

            str_starts_with(
                $routeName,
                'tagihan.'
            ) => 'Tagihan',

            str_starts_with(
                $routeName,
                'pembayaran.'
            ) => 'Pembayaran',

            str_starts_with(
                $routeName,
                'tunggakan.'
            ) => 'Tunggakan',

            str_starts_with(
                $routeName,
                'laporan.'
            ) => 'Laporan',

            str_starts_with(
                $routeName,
                'target-pajak.'
            ) => 'Target Pajak',

            str_starts_with(
                $routeName,
                'users.'
            ) => 'Manajemen User',

            $routeName === 'dashboard'
                => 'Dashboard',

            default
                => 'Sistem',
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Keterangan
    |--------------------------------------------------------------------------
    */

    private function getKeterangan(
        Request $request,
        string $method,
        string $modul,
        string $routeName
    ): string {

        /*
        |--------------------------------------------------------------------------
        | GET
        |--------------------------------------------------------------------------
        */

        if ($method === 'GET') {

            if (
                str_ends_with(
                    $routeName,
                    '.show'
                )
            ) {
                return "Melihat detail data pada modul {$modul}.";
            }

            if (
                str_ends_with(
                    $routeName,
                    '.create'
                )
            ) {
                return "Membuka form penambahan data pada modul {$modul}.";
            }

            if (
                str_ends_with(
                    $routeName,
                    '.edit'
                )
            ) {
                return "Membuka form perubahan data pada modul {$modul}.";
            }

            if (
                str_ends_with(
                    $routeName,
                    '.index'
                )
            ) {
                return "Melihat daftar data pada modul {$modul}.";
            }

            return "Mengakses halaman pada modul {$modul}.";
        }

        /*
        |--------------------------------------------------------------------------
        | POST
        |--------------------------------------------------------------------------
        */

        if ($method === 'POST') {

            return match ($modul) {

                'Wajib Pajak'
                    => $this->keteranganWajibPajak(
                        $request
                    ),

                'Objek Pajak'
                    => $this->keteranganObjekPajak(
                        $request
                    ),

                'Jenis Pajak'
                    => $this->keteranganJenisPajak(
                        $request
                    ),

                'Tagihan'
                    => $this->keteranganTagihan(
                        $request
                    ),

                'Pembayaran'
                    => $this->keteranganPembayaran(
                        $request
                    ),

                'Target Pajak'
                    => $this->keteranganTargetPajak(
                        $request
                    ),

                'Manajemen User'
                    => $this->keteranganUser(
                        $request
                    ),

                default
                    => "Menambahkan data baru pada modul {$modul}.",
            };
        }

        /*
        |--------------------------------------------------------------------------
        | PUT / PATCH
        |--------------------------------------------------------------------------
        */

        if (
            $method === 'PUT'
            || $method === 'PATCH'
        ) {

            return match ($modul) {

                'Wajib Pajak'
                    => 'Mengubah data Wajib Pajak.',

                'Objek Pajak'
                    => 'Mengubah data Objek Pajak.',

                'Jenis Pajak'
                    => 'Mengubah data Jenis Pajak.',

                'Tagihan'
                    => 'Mengubah data Tagihan.',

                'Pembayaran'
                    => 'Mengubah data Pembayaran.',

                'Target Pajak'
                    => 'Mengubah data Target Pajak.',

                'Manajemen User'
                    => 'Mengubah data pengguna.',

                default
                    => "Mengubah data pada modul {$modul}.",
            };
        }

        /*
        |--------------------------------------------------------------------------
        | DELETE
        |--------------------------------------------------------------------------
        */

        if ($method === 'DELETE') {

            return match ($modul) {

                'Wajib Pajak'
                    => 'Menghapus data Wajib Pajak.',

                'Objek Pajak'
                    => 'Menghapus data Objek Pajak.',

                'Jenis Pajak'
                    => 'Menghapus data Jenis Pajak.',

                'Tagihan'
                    => 'Menghapus data Tagihan.',

                'Pembayaran'
                    => 'Menghapus data Pembayaran.',

                'Target Pajak'
                    => 'Menghapus data Target Pajak.',

                'Manajemen User'
                    => 'Menghapus pengguna.',

                default
                    => "Menghapus data pada modul {$modul}.",
            };
        }

        return "Melakukan aktivitas pada modul {$modul}.";
    }

    /*
    |--------------------------------------------------------------------------
    | Wajib Pajak
    |--------------------------------------------------------------------------
    */

    private function keteranganWajibPajak(
        Request $request
    ): string {

        $nama = $request->input('nama');

        if ($nama) {
            return "Menambahkan Wajib Pajak baru dengan nama {$nama}.";
        }

        return 'Menambahkan Wajib Pajak baru.';
    }

    /*
    |--------------------------------------------------------------------------
    | Objek Pajak
    |--------------------------------------------------------------------------
    */

    private function keteranganObjekPajak(
        Request $request
    ): string {

        $nama = $request->input('nama_objek');

        if ($nama) {
            return "Menambahkan Objek Pajak baru dengan nama {$nama}.";
        }

        return 'Menambahkan Objek Pajak baru.';
    }

    /*
    |--------------------------------------------------------------------------
    | Jenis Pajak
    |--------------------------------------------------------------------------
    */

    private function keteranganJenisPajak(
        Request $request
    ): string {

        $nama = $request->input('nama');

        if ($nama) {
            return "Menambahkan Jenis Pajak baru dengan nama {$nama}.";
        }

        return 'Menambahkan Jenis Pajak baru.';
    }

    /*
    |--------------------------------------------------------------------------
    | Tagihan
    |--------------------------------------------------------------------------
    */

    private function keteranganTagihan(
        Request $request
    ): string {

        $nomor = $request->input(
            'nomor_tagihan'
        );

        if ($nomor) {
            return "Menambahkan Tagihan baru dengan nomor {$nomor}.";
        }

        return 'Menambahkan Tagihan baru.';
    }

    /*
    |--------------------------------------------------------------------------
    | Pembayaran
    |--------------------------------------------------------------------------
    */

    private function keteranganPembayaran(
        Request $request
    ): string {

        $nomor = $request->input(
            'nomor_pembayaran'
        );

        $jumlah = $request->input(
            'jumlah_bayar'
        );

        if ($nomor && $jumlah) {

            return "Menambahkan pembayaran {$nomor} dengan jumlah Rp "
                . number_format(
                    (float) $jumlah,
                    0,
                    ',',
                    '.'
                )
                . '.';
        }

        if ($nomor) {
            return "Menambahkan pembayaran dengan nomor {$nomor}.";
        }

        return 'Menambahkan pembayaran baru.';
    }

    /*
    |--------------------------------------------------------------------------
    | Target Pajak
    |--------------------------------------------------------------------------
    */

    private function keteranganTargetPajak(
        Request $request
    ): string {

        $tahun = $request->input('tahun');

        $target = $request->input('target');

        if ($tahun && $target) {

            return "Menambahkan Target Pajak tahun {$tahun} sebesar Rp "
                . number_format(
                    (float) $target,
                    0,
                    ',',
                    '.'
                )
                . '.';
        }

        if ($tahun) {
            return "Menambahkan Target Pajak untuk tahun {$tahun}.";
        }

        return 'Menambahkan Target Pajak baru.';
    }

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    */

    private function keteranganUser(
        Request $request
    ): string {

        $nama = $request->input('name');

        $role = $request->input('role');

        if ($nama && $role) {

            return "Menambahkan pengguna {$nama} dengan role {$role}.";
        }

        if ($nama) {
            return "Menambahkan pengguna {$nama}.";
        }

        return 'Menambahkan pengguna baru.';
    }
}