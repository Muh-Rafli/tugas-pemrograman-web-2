<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produk.index', [
            'title' => 'produk',
            'produks' => Produk::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create', ['title' => 'Produk Create',
        'kategoris' => Kategori::latest()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'nama_produk' => 'required|min:3|max:255',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'satuan'      => 'required|string|max:50',
        ], [
            
            'kategori_id.required' => 'Pilih kategori terlebih dahulu',
            'nama_produk.required' => 'Nama produk tidak boleh kosong',
            'nama_produk.min'      => 'Nama produk minimal 3 karakter',
            'harga.required'       => 'Harga harus diisi',
            'harga.numeric'        => 'Harga harus berupa angka',
            'stok.required'        => 'Stok tidak boleh kosong',
            'stok.numeric'         => 'Stok harus berupa angka',
            'satuan.required'      => 'Satuan (pcs/box) harus diisi',
        ]);

        Produk::create($validated);

        return redirect()->route('produk.index')->withsuccess('Data produk berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
