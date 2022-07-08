@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Electronic</strong>
            <small>{{ $item->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route("electronic.update", $item->id) }}" method="POST" enctype="multipart/form-data"> 
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Electronic</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }} " class="form-control" 
                        @error('name')
                            is-invalid
                        @enderror
                    />
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Category</label>
                    <select id="category-select" name="category_id" value="{{ old('category_id') ? old('category_id') : $item->category_id }}" class="form-control">$( document ).ready(function() {
                        console.log( "ready!" );
                    });
                        @forelse($categories as $category)
                        @if ($item->category_id = $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        
                        @endif

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
                    <a href="{{ url('public/images/electronic/'.$item->image_name) }}" target="_blank">
                        <img src="{{ url('public/images/electronic/'.$item->image_name) }}">
                    </a>
                 </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Image</label>
                    <input type="file" class="form-control" name="image">
                 </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Ubah</button>
                    <button class="btn btn-secondary btn-block" type="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    $( document ).ready(function() {
        $("#category-select").val($("#category-select").val());
    });

    ClassicEditor.replace("description"); 
 </script>