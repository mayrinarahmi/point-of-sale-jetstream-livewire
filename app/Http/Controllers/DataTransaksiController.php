<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DataTransaksiController extends Controller
{
    public function index()
    {
        return view ('datatransaksi.index');
    }

    public function printtransaksi()
    {
        return view('livewire.datatransaksi.printtransaksi', [
            'orders' => Order::OrderBy('created_at', 'desc')->get()
        ]);
    }

    public function searchtanggal(Request $request)
    {

    $data = [
        'tittle' => 'Data Transaksi',
        'orders' => Order::OrderBy('created_at', 'desc')->get()
        ];

        $fromdate = str_replace('-','',$request->input('fromdate'));
        $todate =str_replace('-','',$request->input('todate'));

        $query = Order::query()->with('productOrder');
        
        !empty($fromdate)? $query->whereBetween(DB::raw('CAST(created_at as date)'), [$fromdate, $todate]) : null;
        $orders = $query->get();


        // dd($hasil[0]->lokasi->alamat);
        // $query =\DB::select("SELECT * FROM tb_penerima WHERE tgl_lahir BETWEEN '$fromdate' AND '$todate'");
        return view('livewire.datatransaksi.printtransaksi', compact('orders'));
    }
}
