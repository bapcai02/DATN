@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class = "col-md-12 ">
        <section class="content-header">
            <h1>
                Chi tiết đơn hàng
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container123  col-md-6"   style="">
                                <h4></h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Thông tin khách hàng</th>
                                        <th class="col-md-6"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Thông tin người đặt hàng</td>
                                            <td>{{ $customerInfo->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày đặt hàng</td>
                                            <td>{{ $billInfo->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>{{ $customerInfo->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>{{ $billInfo->address_ship }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Tổng tiền</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $billInfo->product_name }}</td>
                                        <td>{{ $billInfo->qty }}</td>
                                        <td>{{ number_format($billInfo->price) }} VNĐ</td>
                                        <td><b class="text-red">{{ number_format($billInfo->price) }} VNĐ</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-success btn-sm js-btn-add"
                href="{{ url('customer/order/export') }}"
                type="button">
            <span>
                <i class="fa fa-plus mr-1"></i>
                Xuất excel
            </span>
            </a>
        </div>
    </div>
</div>
@endsection