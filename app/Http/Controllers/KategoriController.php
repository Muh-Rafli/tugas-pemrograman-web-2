<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', [
            'title' => 'kategori',
            'kategoris' => Kategori::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create', ['title' => 'kategori create']);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name_kategori' => 'required|string|max:255',
        'kode_kategori' => 'required|string|unique:kategoris,kode_kategori',
        'deskripsi'     => 'required|string',
    ], [
        'name_kategori.required' => 'Nama Kategori Tidak Boleh Kosong',
        'name_kategori.max'      => 'Nama Kategori Tidak Boleh lebih dari 255 karakter',
        'kode_kategori.required' => 'Kode Kategori Tidak Boleh Kosong',
        'kode_kategori.unique'   => 'Kode Kategori Sudah Ada, Gunakan Kode Lain',
        'deskripsi.required'     => 'Deskripsi Tidak Boleh Kosong',
    ]);
    Kategori::create($validated);

    return to_route('kategori.index')->withSuccess('Kategori Telah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'title' => 'Edit Kategori',
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
        'name_kategori' => 'required|string|max:255',
        'kode_kategori' => 'required|string|unique:kategoris,kode_kategori',
        'deskripsi'     => 'required|string',
    ], [
        'name_kategori.required' => 'Nama Kategori Tidak Boleh Kosong',
        'name_kategori.max'      => 'Nama Kategori Tidak Boleh lebih dari 255 karakter',
        'kode_kategori.required' => 'Kode Kategori Tidak Boleh Kosong',
        'kode_kategori.unique'   => 'Kode Kategori Sudah Ada, Gunakan Kode Lain',
        'deskripsi.required'     => 'Deskripsi Tidak Boleh Kosong',
    ]);

    $kategori->update($validated);

    return to_route('kategori.index')->withSuccess('Kategori Telah Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
