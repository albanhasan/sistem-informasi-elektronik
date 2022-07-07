@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Category</strong>
            <small>{{ $item->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route("category.update", $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Category</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }} " class="form-control" 
                        @error('name')
                            is-invalid
                        @enderror
                    />
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Ubah</button>
                    <button class="btn btn-secondary btn-block" type="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection