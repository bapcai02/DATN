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
     max-width:400px;
  }
</style>

<div class="modal fade" id="delete-slider-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style ='color:black'>Xóa Thương Hiệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body"> <p  style ='color:black'>Bạn có muốn xóa không ?</p> </div>
            <div class="modal-footer">
                <form action="{{ url('admins/slider/delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_slider">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-slider-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                    Thêm mới Slider
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/slider/create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên <span class="text-danger">*</span>
                        </label>
                        <select name="product" class="form-control">
                            @foreach($product as $value)
                                <option value="{{ $value->id }}">{{ App\Repositories\ProductRepository::getName($value->id)->product_name }}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Status <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" name="status" style= 'border: 1px solid black;color:black'>
                                <option value ='1'>Hiển Thị</option>
                                <option value ='2'>Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                        Mô Tả <span class="text-danger">*</span>
                        </label>
                        <textarea required placeholder="nhập mô tả" type="text" name="desc" maxlength="20"
                            class="form-control" style= 'border: 1px solid black;color:black'></textarea>
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

<div class="modal fade" id="edit-slider-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form action="{{ url('admins/brand/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên <span class="text-danger">*</span>
                        </label>
                        <input id = "names" placeholder="nhap ten" type="text" required maxlength="50"
                            name="name" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Status <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" name="status" style= 'border: 1px solid black;color:black'>
                                <option value ='1'>Hiển Thị</option>
                                <option value ='2'>Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Key <span class="text-danger">*</span>
                        </label>
                        <input  id = "keys" required placeholder="nhập Mã" type="text" name="key" maxlength="20"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                        Mô Tả <span class="text-danger">*</span>
                        </label>
                        <input  id = "descs" required placeholder="nhập mô tả" type="text" name="desc" maxlength="20"
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


@if (session('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
    </button>
    <input id='message' type = 'hidden' value="{{ session('message') }}" />
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
  </button>
  <input id='error' type = 'hidden' value="{{ session('error') }}" />
</div>
@endif

<div class="content-wrapper">
    <div class="container-fluid"> 
      <div class="row ">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Quản Lý Slider</h5>
			  <div class="table-responsive">
                <div class="row mb-3">
                    <div class="col-12">
                        <a class="btn btn-success btn-sm js-btn-add"
                            id="add-worker"
                            href="javascript:void(0);"
                            data-toggle="modal"
                            data-target="#add-slider-modal"
                            type="button">
                        <span>
                            <i class="fa fa-plus mr-1"></i>
                            Thêm mới
                        </span>
                        </a>
                    </div>
                </div>
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Sản Phẩm</th>
                      <th scope="col">Ảnh</th>
                      <th scope="col">Mô tả</th>
                      <th scope="col">Status</th>
                      <th scope="col">Ngày tạo</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!isset($page) || $page == 1) $total = 1 ?>
                    <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
                    @foreach($slider as $value)
                      <tr>
                        <td>{{ $total++ }}</td>
                        <td>{{ App\Repositories\ProductRepository::getName($value->product_id)->product_name }}</td>
                        <td> <img width="100px" height="100px" src="{{ asset('assets/images').'/'.$value->images }}" alt=""> </td>
                        <td><p class="text"> {{ $value->descript }}</p></td>
                        <td>{{ $value->created_at }}</td>
                        @if($value->status == 1) 
                            <td>Hiển Thị</td>
                        @else
                            <td>Ẩn</td>
                        @endif
                        <td>{{ $value->created_at }}</td>
                        <td class="text-center">
                            <a id="delete-item"
                               class="btn btn-sm btn-danger btn-icon btn-inline-block mr-1 waves-effect waves-themed"
                               data-toggle="modal"
                               data-item-id="{{$value->id}}"
                               title="">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
            </div>
            {{ $slider->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function() {

        var val = $('#message').val();
        if((val) && val.length > 0) {
            swal("Thành Công!", "Thao Tác Thành công!", "success");
        }

        var val = $('#error').val();
        if((val) && val.length > 0) {
            swal("Thất Bại!", "Thao Tác Thất Bại!", "error");
        }

        $(document).on('click', '#delete-item', function () {
            $(this).addClass('delete-item-trigger-clicked');
            var options = {
                'backdrop': 'static'
            };
            $('#delete-slider-modal').modal(options)
        })

        $('#delete-slider-modal').on('show.bs.modal', function () {
            var el = $(".delete-item-trigger-clicked");
            var id = el.data('item-id');
            $("#id_slider").val(id);
        })

        $('#delete-slider-modal').on('hide.bs.modal', function () {
            $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
            $("#id_slider").trigger("reset");
        })
        
    })
</script>

@endpush

@endsection