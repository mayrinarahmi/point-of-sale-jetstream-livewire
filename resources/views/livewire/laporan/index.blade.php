    {{-- showdata --}} 
    
    <div class="card-body">
        <div class="container">
        <form action="/laporan/searchtanggal" method="POST">
            @csrf
            
        <div class="row">
        <div class="container-fluid">
        <div class="form-group row">
        <label for="date" class="col-form-label col-sm-2">Dari Tanggal</label>
        <div class="col-sm-3">
        <input type="date" class="form-control input-sm" id="fromdate" name="fromdate" required/>
        </div>
        <br>
        <br>
        <label for="date" class="col-form-label col-sm-2">Sampai Tanggal</label>
        <div class="col-sm-3">
        <input type="date" class="form-control input-sm" id="todate" name="todate" required/>
        </div>
        <div class="col-sm-2">
        <button target="blank" type="submit"  class="btn btn-success btn-sm" name="search" title="Search"><i class="fas fa-print"></i>Print</button>
        </div>
        </div>
      </div>
    </div>
       
        </div> 
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <select class="form-select" wire:model="paginate" aria-label="Default select example">
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                        <option value="10">10</option>
                      </select>
                </div>
                <div class="d-flex">
                    <input class="form-control mr-2" wire:model="search" type="search" placeholder="Search" aria-label="Search">
                 </div>
                </div>
                </nav>                   

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Harga</th>
               
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration}} </th>
                    <td>{{ $data->nama_produk }}</td>
                    <td>{{ $data->kode_produk }}</td>
                    <td>Rp. {{ number_format($data->harga) }}</td>
                   
                </tr>  
                @endforeach
                
            </tbody>
        </table>
        <a href="/laporan/printproduk" target="blank" type="button" class="btn btn-success btn-sm btn-flat"><i class="bi bi-printer"></i> Print Produk </a>
        {{ $product->links() }}
    </div>
    </div>
</div>