<?php

namespace App\Http\Livewire\Chart;

use App\Models\OrderProduct;
use Livewire\Component;
use App\Models\Product;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class Index extends Component
{
 
    public $productId = [];
    public $firstRun = true;

    public $colors = [
        '3' => '#f6ad55',
        '4' => '#fc8181',
        '12' => '#90cdf4',
        '13' => '#66DA26',
        
    ];

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    
    public function render()
    {
        $product = Product::get();
        foreach ($product as $key => $value) {
            $product_id[] = $value->id;
            if ($this->productId) {
                $order = OrderProduct::whereIn('produk_id', $this->productId)->get();
            } else {
                $order = OrderProduct::whereIn('produk_id', $product_id)->get();
            }
        }
    
        $columnChartModel = $order->groupBy('produk_id')
        ->reduce(function ($columnChartModel, $data) {
            $product_name = $data->first()->namaProduct->nama_produk;
            $warna[$data->first()->namaProduct->nama_produk] = '#'.dechex(rand(0x000000, 0xFFFFFF));
            $value = $data->sum('total');

            return $columnChartModel->addColumn($product_name, $value, $warna[$product_name]);
        }, LivewireCharts::columnChartModel()
            ->setTitle('Order Product')
            ->setAnimated($this->firstRun)
            ->withOnColumnClickEventName('onColumnClick')
            // ->setLegendVisibility(false)
          
            // ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            // ->setColumnWidth(90)
            ->withGrid()
        );

        $pieChartModel = $order->groupBy('produk_id')
        ->reduce(function (PieChartModel $pieChartModel, $data) {
            $product_name = $data->first()->namaProduct->nama_produk;
            $value = $data->sum('total');
            $warna[$data->first()->namaProduct->nama_produk] = '#'.dechex(rand(0x000000, 0xFFFFFF));

            return $pieChartModel->addSlice($product_name, $value, $warna[$product_name]);
        }, LivewireCharts::pieChartModel()
            //->setTitle('Expenses by Type')
            ->setAnimated($this->firstRun)
            ->withOnSliceClickEvent('onSliceClick')
            //->withoutLegend()
            ->legendPositionBottom()
            ->legendHorizontallyAlignedCenter()
     
            // ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
        );

                 $product = Product::orderBy('nama_produk', 'asc')->get();
                                

    return view('livewire.chart.index')
    ->with([
        'columnChartModel' => $columnChartModel,
        'pieChartModel' => $pieChartModel,
        'products' => $product
        
    ]);
    }
}
