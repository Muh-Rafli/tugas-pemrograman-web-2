<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <a class="btn btn-primary mb-3" href="{{ route('produk.index') }}" role="button">Back</a>
    
    {{-- Produk --}}
    <h6>Data Produk</h6>
    <ul class="list-group">
        <li class="list-group-item">Nama Produk: {{ $produk->nama_produk }}</li>
        <li class="list-group-item">Kategori: {{ $produk->kategori->name_kategori }}</li>
        <li class="list-group-item">Harga: Rp {{ number_format($produk->harga, 0, ',', '.') }}</li>
        <li class="list-group-item">Stok: {{ $produk->stok }} {{ $produk->satuan }}</li>
        <li class="list-group-item">Created at: {{ $produk->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">Last update: {{ $produk->updated_at->diffForHumans() }}</li>
    </ul>

</x-app>
