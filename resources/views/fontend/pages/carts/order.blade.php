@extends('fontend.layouts.master')
@section('content')

<div class="ogami-breadcrumb">
        <div class="container">
          <ul>
            <li> <a class="breadcrumb-link" href="index.html"> <i class="fas fa-home"></i>Home</a></li>
            <li> <a class="breadcrumb-link" href="index.html">Shop</a></li>
            <li> <a class="breadcrumb-link active" href="index.html">Order Complete</a></li>
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
                    <div class="step-block">
                      <div class="step">
                        <h2>Check Out</h2><span>02</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="step-block active">
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
      <div class="order-complete">
        <div class="container">
          <div class="row">
            <div class="col-12 justify-content-center align-items-center text-center">
              <h1>Congratulation! You’ve <span>completed </span>payment</h1>
            </div>
            <div class="col-12">
              <div class="benefit-block">
                <div class="our-benefits shadowless benefit-border">
                  <div class="row no-gutters">
                    <div class="col-12 col-md-6 col-lg-3">
                      <div class="benefit-detail d-flex flex-column align-items-center"><img class="benefit-img" src="assets/images/homepage01/benefit-icon1.png" alt="">
                        <h5 class="benefit-title">Free Shipping</h5>
                        <p class="benefit-describle">For all order over 99$</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                      <div class="benefit-detail d-flex flex-column align-items-center"><img class="benefit-img" src="assets/images/homepage01/benefit-icon2.png" alt="">
                        <h5 class="benefit-title">Delivery On Time</h5>
                        <p class="benefit-describle">If good have prolems</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                      <div class="benefit-detail d-flex flex-column align-items-center"><img class="benefit-img" src="assets/images/homepage01/benefit-icon3.png" alt="">
                        <h5 class="benefit-title">Secure Payment</h5>
                        <p class="benefit-describle">100% secure payment</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                      <div class="benefit-detail boderless boderless d-flex flex-column align-items-center"><img class="benefit-img" src="assets/images/homepage01/benefit-icon4.png" alt="">
                        <h5 class="benefit-title">24/7 Support</h5>
                        <p class="benefit-describle">Dedicated support </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End order complete-->
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