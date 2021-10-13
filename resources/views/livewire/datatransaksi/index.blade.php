    {{-- showdata --}} 
    
    <div class="card-body">
        
        {{-- <div class="btn-group">
       
            <a href="/datatransaksi/printtransaksi" class="btn btn-primary"><i class="bi bi-printer"></i> Print ALL</a>
            <a data-toggle="modal" data-target="#exampleModal1" href="#"  class="btn btn-primary"><i class="bi bi-funnel"></i> Print Filter</a>
          </div> --}}
       
        <div class="container">
            <form action="/datatransaksi/searchtanggal" method="POST">
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
                    <th scope="col">No Order</th>
                    <th scope="col">Nama Kasir</th>
                    <th scope="col">Total</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Kembalian</th>
               
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration}} </th>
                    <td>{{ $data->no_order}}</td>
                    <td>{{ $data->nama_kasir}}</td>
                    <td>Rp. {{ number_format($data->all_total) }}</td>
                    <td>Rp. {{ number_format($data->pembayaran) }}</td>
                    <td>Rp. {{ number_format($data->kembalian) }}</td>
                   
                </tr>  
                @endforeach
                
            </tbody>
            
        </table>
        <a href="/datatransaksi/printtransaksi" target="blank" type="button" class="btn btn-success btn-sm btn-flat"><i class="bi bi-printer"></i> Print Transaksi </a>
        {{ $orders->links() }}
    </div>
   
    </div>
</div>

