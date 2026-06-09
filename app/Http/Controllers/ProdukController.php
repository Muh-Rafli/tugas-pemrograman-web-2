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
public function index(Request $request)
{
    $keyword = $request->input('keyword');
    $kategoriId = $request->input('kategori_id');

    
    $produk = Produk::latest();


    if ($request->filled('kategori_id')) {
        $produk->where('kategori_id', $kategoriId);
    }

    
    if ($request->filled('keyword')) {
        $produk->where(function ($query) use ($keyword) {
            $query->where('nama_produk', 'like', '%' . $keyword . '%')
            ->orWhere('harga', 'like', '%' . $keyword . '%')
            ->orWhere('stok', 'like', '%' . $keyword . '%')
            ->orWhere('satuan', 'like', '%' . $keyword . '%')
            ->orWhere('diskon', 'like', '%' . $keyword . '%');
        });
    }

    return view('produk.index', [
        'title' => 'produk',
        'kategoris' => Kategori::latest()->get(),
        'produks' => $produk->paginate(5)->withQueryString(),
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
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'satuan' => 'required|string|max:50',
            'diskon' => 'nullable|numeric|min:0|max:100',
        ], [

            'kategori_id.required' => 'Pilih kategori terlebih dahulu',
            'nama_produk.required' => 'Nama produk tidak boleh kosong',
            'nama_produk.min' => 'Nama produk minimal 3 karakter',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'stok.required' => 'Stok tidak boleh kosong',
            'stok.numeric' => 'Stok harus berupa angka',
            'satuan.required' => 'Satuan (pcs/box) harus diisi',
            'diskon.numeric' => 'Diskon Berupa Angka',
            'diskon.min' => 'Diskon Minimal 0%',
            'diskon.max' => 'Diskon Maksimal 100%'
        ]);

        Produk::create($validated);

        return redirect()->route('produk.index')->withsuccess('Data produk berhasil disimpan');
    
    try {
            DB::beginTransaction();

            Produk::create($validated);

            DB::commit();
            return to_route('produk.index')->withSuccess('Data produk berhasil ditambahkan');

        } catch (\Exception $e){
            DB::rollBack();
            return to_route('produk.create')->withError('Data produk gagal ditambahkan');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('produk.show', [
            'title' => 'Detail produk',
            'produk' => $produk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            'title' => 'Edit Produk',
            'produk' => $produk,
            'kategoris' => Kategori::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'nama_produk' => 'required|min:3|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'satuan' => 'required|string|max:50',
            'diskon' => 'nullable|numeric|min:0|max:100',
        ], [

            'kategori_id.required' => 'Pilih kategori terlebih dahulu',
            'nama_produk.required' => 'Nama produk tidak boleh kosong',
            'nama_produk.min' => 'Nama produk minimal 3 karakter',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'stok.required' => 'Stok tidak boleh kosong',
            'stok.numeric' => 'Stok harus berupa angka',
            'satuan.required' => 'Satuan (pcs/box) harus diisi',
            'diskon.numeric' => 'Diskon Berupa Angka',
            'diskon.min' => 'Diskon Minimal 0%',
            'diskon.max' => 'Diskon Maksimal 100%'
        ]);


        $produk->update($validated);

        return redirect()->route('produk.index')->withsuccess('Data produk berhasil diubah');
        try {
            DB::beginTransaction();

            Produk::create($validated);

            DB::commit();
            return to_route('produk.index')->withSuccess('Data produk berhasil diubah');

        }catch (\Exception $e){
            DB::rollBack();
            return to_route('produk.create')->withError('Data produk gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->withsuccess('Produk berhasil dihapus');
    }

    public function trash(){

        return view('produk.trash', [
            'title' => 'Trash Produk',
            'produks' => Produk::onlyTrashed()->get(),
        ]);
    }
    public function restore($id)
    {
        $produk = Produk::withTrashed()->findOrFail($id);

        $produk->restore();

        return redirect()->route('produk.trash')->withSuccess('Data berhasil dikembalikan');
    }
    public function forceDelete(Produk $produk)
    {
        
        $produk->forceDelete();
        return to_route('produk.trash')->withSuccess('Data berhasil dihapus secara permanen');
    
    }
}
