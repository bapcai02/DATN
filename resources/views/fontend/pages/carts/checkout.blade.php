@extends('fontend.layouts.master')
@section('content')

<!-- End header-->
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
                    <div class="step-block step-block--1">
                      <div class="step">
                        <h2>Shopping Cart</h2><span>01</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="step-block active">
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
      <div class="shop-checkout">
        <div class="container">
          <form>
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
                      <option value="{{ $value->id }}">{{ $value->name }}</option>
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
                      </colgroup>
                      <tbody>
                        @if(!Auth::check())
                          <tr>
                            <th>SUBTOTAL</th>
                            <td>{{ Cart::total() }} VND</td>
                          </tr>
                          <tr>
                            <th>SHIPPING</th>
                            <td>
                              <p>Free shipping</p>
                            </td>
                          </tr>
                          <tr>
                            <th>TOTAL</th>
                            <td>{{ Cart::total() }} VND</td>
                          </tr>
                        @else
                          <tr>
                            <th>SUBTOTAL</th>
                            <td>{{ number_format(App\Repositories\UserCartRepository::CountPrice(Auth::user()->id)->totalPrice) }}</td>
                          </tr>
                          <tr>
                            <th>SHIPPING</th>
                            <td>
                              <p>Free shipping</p>
                            </td>
                          </tr>
                          <tr>
                            <th>TOTAL</th>
                            <td id = "total">{{ number_format(App\Repositories\UserCartRepository::CountPrice(Auth::user()->id)->totalPrice) }}</td>
                          </tr>
                        @endif
                      </tbody>
                    </table>                   
                  </div>
                  <div class="form-group">
                    <input type="radio" name="paymethod" id="shipping" value="0" checked>
                    <label for="shipping">Thanh toán khi nhận hàng</label>
                  </div>
                  <div class="form-group">
                    <input type="radio" name="paymethod" id="paypal" value="1">
                    <label for="paypal">Paypal</label>
                  </div>
                  <button type="button" id="checkout" class="normal-btn submit-btn">Thanh Toán</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="partner">
        <div class="container">
          <div class="partner_block d-flex justify-content-between" data-slick="{&quot;slidesToShow&quot;: 6}">
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href=""><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
          </div>
        </div>
      </div>
      <!-- End partner-->
@endsection

@push('script')
  <script>
    $(document).ready(function () {
      $('#checkout').click(function(){
        var name = $('#name').val();
        var phone = $('#phone').val();
        var thanhpho = $('#Contry').find('option:selected').text();
        var quanhuyen = $('#quanhuyen').find('option:selected').text();
        var xaphuong = $('#xaphuong').find('option:selected').text();
        var note = $('#note').val();
        var total = $('#total').text();
        var confirm_address = $('#confirm_address').val();

        if(name.trim() == '' || phone.trim() == '' || confirm_address.trim() == ''){
          swal("Thông báo", "Bạn cần nhập đầy đủ thông tin !" , "warning");
        }else{
        
          var address = xaphuong + "," + quanhuyen + "," + thanhpho;
          console.log(total);
          $.ajax({
            url: "{{ url('/usercart/checkout') }}",
            type: 'GET',      
            dataType: 'json',
          }).done(function (data) {
              $.ajax({
                url: "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create",
                type: 'POST', 
                headers: {
                  "Token" : "bf76117c-97a5-11eb-8be2-c21e19fc6803",
                  "ShopId" : "78746",
                  "Content-Type" : "application/json"
                } ,
                data: {
                  "cod_amount" : total,
                  "payment_type_id": 2,
                  "note": note,
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
                  "to_ward_code": "20308",
                  "items": [
                    data  
                  ]
                }    
              }).done(function(res){
                console.log(res);
              }).fail(function(error) {
                  console.log(error);
                  swal("System Notification", textStatus + ': ' + textStatus.message , "error").then(function(){location.reload();});
              });
          }).fail(function(jqXHR, textStatus, errorThrown) {
              swal("System Notification", textStatus + ': ' + errorThrown , "error").then(function(){location.reload();});
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
              value: res[i]['id'],
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
                value: res[i]['id'],
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
                value: res[i]['id'],
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
                  value: res[i]['id'],
                  text: res[i]['name']
              }));
            }
          });
        })
      })
    });
  </script>
@endpush