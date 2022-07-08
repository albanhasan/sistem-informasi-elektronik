@extends('layouts.default')
@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">Transactions List</div>
                    </div>
                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>User</th>
                                      <th>Electronic</th>
                                      <th>Total Item</th>
                                      <th>Total Transaction</th>
                                      <th>Total Payment</th>
                                      <th>Order Date</th>
                                      <th>Transaction Status</th>
                                      <th>Action</th>  
                                    </tr>
                                </thead>
                                <tbody>

                                   <?php $no = 1; ?>
                                    @forelse($items as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->electronic_name }}</td>
                                        <td>{{ $item->total_item }}</td>
                                        <td>{{ $item->transaction_total }}</td>
                                        <td>{{ $item->total_payment }}</td>
                                        <td>{{ $item->transaction_date }}</td>
                                        <td>
                                           @if($item->transaction_status == 'Waiting Confirmation')
                                                <span class="badge badge-info">{{$item->transaction_status}}</span>
                                            @elseif($item->transaction_status == 'Confirmed')
                                                <span class="badge badge-success">{{$item->transaction_status}}</span>
                                            @elseif($item->transaction_status == 'Canceled')
                                                    <span class="badge badge-danger">{{$item->transaction_status}}</span>
                                            @else 
                                                    <span>    
                                                   
                                                    {{ $item->transaction_status }}
                                                    </span>
                                                    @endif
                                        </td>
                                        <td>
                                            <a href="#transaction_modal-{{ $item->id }}"
                                                data-toggle="modal"
                                                data-target="#transaction_modal-{{ $item->id }}"
                                                data-title="Detail Transaksi"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if($item->transaction_status == 'Waiting Confirmation') 
                                                <a href="{{ route('transactions.transaction_status', [$item->id, 'confirm']) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            
                                                <a href="{{ route('transactions.transaction_status', [$item->id, 'canceled']) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-ban"></i>
                                                </a>
                                            @endif
                                            <form action="{{ route('transactions.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fa fa-trash"></i>  
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $no++ ?>
                                    
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

@forelse($items as $item)
    <div class="modal fade" id="transaction_modal-{{ $item->id }}">
        <div class="modal-dialog">
                <div class="modal-content">
                <input type="hidden" id="color_id" name="color_id" value="">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Transaction Detail</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class="form-control-label">User</label>
                                <p id="nama-user">{{ $item->full_name}}</p>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Electronic</label>
                                <p id="nama-electronic">{{ $item->electronic_name}}</p>
                            </div>
                            <div class="form-group">
                                <div class="table-stats order-table ov-h">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                              <th>Description</th>
                                              <th>Stok</th>
                                              <th>Price</th>
                                              <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td id="electronic-description">{{ $item->description}}</td>
                                                <td id="electronic-stok">{{ $item->stock}}</td>
                                                <td id="electronic-price">{{ $item->price}}</td>
                                                <td id="electronic-category">{{ $item->category}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Total Item</label>
                                <p id="total-item">{{ $item->total_item}}</p>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Total Transaction</label>
                                <p id="total-transaction">{{ $item->transaction_total}}</p>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Total Payment</label>
                                <p id="total-payment">{{ $item->total_payment}}</p>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Order Date</label>
                                <p id="order-date">{{ $item->transaction_date}}</p>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Transaction Status</label>
                                <p id="transaction-status">{{ $item->transaction_status}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
@endforelse

@endsection