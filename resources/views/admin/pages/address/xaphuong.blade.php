
<div class="modal fade" id="delete-xa-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style ='color:black'>Xóa Xã, Phường, Thị Trấn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body"> <p  style ='color:black'>Bạn có muốn xóa không ?</p> </div>
            <div class="modal-footer">
                <form action="{{ url('admins/addressShip/deleteXa') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_xa">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
  
  <div class="modal fade" id="add-xa-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                    Thêm mới Quận, Huyện
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/addressShip/createHuyen') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên Quận, Huyện<span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten quan, huyen" type="text" required maxlength="50"
                            name="name" id="name" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="simpleinput" style="color:black">
                          Chọn Tỉnh/Thành phố trực thuộc <span class="text-danger">*</span>
                      </label>
                      <select name="maqh" id=""  required class="form-control" style= 'border: 1px solid black;color:black'>
                          @foreach($listQuanHuyen as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                          @endforeach
                      </select>
                  </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Phân Loại <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap phan loai" type="text" required maxlength="20"
                        name="type" id="type" class="form-control" style= 'border: 1px solid black;color:black'>
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
  
  <div class="modal fade" id="edit-xa-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                   Chỉnh sửa Xã, Phường, Thị Trấn
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/addressShip/editXa') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten tinh/thanh pho" type="text" required
                            name="name" id="namesss" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
  
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Phân Loại <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhap phan loai" type="text" name="type" id="typesss"
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


<h3>Xã, Phường, Thị Trấn</h3>
@if (session('message-xa'))
  <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
      </button>
      {{ session('message-xa') }}
  </div>
@endif
@if (session('error-xa'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
    </button>
    {{ session('error-xa') }}
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
                    data-target="#add-xa-modal"
                    type="button">
                  <span>
                      <i class="fa fa-plus mr-1"></i>
                      Thêm mới Xã, Phường, Thị Trấn
                  </span>
                  </a>
              </div>
          </div>

          <thead class="bg-primary-600">
          <tr>
              <th>#</th>
              <th>Tên</th>
              <th>Loại</th>
              <th></th>
          </tr>
          </thead>

          <tbody>
          <?php if (!isset($page_xa) || $page_xa == 1) $total = 1 ?>
          <?php if ($page_xa >= 2) $total = ($page_xa - 1) * 6 + 1 ?>
            @foreach($xaphuong as $value)
              <tr class="data-row">
                  <td>{{ $total++ }}</td>
                  <td id="nameq"><p class = 'text'>{{ $value->name }}</p></td>
                  <td id="typeq"><p class = 'text'>{{ $value->type }}</p></td>
                  <td class="text-center">
                      <a id="delete-item-xa"
                         class="btn btn-sm btn-danger btn-icon btn-inline-block mr-1 waves-effect waves-themed"
                         data-toggle="modal"
                         data-item-id="{{$value->id}}"
                         title="">
                          <i class="fa fa-times"></i>
                      </a>
                      <a id="edit-item-xa"
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
            {{$xaphuong->appends($_GET)->links()}}
          </div>
        </div>
      </div>
    </div>
  </div><!--End Row-->
</div>