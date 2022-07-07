@extends('layouts.default')
@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">Daftar Electonic</div>
                    </div>
                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Nama</th> 
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('category.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fa fa-trash"></i>  
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
