<?php

namespace App\Http\Livewire\Laporan;
use App\Models\Product;
use App\Models\Order;
use Livewire\WithPagination;

use Livewire\Component;

class Index extends Component
{
    use WithPagination;

    public $paginate = 5;
 

    public $search;
    
    public $updateProduct = false;

    protected $queryString = ['search'];
    protected $listeners =['StoreProduct', 'newUpdateProduct'];


    public function render()
    {
        return view('livewire.laporan.index', [
            'product' => $this->paginate == null ?
            Product::where('nama_produk', 'like', '%'.$this->search.'%')
            ->orWhere('kode_produk', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')->paginate($this->paginate) :
            Product::where('nama_produk', 'like', '%'.$this->search.'%')
            ->orWhere('kode_produk', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')->paginate($this->paginate),
            'products' => Product::orderBY('nama_produk', 'asc')->get()

           
        ]);
    }
    
    public function printproduk()
    {
        return view('livewire.laporan.printproduk', [
            'products' => Product::OrderBy('created_at', 'desc')->get()
        ]);
    }


   
}
