<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-warning mb-3" href="{{ route('produk.index') }}" role="button">Kembali</a>

    <ul class="list-group">
        @foreach ($produk as $produks)
            <li class="list-group-item">
                {{ $produk->nama_produk }} ||
                {{ $produk->kategori->name_kategori }} || {{ $produk->harga }} || {{ $produk->stok }} ||
                {{ $produk->satuan }} || {{ $produk->diskon }}
            </li>
        @endforeach
    </ul>

</x-app>