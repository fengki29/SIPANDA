<?php

namespace App\Http\Middleware;

use App\Models\AuditLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuditMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $response = $next($request);

        if (!auth()->check()) {
            return $response;
        }

        $method = strtoupper($request->method());

        /*
        |--------------------------------------------------------------------------
        | Tentukan aktivitas berdasarkan HTTP method
        |--------------------------------------------------------------------------
        */

        $aktivitas = match ($method) {
            'POST' => 'CREATE',
            'PUT', 'PATCH' => 'UPDATE',
            'DELETE' => 'DELETE',
            default => 'VIEW',
        };

        /*
        |--------------------------------------------------------------------------
        | Jangan mencatat halaman GET biasa terlalu banyak
        |--------------------------------------------------------------------------
        */

        $routeName = $request->route()?->getName();

        $routeUri = $request->route()?->uri();

        /*
        |--------------------------------------------------------------------------
        | Tentukan modul dari route
        |--------------------------------------------------------------------------
        */

        $modul = 'Sistem';

        if ($routeUri) {
            $segments = explode('/', trim($routeUri, '/'));

            if (!empty($segments[0])) {
                $modul = ucwords(
                    str_replace(
                        ['-', '_'],
                        ' ',
                        $segments[0]
                    )
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Jangan mencatat request yang tidak perlu
        |--------------------------------------------------------------------------
        |
        | GET hanya dicatat untuk halaman penting seperti:
        | dashboard, laporan, audit log, dan detail data.
        |
        */

        $catat = in_array($method, [
            'POST',
            'PUT',
            'PATCH',
            'DELETE',
        ]);

        if (
            $method === 'GET'
            &&
            (
                $routeName === 'dashboard'
                ||
                $routeName === 'laporan.index'
                ||
                $routeName === 'audit-log.index'
                ||
                $routeName === 'audit-log.show'
            )
        ) {
            $catat = true;
        }

        if (!$catat) {
            return $response;
        }

        /*
        |--------------------------------------------------------------------------
        | Keterangan
        |--------------------------------------------------------------------------
        */

        $keterangan = match ($aktivitas) {
            'CREATE' =>
                'Menambahkan data pada modul ' . $modul,

            'UPDATE' =>
                'Mengubah data pada modul ' . $modul,

            'DELETE' =>
                'Menghapus data pada modul ' . $modul,

            default =>
                'Mengakses modul ' . $modul,
        };

        /*
        |--------------------------------------------------------------------------
        | Simpan audit log
        |--------------------------------------------------------------------------
        */

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

        return $response;
    }
}