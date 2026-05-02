<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('kategori.update',$kategori) }}">
    @csrf
    @method('PUT')

    
    <div class="mb-3">
    <label for="name_kategori" class="form-label">Nama Kategori</label>
    <input type="text" class="form-control @error('name_kategori') is-invalid @enderror" id="name_kategori" name="name_kategori"
    value="{{ old('name_kategori',$kategori->name_kategori) }}">
    
    @error('name_kategori')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

    </div>
    <div class="mb-3">
    <label for="kode_kategori" class="form-label">Kode Kategori</label>
    <input type="kode_kategori" class="form-control @error('kode_kategori') is-invalid @enderror" id="kode_kategori" name="kode_kategori"
    value="{{ old('kode_kategori',$kategori->kode_kategori) }}">

    @error('kode_kategori')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

    </div>
    <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi">{{ old('deskripsi',$kategori->deskripsi) }}
        
    </textarea>

    @error('deskripsi')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    </div>
    <a class="btn btn-primary mb-3" href="{{ route('kategori.index') }}" role="button">Cancel</a>  

    <button type="submit" class="btn btn-warning mb-3">Submit</button>
</form>

</x-app>
