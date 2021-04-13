@extends('fontend.layouts.master')
@section('content')

<style>
    .infor_shop2{
        background: #fff;
        padding: 1.25rem 0;
        box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
        margin-bottom: 1px;
    }
    .image{
        margin-left: 10%;
    }
    .image > img{
        border: 0.1875em solid #0F1C3F;
        border-radius: 50%;
        box-shadow: 0.375em 0.375em 0 0 rgba(15, 28, 63, 0.125);
        height: 7em;
        width: 7em;  
        z-index: 1; 
    }
    .text2{
        margin-left: 10%;
        float: right;
        margin-right: 15%;
    }
    .text2 > h5{
        color: black;
        margin-top:-20%;
        z-index: 10;
    }
    .info{
      float: right;  
      margin-top:-7%;
      margin-right:15%;
    }
</style>
<div class="ogami-breadcrumb">
    <div class="container">
      <ul>
        <li> <a class="breadcrumb-link" href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
        <li> <a class="breadcrumb-link active" href="#">Customer</a></li>
      </ul>
    </div>
</div>
<div class="content infor_shop2">
    <div class="col-md-6 image_shop">
        <div class="col-md-6 image">
            <img width="400px" height="200px" src="https://cf.shopee.vn/file/5b514e07dd5509fdd1e50cfb210cf6f6_tn" alt="">
        </div>
        <div class="col-md-6 text2">
            <h5><b>{{$seller->shop_name}}</b></h5>
        </div>
    </div>
    <div class="col-md-4 info">
        <div style="margin-right: 15%;">
            <i class="fa fa-box"></i><span></span>Tồng Sản Phẩm:{{ count($product)}}<br><br> <br>
            <i class="fa fa-star"></i><span></span>Đánh Giá: 4/6<br><br> <br>
            <i class="fa fa-sms"></i><span></span>Tỉ Lệ Phản Hồi Chat: 98% (Trong Vài Giờ) 
        </div>    
    </div>
</div>
<div class="col-12" style="margin-top:5%;">
    <div class="shop-detail_more-info">
    <div id="tab-so3">
        <div id="tab-1">
        <div class="description-block">
            <div class="description-item_block">
            <div class="row align-items-center justify-content-around">
                <div class="col-12 col-md-4">
                <div class="description-item_img"><img class="img-fluid" src="https://cf.shopee.vn/file/5b514e07dd5509fdd1e50cfb210cf6f6_tn" alt="description image"></div>
                </div>
                <div class="col-12 col-md-6">
                <div class="description-item_text">
                    <h2>Thông Tin Shop</h2>
                    <p>{{$seller->shop_info}}</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="shop-layout">
<h3 style="margin-left:10%">Danh Sách Sản Phẩm</h3>
    <div class="container" style="margin-left:13%">
        <div class="row">
            <div class="col-xl-9">
                <div class="shop-grid-list">
                    <div class="shop-products">
                        <div class="shop-products_bottom">
                            <div class="row no-gutters-sm">
                                @foreach($product as $value)
                                <div class="col-6 col-md-4">
                                    <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                                        @if($value->sale != 0)
                                        <h5 class="deal-discount" style="background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                                        @endif
                                        <h5 class="product-type">{{ $value->category_name }}</h5>
                                        <h3 class="product-name">{{ $value->product_name }}</h3>
                                        @if($value->sale != 0)
                                        <h3 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). "VND/kg" }}
                                            <del>{{ $value->product_price }}</del>
                                        </h3>
                                        @else
                                        <h3>{{ $value->product_price }}/kg</h3>
                                        @endif
                                        <div class="product-select">
                                        @if(!Auth::check())
                                            <form action="{{ url('/cart') }}" method = "POST">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{ $value->id }}" >
                                            <button type = 'submit' class="add-to-cart round-icon-btn pink pink">  <i class="icon_bag_alt"></i></button> 
                                            </form>   
                                        @else
                                            <form action="{{ url('/usercart/add') }}" method = "POST">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{ $value->id }}" >
                                            <button type = 'submit' class="add-to-cart round-icon-btn pink pink">  <i class="icon_bag_alt"></i></button> 
                                            </form> 
                                        @endif 
                                        <button class="round-icon-btn pink"><a href="{{ url('/detail') . '/'. $value->id }}"><i class="far fa-eye"></i></a></button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            </div>
                            <div class="shop-pagination">
                               {{$product->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="partner">
    <div class="container">
      <div class="partner_block d-flex justify-content-between" data-slick="{&quot;slidesToShow&quot;: 6}">
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-vietcombank.png" alt = "VCB Mobile-B@anking" title="VCB Mobile-B@anking"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-agribank.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-bidv.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-ipay.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-ipay.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://sandbox.vnpayment.vn/paymentv2/images/bank/qr-vnpayewallet.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-vcbpay.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-vietcombank.png" alt = "VCB Mobile-B@anking" title="VCB Mobile-B@anking"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://sandbox.vnpayment.vn/paymentv2/images/bank/qr-scb.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-abbank.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-seabank.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-ivb.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-vietbank.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-eximbank.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-ojb.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-nab.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://sandbox.vnpayment.vn/paymentv2/images/bank/qr-baovietbank.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-hdbank.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-tpbank.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://sandbox.vnpayment.vn/paymentv2/images/bank/qr-vtcpay.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-vnptpay.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-vimass.png" alt="partner" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-pvcombank.png" title="partner logo"></a></div>
        <div class="partner--logo"> <a href="#"><img width = "120px" src="https://pay.vnpay.vn/images/bank/qr-viviet.png" alt="partner" title="partner logo"></a></div>
      </div>
    </div>
  </div>

@endsection