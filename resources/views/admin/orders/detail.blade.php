@extends('admin.layout.app')
@section('title', 'Product')
@section('content')
    <div style="width: 85vw; padding: 50px;">

        <!-- CONTENT WRAPPER -->
        <div class="ec-content-wrapper">
            <div class="content">
                <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
                    <h1>Order Detail</h1>
                    <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Orders
                    </p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="ec-odr-dtl card card-default">
                            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                                <h2 class="ec-odr">Order Detail<br>
                                    <span class="small">Order ID: #{{ $order->id }}</span>
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6">
                                        <address class="info-grid">
                                            <div class="info-title"><strong>Customer:</strong></div><br>
                                            <div class="info-content">
                                                {{ $order->customer_name }}<br>
                                                Customer Email <br>
                                            </div>
                                        </address>
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <address class="info-grid">
                                            <div class="info-title"><strong>Ship To:</strong></div><br>
                                            <div class="info-content">
                                                {{ $order->customer_address }}
                                                <abbr title="Phone">P:</abbr> {{ $order->customer_phone }}
                                            </div>
                                        </address>
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <address class="info-grid">
                                            <div class="info-title"><strong>Payment Method:</strong></div><br>
                                            <div class="info-content">
                                                Money or QR
                                            </div>
                                        </address>
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <address class="info-grid">
                                            <div class="info-title"><strong>Order Date:</strong></div><br>
                                            <div class="info-content">
                                                {{ $order->created_at }}
                                            </div>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="tbl-title">PRODUCT SUMMARY</h3>
                                        <div class="table-responsive">
                                            <table class="table table-striped o-tbl">
                                                <thead>
                                                    <tr class="line">
                                                        <td><strong>#</strong></td>
                                                        <td class="text-center"><strong>IMAGE</strong></td>
                                                        <td class="text-center"><strong>PRODUCT</strong></td>
                                                        <td class="text-center"><strong>PRICE</strong></td>
                                                        <td class="text-center"><strong>QUANTITY</strong></td>
                                                        <td class="text-right"><strong>SUBTOTAL</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($carts[0]['products'] as $index => $product)
                                                        <pre>
                                                        {{ json_encode($products[$index], JSON_PRETTY_PRINT) }}    
                                                    </pre>
                                                        <tr>
                                                            <td>{{ $product['id'] }}</td>
                                                            <td>
                                                                @if (isset($products[$index]['images'][0]['url']))
                                                                    <img class="product-img"
                                                                        src="/{{ $products[$index]['images'][0]['url'] }}"
                                                                        alt="" />
                                                                @else
                                                                    <img class="product-img"
                                                                        src="https://vipha.co/wp-content/themes/vipha/images/empty-img.png"
                                                                        alt="">
                                                                @endif
                                                            </td>
                                                            <td><strong>{{ $products[$index]['name'] }}</strong><br>{{ $products[$index]['description'] }}
                                                            </td>
                                                            <td class="text-center">${{ $products[$index]['price'] }}</td>
                                                            <td class="text-center">{{ $product->product_quantity }}</td>
                                                            <td class="text-right">
                                                                ${{ $product->product_quantity * $product->product_price }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="4"></td>
                                                        <td class="text-right"><strong>Total</strong></td>
                                                        <td class="text-right"><strong>$2,400.00</strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="4"></td>
                                                        <td class="text-right"><strong>Payment Status</strong></td>
                                                        <td class="text-right"><strong>PAID</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Content -->
        </div> <!-- End Content Wrapper -->
    </div>
@endsection
