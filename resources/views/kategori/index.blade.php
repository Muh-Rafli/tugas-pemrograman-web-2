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

    <a class="btn btn-primary mb-3" href="{{ route('kategori.edit',$kategori) }}" role="button">Edit</a>
</form>

</li>
        @endforeach
    </ul>

</x-app>