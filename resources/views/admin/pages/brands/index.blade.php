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
<div class="modal fade" id="delete-brand-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form action="{{ url('admins/brand/delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_brand">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-brand-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                    Thêm mới Thương Hiệu
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/brand/create') }}" method="POST">
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
                                <option value ='1'>Hiển Thị</option>
                                <option value ='2'>Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Key <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập Mã" type="text" name="key" maxlength="20"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                        Mô Tả <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập mô tả" type="text" name="desc" maxlength="20"
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

<div class="modal fade" id="edit-brand-modal" tabindex="-1" role="dialog" aria-hidden="true">
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


<div class="content-wrapper">

<div class = "col-md-12 ">
    <form action="{{ url('admins/brand/search') }}" method="GET">
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
                  <label class="form-label" for="simpleinput">Tên Nhãn Hiệu</label>
                  <input type="text" name="name" class="form-control" placeholder="Nhap Ten Nhan Hieu"
                  @if(isset($_GET['name'])) value="{{ $_GET['name'] }}"
                    @else id="name" @endif>
              </div>
          </div>

          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">Status</label>
                  <select class="form-control" name="status">                     
                      <option value="">Chọn Status</option>
                      <option value="1">Hiển Thị</option>
                      <option value="2">Ẩn</option>
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
  @if (session('message-brand'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button>
        {{ session('message-brand') }}
    </div>
  @endif
  @if (session('error-brand'))
  <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
      </button>
      {{ session('error-brand') }}
  </div>
  @endif

    <div class="container-fluid"> 
      <div class="row ">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thương Hiệu</h5>
                <div class="table-responsive">
                <div class="row mb-3">
                        <div class="col-12">
                            <a class="btn btn-success btn-sm js-btn-add"
                              id="add-worker"
                              href="javascript:void(0);"
                              data-toggle="modal"
                              data-target="#add-brand-modal"
                              type="button">
                            <span>
                                <i class="fa fa-plus mr-1"></i>
                                Thêm mới Thương Hiệu
                            </span>
                            </a>
                        </div>
                    </div>
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tên</th>
                      <th scope="col">Mô Tả</th>
                      <th scope="col">brand_keyword</th>
                      <th scope="col">Status</th>
                      <th scope="col">Ngày Tạo</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (!isset($page) || $page == 1) $total = 1 ?>
                    <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
                  @foreach($brand as $value)
                    <tr class="data-row">
                      <th scope="row">{{ $total++ }}</th>
                      <td id ="name">{{ $value->brand_name }}</td>
                      <td  id ="desc">{{ $value->brand_description }}</td>
                      <td  id ="key">{{ $value->brand_keyword }}</td>
                      @if($value->brand_status == 1)
                        <td id="status" >Hiển Thị</td>
                      @else
                        <td id="status" >Ẩn</td>
                      @endif                   
                      <td>{{ date("Y-m-d", strtotime($value->created_at)) }}</td>
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
            </div>
            {{ $brand->links() }}
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
        $('#delete-brand-modal').modal(options)
    })

    $('#delete-brand-modal').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");
        var id = el.data('item-id');
        $("#id_brand").val(id);
    })

    $('#delete-brand-modal').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#id_brand").trigger("reset");
    })

    $(document).on('click', '#edit-item', function () {
        $(this).addClass('edit-item-trigger-clicked');
        var name = $(this).data('name');
        var options = {
            'backdrop': 'static'
        };
        $('#edit-brand-modal').modal(options)
    })

    $('#edit-brand-modal').on('show.bs.modal', function () {
        var el = $(".edit-item-trigger-clicked");
        var id = el.data('item-id');
        var row = el.closest(".data-row");
        var name = row.children("#name").text();
        var desc = row.children("#desc").text();
        var key = row.children("#key").text();
        // var status = row.children("#status").text();

        $("#id").val(id);
        $("#names").val(name);
        $("#keys").val(key);
        $("#descs").val(desc);
 
    })

    $('#edit-brand-modal').on('hide.bs.modal', function () {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#id_coupon").trigger("reset");
    })
    
  })
</script>
@endpush


@endsection