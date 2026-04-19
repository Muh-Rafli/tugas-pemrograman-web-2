<x-app>

    <x-slot:title>{{ $title }}</x-slot>
    
    <ul class="list-group">
        @foreach ($customers as $customer )
        
        <li class="list-group-item">
            {{ $loop->iteration }}. {{ $customer->nama }} || {{ $customer->email }} || {{ $customer->No_telepon }} || {{ $customer->Alamat }} || {{ $customer->pekerjaan }}</li>
        @endforeach
    </ul>

</x-app>