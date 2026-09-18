<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | QUERY UTAMA
        |--------------------------------------------------------------------------
        */

        $query = AuditLog::with('user')
            ->latest();


        /*
        |--------------------------------------------------------------------------
        | FILTER AKTIVITAS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('aktivitas')) {
            $query->where(
                'aktivitas',
                $request->aktivitas
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER MODUL
        |--------------------------------------------------------------------------
        */

        if ($request->filled('modul')) {
            $query->where(
                'modul',
                $request->modul
            );
        }


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim(
                $request->search
            );

            $query->where(function ($q) use ($search) {

                $q->where(
                    'keterangan',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'route',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'modul',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'aktivitas',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'ip_address',
                    'like',
                    "%{$search}%"
                )

                ->orWhereHas(
                    'user',
                    function ($userQuery) use ($search) {

                        $userQuery
                            ->where(
                                'name',
                                'like',
                                "%{$search}%"
                            )
                            ->orWhere(
                                'email',
                                'like',
                                "%{$search}%"
                            );
                    }
                );
            });
        }


        /*
        |--------------------------------------------------------------------------
        | DATA LOG
        |--------------------------------------------------------------------------
        */

        $auditLogs = $query
            ->paginate(15)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | MODUL TERSEDIA
        |--------------------------------------------------------------------------
        */

        $modulTersedia = AuditLog::query()
            ->whereNotNull('modul')
            ->where(
                'modul',
                '!=',
                ''
            )
            ->select('modul')
            ->distinct()
            ->orderBy('modul')
            ->pluck('modul');


        /*
        |--------------------------------------------------------------------------
        | AKTIVITAS TERSEDIA
        |--------------------------------------------------------------------------
        */

        $aktivitasTersedia = AuditLog::query()
            ->whereNotNull('aktivitas')
            ->where(
                'aktivitas',
                '!=',
                ''
            )
            ->select('aktivitas')
            ->distinct()
            ->orderBy('aktivitas')
            ->pluck('aktivitas');


        /*
        |--------------------------------------------------------------------------
        | STATISTIK GLOBAL
        |--------------------------------------------------------------------------
        */

        $totalLog = AuditLog::count();

        $logHariIni = AuditLog::whereDate(
            'created_at',
            today()
        )->count();


        /*
        |--------------------------------------------------------------------------
        | AKTIVITAS HARI INI
        |--------------------------------------------------------------------------
        */

        $aktivitasHariIni = AuditLog::whereDate(
            'created_at',
            today()
        )
            ->selectRaw(
                'aktivitas, COUNT(*) as total'
            )
            ->groupBy('aktivitas')
            ->orderByDesc('total')
            ->limit(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | MODUL PALING AKTIF
        |--------------------------------------------------------------------------
        */

        $modulTeraktif = AuditLog::query()
            ->whereNotNull('modul')
            ->where(
                'modul',
                '!=',
                ''
            )
            ->selectRaw(
                'modul, COUNT(*) as total'
            )
            ->groupBy('modul')
            ->orderByDesc('total')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | USER PALING AKTIF
        |--------------------------------------------------------------------------
        */

        $userTeraktif = AuditLog::query()
            ->with('user')
            ->whereNotNull('user_id')
            ->selectRaw(
                'user_id, COUNT(*) as total'
            )
            ->groupBy('user_id')
            ->orderByDesc('total')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'audit-log.index',
            compact(
                'auditLogs',
                'modulTersedia',
                'aktivitasTersedia',
                'totalLog',
                'logHariIni',
                'aktivitasHariIni',
                'modulTeraktif',
                'userTeraktif'
            )
        );
    }


    public function show(AuditLog $auditLog)
    {
        $auditLog->load('user');

        return view(
            'audit-log.show',
            compact('auditLog')
        );
    }
}