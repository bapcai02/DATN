@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
  <div class = "col-md-12 ">
    <form action="{{ url('admins/order/search') }}" method="GET">
      <div class="row">
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                <label class="form-label" for="example-date">Từ</label>
                <input class="form-control" type="date" name="start-date"
                @if(isset($_GET['start-date'])) value="{{ $_GET['start-date'] }}"
                @else id="start-date" @endif>
              </div>
          </div>

          <div class="col-md-4 col-xs-12 mb-2">
            <div class="form-group">
              <label class="form-label" for="example-date">Đến</label>
              <input class="form-control" type="date" name="end-date" 
              @if(isset($_GET['end-date'])) value="{{ $_GET['end-date'] }}"
              @else id="end-date" @endif>
            </div>
        </div>
        
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">Tên</label>
                  <input type="text" name="code" class="form-control" placeholder="Mã đơn hàng"
                  @if(isset($_GET['code'])) value="{{ $_GET['code'] }}"
                    @else id="code" @endif>
              </div>
          </div>
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">Status</label>
                  <select class="form-control" id="" name="status">                     
                      <option value="">Chọn Status</option>
                      <option value="2">Thanh toán khi nhận hàng</option>
                      <option value="1">Thanh toán qua thẻ ngân hàng</option>
                  </select>
              </div>
          </div>

          <div class="col-md-4 col-xs-12 mb-2">
              <div class="d-flex flex-column align-items-start justify-content-end h-100">
                  <button class="btn btn-primary waves-effect waves-themed" type="submit">
                      <i class="fa fa-search"></i>
                      Tìm Kiếm
                  </button>
              </div>
          </div>
      </div>
    </form>
  </div>
    <div class="container-fluid"> 
      <div class="row ">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Quản Lý đơn hàng</h5>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Order Code</th>
                      <th scope="col">Hình thức thanh toán</th>
                      <th scope="col">Cửa hàng</th>
                      <th scope="col">Người đặt hàng</th>
                      <th scope="col">Email đặt hàng</th>
                      <th scope="col">Tên sản phẩm</th>
                      <th scope="col">Số lượng</th>
                      <th scope="col">Giá</th>
                      <th scope="col">Địa chỉ ship</th>
                      <th scope="col">Tình trạng đơn hàng</th>
                      <th scope="col">Ngày đặt hàng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!isset($page) || $page == 1) $total = 1 ?>
                    <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
                    @foreach($order as $value)
                      <tr>
                        <td>{{ $total++ }}</td>
                        <td>{{ $value->Order_Code }}</td>
                        @if($value->payment == 1)
                          <td>Thanh toán qua thẻ</td>
                        @else
                          <td>Thanh toán khi nhận hàng</td>
                        @endif
                        <td>{{ App\Repositories\CustomerRepository::getNameCustomer($value->customer_id)->name }}</td>
                        <td>{{ App\Repositories\EmployeeRepository::getById($value->user_id)->name ?? null}}</td>
                        <td>{{ App\Repositories\UserRepository::getUserById($value->user_id)->email }}</td>
                        <td>{{ App\Repositories\ProductRepository::getName($value->product_id)->product_name }}</td>
                        <td>{{ $value->qty }}</td>
                        <td>{{ number_format($value->price) }}VND</td>
                        <td>{{ $value->address_ship }}</td>
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
            {{ $order->links() }}
            </div>
          </div>
        </div>
      </div><!--End Row-->
    </div>
    <!-- End container-fluid-->
    
    </div>

@endsection