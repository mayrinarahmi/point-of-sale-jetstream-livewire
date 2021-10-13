<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view ('transaksi.index');
    }

    public function struk($no_order)
    {
        $order = Order::with('productOrder')->where('no_order', $no_order)->first();

        return view('transaksi.struk', compact('order'));
    }
}
