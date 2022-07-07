@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header card-title">
            Beli Electronic
        </div>
        <div class="card" style="width: 18rem;">
            <img src="{{ url('public/images/electronic/'.$item->image_name) }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h3 class="card-title">Rp {{ $item->price }}</h3>
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text">{{ $item->description }}</p>
            <a href="#" class="btn btn-primary">Buy</a>
            </div>
        </div>
        <div class="card-body card-block">
            <form action="{{ route("transactions.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Pembeli</label>
                    <input type="text" name="name" disabled="disabled" value="{{ auth()->user()->name }}" class="form-control" 
                        @error('name')
                            is-invalid
                        @enderror
                    />
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Jumlah Barang</label>
                    <input type="number" name="name" value="{{ old('name') }}" class="form-control" 
                        @error('name')
                            is-invalid
                        @enderror
                    />
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    <button class="btn btn-secondary btn-block" type="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection