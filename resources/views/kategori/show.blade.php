<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    
    <a class="btn btn-primary mb-3" href="{{ route('kategori.index') }}" role="button">Back</a>

    {{-- Kategori --}}

    <ul class="list-group">
  <li class="list-group-item">Name: {{ $kategori->name_kategori }}</li>
  <li class="list-group-item">Created at:{{ $kategori->created_at->format('d F Y H:i:s') }}</li>
  <li class="list-group-item">Last update:{{ $kategori->updated_at ->diffForHumans()}}</li>

</ul>



</x-app>