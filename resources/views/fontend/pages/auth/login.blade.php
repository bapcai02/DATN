@extends('fontend.layouts.master')

@section('content')

<div class="ogami-breadcrumb">
    <div class="container">
      <ul>
        <li> <a class="breadcrumb-link" href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
        <li> <a class="breadcrumb-link active" href="#">Login</a></li>
      </ul>
    </div>
  </div>
  <!-- End breadcrumb-->
  <div class="account">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 mx-auto">
          <h1 class="title">Login</h1>
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
                  <a href="{{ url('auth/confirm') }}">Reset Password</a>
              </div>
            </div>
            <div class="account-function">
              <button class="no-round-btn">Sign in</button>
            </div>
          </form>
          <div class="account-function">
          <button class="no-round-btn" style="width:100%"><a href="{{ url('/register') }}">Or create an account</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection