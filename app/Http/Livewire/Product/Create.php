<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class Create extends Component
{
    public $nama_produk;
    public $kode_produk;
    public $harga;

    protected $rules = [
        'nama_produk' => 'required|min:6',
        'kode_produk' => 'required',
        'harga' => 'required'
    ];

    public function submit()
    {
        $this->validate();

        $product = Product::create([
            'nama_produk' => $this->nama_produk,
            'kode_produk' => $this->kode_produk,
            'harga' => $this->harga
        ]);

        $this->emit('StoreProduct', $product);
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
        return view('livewire.product.create');
    }
}
