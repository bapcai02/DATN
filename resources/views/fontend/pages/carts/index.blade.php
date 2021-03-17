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
                <table class="table table-responsive"> 
                  <colgroup>
                    <col span="1" style="width: 15%">
                    <col span="1" style="width: 30%">
                    <col span="1" style="width: 15%">
                    <col span="1" style="width: 15%">
                    <col span="1" style="width: 15%">
                    <col span="1" style="width: 10%">
                  </colgroup>
                  <thead>
                    <tr>
                      <th class="product-iamge" scope="col">Ảnh</th>
                      <th class="product-name" scope="col">Tên Sản Phẩm</th>
                      <th class="product-price" scope="col">Giá</th>
                      <th class="product-quantity" scope="col">số lượng</th>
                      <th class="product-total" scope="col">Tổng Tiền</th>
                      <th class="product-clear" scope="col"> 
                        <button class="no-round-btn"><i class="icon_close"></i></button>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cart as $key => $value)
                      <tr>
                        <td class="product-iamge"> 
                          <div class="img-wrapper"><img src="{{ asset('assets/images').'/'.$value->options->image }}" alt="product image"></div>
                        </td>
                        <td class="product-name">{{ $value->name }}</td>
                        <td class="product-price">{{ $value->price }}</td>
                        <td class="product-quantity"> 
                          <input class="quantity no-round-input" type="number" min="1" value="{{ $value->qty }}">
                        </td>
                        <td class="product-total">{{ number_format($value->price * $value->qty) }}</td>
                        <td class="product-clear"> 
                          <button class="no-round-btn"><i class="icon_close"></i></button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-12 col-sm-8">
              <div class="coupon">
                <form action="" method="post">
                  <input class="no-round-input" type="text" placeholder="Coupon code">
                  <button class="no-round-btn smooth">Apply coupon</button>
                </form>
              </div>
            </div>
            <div class="col-12 col-sm-4 text-right">
              <button class="no-round-btn black cart-update">Upadate cart</button>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-12 col-md-6 col-lg-4">
              <div class="cart-total_block">
                <h2>Cart total</h2>
                <table class="table">
                  <colgroup>
                    <col span="1" style="width: 50%">
                    <col span="1" style="width: 50%">
                  </colgroup>
                  <tbody>
                    <tr>
                      <th>SUBTOTAL</th>
                      <td>$169.00</td>
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
                      <td>$169.00</td>
                    </tr>
                  </tbody>
                </table>
                <div class="checkout-method">
                  <button class="normal-btn">Proceed to Checkout</button><span>- or -</span><a href="shop_checkout.html">Check out with PayPal</a>
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
@endsection