<?php

namespace App\Http\Controllers;

use App\Models\ObjekPajak;
use App\Models\WajibPajak;
use Illuminate\Http\Request;

class ObjekPajakController extends Controller
{
    public function index(Request $request)
    {
        $query = ObjekPajak::with('wajibPajak');

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_objek', 'like', "%{$search}%")
                    ->orWhere('alamat_objek', 'like', "%{$search}%")
                    ->orWhereHas('wajibPajak', function ($wajibPajakQuery) use ($search) {
                        $wajibPajakQuery
                            ->where('nama', 'like', "%{$search}%")
                            ->orWhere('nik', 'like', "%{$search}%");
                    });
            });
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER JENIS OBJEK
        |--------------------------------------------------------------------------
        */

        if ($request->filled('jenis_objek')) {
            $query->where(
                'jenis_objek',
                $request->jenis_objek
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

        $objekPajaks = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | JENIS OBJEK UNTUK FILTER
        |--------------------------------------------------------------------------
        */

        $jenisObjeks = collect([
            'Rumah',
            'Tanah',
            'Ruko',
            'Usaha',
            'Hotel',
            'Restoran',
            'Kendaraan',
        ]);

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $totalObjekPajak = ObjekPajak::count();

        $jumlahAktif = ObjekPajak::where(
            'status',
            true
        )->count();

        $jumlahNonaktif = ObjekPajak::where(
            'status',
            false
        )->count();

        return view(
            'objek-pajak.index',
            compact(
                'objekPajaks',
                'jenisObjeks',
                'totalObjekPajak',
                'jumlahAktif',
                'jumlahNonaktif'
            )
        );
    }

    public function create()
    {
        $wajibPajaks = WajibPajak::where('status', true)
            ->orderBy('nama')
            ->get();

        return view(
            'objek-pajak.create',
            compact('wajibPajaks')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'wajib_pajak_id' => [
                'required',
                'exists:wajib_pajaks,id',
            ],

            'nama_objek' => [
                'required',
                'string',
                'max:255',
            ],

            'alamat_objek' => [
                'required',
                'string',
            ],

            'jenis_objek' => [
                'required',
                'string',
                'max:100',
            ],

            'nilai_objek' => [
                'nullable',
                'numeric',
                'min:0',
            ],
        ]);

        ObjekPajak::create($validated);

        return redirect()
            ->route('objek-pajak.index')
            ->with(
                'success',
                'Data objek pajak berhasil ditambahkan.'
            );
    }

    public function show(ObjekPajak $objekPajak)
    {
        $objekPajak->load('wajibPajak');

        return view(
            'objek-pajak.show',
            compact('objekPajak')
        );
    }

    public function edit(ObjekPajak $objekPajak)
    {
        $wajibPajaks = WajibPajak::where('status', true)
            ->orWhere(
                'id',
                $objekPajak->wajib_pajak_id
            )
            ->orderBy('nama')
            ->get();

        return view(
            'objek-pajak.edit',
            compact(
                'objekPajak',
                'wajibPajaks'
            )
        );
    }

    public function update(
        Request $request,
        ObjekPajak $objekPajak
    ) {
        $validated = $request->validate([
            'wajib_pajak_id' => [
                'required',
                'exists:wajib_pajaks,id',
            ],

            'nama_objek' => [
                'required',
                'string',
                'max:255',
            ],

            'alamat_objek' => [
                'required',
                'string',
            ],

            'jenis_objek' => [
                'required',
                'string',
                'max:100',
            ],

            'nilai_objek' => [
                'nullable',
                'numeric',
                'min:0',
            ],
        ]);

        $objekPajak->update($validated);

        return redirect()
            ->route('objek-pajak.index')
            ->with(
                'success',
                'Data objek pajak berhasil diperbarui.'
            );
    }

    public function destroy(
        ObjekPajak $objekPajak
    ) {
        $objekPajak->delete();

        return redirect()
            ->route('objek-pajak.index')
            ->with(
                'success',
                'Data objek pajak berhasil dihapus.'
            );
    }
}