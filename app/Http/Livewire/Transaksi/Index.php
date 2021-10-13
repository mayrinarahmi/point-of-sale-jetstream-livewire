<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\transaksi;
use Livewire\Component;

class Index extends Component
{
    public $produk_id;
    public $pembayaran;
  

    protected $rules = [
        'produk_id' => 'required|unique:transaksis'
        
    ];

    public function submit()
    {
        $this->validate();

       $transaksis = transaksi::create([
           'produk_id' => $this->produk_id,
           'qty' => 1

       ]);
       $transaksis->total = $transaksis->product->harga;
       $transaksis->save();

       session()->flash('message', 'Produk Berhasil di Tambahkan.');
    }
    
    public function save()
    {
        
        $transaksis = transaksi::get();
     
        $order = Order::create([
            'no_order' => 'OD-'.date('Ymd').rand(1111, 9999),
            'nama_kasir' => auth()->user()->name,
            'all_total' => $transaksis->sum('total'),
            'pembayaran' => $this->pembayaran,
            'kembalian' => $this->pembayaran - $transaksis->sum('total')

        ]);

      
        foreach ($transaksis as $key => $value) {
            $product = array(
                'order_id' => $order->id,
                'produk_id' => $value->produk_id,
                'qty' => $value->qty,
                'total' => $value->total,
                'created_at' => \Carbon\carbon::now(),
                'updated_at' => \Carbon\carbon::now()
            );

            $orderProduct = OrderProduct::insert($product);

            $deleteTransaksi = transaksi::where('id', $value->id)->delete();
        }

        // session()->flash('message', 'Transaksi Produk Berhasil di Simpan.');

        return redirect()->to('/struk/'.$order->no_order);
 
    }

    public function increment($id)
    {
        $transaksis = transaksi::find($id);
        $transaksis->update([
            'qty' => $transaksis->qty+1,
            'total' => $transaksis->product->harga*($transaksis->qty+1)
        ]);
        session()->flash('message', 'Qty Produk Berhasil di Tambahkan.');
        return redirect()->to('/transaksi');
    }

    public function decrement($id)
    {
        $transaksis = transaksi::find($id);
        $transaksis->update([
            'qty' => $transaksis->qty - 1,
            'total' => $transaksis->product->harga*($transaksis->qty - 1)
        ]);
        session()->flash('message', 'Qty Produk Berhasil di Kurangi.');
        return redirect()->to('/transaksi');
    }

    public function render()
    {
        return view('livewire.transaksi.index', [
            'products' => Product::orderBY('nama_produk', 'asc')->get(),
            'transaksie' => transaksi::get()
        ]);
    }

    public function deleteTransaksi($id)
    {
        $transaksis = transaksi::find($id);
        $transaksis->delete();
        session()->flash('message', 'Produk Berhasil di Hapus.');
    }
}
