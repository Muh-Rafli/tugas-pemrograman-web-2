<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession
    
    <a class="btn btn-warning mb-3" href="{{ route('customer.create') }}" role="button">Create</a>

    <ul class="list-group">
        @foreach ($customers as $customer )
    
        <li class="list-group-item">
    
    {{ $loop->iteration }}. {{ $customer->name }} || {{ $customer->email }} || {{ $customer->No_telepon }} || {{ $customer->Alamat }} || {{ $customer->pekerjaan }}
    
    <a class="btn btn-primary btn-sm" href="{{ route('customer.edit', $customer) }}" role="button">Edit</a>

    <form action="{{ route('customer.destroy', $customer) }}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf

    <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('Anda Yakin')">Delete</button>
</form>

</li>
        @endforeach
    </ul>

</x-app>