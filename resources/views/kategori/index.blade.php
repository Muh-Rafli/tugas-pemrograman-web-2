<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession
    
    <a class="btn btn-warning mb-3" href="{{ route('kategori.create') }}" role="button">Create</a>

    <ul class="list-group">
        @foreach ($kategoris as $kategori )
    
        <li class="list-group-item">
    
    {{ $loop->iteration }}. {{ $kategori->name_kategori }} || {{ $kategori->kode_kategori }} || {{ $kategori->deskripsi }}
    
    <a class="btn btn-primary btn-sm" href="{{ route('kategori.edit', $kategori) }}" role="button">Edit</a>

    <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf

    <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('Anda Yakin')">Delete</button>
</form>

</li>
        @endforeach
    </ul>

</x-app>