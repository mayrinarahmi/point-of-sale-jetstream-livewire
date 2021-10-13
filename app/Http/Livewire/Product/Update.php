<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Update extends Component
{
    public $produkId;
    public $nama_produk;
    public $kode_produk;
    public $harga;

    protected $listeners = ['updateProduct'];

    protected $rules = [
        'nama_produk' => 'required|min:6',
        'kode_produk' => 'required',
        'harga' => 'required'
    ];

    public function updateProduct($product)
    {
        $this->produkId = $product['id'];
        $this->nama_produk = $product['nama_produk'];
        $this->kode_produk = $product['kode_produk'];
        $this->harga = $product['harga'];
    }

    public function update()
    {
        $this->validate();

        if ($this->produkId) {
            $product = Product::where('id', $this->produkId)->first();
            $product->update([
                'nama_produk' => $this->nama_produk,
                'kode_produk' => $this->kode_produk,
                'harga' => $this->harga
            ]);
        }
        $this->emit('newUpdateProduct', $product);
        $this->deleteInput();
        
    }

    public function deleteInput()
    {
       $this->nama_produk = null;
       $this->kode_produk = null;
       $this->harga = null;
    }

    public function render()
    {
        return view('livewire.product.update');
    }
}
