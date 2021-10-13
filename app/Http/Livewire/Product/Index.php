<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 3;
    public $search;
    public $updateProduct = false;

    protected $queryString = ['search'];
    protected $listeners =['StoreProduct', 'newUpdateProduct'];
    

    public function getProduct($id)
    {
        $this->updateProduct = true;
        $product = Product::find($id);
        $this->emit('updateProduct', $product);
      
    }

    public function render()
    {
        return view('livewire.product.index', [
            'product' => $this->paginate == null ?
            Product::where('nama_produk', 'like', '%'.$this->search.'%')
            ->orWhere('kode_produk', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')->paginate($this->paginate) :
            Product::where('nama_produk', 'like', '%'.$this->search.'%')
            ->orWhere('kode_produk', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')->paginate($this->paginate)
        ]);
    }

    public function StoreProduct($product)
    {
        session()->flash('message', 'Produk '.$product['nama_produk'].' Berhasil di Tambahkan.');
    }

    public function newUpdateProduct($product)
    {
        session()->flash('message', 'Produk '.$product['nama_produk'].' Berhasil di Edit.');
        $this->updateProduct = false;
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        // session()->flash('message', 'Produk '.$product['nama_produk'].' Berhasil di Hapus.');
    }
}
