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
<div class="modal fade" id="delete-counpon-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style ='color:black'>Xóa Mã Giảm Giá</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body"> <p  style ='color:black'>Bạn có muốn xóa không ?</p> </div>
            <div class="modal-footer">
                <form action="{{ url('admins/coupon/delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_coupon">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-counpon-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                    Thêm mới Giảm Giá
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/coupon/create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten" type="text" required maxlength="50"
                            name="name" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Status <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" name="status" style= 'border: 1px solid black;color:black'>
                                <option value ='1'>Còn Hạn</option>
                                <option value ='0'>Hết Hạn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Mã <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập Mã" type="text" name="code" maxlength="20"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Số lượng <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập Số lượng" type="number" name="qty" maxlength="20"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Giảm giá <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập discoud" type="number" name="discoud" maxlength="20"
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

<div class="modal fade" id="edit-counpon-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form action="{{ url('admins/coupon/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten" type="text" required maxlength="50"
                            name="name" id ="names" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Status <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" id="statuss" name="status" style= 'border: 1px solid black;color:black'>
                                <option value ='1'>Còn Hạn</option>
                                <option value ='0'>Hết Hạn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Mã <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập Mã" id="codes" type="text" name="code" maxlength="20"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Số lượng <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập Số lượng" id="qtys" type="number" name="qty" maxlength="20"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Giảm giá <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập discoud" id ="discounts" type="number" name="discoud" maxlength="20"
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
    <form action="{{ url('admins/coupon/search') }}" method="GET">
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
                  <label class="form-label" for="simpleinput">Mã</label>
                  <input type="text" name="code" class="form-control" placeholder="Nhap Ma"
                  @if(isset($_GET['code'])) value="{{ $_GET['code'] }}"
                    @else id="code" @endif>
              </div>
          </div>

          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">Status</label>
                  <select class="form-control" name="status">                     
                      <option value="">Chọn Status</option>
                      <option value="1">Còn Hạn</option>
                      <option value="2">Hết Hạn</option>
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
  @if (session('message-coupon'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button>
        {{ session('message-coupon') }}
    </div>
  @endif
  @if (session('error-coupon'))
  <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
      </button>
      {{ session('error-coupon') }}
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
                      data-target="#add-counpon-modal"
                      type="button">
                    <span>
                        <i class="fa fa-plus mr-1"></i>
                        Thêm mới Mã Giảm Giá
                    </span>
                    </a>
                </div>
            </div>

            <thead class="bg-primary-600">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Mã</th>
                <th>Số Lượng</th>
                <th>Giảm Giá (%)</th>
                <th>Tình Trạng</th>
                <th>ngày tạo</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <?php if (!isset($page) || $page == 1) $total = 1 ?>
            <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
              @foreach($coupons as $value)
                <tr class="data-row">
                    <td>{{ $total++ }}</td>
                    <td id="name"><p class = 'text'>{{ $value->name }}</p></td>
                    <td id="code"><p class = 'text'>{{ $value->code }}</p></td>
                    <td id="qty"><p class = 'text'>{{ $value->qty }}</p></td>
                    <td id="discount"><p class = 'text'>{{ $value->discount_number }}</p></td>
                    @if($value->feature == 1)
                      <td id="status" >Còn Hạn</td>
                    @else
                      <td id="status" >Hết Hạn</td>
                    @endif
                    <td>{{ date('Y-m-d', strtotime($value->created_at)) }}</td>
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
              {{ $coupons->links() }}
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
        $('#delete-counpon-modal').modal(options)
    })

    $('#delete-counpon-modal').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");
        var id = el.data('item-id');
        $("#id_coupon").val(id);
    })

    $('#delete-counpon-modal').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#id_coupon").trigger("reset");
    })

    $(document).on('click', '#edit-item', function () {
        $(this).addClass('edit-item-trigger-clicked');
        var name = $(this).data('name');
        var options = {
            'backdrop': 'static'
        };
        $('#edit-counpon-modal').modal(options)
    })

    $('#edit-counpon-modal').on('show.bs.modal', function () {
        var el = $(".edit-item-trigger-clicked");
        var id = el.data('item-id');
        var row = el.closest(".data-row");
        var name = row.children("#name").text();
        var code = row.children("#code").text();
        var qty = row.children("#qty").text();
        var discount = row.children("#discount").text();
        var status = row.children("#status").text();

        $("#id").val(id);
        $("#names").val(name);
        $("#codes").val(code);
        $("#qtys").val(qty);
        $("#discounts").val(discount);
 
    })

    $('#edit-counpon-modal').on('hide.bs.modal', function () {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#id_coupon").trigger("reset");
    })
    
  })
</script>
@endpush
@endsection