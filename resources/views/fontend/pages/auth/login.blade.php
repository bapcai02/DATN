@extends('fontend.layouts.master')

@section('content')

<style>


#social a.btn {
    color: #fff;
    width: 100%;
    height: 50px;
    padding: 6px 25px;
    line-height: 36px;
    margin-bottom: 20px;
    text-align: left;
    border-radius: 5px;
    background: #4385f5;
    font-size: 16px;
    border: 1px solid #4385f5
}

#social a i {
    float: right;
    margin: 0;
    line-height: 35px
}

#social a.google-plus {
    background: #db4c3e;
    border: 1px solid #db4c3e
}

#social h2 {
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 20px;
    color: #111;
    line-height: 20px;
    text-transform: uppercase;
    text-align: center;
    position: relative
}

#social .formsix-pos,
.formsix-e {
    position: relative
}

.form-group {
    margin-bottom: 15px
}

#social .form-control {
    height: 53px;
    padding: 15px 20px;
    font-size: 14px;
    line-height: 24px;
    border: 1px solid #fafafa;
    border-radius: 3px;
    box-shadow: none;
    font-family: 'Roboto';
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    background-color: #fafafa
}

#social .form-control:focus {
    color: #999;
    background-color: fafafa;
    border: 1px solid #4285f4 !important
}

p {
    color: #999999;
    font-size: 14px;
    line-height: 24px
}

#social a.login_btn:hover {
    background-color: #2c6ad4;
    border-color: #2c6ad4
}

#social a.btn:hover {
    background-color: #2c6ad4;
    border-color: #2c6ad4
}

#social a.google-plus:hover {
    background: #bd4033;
    border-color: #bd4033
}

</style>
<div class="ogami-breadcrumb">
    <div class="container">
      <ul>
        <li> <a class="breadcrumb-link" href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
        <li> <a class="breadcrumb-link active" href="#">Đăng  Nhập</a></li>
      </ul>
    </div>
  </div>
  <!-- End breadcrumb-->
  <div class="account">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 mx-auto">
          <h1 class="title">Đăng Nhập</h1>
          <form method="POST" action="{{ url("/login") }}">
            @csrf
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <li>{{$error}}</li>
                </div>
            @endforeach
            @if(!empty(session('errorlogin')))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('errorlogin')}}
                </div>
            @endif
            @if(!empty(session('success')))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('success')}}
                </div>
            @endif
            <label for="user-name"> email *</label>
                <input class="no-round-input" name="email" id="user-name" type="email" value="{{ old('email') }}">
            <label for="password">Password *</label>
                <input class="no-round-input" name="password" id="password" type="password" value="{{ old('password') }}">
            <div class="form-row">
              <div class="form-group col-6 text-right">
                  <a href="{{ url('auth/confirm') }}">Quên Mật Khẩu</a>
              </div>
            </div>
            <div class="account-function">
              <button class="no-round-btn">Đăng Nhập</button>
            </div>
            <div class="row" id = 'social'>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6"> <a href="#" class="btn btn-primary facebook"> <span>Đăng nhập bằng Facebook</span> <i class="far far-facebook"></i> </a> </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6"> <a href="#" class="btn btn-primary google-plus"> Đăng nhập bằng Google <i class="far far-google-plus"></i> </a> </div>
            </div>
          </form>
          <div class="account-function">
          <button class="no-round-btn" style="width:100%"><a href="{{ url('/register') }}">Đăng Ký</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection