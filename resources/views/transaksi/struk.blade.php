<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
    <style>
        .container {
            width: 300px;
        }
        .header {
            margin: 0;
            text-align: center;
        }
        h2, p {
            margin: 0;
        }
        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }
        .flex-container-1 > div {
            text-align : left;
        }
        .flex-container-1 .right {
            text-align : right;
            width: 200px;
        }
        .flex-container-1 .left {
            width: 100px;
        }
        .flex-container {
            width: 300px;
            display: flex;
        }
        .flex-container > div {
            -ms-flex: 1;  /* IE 10 */
            flex: 1;
        }
        ul {
            display: contents;
        }
        ul li {
            display: block;
        }
        hr {
            border-style: dashed;
        }
        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="margin-bottom: 30px;">
            <h2>My Store</h2>
            <small>Jalan Gerilya No.123 Kelurahan Tanjung Pagar Kecamatan Banjarmasin Selatan, Banjarmasin Kalimantan Selatan
            </small>
        </div>
        <hr>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No Order</li>
                    <li>Kasir</li>
                    <li>Tanggal</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li> {{ $order->no_order }} </li>
                    <li> {{ $order->nama_kasir }} </li>
                    <li> {{ date('d-m-Y : H:i:s', strtotime($order->created_at)) }} </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="flex-container" style="margin-bottom: 10px; text-align:right;">
            <div style="text-align: left;">Nama Produk</div>
            <div>Harga/Qty</div>
            <div>Total</div>
        </div>
        @foreach ($order->productOrder as $item)
            <div class="flex-container" style="text-align: right;">
                @php
                    if(!empty($item->namaProduct->nama_produk)) {
                        $arr_name = explode(' ', $item->namaProduct->nama_produk);
                        $name = $arr_name[0];
                    } elseif ($item->namaProduct->nama_produk != '') {
                            $name = $item->namaProduct->nama_produk;
                    } else {
                        $name = 'there';
                    }
                @endphp
                <div style="text-align: left;">{{ $name }} {{ $item->qty }}x</div>
                <div>Rp {{ number_format($item->namaProduct->harga) }} </div>
                <div>Rp {{ number_format($item->total) }} </div>
            </div>
        @endforeach
        <hr>
        <div class="flex-container" style="text-align: right; margin-top: 10px;">
            <div></div>
            <div>
                <ul>
                    <li>Total</li>
                    <li>Pembayaran</li>
                    <li>Kembalian</li>
                </ul>
            </div>
            <div style="text-align: right;">
                <ul>
                    <li>Rp {{ number_format($order->all_total) }} </li>
                    <li>Rp {{ number_format($order->pembayaran) }}</li>
                    <li>Rp {{ number_format($order->kembalian) }}</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="header" style="margin-top: 50px;">
            <h3>Terimakasih</h3>
            <p>Silahkan berkunjung kembali</p>
        </div>
    </div>
</body>
</html>
