<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view ('laporan.index');
    }

    public function printproduk()
    {
        return view('livewire.laporan.printproduk', [
            'products' => Product::OrderBy('created_at', 'desc')->get()
        ]);
    }

    public function searchtanggal(Request $request)
    {

    $data = [
        'tittle' => 'Data Produk',
        'products' => Product::OrderBy('created_at', 'desc')->get()
    ];
    
        $fromdate = str_replace('-','',$request->input('fromdate'));
        $todate =str_replace('-','',$request->input('todate'));

        $query = Product::query();
        
        !empty($fromdate)? $query->whereBetween(DB::raw('CAST(created_at as date)'), [$fromdate, $todate]) : null;
        $products = $query->get();


        // dd($hasil[0]->lokasi->alamat);
        // $query =\DB::select("SELECT * FROM tb_penerima WHERE tgl_lahir BETWEEN '$fromdate' AND '$todate'");
        return view('livewire.laporan.printproduk', compact('products'));
    }

    
}


