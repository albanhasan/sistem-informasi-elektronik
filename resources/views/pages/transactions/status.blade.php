@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $title }}</h3>
        </div>
        <div class="card-body">
            <p>{{ $message }}</p>
            <a href="{{route('transactions.index')}}">Daftar transaksi</a></p>
        </div>
    </div>
@endsection
