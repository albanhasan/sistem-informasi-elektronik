@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header card-title text-center justify-content-center">
            Beli Electronic
        </div>
        <div class="card justify-content-center" style="width: 18rem;">
            <img src="{{ url('public/images/electronic/'.$electronic->image_name) }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h3 class="card-title">Rp {{ $electronic->price }}</h3>
            <h5 class="card-title">{{ $electronic->name }}</h5>
            <p class="card-text">{!! $electronic->description !!}</p>
            <p class="card-text">Stock : {{ $electronic->stock }}</p>
            <a href="#" class="btn btn-primary">Buy</a>
            </div>
        </div>
        <div class="card-body card-block">
            <form action="{{ route("transactions.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="electronic_id" value="{{ $electronic->id }}" class="form-control" 
                        @error('name')
                            is-invalid
                        @enderror
                    />
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
                    <label for="name" class="form-control-label">Jumlah Electronic</label>
                    <input type="number" class="form-control jumlah-barang" oninput="setTotalHarga()" name="totalItem" value="{{ old('totalItem') }}" 
                        @error('totalItem')
                            is-invalid
                        @enderror
                    />
                    @error('totalItem') <div class="text-muted">{{ $message }}</div> @enderror
                    <input type="hidden" class="harga-electronic" value="{{ $electronic->price }}">
                    @error('jumlahelectronic') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Total Harga</label>
                    <input type="number" class="form-control total-harga" value="{{ old('totalHarga') }}"  name="totalHarga" readonly/>
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Masukan nominal pembayaran</label>
                    <input type="number" name="totalPayment" value="{{ old('totalPayment') }}" class="form-control" 
                        @error('totalPayment')
                            is-invalid
                        @enderror
                    />
                    @error('totalPayment') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    <button class="btn btn-secondary btn-block" type="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function setTotalHarga() {
            var hargaStr = document.getElementsByClassName("harga-electronic")[0].value;
            var jumlahItem = document.getElementsByClassName("jumlah-barang")[0].value;

            var totalHarga = parseInt(hargaStr) * jumlahItem;

            document.getElementsByClassName("total-harga")[0].value = totalHarga;

            document/get
        }
    </script>
    
@endsection