<?php

namespace App\Http\Controllers;

use App\Models\WajibPajak;
use Illuminate\Http\Request;

class WajibPajakController extends Controller
{
    public function index(Request $request)
    {
        $query = WajibPajak::query();

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        |
        | Mencari berdasarkan:
        | - NIK
        | - Nama
        | - Nomor HP
        |
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nik', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('no_hp', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER JENIS WP
        |--------------------------------------------------------------------------
        */

        if ($request->filled('jenis_wp')) {
            $query->where(
                'jenis_wp',
                $request->jenis_wp
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $wajibPajaks = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | DATA UNTUK FILTER
        |--------------------------------------------------------------------------
        */

        $jenisWajibPajak = WajibPajak::query()
            ->select('jenis_wp')
            ->whereNotNull('jenis_wp')
            ->where('jenis_wp', '!=', '')
            ->distinct()
            ->orderBy('jenis_wp')
            ->pluck('jenis_wp');

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $totalWajibPajak = WajibPajak::count();

        $jumlahAktif = WajibPajak::where(
            'status',
            true
        )->count();

        $jumlahNonaktif = WajibPajak::where(
            'status',
            false
        )->count();

        return view(
            'wajib-pajak.index',
            compact(
                'wajibPajaks',
                'jenisWajibPajak',
                'totalWajibPajak',
                'jumlahAktif',
                'jumlahNonaktif'
            )
        );
    }

    public function create()
    {
        return view('wajib-pajak.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:20|unique:wajib_pajaks,nik',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:20',
            'jenis_wp' => 'required|string|max:50',
        ]);

        WajibPajak::create($validated);

        return redirect()
            ->route('wajib-pajak.index')
            ->with(
                'success',
                'Data wajib pajak berhasil ditambahkan.'
            );
    }

    public function show(WajibPajak $wajibPajak)
    {
        $wajibPajak->load([
            'objekPajaks',
            'tagihans.jenisPajak',
            'tagihans.objekPajak',
            'tagihans.pembayarans',
        ]);

        $totalTagihan = $wajibPajak->tagihans
            ->sum('total_tagihan');

        $totalPembayaran = $wajibPajak->tagihans
            ->flatMap(function ($tagihan) {
                return $tagihan->pembayarans;
            })
            ->sum('jumlah_bayar');

        $totalTunggakan =
            $totalTagihan - $totalPembayaran;

        $jumlahTagihan =
            $wajibPajak->tagihans->count();

        $jumlahBelumLunas =
            $wajibPajak->tagihans
                ->whereIn('status', [
                    'belum_bayar',
                    'sebagian',
                    'jatuh_tempo',
                ])
                ->count();

        return view(
            'wajib-pajak.show',
            compact(
                'wajibPajak',
                'totalTagihan',
                'totalPembayaran',
                'totalTunggakan',
                'jumlahTagihan',
                'jumlahBelumLunas'
            )
        );
    }

    public function edit(WajibPajak $wajibPajak)
    {
        return view(
            'wajib-pajak.edit',
            compact('wajibPajak')
        );
    }

    public function update(
        Request $request,
        WajibPajak $wajibPajak
    ) {
        $validated = $request->validate([
            'nik' => 'required|string|max:20|unique:wajib_pajaks,nik,' . $wajibPajak->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:20',
            'jenis_wp' => 'required|string|max:50',
        ]);

        $wajibPajak->update($validated);

        return redirect()
            ->route('wajib-pajak.index')
            ->with(
                'success',
                'Data wajib pajak berhasil diperbarui.'
            );
    }

    public function destroy(WajibPajak $wajibPajak)
    {
        $wajibPajak->delete();

        return redirect()
            ->route('wajib-pajak.index')
            ->with(
                'success',
                'Data wajib pajak berhasil dihapus.'
            );
    }
}