@extends('fontend.layouts.master')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>

input.hidden {
    position: absolute;
    left: -9999px;
}

#profile-image1 {
    cursor: pointer;
    width: 100px;
    height: 100px;
	border:2px solid #03b1ce ;}
	.tital{ font-size:16px; font-weight:500;}
	.bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0
}	
.form{
    margin-bottom:100px;
    margin-top:100px;
}
</style>

@if(session('message'))
  <input id='message' type = 'hidden' value="{{ session('message') }}" />
@endif

<div class="ogami-breadcrumb">
    <div class="ogami-container-fluid">
      <ul>
        <li> <a class="breadcrumb-link" href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
        <li> <a class="breadcrumb-link" href="#">User</a></li>
        <li> <a class="breadcrumb-link active" href="#">Profile</a></li>
      </ul>
    </div>
</div>

<div class="container">
	<div class="row">
        <div class="col-md-7 ">
            <div class="panel panel-default">
                <div class="panel-heading">  <h4 >User Profile</h4></div>
                    <div class="panel-body">
                        <div class="box box-info">  
                            <div class="box-body">
                                <form action="{{ url('user/update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-6">
                                        @if($employee->image == null)
                                            <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                                                <input id="profile-image-upload" class="hidden" type="file" name="image" accept="image/*" onchange="loadFile(event)">
                                                <div style="color:#999;" >click here to change profile image</div>
                                            </div><br>
                                        @else
                                            <div  align="center"> <img alt="User Pic" src="{{  asset('assets/images').'/'.$employee->image }}" id="profile-image1" class="img-circle img-responsive"> 
                                                <input id="profile-image-upload" class="hidden" type="file" name="image" accept="image/*" onchange="loadFile(event)" >
                                                <div style="color:#999;" >click here to change profile image</div>
                                            </div><br>
                                        @endif
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr style="margin:5px 0 5px 0;">

                                    <div class="col-sm-5 col-xs-6 tital" >Tên:</div><div class="col-sm-7 col-xs-6 "><input type="text" class="form-control" name="name" value="{{ $employee->name }}"></div>
                                        <div class="clearfix"></div>
                                    <div class="bot-border"></div>
                                    <div class="col-sm-5 col-xs-6 tital " >Ngày sinh:</div><div class="col-sm-7"><input type="date" class="form-control" name="date" value="{{ $employee->date }}"></div>
                                        <div class="clearfix"></div>
                                    <div class="bot-border"></div>
                                    <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"> <input disabled type="email" class="form-control" name="email" value="{{ $employee->email }}"></div>
                                        <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Số điện thoại:</div><div class="col-sm-7"> <input type="phone" class="form-control" name="phone" value="{{ $employee->phone }}"></div>
                                        <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Địa chỉ:</div><div class="col-sm-7"><input type="text" name="address" class="form-control" value="{{ $employee->address }}"></div>
                                        <div class="clearfix"></div>
                                    <div class="bot-border"></div>
                                    <button type="submit" class="btn btn-info">Cập Nhật</button>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="container-fluid"> 
      <div class="row ">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Đơn hàng</h5>
                <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Số Lượng</th>
                        <th>Thanh Toán</th>
                        <th>Tình Trạng đơn hàng</th>
                        <th>Ngày Đặt</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (!isset($page) || $page == 1) $total = 1 ?>
                    <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
                    @foreach($orderDetail as $value)
                        <tr>
                            <td>{{$total++}}</td>
                            <td>{{ $value->product_name }}</td>
                            <td><img width = '130px' height = '130px' src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></td>
                            <td>{{ $value->qty }}</td>
                            <td>{{ number_format($value->price) }} VND</td>
                            @if($value->status == 1) 
                                <td><button type="button" class="btn btn-primary">Đơn Hàng được xác nhận</button></td>
                            @elseif($value->status == 2)
                                <td><button type="button" class="btn btn-warning">Đơn Hàng đang vận chuyển</button></td>
                            @elseif($value->status == 3)
                                <td><button type="button" class="btn btn-success">Đơn Hàng đã thanh toán</button></td>
                            @elseif($value->status == 4)
                                <td><button type="button" class="btn btn-danger">Đơn Hàng được thất bại</button></td>
                            @endif
                            
                            <td>{{ $value->created_at }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            {{ $orderDetail->links() }}
            </div>
          </div>
        </div>
      </div><!--End Row-->
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

@push('script')

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('profile-image1');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    $(document).ready(function () {
        var val = $('#message').val();
        if((val) && val.length > 0) {
            swal("Thành Công!", "Thao Tác Thành công!", "success");
        }
    });
        $(function() {
            $('#profile-image1').on('click', function() {
                $('#profile-image-upload').click();
            });
        });   

    </script> 
@endpush

@endsection