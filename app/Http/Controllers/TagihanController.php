<?php

namespace App\Http\Controllers;

use App\Models\JenisPajak;
use App\Models\ObjekPajak;
use App\Models\Tagihan;
use App\Models\WajibPajak;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Menampilkan daftar tagihan.
     */
    public function index(Request $request)
    {
        $query = Tagihan::with([
            'wajibPajak',
            'objekPajak',
            'jenisPajak',
        ]);

        /*
         * SEARCH
         * Bisa mencari berdasarkan:
         * - Nomor tagihan
         * - Nama wajib pajak
         * - NIK wajib pajak
         */
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'nomor_tagihan',
                    'like',
                    "%{$search}%"
                )

                ->orWhereHas(
                    'wajibPajak',
                    function ($wajibPajakQuery) use ($search) {

                        $wajibPajakQuery
                            ->where(
                                'nama',
                                'like',
                                "%{$search}%"
                            )
                            ->orWhere(
                                'nik',
                                'like',
                                "%{$search}%"
                            );
                    }
                );
            });
        }

        /*
         * FILTER TAHUN PAJAK
         */
        if ($request->filled('tahun_pajak')) {
            $query->where(
                'tahun_pajak',
                $request->tahun_pajak
            );
        }

        /*
         * FILTER JENIS PAJAK
         */
        if ($request->filled('jenis_pajak_id')) {
            $query->where(
                'jenis_pajak_id',
                $request->jenis_pajak_id
            );
        }

        /*
         * FILTER STATUS
         */
        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        /*
         * DATA TAGIHAN
         *
         * withQueryString() membuat parameter
         * search/filter tetap terbawa saat pindah halaman.
         */
        $tagihans = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /*
         * DATA UNTUK DROPDOWN JENIS PAJAK
         */
        $jenisPajaks = JenisPajak::orderBy('nama')->get();

        /*
         * DATA UNTUK DROPDOWN TAHUN PAJAK
         *
         * Mengambil tahun yang memang ada di database.
         */
        $tahunPajaks = Tagihan::query()
            ->select('tahun_pajak')
            ->whereNotNull('tahun_pajak')
            ->distinct()
            ->orderByDesc('tahun_pajak')
            ->pluck('tahun_pajak');

        /*
         * STATISTIK
         */
        $totalTagihan = Tagihan::count();

        $jumlahLunas = Tagihan::where(
            'status',
            'lunas'
        )->count();

        $jumlahBelumBayar = Tagihan::where(
            'status',
            'belum_bayar'
        )->count();

        $jumlahJatuhTempo = Tagihan::where(
            'status',
            'jatuh_tempo'
        )->count();

        /*
         * TOTAL NOMINAL SELURUH TAGIHAN
         */
        $totalNominal = Tagihan::sum('total_tagihan');

        /*
         * TOTAL NOMINAL YANG SUDAH LUNAS
         */
        $totalLunas = Tagihan::where(
            'status',
            'lunas'
        )->sum('total_tagihan');

        return view(
            'tagihan.index',
            compact(
                'tagihans',
                'jenisPajaks',
                'tahunPajaks',
                'totalTagihan',
                'jumlahLunas',
                'jumlahBelumBayar',
                'jumlahJatuhTempo',
                'totalNominal',
                'totalLunas'
            )
        );
    }

    /**
     * Menampilkan form tambah tagihan.
     */
    public function create()
    {
        $wajibPajaks = WajibPajak::where('status', true)
            ->orderBy('nama')
            ->get();

        $objekPajaks = ObjekPajak::where('status', true)
            ->with('wajibPajak')
            ->orderBy('nama_objek')
            ->get();

        $jenisPajaks = JenisPajak::where('status', true)
            ->orderBy('nama')
            ->get();

        return view(
            'tagihan.create',
            compact(
                'wajibPajaks',
                'objekPajaks',
                'jenisPajaks'
            )
        );
    }

    /**
     * Menyimpan tagihan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'wajib_pajak_id' => [
                'required',
                'exists:wajib_pajaks,id',
            ],

            'objek_pajak_id' => [
                'required',
                'exists:objek_pajaks,id',
            ],

            'jenis_pajak_id' => [
                'required',
                'exists:jenis_pajaks,id',
            ],

            'tahun_pajak' => [
                'required',
                'integer',
                'min:2000',
                'max:2100',
            ],

            'nomor_tagihan' => [
                'required',
                'string',
                'max:255',
                'unique:tagihans,nomor_tagihan',
            ],

            'pokok_pajak' => [
                'required',
                'numeric',
                'min:0',
            ],

            'denda' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'tanggal_jatuh_tempo' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                'in:belum_bayar,sebagian,lunas,jatuh_tempo',
            ],
        ]);

        $this->validateActiveRelations($validated);

        $validated['denda'] = $validated['denda'] ?? 0;

        $validated['total_tagihan'] =
            (float) $validated['pokok_pajak']
            +
            (float) $validated['denda'];

        Tagihan::create($validated);

        return redirect()
            ->route('tagihan.index')
            ->with(
                'success',
                'Tagihan pajak berhasil ditambahkan.'
            );
    }

    /**
     * Menampilkan detail tagihan.
     */
    public function show(Tagihan $tagihan)
    {
        $tagihan->load([
            'wajibPajak',
            'objekPajak',
            'jenisPajak',
            'pembayarans.petugas',
        ]);

        return view(
            'tagihan.show',
            compact('tagihan')
        );
    }

    /**
     * Menampilkan form edit tagihan.
     */
    public function edit(Tagihan $tagihan)
    {
        $wajibPajaks = WajibPajak::where('status', true)
            ->orWhere(
                'id',
                $tagihan->wajib_pajak_id
            )
            ->orderBy('nama')
            ->get();

        $objekPajaks = ObjekPajak::where('status', true)
            ->orWhere(
                'id',
                $tagihan->objek_pajak_id
            )
            ->with('wajibPajak')
            ->orderBy('nama_objek')
            ->get();

        $jenisPajaks = JenisPajak::where('status', true)
            ->orWhere(
                'id',
                $tagihan->jenis_pajak_id
            )
            ->orderBy('nama')
            ->get();

        return view(
            'tagihan.edit',
            compact(
                'tagihan',
                'wajibPajaks',
                'objekPajaks',
                'jenisPajaks'
            )
        );
    }

    /**
     * Memperbarui tagihan.
     */
    public function update(
        Request $request,
        Tagihan $tagihan
    ) {
        $validated = $request->validate([
            'wajib_pajak_id' => [
                'required',
                'exists:wajib_pajaks,id',
            ],

            'objek_pajak_id' => [
                'required',
                'exists:objek_pajaks,id',
            ],

            'jenis_pajak_id' => [
                'required',
                'exists:jenis_pajaks,id',
            ],

            'tahun_pajak' => [
                'required',
                'integer',
                'min:2000',
                'max:2100',
            ],

            'nomor_tagihan' => [
                'required',
                'string',
                'max:255',
                'unique:tagihans,nomor_tagihan,' . $tagihan->id,
            ],

            'pokok_pajak' => [
                'required',
                'numeric',
                'min:0',
            ],

            'denda' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'tanggal_jatuh_tempo' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                'in:belum_bayar,sebagian,lunas,jatuh_tempo',
            ],
        ]);

        $this->validateActiveRelations($validated);

        $validated['denda'] = $validated['denda'] ?? 0;

        $validated['total_tagihan'] =
            (float) $validated['pokok_pajak']
            +
            (float) $validated['denda'];

        $tagihan->update($validated);

        return redirect()
            ->route('tagihan.index')
            ->with(
                'success',
                'Tagihan pajak berhasil diperbarui.'
            );
    }

    /**
     * Menghapus tagihan.
     */
    public function destroy(Tagihan $tagihan)
    {
        if ($tagihan->pembayarans()->exists()) {
            return redirect()
                ->route('tagihan.index')
                ->with(
                    'error',
                    'Tagihan tidak dapat dihapus karena sudah memiliki data pembayaran.'
                );
        }

        $tagihan->delete();

        return redirect()
            ->route('tagihan.index')
            ->with(
                'success',
                'Tagihan pajak berhasil dihapus.'
            );
    }

    /**
     * Memastikan relasi yang digunakan tagihan
     * masih aktif.
     */
    private function validateActiveRelations(array $validated): void
    {
        $wajibPajakAktif = WajibPajak::whereKey(
            $validated['wajib_pajak_id']
        )
            ->where('status', true)
            ->exists();

        if (!$wajibPajakAktif) {
            abort(
                422,
                'Wajib Pajak yang dipilih tidak aktif.'
            );
        }

        $objekPajakAktif = ObjekPajak::whereKey(
            $validated['objek_pajak_id']
        )
            ->where('status', true)
            ->exists();

        if (!$objekPajakAktif) {
            abort(
                422,
                'Objek Pajak yang dipilih tidak aktif.'
            );
        }

        $jenisPajakAktif = JenisPajak::whereKey(
            $validated['jenis_pajak_id']
        )
            ->where('status', true)
            ->exists();

        if (!$jenisPajakAktif) {
            abort(
                422,
                'Jenis Pajak yang dipilih tidak aktif.'
            );
        }
    }
}