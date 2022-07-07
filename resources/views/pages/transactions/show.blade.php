<table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{ $item->name}}</td>

        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $item->name}}</td>
        </tr>
        <tr>
            <th>Number</th>
            <td>{{ $item->number}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $item->address}}</td>
        </tr>
        <tr>
            <th>Transaksi Total</th>
            <td>{{ $item->transaksi_total}}</td>
        </tr>
        <tr>
            <th>Transaksi Status</th>
            <td>{{ $item->transaksi_status}}</td>
        </tr>
        <tr>
            <th>List Produk</th>
            <td>
                <table class="table-bordered w-100">
                    <tr>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                    </tr>
                    @foreach ($item->details as $detail)
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ $detail->product->type }}</td>
                            <td>{{ $detail->product->price }}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>

</table>
<div class="row">
    {{-- <div class="col-4">
        <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"><i>
            Set Success
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $item->id) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"><i>
            Set Failed
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"><i>
            Set Pending
        </a>
    </div> --}}
</div>