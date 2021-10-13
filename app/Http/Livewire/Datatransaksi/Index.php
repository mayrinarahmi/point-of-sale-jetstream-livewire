<?php

namespace App\Http\Livewire\Datatransaksi;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
use Livewire\WithPagination;

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
        return view('livewire.datatransaksi.index', [
            'orders' => $this->paginate == null ?
            Order::where('nama_kasir', 'like', '%'.$this->search.'%')
            ->orWhere('no_order', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')->paginate($this->paginate) :
            Order::where('nama_kasir', 'like', '%'.$this->search.'%')
            ->orWhere('no_order', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')->paginate($this->paginate)

           
        ]);
    }
    
}
