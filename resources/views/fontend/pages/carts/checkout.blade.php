@extends('fontend.layouts.master')
@section('content')

<!-- End header-->
<div class="ogami-breadcrumb">
        <div class="container">
          <ul>
            <li> <a class="breadcrumb-link" href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
            <li> <a class="breadcrumb-link active" href="#">Shoping cart</a></li>
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
                    <div class="step-block step-block--1">
                      <div class="step">
                        <h2>Giỏ Hàng</h2><span>01</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="step-block active">
                      <div class="step">
                        <h2>Thanh Toán</h2><span>02</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="step-block">
                      <div class="step">
                        <h2>Đơn Hàng</h2><span>03</span>
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
      <div class="shop-checkout">
        <div class="container">
          <form method="GET" action="{{ url('vnpay_php') }}">
            <div class="row">
              <div class="col-12 col-lg-8">
                <h2 class="form-title">THÔNG TIN NGƯỜI NHẬN</h2>
                <div class="form-row">
                  <div class="form-group">
                    <label for="inputFirstName">Tên người nhận *</label>
                    <input class="no-round-input-bg" name ='name' id="name" type="text" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputCompanyName">Số điện thoại</label>
                  <input class="no-round-input-bg" name='phone' id="phone" type="text" require>
                </div>
                <div class="form-group">
                  <label for="inputCountry">Tỉnh/Thành phố *</label>
                  <select class="no-round-input-bg" name = "thanhpho" id="Contry">
                    @foreach($tinhThanhPho as $key => $value)
                      <option value="{{ $value->matp }}">{{ $value->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputStreet">Quận/Huyện*</label>
                  <select class="no-round-input-bg" name = 'quanhuyen' id="quanhuyen">

                  </select>
                </div>
                <div class="form-group">
                  <label for="inputZip">Xã/Phường/Thị Trấn</label>
                  <select class="no-round-input-bg" name = 'xaphuong' id="xaphuong">

                  </select>
                </div>
                <div class="form-group">
                  <label for="inputNote">Nhập lại địa chỉ </label>
                  <textarea class="textarea-form-bg" id="confirm_address" name="address" cols="10" rows="2"></textarea>
                </div>
                <div class="form-group">
                  <label for="inputNote">Ghi chú </label>
                  <textarea class="textarea-form-bg" id="inputNote" name="note" cols="30" rows="7"></textarea>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <h2 class="form-title">Your order</h2>
                <div class="shopping-cart">
                  <div class="cart-total_block">
                    <table class="table">
                      <colgroup>
                        <col span="1" style="width: 50%">
                        <col span="1" style="width: 50%">
                        <col span="1" style="width: 50%">
                        <col span="1" style="width: 50%">
                      </colgroup>
                      <tbody>
                          <tr>
                            <th>Tên sản phẩm</th>
                            <input type="hidden" name="productId" id="product_id" value="{{ $cartUser->product_id }}" >
                            <input type="hidden" name="cartuserID" id="cart_id" value="{{ $cartUser->id }}" >
                            <td id="product_name">{{ $cartUser->name }}</td>
                          </tr>
                          <tr>
                            <th>Số lượng</th>
                            <td id="product_qty">{{ $cartUser->qty }}</td>
                          </tr>
                          <tr>
                            <th>Thanh toán</th>
                            <td id = "total">{{ $cartUser->price}}</td>
                          </tr>
                      </tbody>
                    </table>                   
                  </div>
                  <div class="form-group">
                    <input type="radio" name="paymethod" id="shipping" value="0">
                    <label for="shipping">Thanh toán khi nhận hàng</label>
                  </div>
                  <div class="form-group">
                    <input type="radio" name="paymethod" id="paypal" value="1">
                    <label for="paypal">Thanh Toán qua VNPAY</label>
                  </div>
                  <button type="button" id="checkout" class="normal-btn submit-btn">Thanh Toán</button>
                  <button type="submit" id="checkout2" class="normal-btn submit-btn" style="display:none" >Thanh Toán</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- End partner-->
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

      $('#shipping').click(function () {
          if ($(this).is(':checked')) {
            $('#checkout').click(function(){
              var cart_id = $('#cart_id').val();
              var product_id = $('#product_id').val();
              var product_name = $('#product_name').text();
              var product_qty = $('#product_qty').text();
              var name = $('#name').val();
              var phone = $('#phone').val();
              var thanhpho = $('#Contry').find('option:selected').text();
              var quanhuyen = $('#quanhuyen').find('option:selected').text();
              var xaphuong = $('#xaphuong').find('option:selected').text();
              var note = $('#note').val();
              var total = $('#total').text();
              var confirm_address = $('#confirm_address').val();
              var to_ward_code = $('#xaphuong').find('option:selected').val();

              if(name.trim() == '' || phone.trim() == '' || confirm_address.trim() == ''){
                swal("Thông báo", "Bạn cần nhập đầy đủ thông tin !" , "warning");
              }else{      
                var address = xaphuong + "," + quanhuyen + "," + thanhpho;
                var datas =  {
                  "cod_amount" : parseInt(total),
                  "payment_type_id": 2,
                  "note": note ? note : "CHOXEMHANGKHONGTHU",
                  "required_note": "CHOXEMHANGKHONGTHU",
                  "to_name": name,
                  "to_phone": phone,
                  "to_address": address,
                  "weight": 200,
                  "length": 1,
                  "width": 19,
                  "height": 10,
                  "deliver_station_id": 2,
                  "service_id": 0,
                  "service_type_id":2,
                  "order_value":130000,
                  "to_ward_code": to_ward_code,
                  "items": [{ 
                    "name": product_name, 
                    "quantity": parseInt(product_qty), 
                    "price":  parseInt(total)
                  }]
                };
                console.log(datas)
                $.ajax({
                  url: "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create",
                  type: 'POST', 
                  headers: {
                    "Token" : "bf76117c-97a5-11eb-8be2-c21e19fc6803",
                    "ShopId" : "78746",
                    "Content-Type" : "application/json",
                  } ,
                  data:  JSON.stringify(datas),
                }).done(function(res){
                  if(res.code == 200){
                    $.ajax({
                      type: "POST",
                      url: "{{ url('usercart/order') }}",
                      data: {
                        '_token': "{{ csrf_token() }}",
                        'total' : parseInt(total),
                        'order_code' : res.data.order_code,
                        'product_id' : product_id,
                        'cart_id' : cart_id,
                        'address': address,
                      }
                    }).done(function(response) {
                      swal("System Notification", response ? response : 'đặt hàng thành công' , "success");
                      setTimeout(function(){
                        location.href = "{{ url('cart/') }}";
                      }, 3000);
                    })
                  }else if(res.code == 400){
                    console.log(res)
                    swal("System Notification", "Thông tin không đúng" , "error");
                  }
                }).fail(function(res) {
                    console.log(res)
                    swal("System Notification", "Thông tin không đúng" , "error");
                });
              }
            });
          }
      });

      $('#paypal').click(function () {
          if ($(this).is(':checked')) {
            $('#checkout').css('display', 'none');
            $('#checkout2').css('display', 'block');

            $('#checkout2').click(function(){
              var name = $('#name').val();
              var phone = $('#phone').val();
              var confirm_address = $('#confirm_address').val();
              if(name.trim() == '' || phone.trim() == '' || confirm_address.trim() == ''){
                swal("Thông báo", "Bạn cần nhập đầy đủ thông tin !" , "warning");
              }
            });
          }
      });
      

      var matp = $('#Contry').find('option:selected').val();
      $.ajax({
          url: "{{ url('/cart/quanhuyen') }}",
          type: 'GET',
          data: {
            matp
          },
      }).done(function(res){
        for(var i = 0; i < res.length - 1; i++){
          $('#quanhuyen').append($('<option>', {
              value: res[i]['maqh'],
              text: res[i]['name']
          }));
        }

        var maqh = $('#quanhuyen').find('option:selected').val();
        $.ajax({
            url: "{{ url('/cart/xaphuong') }}",
            type: 'GET',
            data: {
              maqh
            },
        }).done(function(res){
          for(var i = 0; i < res.length - 1; i++){
            $('#xaphuong').append($('<option>', {
                value: res[i]['maxptr'],
                text: res[i]['name']
            }));
          }
        });
      });

      $('#Contry').change(function(){
        var matp = $('#Contry').find('option:selected').val();
        $.ajax({
          url: "{{ url('/cart/quanhuyen') }}",
          type: 'GET',
          data: {
            matp
          },
        }).done(function(res){
            $('#quanhuyen').find('option').remove();
            for(var i = 0; i < res.length - 1; i++){
            $('#quanhuyen').append($('<option>', {
                value: res[i]['maqh'],
                text: res[i]['name']
            }));
          }

          var maqh = $('#quanhuyen').find('option:selected').val();
          $.ajax({
              url: "{{ url('/cart/xaphuong') }}",
              type: 'GET',
              data: {
                maqh
              },
          }).done(function(res){
            $('#xaphuong').find('option').remove();
            for(var i = 0; i < res.length - 1; i++){
              $('#xaphuong').append($('<option>', {
                  value: res[i]['maxptr'],
                  text: res[i]['name']
              }));
            }
          });
        })
      })
    });
  </script>
@endpush