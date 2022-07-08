<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Transaction;

use Illuminate\Support\Facades\DB;

use App\Models\Models\TransactionDetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Models\Models\Electronic;

Use App\Rules\ValidateTotalPayment;
Use App\Rules\ValidateStock;

use Carbon\Carbon;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin) {
            $transactions = DB::select("SELECT u.name AS full_name, e.name AS electronic_name, c.name AS category,
            t.created_at as transaction_date, e.*, t.* FROM transactions t
            INNER JOIN transaction_details td ON t.id = td.transaction_id
            INNER JOIN electronics e ON td.electronic_id = e.id
            INNER JOIN category c ON e.category_id = c.id
            INNER JOIN users u ON t.user_id = u.id
                WHERE td.transaction_id = t.id AND t.deleted_at IS NULL");
        } else {
            $transactions = DB::select("SELECT u.name AS full_name, e.name AS electronic_name, c.name AS category,
            t.created_at as transaction_date, e.*, t.* FROM transactions t
            INNER JOIN transaction_details td ON t.id = td.transaction_id
            INNER JOIN electronics e ON td.electronic_id = e.id
            INNER JOIN category c ON e.category_id = c.id
            INNER JOIN users u ON t.user_id = u.id
                WHERE td.transaction_id = t.id AND t.deleted_at IS NULL 
                    AND t.user_id = ".auth()->user()->id."");
        }

        return view('pages.transactions.index')->with([
            'items' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $electronic = DB::selectOne("SELECT * FROM electronics WHERE id = ".$data['electronic_id']."");
        

        $validator = Validator::make($request->all(), [
            'totalItem' => [
                'required',
                'min:1',
                new ValidateStock($electronic->stock)
            ],
            'totalPayment' => [
                'required',
                new ValidateTotalPayment($data['totalItem'] * $electronic->price)
            ],
        ]);

        if ($validator->stopOnFirstFailure()->fails()) {
            return redirect()->route('transactions.buy', $electronic->slug)
            ->withErrors($validator)
            ->withInput();
        } else {
            $uuid = Str::uuid()->toString();
            //Cek dlu apakah ada transaksi yang pending di barang yang sama & user yg sama

            $select = DB::selectOne("SELECT 
                COUNT(*) as totalCount FROM transaction_details WHERE transaction_id = (SELECT transaction_id FROM transactions WHERE user_id = ".auth()->user()->id."  AND 
                transaction_status = 'Waiting Confirmation' LIMIT 1) 
                AND electronic_id = $electronic->id");
                
            if($select->totalcount > 0) {
                $title = "Gagal membuat transaksi baru karena terdapat transaksi yang sedang berjalan untuk produk ini";
                $message = "Mohon tunggu hingga selesai di konfirmasi";
            } else {
                
                $inserted_transaction_id = DB::selectOne('INSERT INTO transactions (uuid,
                transaction_total, transaction_status, user_id, total_payment, total_item, created_at,
                    updated_at) values (?, ?, ?, ?, ?, ?, ?, ?) 
                    returning id', [$uuid, $electronic->price * $data['totalItem'],
                'Waiting Confirmation', auth()->user()->id,$data['totalPayment'], $data['totalItem'], Carbon::now(), Carbon::now()]);
    
                $inserted_transaction_details_id = DB::selectOne('INSERT INTO transaction_details (transaction_id,
                electronic_id, created_at,
                    updated_at) values (?, ?, ?, ?) 
                    returning id', [$inserted_transaction_id->id,
                    $electronic->id, Carbon::now(), Carbon::now()]);

                $title = "Pembayaran anda berhasil";
                $message = "Transaksi anda sedang di konfirmasi";
            }
        }

        
        return view('pages.transactions.status')->with([
            'title' => $title,
            'message' => $message
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.transactions.show')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    
    {
        $delete = DB::delete("DELETE FROM transaction_details WHERE transaction_id = $id");
        $delete = DB::delete("DELETE FROM transactions WHERE id = $id");

        return redirect()->route('transactions.index'); 
    }

    /**
     * buy the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buy($slug)
    {
        $id = DB::selectOne("SELECT * FROM electronics where slug = '$slug'");

        $electronic = Electronic::findOrFail($id->id);

        return view('pages.transactions.buy')->with([
            'electronic' => $electronic,
            'user' => auth()->user()
        ]);
    }

   
    public function update_transaction_status($id, $transaction_status)
    {   $transaction = DB::selectOne("SELECT * FROM transactions WHERE id = $id");

        if($transaction_status == 'confirm') {
            $transaction_status = "Confirmed";
            
            $curElectronic = DB::selectOne("SELECT * FROM electronics WHERE id = (
                    SELECT electronic_id FROM transaction_details WHERE transaction_id = $transaction->id LIMIT 1)");
            $newStock = $curElectronic->stock - $transaction->total_item;
            $updateStock = DB::update("UPDATE electronics SET stock = $newStock WHERE id = $curElectronic->id");
    
    } else if($transaction_status = "canceled") {
            $transaction_status = "Canceled";
        }
        $id = DB::update("UPDATE transactions SET transaction_status = '$transaction_status' WHERE id = $id");

        return redirect()->route('transactions.index'); 
    }
}
