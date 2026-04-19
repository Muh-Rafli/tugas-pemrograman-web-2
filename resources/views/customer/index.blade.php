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
            {{ $loop->iteration }}. {{ $customer->name }} || {{ $customer->email }} || {{ $customer->No_telepon }} || {{ $customer->Alamat }} || {{ $customer->pekerjaan }}</li>
        @endforeach
    </ul>

</x-app>