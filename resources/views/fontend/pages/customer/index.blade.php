@extends('fontend.layouts.master')
@section('content')
<style>
    .infor_shop{
        background: #fff;
        padding: 1.25rem 0;
        box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
        margin-bottom: 1px;
    }
    .image{
        margin-left: 7%;
        opacity: 0.6;
    }
    .text {
        color: #fff;
        position: absolute;
        top: 10px;
        left: 70px;
    }

</style>
<div class="ogami-breadcrumb">
    <div class="container">
      <ul>
        <li> <a class="breadcrumb-link" href="index.html"> <i class="fas fa-home"></i>Home</a></li>
        <li> <a class="breadcrumb-link active" href="index.html">Customer</a></li>
      </ul>
    </div>
</div>
<div class="infor_shop">
    <div class="image_shop">
        <div class="image">
            <img width="400px" height="200px" src="https://cf.shopee.vn/file/5b514e07dd5509fdd1e50cfb210cf6f6_tn" alt="">
            <h1 class="text">Đây là đoạn văn bản chèn chữ lên ảnh</h1>
        </div>
        <div class="text">

        </div>
    </div>
    <div class="info">

    </div>
</div>


@endsection