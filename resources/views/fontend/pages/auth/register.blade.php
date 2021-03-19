@extends('fontend.layouts.master')

@section('content')

<div class="ogami-breadcrumb">
    <div class="container">
      <ul>
        <li> <a class="breadcrumb-link" href="index.html"> <i class="fas fa-home"></i>Home</a></li>
        <li> <a class="breadcrumb-link active" href="#">Register</a></li>
      </ul>
    </div>
  </div>
  <!-- End breadcrumb-->
  <div class="account">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 mx-auto">
          <h1 class="title">Register</h1>
          <form method="POST" action="{{ url("/register") }}">
            @csrf
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <li>{{$error}}</li>
                </div>
            @endforeach
            @if(!empty(session('error')))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('error')}}
                </div>
            @endif
            <label for="user-name">Email *</label>
            <input class="no-round-input" name="email" id="user-name" type="email" value="{{ old('email') }}" required>
            <label for="password">Password *</label>
            <input class="no-round-input" name="password" id="" type="password"  value="{{ old('password') }}" required>
            <div class="account-function">
              <button type="submit" class="no-round-btn">Register</button>
            </div>
          </form>
          <button class="no-round-btn" style="width:100%"><a class="create-account" href="{{ url('login') }}">Or login</a></button>
        </div>
      </div>
    </div>
  </div>

@endsection