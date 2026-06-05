<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession
    
    <a class="btn btn-warning mb-3" href="{{ route('kategori.create') }}" role="button">Create</a>
    <form action="{{ route('kategori.index')}}" method="GET">
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" name="keyword"
                    placeholder="Search produk name ..." value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form> 
    <ul class="list-group">
        @foreach ($kategoris as $kategori )
    
        <li class="list-group-item">
        
    {{ $loop->iteration }}. {{ $kategori->name_kategori }} || {{ $kategori->kode_kategori }} || {{ $kategori->deskripsi }}

    <a class="btn btn-info btn-sm" href="{{ route('kategori.show',$kategori) }}" role="button">Detail</a>
    <a class="btn btn-primary btn-sm" href="{{ route('kategori.edit',$kategori) }}" role="button">Edit</a>

    <form action="{{ route('kategori.destroy',$kategori) }}" method="POST"class="d-inline">
    @method('DELETE')
    @csrf

    <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('Anda Yakin')">Delete</button>

    </form>

</li>
        @endforeach
    </ul>
    <div class="mt-3">
        {{ $kategoris->links() }}
    </div>

</x-app>