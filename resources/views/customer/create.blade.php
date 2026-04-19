<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('customer.store') }}">
    @csrf

    <form>
    <div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
    
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">

    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

    </div>
    <div class="mb-3">
    <label for="No_telepon" class="form-label">No_telepon</label>
    <input type="tel" class="form-control @error('No_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}">

    @error('No_telepon')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

    </div>
    <div class="mb-3">
    <label for="Alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control @error('Alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">

    @error('Alamat')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

    </div>
    <div class="mb-3">
    <label for="Pekerjaan" class="form-label">Pekerjaan</label>
    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">

    @error('Pekerjaan')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    </div>
    <a class="btn btn-primary mb-3" href="{{ route('customer.index') }}" role="button">Cancel</a>  

    <button type="submit" class="btn btn-warning mb-3">Submit</button>
</form>

</x-app>
