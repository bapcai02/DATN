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
          <form action="" method="post">
            <div class="row">
              <div class="col-12 col-lg-8">
                <h2 class="form-title">THÔNG TIN NGƯỜI NHẬN</h2>
                <div class="form-row">
                  <div class="form-group">
                    <label for="inputFirstName">Tên người nhận *</label>
                    <input class="no-round-input-bg" id="inputFirstName" type="text" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputCompanyName">Số điện thoại</label>
                  <input class="no-round-input-bg" id="inputCompanyName" type="text">
                </div>
                <div class="form-group">
                  <label for="inputCountry">Tỉnh/Thành phố *</label>
                  <select class="no-round-input-bg" id="inputContry">
                    @foreach($tinhThanhPho as $key => $value)
                      <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputStreet">Quận/Huyện*</label>
                  <input class="no-round-input-bg" id="inputStreet" type="text" required>
                </div>
                <div class="form-group">
                  <label for="inputZip">Xã/Phường/Thị Trấn</label>
                  <input class="no-round-input-bg" id="inputZip" type="text">
                </div>
                <div class="form-group">
                  <label for="inputNote">Ghi chú </label>
                  <textarea class="textarea-form-bg" id="inputNote" name="" cols="30" rows="7"></textarea>
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
                        <tr>
                          <th class="name">Australian Kiwi × <span>1</span></th>
                          <td class="price black" style="border-top: 0">$169.00</td>
                        </tr>
                        <tr>
                          <th>SUBTOTAL</th>
                          <td class="price">$169.00</td>
                        </tr>
                        <tr>
                          <th>SHIPPING</th>
                          <td>
                            <p>Free shipping</p>
                            <p>Calculate shipping</p>
                          </td>
                        </tr>
                        <tr>
                          <th>TOTAL</th>
                          <td class="total">$169.00</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group">
                    <input type="radio" name="paymethod" id="shipping" value="option1" checked>
                    <label for="shipping">Cash on delivery</label>
                  </div>
                  <div class="form-group">
                    <input type="radio" name="paymethod" id="paypal" value="option2">
                    <label for="paypal">Paypal</label>
                  </div>
                  <button class="normal-btn submit-btn">Place order</button>
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