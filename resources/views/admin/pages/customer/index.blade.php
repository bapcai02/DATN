@extends('admin.layouts.master')

@section('content')
<style>
  .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
   overflow-wrap: normal;
   max-width:100px;
}
</style>
<div class="modal fade" id="delete-customer-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style ='color:black'>Xóa Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body"> <p  style ='color:black'>Bạn có muốn xóa không ?</p> </div>
            <div class="modal-footer">
                <form action="{{ url('admins/customer/delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_customer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-customer-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                    Thêm mới Customer
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/customer/create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên Customer <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten customer" type="text" required maxlength="50"
                            name="name" id="name" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            PassWord <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap password" type="password" required maxlength="50"
                            name="password" id="password" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Status <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" name="status" style= 'border: 1px solid black;color:black'>
                                <option value ='1'>Hiển thị</option>
                                <option value ='0'>Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Email <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap email" type="email" required maxlength="50"
                        name="email" id="email" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Điện thoại <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập số điện thoại" type="text" name="phone" maxlength="11"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black" maxlength="100">
                            Địa chỉ <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập địa chỉ" type="text" name="address"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Đóng</button>
                        <button type="submit"
                            class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-customer-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                   Chỉnh sửa Category
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/customer/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên Customer <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten customer" type="text" required maxlength="50"
                            name="name" id="names" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Status <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" id="statuss" name="status" style= 'border: 1px solid black;color:black'>
                                <option value ='1'>Hiển thị</option>
                                <option value ='0'>Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                          Email <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap email" type="email" required maxlength="50"
                        name="email" id="emails" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Điện thoại <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập số điện thoại" id="phones" type="text" name="phone" maxlength="11"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black" maxlength="100">
                            Địa chỉ <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập địa chỉ " id="addresss" type="text" name="address"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Đóng</button>
                        <button type="submit"
                            class="btn btn-primary">Chỉnh sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
  <div class = "col-md-12 ">
    <form action="{{ url('admins/customer/search') }}" method="GET">
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
                  <input type="text" name="customer" class="form-control" placeholder="customer Name"
                  @if(isset($_GET['customer'])) value="{{ $_GET['customer'] }}"
                    @else id="customer" @endif>
              </div>
          </div>
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">Status</label>
                  <select class="form-control" id="" name="status">                     
                      <option value="">Chọn Status</option>
                      <option value="0">Ẩn</option>
                      <option value="1">Hiển thị</option>
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
  @if (session('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button>
        {{ session('message') }}
    </div>
  @endif
  @if (session('error'))
  <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
      </button>
      {{ session('error') }}
  </div>
  @endif
  <div class="container-fluid"> 
    <div class="row ">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <div class="table-responsive">
          <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
            <div class="row mb-3">
                <div class="col-12">
                    <a class="btn btn-success btn-sm js-btn-add"
                      id="add-worker"
                      href="javascript:void(0);"
                      data-toggle="modal"
                      data-target="#add-customer-modal"
                      type="button">
                    <span>
                        <i class="fa fa-plus mr-1"></i>
                        Thêm mới Customer
                    </span>
                    </a>
                </div>
            </div>

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
              @foreach($customer as $value)
                <tr class="data-row">
                    <td>{{ $total++ }}</td>
                    <td id="name"><p class = 'text'>{{ $value->name }}</p></td>
                    <td id="email"><p class = 'text'>{{ $value->email }}</p></td>
                    <td id="phone"><p class = 'text'>{{ $value->phone }}</p></td>
                    <td id="address"><p class = 'text'>{{ $value->address }}</p></td>
                    @if($value->status == 1)
                      <td id="status" >Hiển thị</td>
                    @else
                      <td id="status" >Không Hiển thị</td>
                    @endif
                    <td><p class = 'text'>{{ date($value->created_at) }}</p></td>
                    <td class="text-center">
                        <a id="delete-item"
                           class="btn btn-sm btn-danger btn-icon btn-inline-block mr-1 waves-effect waves-themed"
                           data-toggle="modal"
                           data-item-id="{{$value->id}}"
                           title="">
                            <i class="fa fa-times"></i>
                        </a>
                        <a id="edit-item"
                           class="btn btn-sm btn-primary btn-icon btn-inline-block mr-1"
                           title="Edit"
                           data-item-id="{{$value->id}}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              {{$customer->links()}}
            </div>
          </div>
        </div>
      </div>
    </div><!--End Row-->
  </div>
  <!-- End container-fluid-->
</div>

@push('script')
<script>
  $(document).ready(function() {

    $(document).on('click', '#delete-item', function () {
        $(this).addClass('delete-item-trigger-clicked');
        var name = $(this).data('name');
        var options = {
            'backdrop': 'static'
        };
        $('#delete-customer-modal').modal(options)
    })

    $('#delete-customer-modal').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");
        var id = el.data('item-id');
        $("#id_customer").val(id);
    })

    $('#delete-category-modal').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#id_category").trigger("reset");
    })

    $(document).on('click', '#edit-item', function () {
        $(this).addClass('edit-item-trigger-clicked');
        var name = $(this).data('name');
        var options = {
            'backdrop': 'static'
        };
        $('#edit-customer-modal').modal(options)
    })

    $('#edit-customer-modal').on('show.bs.modal', function () {
        var el = $(".edit-item-trigger-clicked");
        var id = el.data('item-id');
        var row = el.closest(".data-row");
        var name = row.children("#name").text();
        var email = row.children("#email").text();
        var phone = row.children("#phone").text();
        var address = row.children("#address").text();

        $("#id").val(id);
        $("#names").val(name);
        $("#status").val(status);
        $("#emails").val(email);
        $("#phones").val(phone);
        $("#addresss").val(address);
    })

    $('#edit-customer-modal').on('hide.bs.modal', function () {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#id_customer").trigger("reset");
    })
    
  })
</script>
@endpush
@endsection