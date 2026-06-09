<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-warning mb-3" href="{{ route('produk.index') }}" role="button">Kembali</a>

    <ul class="list-group">
        @foreach ($produks as $produk)
            <li class="list-group-item">
                {{ $produk->nama_produk }} ||
                {{ $produk->kategori->name_kategori }} || {{ $produk->harga }} || {{ $produk->stok }} ||
                {{ $produk->satuan }} || {{ $produk->diskon }}%
                <form action="{{ route('produk.restore', $produk) }}" method="POST" class="d-inline">
                    @method('PUT')
                    @csrf

                    <button type="submit" class="btn btn-warning btn-sm"
                        onclick="return confirm('Anda yakin kembalikan data?')">Restore</button>
                </form>
                <form action="{{ route('produk.forceDelete', $produk) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin Ingin Menghapus Secara Permanent')">Force Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

</x-app>