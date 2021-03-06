@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Barang</strong>
            <small>{{ $item->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route("products.update", $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }} " class="form-control" 
                        @error('name')
                            is-invalid
                        @enderror
                    />
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Category</label>
                    <select name="category_id" value="{{ old('category_id') ? old('category_id') : $item->category_id }}" class="form-control">
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        
                        @empty
                        <option values=""></option>
                        @endforelse
                    </select>
                    @error('category_id') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Description</label>
                    <textarea name="description"
                    
                     @error('description')
                        is-invalid
                    @enderror>
                        {{ old('description') ? old('description') : $item->description }}
                    </textarea>
                    @error('description') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Price</label>
                    <input type="number" name="price" value="{{ old('price') ? old('price') : $item->price }}" class="form-control" 
                        @error('price')
                            is-invalid
                        @enderror
                    />
                    @error('price') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock') ? old('stock') : $item->stock }}" class="form-control" 
                        @error('stock')
                            is-invalid
                        @enderror
                    />
                    @error('stock') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Old Image</label>
                    <input type="file" class="form-control" required name="image">
                 </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Image</label>
                    <input type="file" class="form-control" required name="image">
                 </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Ubah</button>
                    <button class="btn btn-secondary btn-block" type="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection