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
<div class="modal fade" id="delete-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style ='color:black'>Xóa Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body"> <p  style ='color:black'>Bạn có muốn xóa không ?</p> </div>
            <div class="modal-footer">
                <form action="{{ url('admins/category/delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_category">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                    Thêm mới Category
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/category/create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên category <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten category" type="text" required
                            name="name" id="name-create" class="form-control" style= 'border: 1px solid black;color:black'>
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
                        <label class="form-label" for="simpleinput" style="color:black">
                            keyword <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập keyword" type="text" name="key"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            description
                        </label>
                        <textarea  name="description" rows="4" cols="50" style= 'border: 1px solid black;color:black'></textarea>
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

<div class="modal fade" id="edit-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form action="{{ url('admins/category/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên category <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten category" type="text" required
                            name="name" id="names" class="form-control" style= 'border: 1px solid black;color:black'>
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
                        <label class="form-label" for="simpleinput" style="color:black">
                            keyword <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập keyword" type="text" name="key" id="keys"
                            class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            description
                        </label>
                        <textarea  id="desc" name="description" rows="4" cols="50" style= 'border: 1px solid black;color:black'></textarea>
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
    <form action="{{ url('admins/category/search') }}" method="GET">
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
                  <input type="text" name="customer" class="form-control" placeholder="Category Name"
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
                      data-target="#add-category-modal"
                      type="button">
                    <span>
                        <i class="fa fa-plus mr-1"></i>
                        Thêm mới Category
                    </span>
                    </a>
                </div>
            </div>

            <thead class="bg-primary-600">
            <tr>
                <th>#</th>
                <th>Tên</th>
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
                    <td id="desc"><p class = 'text'>{{ $value->phone }}</p></td>
                    <td id="desc"><p class = 'text'>{{ $value->address }}</p></td>
                    @if($value->status == 1)
                      <td id="status" >Hiển thị</td>
                    @else
                      <td id="status" >Không Hiển thị</td>
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
        $('#delete-category-modal').modal(options)
    })

    $('#delete-category-modal').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");
        var id = el.data('item-id');
        $("#id_category").val(id);
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
        $('#edit-category-modal').modal(options)
    })

    $('#edit-category-modal').on('show.bs.modal', function () {
        var el = $(".edit-item-trigger-clicked");
        var id = el.data('item-id');
        var row = el.closest(".data-row");
        var name = row.children("#name").text();
        var desc = row.children("#desc").text();
        var status = row.children("#status").text();
        var key = row.children("#key").text();

        $("#id").val(id);
        $("#names").val(name);
        $("#status").val(status);
        $("#keys").val(key);
        $("#desc").val(desc);
    })

    $('#edit-category-modal').on('hide.bs.modal', function () {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#id_category").trigger("reset");
    })
    
  })
</script>
@endpush
@endsection