<div>
    <div class="container">
        <div class="card-body">
            @if ($updateProduct)
            <h1 class="h3 pb-3 border-bottom">Edit Produk</h1>
            @if (session()->has('message'))
            <script>
                Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{!! session('message') !!}',
            showConfirmButton: false,
            timer: 2300
            })
            </script>
            @endif
                @livewire('product.update')  
            @else
            <h1 class="h3 pb-3 border-bottom">Tambah Produk</h1>
            @if (session()->has('message'))        
            <script>
                Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{!! session('message') !!}',
            showConfirmButton: false,
            timer: 2300
            })
            </script>

            @endif
                @livewire('product.create')
            @endif

        {{-- showdata --}} 
         <div class="card-body">
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
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration}} </th>
                    <td>{{ $data->nama_produk }}</td>
                    <td>{{ $data->kode_produk }}</td>
                    <td>Rp. {{ number_format($data->harga) }}</td>
                    <td>
                        <button wire:click="getProduct({{$data->id}})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="$emit('deleteProduct',{{$data->id}})" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>  
                @endforeach
                
            </tbody>
        </table>
        {{ $product->links() }}
    </div>
    </div>
</div>

@push('script')
<script>
    document.addEventListener('livewire:load', function () {
        @this.on('deleteProduct', idProduk => {
            Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
            if (result.value) {
            @this.call('deleteProduct', idProduk)
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
  }
})
        })
    })
</script>

@endpush
