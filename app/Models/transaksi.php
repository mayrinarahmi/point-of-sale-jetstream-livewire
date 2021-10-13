<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = [
        'produk_id',
        'qty',
        'total'
    ];

    public function product()
    {
        return $this->belongsTo('\App\Models\Product', 'produk_id');
    }
}
