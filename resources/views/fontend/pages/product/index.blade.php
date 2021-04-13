@extends('fontend.layouts.master')
@section('content')

    <div class="ogami-breadcrumb">
      <div class="ogami-container-fluid">
        <ul>
          <li> <a class="breadcrumb-link" href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
          <li> <a class="breadcrumb-link" href="#">Shop</a></li>
          <li> <a class="breadcrumb-link active" href="#">Shop Detail</a></li>
        </ul>
      </div>
    </div>
    <!-- End breadcrumb-->
    <div class="shop-layout">
      <div class="ogami-container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="shop-detail shop-detail-fullwidth">
              <div class="row">
                <div class="col-12 col-xl-5">
                  <div class="shop-detail_img">
                    <button class="round-icon-btn" id="zoom-btn"> <i class="icon_zoom-in_alt"></i></button>
                    <div class="row">
                      <div class="col-3">
                        <div class="slide-img" data-slick="{&quot;vertical&quot;: true}">
                          @foreach($productImage as $key => $value)
                            <div class="slide-img_block"><img height="100px" src="{{ asset('assets/images').'/'.$value->image }}" alt="product image"></div>
                          @endforeach                     
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="big-img">
                          @foreach($productImage as $key => $value)
                            <div class="big-img_block"><img width="400px" height="400px" src="{{ asset('assets/images').'/'.$value->image }}" alt="product image"></div>
                          @endforeach                           
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="img_control"></div>
                </div>
                <div class="col-12 col-xl-7">
                  <div class="row">
                    <div class="col-md-7 col-lg-7 col-xxl-8">
                      <div class="shop-detail_info">
                        <h5 class="product-type color-type">{{ $product->category_name }}</h5>
                        <h2 class="product-name">{{ $product->product_name }}</h2>
                        <div class="product-describe_block">
                          <p class="product-describe">{{ $product->product_desc }}</p>
                        </div>
                        <div class="product-category"
                          <h5 class="category">Categories:<span><a href="product_grid+list_3col.html">{{ $product->category_name }}</a></span></h5>
                          {{-- <h5 class="category">Tag:<span><a href="product_grid+list_3col.html">Food</a></span></h5> --}}
                          <h5 class="category">Thông Tin Shop: <a href="{{url('customer') . '/' . $product->seller_id}}">{{ App\Repositories\SellerRepository::checkName($product->seller_id)->shop_name }}</a></h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-xxl-4">
                      <div class="shop-detail_info shop-detail_info-full">
                        <div class="price-rate">
                          @if($product->sale != 0)
                            <h3 class="product-price">{{ number_format(($value->product_price * $value->sale)/100). "VND/kg" }}
                              <del>{{ $value->product_price }}</del>
                            </h3>
                          @else
                            <h3>{{ $value->product_price }}/kg</h3>
                          @endif
                          <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(15)</span></h5>
                        </div>
                        <div class="quantity-select">
                          <label for="quantity">Quatity:</label>
                          <input class="no-round-input" id="quantity" type="number" min="0" value="1">
                        </div>
                        <div class="product-select">
                          @if(!Auth::check())
                          <form action="{{ url('/cart') }}" method = "POST">
                            @csrf
                            <input type="hidden" name="productId" value="{{ $product->id }}" >
                            <button type = 'submit' class="add-to-cart normal-btn outline">Thêm giỏ hàng</button> 
                          </form>   
                          @else
                            <form action="{{ url('/usercart/add') }}" method = "POST">
                              @csrf
                              <input type="hidden" name="productId" value="{{ $product->id }}" >
                              <button type = 'submit' class="add-to-cart normal-btn outline"> Thêm giỏ hàng</button> 
                            </form> 
                          @endif 
                        </div>
                        <div class="product-guarante">
                          <p class="guarante">Đảm bảo 100% sự hài lòng </p>
                          <p class="guarante">Giao hàng miễn phí cho các đơn đặt hàng trên 200VND</p>
                          <p class="guarante">2 ngày trả lại dễ dàng </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="shop-detail_more-info">
                    <div id="tab-so3">
                      <ul class="mb-0">
                        <li class="active"><a href="#tab-1">CHI TIẾT SẢN PHẨM</a></li>
                        <li> <a href="#tab-3">Đánh GIÁ</a></li>
                      </ul>
                      <div id="tab-1">
                        <div class="description-block">
                          <div class="description-item_block">
                            <div class="row align-items-center justify-content-around">
                              <div class="col-12 col-md-4">
                                <div class="description-item_img"><img class="img-fluid" src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($product->id)->image }}" alt="description image"></div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="description-item_text">
                                  <h2>Thông tin sản phẩm</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiustempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. S totam rem aperiam, eaque ipsa</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="tab-3"> 
                        <div class="customer-reviews_block">
                          @foreach($rating as $value)
                          <div class="customer-review">
                            <div class="row">
                              <div class="col-12 col-sm-9 col-lg-10 col-xxl-11">
                                <div class="customer-comment"> 
                                  <h5 class="comment-date">{{ date('Y-m-d', strtotime($value->created_at))}}</h5>
                                  <h3 class="customer-name">{{ $value->name }}</h3>
                                  <p class="customer-commented">{{ $value->message }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                          <div class="add-review">
                            <div class="add-review_top">
                              <h2>Đánh giá</h2>
                            </div>
                            <div class="add-review_bottom">
                              <form>
                                <div class="row">
                                  <div class="col-12">
                                    <div class="rating">
                                      <h5>Your rating:</h5><span><div id="rateYo"></div></span>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <textarea class="textarea-form" id="review" name="" cols="30" rows="5" placeholder="Message"></textarea>
                                  </div>
                                 

                                  <div class="col-12">
                                    @if(Auth::check())
                                      <input type="hidden" id="productid" value="{{ $product->id }}">
                                      <input type="hidden" id="userid" value="{{ Auth::user()->id }}">
                                      <button id="rating" type="button" class="normal-btn">Đánh giá</button>
                                    @else
                                      <button id="rating2" type="button" class="normal-btn">Đánh giá</button>
                                    @endif
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="related-product">
              <div class="related-product_top mini-tab-title underline">
                <h2 class="title">Dành cho bạn</h2>
              </div>
              <div class="related-product_bottom">
                <div class="row no-gutters-sm">
                @foreach($productRan as $key => $value)
                  <div class="col-6 col-md-4 col-lg-3 col-xxl-2">

                    <div class="product"><a class="product-img" href="{{ url('/detail') . '/'. $value->id }}"><img src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></a>
                      <h5 class="product-type">{{ $value->category_name }}</h5>
                      <h3 class="product-name">{{ $value->product_name }}</h3>
                        @if($product->sale != 0)
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
                          <button class="round-icon-btn pink"><a href="{{ url('/detail') . '/'. $value->id }}"><i class="far fa-eye"></i></a></button>
                        </form> 
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
    @if(session('message'))
      <input id='message' type = 'hidden' value="{{ session('message') }}" />
    @endif

@push('script')
    <script>
       $(document).ready(function () {
          var val = $('#message').val();
          if((val) && val.length > 0) {
              swal("Thành Công!", "Thao Tác Thành công!", "success");
          }
          
          $('#rating2').click(function(){
            swal("Thông báo !", "Bạn cần đăng nhập để đánh giá !", "warning");
          })

          $("#rateYo").rateYo({
            onSet: function (rating, rateYoInstance) {
                $('#rating').click(function(){
                  var text = $('#review').val();
                  var product_id = $('#productid').val();
                  var user_id = $('#userid').val();

                  if(text.length == 0 || rating == 0) {
                      swal("Thông báo!", "vui lòng nhập đầy đủ thông tin!", "warning");
                  }else{
                    $.ajax({
                      type:'GET',
                      url:"{{ url('rating') }}",
                      data:{
                        'text': text,
                        'rating' : rating,
                        'productid': product_id,
                        'userid' : user_id
                      }
                    }).done(function(res){
                      console.log(res);
                      location.reload();
                    })
                  }
                })
              }
          });
          
        });
      
    </script>
@endpush
@endsection