@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid"> 
      <div class="row ">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh Sách Đơn Hàng</h5>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tên Sản Phẩm</th>
                      <th scope="col">Hình Ảnh</th>
                      <th scope="col">Số Lượng</th>
                      <th scope="col">Thanh Toán</th>
                      <th scope="col">Phương Thức Thanh Toán</th>
                      <th scope="col">Mã Giảm Giá</th>
                      <th scope="col">Phí Ship</th>
                      <th scope="col">Địa Chỉ Người Nhận</th>
                      <th scope="col">Ngày Đặt Hàng</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
    </div>
    <!-- End container-fluid-->
    
    </div>

@endsection