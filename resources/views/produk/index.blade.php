<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession

    <ul class="list-group">
        @foreach ($produks as $produk )
    
        <li class="list-group-item">
    
    {{ $loop->iteration }}. {{ $produk->nama_produk }}|| {{ $produk->kategori->name_kategori }} || {{ $produk->harga }}  || {{ $produk->stok }} ||{{ $produk->satuan }} 

</form>

</li>
        @endforeach
    </ul>

</x-app>