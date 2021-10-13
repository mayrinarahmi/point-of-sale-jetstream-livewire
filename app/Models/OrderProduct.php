<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'produk_id',
        'qty',
        'total'
    ];

    public function namaProduct()
    {
        return $this->belongsTo('App\Models\Product', 'produk_id');
    }

    public function Order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
}
