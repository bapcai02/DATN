@extends('fontend.layouts.master')
@section('content')

<div class="ogami-breadcrumb">
        <div class="container">
          <ul>
            <li> <a class="breadcrumb-link" href="index.html"> <i class="fas fa-home"></i>Home</a></li>
            <li> <a class="breadcrumb-link" href="index.html">Shop</a></li>
            <li> <a class="breadcrumb-link active" href="index.html">Shoping cart</a></li>
          </ul>
        </div>
      </div>
      <!-- End breadcrumb-->
      <div class="order-step">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="order-step_block">
                <div class="row no-gutters">
                  <div class="col-12 col-md-4">
                    <div class="step-block active">
                      <div class="step">
                        <h2>Shopping Cart</h2><span>01</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="step-block">
                      <div class="step">
                        <h2>Check Out</h2><span>02</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="step-block">
                      <div class="step">
                        <h2>Order Completed</h2><span>03</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End order step-->
      <div class="shopping-cart">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="product-table">
                  <table class="table table-responsive" id="myTable"> 
                    <colgroup>
                      <col span="1" style="width: 15%">
                      <col span="1" style="width: 15%">
                      <col span="1" style="width: 30%">
                      <col span="1" style="width: 15%">
                      <col span="1" style="width: 15%">
                      <col span="1" style="width: 15%">
                      <col span="1" style="width: 10%">
                    </colgroup>
                    <thead>
                      <tr>
                        <th></th>
                        <th class="product-iamge" scope="col">???nh</th>
                        <th class="product-name" scope="col">T??n S???n Ph???m</th>
                        <th class="product-price" scope="col">Gi??</th>
                        <th class="product-quantity" scope="col">s??? l?????ng</th>
                        <th class="product-total" scope="col">T???ng Ti???n</th>
                        <th class="product-clear" scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(isset($user_cart))
                        @foreach($user_cart as $key => $value)
                          <tr>
                            <td><input type="radio" name="checkk" class="product_id" value="{{ $value->product_id }}"></td>
                            <td class="product-iamge"> 
                              <div class="img-wrapper"><img src="{{ asset('assets/images').'/'.$value->image }}" alt="product image"></div>
                            </td>
                            <td class="product-name">{{ $value->name }}</td>
                            <td class="product-price">{{ $value->price }}</td>
                            <td class="product-quantity"> 
                              <input class="quantity no-round-input" type="number" name="qty" min="1" value="{{ $value->qty }}">
                            </td>
                            <td class="product-total">{{ number_format($value->price * $value->qty) }}</td>
                            <td class="product-clear"> 
                              <form action="{{ url('usercart/delete') }}" method="POST">
                                @csrf
                                <input class="id" type="hidden" name = 'id' value="{{ $value->id }}">
                                <button type="submit" class="no-round-btn"><i class="icon_close"></i></button>
                              </form>
                            </td>
                          </tr>
                          
                        @endforeach
                    @else
                        @foreach($cart as $key => $value)
                          <tr>
                            <td><input type="radio"></td>
                            <td class="product-iamge"> 
                              <div class="img-wrapper"><img src="{{ asset('assets/images').'/'.$value->options->image }}" alt="product image"></div>
                            </td>
                            <td class="product-name">{{ $value->name }}</td>
                            <td class="product-price">{{ number_format($value->price) }}</td>
                            <td class="product-quantity"> 
                              <input class="quantity no-round-input" type="number" name="qty" min="1" value="{{ $value->qty }}">
                            </td>
                            <td class="product-total">{{ number_format($value->price * $value->qty) }}</td>
                            <td class="product-clear"> 
                              <form action="{{ url('cart/delete') }}" method="POST">
                                @csrf
                                <input class="rowId" type="hidden" name = 'rowId' value="{{ $value->rowId }}">
                                <button type="submit" class="no-round-btn"><i class="icon_close"></i></button>
                              </form>
                            </td>
                          </tr>
                          
                        @endforeach
                    @endif
                    </tbody>
                  </table>
              </div>
            </div>
            <div class="col-12 col-sm-8">
              <div class="coupon">
                <form>
                  <input id="coupon" class="no-round-input" type="text" placeholder="M?? gi???m gi??">
                  <button type="button" id="apply_coupon" class="no-round-btn smooth">Nh???p m?? gi???m gi??</button>
                </form>
              </div>
            </div>
            <div class="col-12 col-sm-4 text-right" style="float: right">
            @if(!Auth::check())
              <button id="update" class="no-round-btn black cart-update">C???p nh???t gi??? h??ng</button>
            @else
              <button id="update2" class="no-round-btn black cart-update">C???p nh???t gi??? h??ng</button>
            @endif
          </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-12 col-md-6 col-lg-4">
              <div class="cart-total_block">
                <table class="table">
                  <colgroup>
                    <col span="1" style="width: 50%">
                    <col span="1" style="width: 50%">
                  </colgroup>
                </table>
                <div class="checkout-method">
                  @if(Auth::check())
                    <button id="check" class="normal-btn"> Thanh to??n </button>
                  @else
                    <button id="payment" class="normal-btn" style="color:black"> Thanh to??n</button>
                  @endif      
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End shopping cart-->
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
@push('script')
<script>
  $(document).ready(function () {
    $('#check').click(function(){
        if ($('.product_id').is(':checked')) {
          var id = $('.product_id').val();
          location.href = "{{ url('cart/checkout') }}" + '/' + id;
        }else{
          swal("Th??ng b??o", "B???n c???n ch???n ????n h??ng ????? thanh to??n !" , "warning");
        }
    })
    $('#payment').click(function (){
        swal("Th??ng b??o", "B???n c???n ????ng nh???p ????? thanh to??n !" , "warning").then(function(){location.reload();});
    });

    $('#apply_coupon').click(function(){
      var coupon = $('#coupon').val();
      if(coupon.length == 0){
        swal("Th??ng b??o", "B???n c???n nh???p m?? gi???m gi?? !" , "warning");
      }else{
        $.ajax({
          type:"GET",
          url:"{{ url('cart/coupon') }}",
          data:{coupons: coupon}
        }).done(function(res){
          if(res == 'error'){
            swal("Th??ng b??o", "Kh??ng t???n t???i m?? gi???m gi?? ho???c m?? ???? h???t h???n !" , "warning");
          }
          else{
            $('#coupon').css('dissable', 'true');
            swal("Th??ng b??o", "??p d???ng m?? gi???m gi?? th??nh c??ng !" , "success").then(function(){location.reload();});
          }
        })
      }
    });

    $('#update').click(function(){
      var data = new Array();
      $('#myTable tbody tr').each(function(){
        var qty = $(this).find(".quantity").val(); 
        var rowId = $(this).find(".rowId").val(); 
        data.push([qty,rowId])
      });
      
      $.ajax({
        url: "{{ url('/cart/update') }}",
        type: 'GET',
        data: {data},
      }).done(function(res){
        swal("Th??nh C??ng!", "Update Th??nh c??ng!", "success");
        setTimeout(
          () => {
            location.reload();
          }, 2000
        )
      })
    });


    $('#update2').click(function(){
      var data = [];
      $('#myTable tbody tr').each(function(){
        var qty = $(this).find(".quantity").val(); 
        var id = $(this).find(".id").val(); 
        data.push([qty,id])
      });
      
      $.ajax({
        url: "{{ url('/usercart/update') }}",
        type: 'GET',
        data: {data},
      }).done(function(res){
        swal("Th??nh C??ng!", "Update Th??nh c??ng!", "success");
        setTimeout(
          () => {
            location.reload();
          }, 2000
        )  
      })
    })
  });
</script>
@endpush