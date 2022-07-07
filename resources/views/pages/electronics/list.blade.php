@extends('layouts.default')
@section('content')

<div class="orders">
    <div class="row">
        <div class="col-4">
            @forelse($items as $item)
            <div class="card" style="width: 18rem;">
                <img src="{{ url('public/images/electronic/'.$item->image_name) }}" class="card-img-top" alt="...">
                <div class="card-body">
                <h3 class="card-title">Rp {{ $item->price }}</h3>
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text">{{ $item->description }}</p>
                <a href="{{ route('transactions.store') }}/electronic_id={{}}" class="btn btn-primary">Buy</a>
                </div>
            </div>
            @empty

            <h1>No Data</h1>
            
            @endforelse
  
        </div>
    </div>
</div>
@endsection