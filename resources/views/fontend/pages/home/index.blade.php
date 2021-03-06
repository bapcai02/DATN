@extends('fontend.layouts.master')
@section('content')

@if(session('message'))
  <input id='message' type = 'hidden' value="{{ session('message') }}" />
@endif
<div class="banner_v2">
    <div class="container">
      <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-12 col-xl-9">
          <div class="banner-block" style="background-image: url({{ asset('assets/images').'/'.$slider[0]->images }});"> 
            <div class="row no-gutters justify-content-center align-items-md-center">
              <div class="col-10 col-md-5 col-xl-6">
                <div class="banner-text text-center text-md-left">
                  <h5 class="color-subtitle pink">Butter & Eggs</h5>
                  <h2 class="title">100% Hữu Cơ</h2>
                  <p>{{ $slider[0]->descript }}</p><a class="normal-btn pink" href="{{  url('/detail') . '/'. $slider[0]->product_id  }}">Shop now</a>
                </div>
              </div>
              <div class="col-12 col-md-5 col-xl-5">
                <div class="banner-img">
                  <div class="img-block text-center"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End banner v2-->
  <div class="home3-product-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-3">
          <div class="deal-of-week_slide">
            <div class="week-deal_top mini-tab-title underline pink">
              <h2 class="title">Khuyến Mãi Khủng</h2>
              <div class="week-deal_control"></div>
            </div>
            <div class="week-deal_bottom">
              @foreach($productDealWeek as $key => $value)
                <div class="deal-block"> 
                  <div class="deal-block_detail">
                    @if( $value->sale > 0)
                      <h5 class="deal-discount">-{{ $value->sale }}%</h5>
                    @endif
                    <div class="deal-img"><a href="{{ url('/detail') . '/'. $value->id }}"><img width="300px" height="350px" src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt="product image"></a></div>   
                    <div class="deal-info text-center">
                      <h5 class="color-type pink deal-type">{{ $value->category_name }}</h5><a class="deal-name" href="#">{{ $value->product_name }}</a>
                      @if($value->sale > 0)
                        <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                          <del>{{  number_format($value->product_price) }}</del>
                        </h5>
                      @else
                        <h5 class="product-price">{{ number_format($value->product_price). " VND/kg" }}
                        </h5>
                      @endif
                    </div>
                    <div class="deal-select text-center">
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
          <div class="sidebar-benefit">
            <div class="benefit-block">
              <div class="our-benefits column shadowless benefit-border">
                <div class="row">
                  <div class="col-12 col-md-6 col-xl-12">
                    <div class="benefit-detail d-flex flex-row align-items-center"><img class="benefit-img" src="{{ url('HTML/assets/images/homepage02/benefit-icon1.png') }}" alt="">
                      <div class="benefit-detail_info">
                        <h5 class="benefit-title">Free Ship</h5>
                        <p class="benefit-describle">Giá trị đơn hàng lớn hơn 200.000VND</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-xl-12">
                    <div class="benefit-detail d-flex flex-row align-items-center"><img class="benefit-img" src="{{ url('HTML/assets/images/homepage02/benefit-icon2.png') }}" alt="">
                      <div class="benefit-detail_info">
                        <h5 class="benefit-title">Giao Hàng Đúng Hạn</h5>
                        <p class="benefit-describle">Nhanh Chóng, Tiện Lợi</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-xl-12">
                    <div class="benefit-detail d-flex flex-row align-items-center"><img class="benefit-img" src="{{ url('HTML/assets/images/homepage02/benefit-icon3.png') }}" alt="">
                      <div class="benefit-detail_info">
                        <h5 class="benefit-title">Thanh Toán An Toàn</h5>
                        <p class="benefit-describle">100% Bảo Mật</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-xl-12">
                    <div class="benefit-detail boderless d-flex flex-row align-items-center"><img class="{{ url('HTML/assets/images/homepage02/benefit-icon4.png') }}" alt="">
                      <div class="benefit-detail_info">
                        <h5 class="benefit-title">Hỗ Trợ 24/7</h5>
                        <p class="benefit-describle">Hỗ Trợ Tận Tâm</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="sale-product">
            <div class="sale-product_top mini-tab-title underline pink">
              <h2 class="title">Bán Chạy Nhất </h2>
            </div>
            <div class="sale-product_bottom">
              <div class="row">
                @foreach($productRan as $key => $value)
                  <div class="col-12">
                    <div class="mini-product column">
                      <div class="mini-product_img"><a href="{{ url('/detail') . '/'. $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt="product image"></a></div>
                      <div class="mini-product_info"> <a href="#">{{ $value->category_name }}</a>
                        <h5>{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                          <del>{{ number_format($value->product_price )  }}</del>
                        </h5>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-9">
          <div id="tab">
            <div class="best-seller_top mini-tab-title underline pink">
              <div class="row align-items-md-center">
                <div class="col-12 col-md-4">
                  <h2 class="title">Sản Phẩm Mới</h2>
                </div>
                <div class="col-12 col-md-8 text-lg-right">
                  <ul class="tab-control text-md-right">
                    <li><a class="active" href="#tab1">Tất Cả</a></li>
                    <li><a href="#tab2">Trái Cây & Hạt</a></li>
                    <li><a href="#tab3">Thịt Tươi Sống</a></li>
                    <li><a href="#tab4">Rau Sạch</a></li>
                    <li><a href="#tab5">Hải Sản</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="best-seller_bottom">
              <div id="tab1">
                <div class="row no-gutters-sm">
                  @foreach($product as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product pink"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style=" margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price ) }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab2">
                <div class="row no-gutters-sm">
                  @foreach($productFui as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style=" margin: 12px 0; background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h5 class="product-name">{{ $value->product_name }}</h5>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price)  }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price). " VND/kg"  }}</h5>
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
              <div id="tab3"> 
                @foreach($productMeat as $key => $value)
                  <div class="col-6 col-md-4">
                    <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                      @if($value->sale != 0)
                          <h5 class="deal-discount" style=" margin: 12px 0; background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                      <h5 class="product-type">{{ $value->category_name }}</h5>
                      <h3 class="product-name">{{ $value->product_name }}</h3>
                      @if($value->sale != 0)
                        <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                          <del>{{ number_format($value->product_price ) }}</del>
                        </h5>
                      @else
                        <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab4">
                <div class="row no-gutters-sm">
                  @foreach($productVeget as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style=" margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{number_format($value->product_price ) }}</del>
                          </h5>
                        @else
                          <h5>{{number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab5">
                <div class="row no-gutters-sm">
                  @foreach($productSea as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price ) }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
            </div>
          </div>
          <div class="quick-banner" style="background-image: url({{ asset('assets/images').'/'.$slider[0]->images }});">
            <div class="row justify-content-center align-items-center flex-column flex-md-row">
              <div class="col-12 col-md-5">
                <div class="bannner-img text-center"></div>
              </div>
              <div class="col-10 col-md-5">
                <div class="banner-text text-center text-md-left">
                  <div class="discount-block d-flex align-items-center justify-content-center justify-content-md-start text-left">
                    <h2 class="big-number">50</h2>
                    <h3>%OFF<br>Black <span>Friday</span></h3>
                  </div>
                  <p>{{ $slider[0]->descript }}</p><a class="normal-btn pink" href="{{  url('/detail') . '/'. $slider[1]->product_id  }}">Shop now</a>
                </div>
              </div>
            </div>
          </div>
          <div id="tab-so1">
            <div class="best-seller_top mini-tab-title underline pink">
              <div class="row align-items-md-center">
                <div class="col-12 col-md-4">
                  <h2 class="title">Khuyến Mãi</h2>
                </div>
                <div class="col-12 col-md-8 text-lg-right">
                  <ul class="tab-control text-md-right">
                    <li><a class="active" href="#tab1">Tất Cả</a></li>
                    <li><a href="#tab2">Trái Cây & Hạt</a></li>
                    <li><a href="#tab3">Thịt Tươi Sống</a></li>
                    <li><a href="#tab4">Rau Sạch</a></li>
                    <li><a href="#tab5">Hải Sản</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="best-seller_bottom">
              <div id="tab1">
                <div class="row no-gutters-sm">
                  @foreach($productSale as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price ) }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab2">
                <div class="row no-gutters-sm">
                    @foreach($productFuiSale as $key => $value)
                      <div class="col-6 col-md-4">
                        <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                          @if($value->sale != 0)
                            <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                          @endif
                          <h5 class="product-type">{{ $value->category_name }}</h5>
                          <h3 class="product-name">{{ $value->product_name }}</h3>
                          @if($value->sale != 0)
                            <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                              <del>{{ number_format($value->product_price ) }}</del>
                            </h5>
                          @else
                            <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab3"> 
                <div class="row no-gutters-sm">
                  @foreach($productMeatSale as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price )  }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab4">
                <div class="row no-gutters-sm">
                  @foreach($productVegetSale as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price ) }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab5">
                <div class="row no-gutters-sm">
                  @foreach($productSeaSale as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price )  }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
            </div>
          </div>
          <div id="tab-so2">
            <div class="best-seller_top mini-tab-title underline pink">
              <div class="row align-items-md-center">
                <div class="col-12 col-md-4">
                  <h2 class="title">Dành Cho Bạn</h2>
                </div>
                <div class="col-12 col-md-8 text-lg-right">
                  <ul class="tab-control text-md-right">
                    <li><a class="active" href="#tab1">Tất Cả</a></li>
                    <li><a href="#tab2">Trái Cây & Hạt</a></li>
                    <li><a href="#tab3">Thịt Tươi Sống</a></li>
                    <li><a href="#tab4">Rau Sạch</a></li>
                    <li><a href="#tab5">Hải Sản</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="best-seller_bottom">
              <div id="tab1">
                <div class="row no-gutters-sm">
                  @foreach($productRan as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{number_format($value->product_price ) }}</del>
                          </h5>
                        @else
                          <h5>{{number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab2">
                <div class="row no-gutters-sm">
                  @foreach($productFuiRan as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price )  }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab3"> 
                <div class="row no-gutters-sm">
                    @foreach($productMeatRan as $key => $value)
                      <div class="col-6 col-md-4">
                        <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                          @if($value->sale != 0)
                            <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                          @endif
                          <h5 class="product-type">{{ $value->category_name }}</h5>
                          <h3 class="product-name">{{ $value->product_name }}</h3>
                          @if($value->sale != 0)
                            <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                              <del>{{ number_format($value->product_price ) }}</del>
                            </h5>
                          @else
                            <h5>{{ number_format($value->product_price ). " VND/kg" }}</h3>
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
              <div id="tab4">
                <div class="row no-gutters-sm">
                  @foreach($productVegetRan as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('detail') . '/' . $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price )  }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
              <div id="tab5">
                <div class="row no-gutters-sm">
                  @foreach($productSeaRan as $key => $value)
                    <div class="col-6 col-md-4">
                      <div class="product"><a class="product-img" href="{{ url('dateail') .'/'. $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                        @if($value->sale != 0)
                          <h5 class="deal-discount" style="margin: 12px 0;background-color: rgb(170, 57, 57); color:white">-{{ $value->sale }}%</h5>
                        @endif
                        <h5 class="product-type">{{ $value->category_name }}</h5>
                        <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($value->sale != 0)
                          <h5 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). " VND/kg" }}
                            <del>{{ number_format($value->product_price ) }}</del>
                          </h5>
                        @else
                          <h5>{{ number_format($value->product_price ). " VND/kg"  }}</h5>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End product block-->
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

@push('script')

<script>
  $(document).ready(function () {
    var val = $('#message').val();
    if((val) && val.length > 0) {
        swal("Thành Công!", "Thao Tác Thành công!", "success");
    }
  });
</script>

@endpush


@endsection