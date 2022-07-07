<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'category';

    protected $fillable = [
        'name'
    ];

    protected $hidden = [];

    public function electronic() {
        return $this->hasMany(electronic::class,'id_category');
    }
}
