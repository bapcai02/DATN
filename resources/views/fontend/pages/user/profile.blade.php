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
</style>


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
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="col-sm-6">
                                        @if($employee->image == null)
                                            <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                                                <input id="profile-image-upload" class="hidden" type="file" name="image" >
                                                <div style="color:#999;" >click here to change profile image</div>
                                            </div><br>
                                        @else
                                            <div  align="center"> <img alt="User Pic" src="{{  asset('assets/images').'/'.$employee->image }}" id="profile-image1" class="img-circle img-responsive"> 
                                                <input id="profile-image-upload" class="hidden" type="file" name="image" >
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
                                    <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"> <input type="email" class="form-control" name="email" value="{{ $employee->email }}"></div>
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

<div class="table-responsive">
    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
      <thead class="bg-primary-600">
      <tr>
          <th>#</th>
          <th>Tên</th>
          <th>Email</th>
          <th>Điện thoại</th>
          <th>Địa Chỉ</th>
          <th>Status</th>
          <th>ngảy tạo</th>
          <th></th>
      </tr>
      </thead>

      <tbody>
      <?php if (!isset($page) || $page == 1) $total = 1 ?>
      <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
       
          </tbody>
        </table>
        {{$orderDetail->links()}}
      </div>
    </div>
  </div>
</div>

@push('script')

    <script>
        $(function() {
            $('#profile-image1').on('click', function() {
                $('#profile-image-upload').click();
            });
        });   

    </script> 
@endpush

@endsection