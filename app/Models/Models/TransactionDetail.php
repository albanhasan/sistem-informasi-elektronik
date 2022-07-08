<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'electronic_id'
    ];

    protected $hidden = [];

    public function transaction() {
        return $this->belongsTo(Transaction::class, 'transaction_id','id');
    }

    public function electronic() {
        return $this->belongsTo(electronic::class, 'electronic_id','id');
    }
}
