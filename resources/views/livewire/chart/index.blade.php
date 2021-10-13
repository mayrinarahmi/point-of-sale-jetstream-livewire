<div class="space-y-4 sticky top-0 bg-white p-4 shadow z-50">
    <ul class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex sm:items-center">
        @foreach ($products as $product)
        <li>
            <input type="checkbox" value="{{ $product->id}}" wire:model="productId"/>
            <span>{{ $product->nama_produk }}</span>
        </li>
        @endforeach
       
    </ul>
    <div class="card-body">
        <div class="row">
            <div class="col" style="height: 400px !important;">
                    <livewire:livewire-column-chart
                        key="{{ $columnChartModel->reactiveKey() }}"
                        :column-chart-model="$columnChartModel"
                    />
                </div>
              
            <div class="col" style="height: 400px !important;">
                <livewire:livewire-pie-chart
                key="{{ $pieChartModel->reactiveKey() }}"
                :pie-chart-model="$pieChartModel"
            />
            </div>
        </div>
    </div>
</div>
