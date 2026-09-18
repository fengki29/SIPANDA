<?php

namespace App\Http\Controllers;

use App\Models\JenisPajak;
use Illuminate\Http\Request;

class JenisPajakController extends Controller
{
    public function index()
    {
        $jenisPajaks = JenisPajak::latest()->get();

        return view('jenis-pajak.index', compact('jenisPajaks'));
    }

    public function create()
    {
        return view('jenis-pajak.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:jenis_pajaks,kode',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tarif' => 'required|numeric|min:0|max:100',
        ]);

        JenisPajak::create($validated);

        return redirect()
            ->route('jenis-pajak.index')
            ->with('success', 'Jenis pajak berhasil ditambahkan.');
    }

    public function show(JenisPajak $jenisPajak)
    {
        return view('jenis-pajak.show', compact('jenisPajak'));
    }

    public function edit(JenisPajak $jenisPajak)
    {
        return view('jenis-pajak.edit', compact('jenisPajak'));
    }

    public function update(Request $request, JenisPajak $jenisPajak)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:jenis_pajaks,kode,' . $jenisPajak->id,
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tarif' => 'required|numeric|min:0|max:100',
        ]);

        $jenisPajak->update($validated);

        return redirect()
            ->route('jenis-pajak.index')
            ->with('success', 'Jenis pajak berhasil diperbarui.');
    }

    public function destroy(JenisPajak $jenisPajak)
    {
        $jenisPajak->delete();

        return redirect()
            ->route('jenis-pajak.index')
            ->with('success', 'Jenis pajak berhasil dihapus.');
    }
}