@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header card-title">
            Tambah Electronic
        </div>
        <div class="card-body card-block">
            <form action="{{ route("electronic.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Electronic</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" 
                        @error('name')
                            is-invalid
                        @enderror
                    />
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Category</label>
                    <select name="category_id" value="{{ old('category_id') }}" class="form-control">
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
                    <textarea name="description" id="editor"
                    
                     @error('description')
                        is-invalid
                    @enderror>
                        {{ old('description') }}
                    </textarea>
                    @error('description') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Price</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control" 
                        @error('price')
                            is-invalid
                        @enderror
                    />
                    @error('price') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" class="form-control" 
                        @error('stock')
                            is-invalid
                        @enderror
                    />
                    @error('stock') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Image</label>
                    <input type="file" class="form-control" required name="image">
                 </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    <button class="btn btn-secondary btn-block" type="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    ClassicEditor.replace("description"); 
 </script>