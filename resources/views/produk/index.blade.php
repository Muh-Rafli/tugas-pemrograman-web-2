<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession

    <a class="btn btn-warning mb-3" href="{{ route('produk.create') }}" role="button">Create</a>
    <ul class="list-group">
        @foreach ($produks as $produk )
    
        <li class="list-group-item">
    
    {{ $loop->iteration }}. {{ $produk->nama_produk }}|| {{ $produk->kategori->name_kategori }} || {{ $produk->harga }}  || {{ $produk->stok }} ||{{ $produk->satuan }} 
    
</form>

</li>
        @endforeach
    </ul>

</x-app>