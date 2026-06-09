<x-app>
    <x-slot:title>{{ $title }}</x-slot>

        @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endsession

        <a class="btn btn-primary mb-3" href="{{ route('produk.create') }}" role="button">Create</a>

        <form action="{{ route('produk.index')}}" method="GET">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="keyword" name="keyword"
                        placeholder="Search produk name ..." value="{{ request('keyword') }}">
                </div>
                <div class="col-md-4">
                    <select name="kategori_id" id="kategori_id"
                        class="form-control @error('kategori_id') is-invalid @enderror">
                        <option value="">All Produk</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                value=" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}">
                                {{ $kategori->name_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <ul class="list-group">
            @foreach ($produks as $produk)
                <li class="list-group-item">
                    {{ $produks->firstItem() + $loop->index }}. {{ $produk->nama_produk }} ||
                    {{ $produk->kategori->name_kategori }} || {{ $produk->harga }} || {{ $produk->stok }} ||
                    {{ $produk->satuan }} || {{ $produk->diskon}}%

                    <a class="btn btn-info btn-sm ms-2" href="{{ route('produk.show', $produk) }}" role="button">detail</a>
                    <a class="btn btn-warning btn-sm ms-2" href="{{ route('produk.edit', $produk) }}" role="button">edit</a>

                    <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Anda Yakin?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            {{ $produks->links() }}
        </div>
</x-app>