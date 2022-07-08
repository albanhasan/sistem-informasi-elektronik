@extends('layouts.default')
@section('content')

<div class="orders">
    <div class="row">
            @forelse($items as $item)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('public/images/electronic/'.$item->image_name) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title">Rp {{ $item->price }}</h3>
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{!! $item->description !!}</p>
                        <p class="card-text">Stock : {{ $item->stock }}</p>
                        <a href="{{ route('transactions.buy', $item->slug) }}" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            </div>
            @empty
            <h1>No Data</h1>
                    
           
            @endforelse
    </div>
</div>
@endsection