<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{   
    use SoftDeletes;


    protected $fillable = [
        'uuid',
        'user_id',
        'transaction_total',
        'total_payment',
        'total_return',
        'transaction_status'
    ];

    protected $hidden = [];

    public function details() {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
}
