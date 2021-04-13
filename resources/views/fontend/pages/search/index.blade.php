@extends('fontend.layouts.master')

@section( 'content')

<div class="ogami-breadcrumb">
    <div class="container">
      <ul>
        <li> <a class="breadcrumb-link" href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
        <li> <a class="breadcrumb-link active" href="#">Search</a></li>
      </ul>
    </div>
  </div>
  <!-- End breadcrumb-->
  <div class="shop-layout">
    <div class="container">
      <div class="row">
        <div class="col-xl-3">
          <div class="shop-sidebar">
            <button class="no-round-btn" id="filter-sidebar--closebtn">Close sidebar</button>
            <div class="shop-sidebar_department">
              <div class="department_top mini-tab-title underline">
                <h2 class="title">Danh mục</h2>
              </div>
              <div class="department_bottom">
                <ul>
                  @foreach($category as $key => $value)
                    <li> <a class="department-link" href="{{ url('category') . '/' . $value->id }}">{{ $value->category_name }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="shop-sidebar_price-filter">
              <div class="price-filter_top mini-tab-title underline">
                <h2 class="title">Filter By Price</h2>
              </div>
              <div class="price-filter_bottom">
                <p>
                  <label for="amount">Price range:</label>
                  <div class="filter-group">
                    <input id="amount" type="text" readonly="">
                    <button class="normal-btn">Fiter</button>
                  </div>
                </p>
                <div id="slider-range"></div>
              </div>
            </div>
            <div class="shop-sidebar_tag">
              <div class="tag_top mini-tab-title underline">
                <h2 class="title">Product tag</h2>
              </div>
              <div class="tag_bottom"><a class="tag-btn" href="shop_grid+list_3col.html">organic</a><a class="tag-btn" href="shop_grid+list_3col.html">vegatable</a><a class="tag-btn" href="shop_grid+list_3col.html">fruits</a><a class="tag-btn" href="shop_grid+list_3col.html">fresh meat</a><a class="tag-btn" href="shop_grid+list_3col.html">fastfood</a><a class="tag-btn" href="shop_grid+list_3col.html">natural</a></div>
            </div>
          </div>
          <div class="filter-sidebar--background" style="display: none"></div>
        </div>
        <div class="col-xl-9">
          <div class="shop-grid-list">
            <div class="shop-products">
              <div class="shop-products_top mini-tab-title underline">
                <div class="row align-items-center">
                  <div class="col-6 col-xl-4">
                    <h2 class="title">Shop</h2>
                  </div>
                  <div class="col-6 text-right">
                    <div id="show-filter-sidebar">
                      <h5> <i class="fas fa-bars"></i>Show sidebar</h5>
                    </div>
                  </div>
                  <div class="col-12 col-xl-8">
                    <div class="product-option">
                      <div class="product-filter">
                      </div>
                      <div class="view-method">
                        <p class="active" id="grid-view"><i class="fas fa-th-large"></i></p>
                        <p id="list-view"><i class="fas fa-list"></i></p>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Using column-->
              </div>
              <div class="shop-products_bottom">
                <div class="row no-gutters-sm">
                  @foreach($search as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product pink"><a class="product-img" href="{{ url('/detail') . '/'. $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
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
                          <form action="{{ url('/cart') }}" method = "POST">
                            @csrf
                            <input type="hidden" name="productId" value="{{ $value->id }}" >
                            <button type = 'submit' class="add-to-cart round-icon-btn pink pink">  <i class="icon_bag_alt"></i></button>
                          </form> 
                          <button class="round-icon-btn pink"><a href="{{ url('/detail') . '/'. $value->id }}"><i class="far fa-eye"></i></a></button>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="shop-pagination">
                  {{ $search->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End shop layout-->
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