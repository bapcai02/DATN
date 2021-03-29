

<div class="modal fade" id="delete-tinh-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style ='color:black'>Xóa Tỉnh, Thành Phố</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body"> <p  style ='color:black'>Bạn có muốn xóa không ?</p> </div>
            <div class="modal-footer">
                <form action="{{ url('admins/addressShip/deleteTinh') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_tinh">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-tinh-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                    Thêm mới Tỉnh, Thành Phố
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/addressShip/createTinh') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên Tỉnh/Thành Phố <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten tinh, thanh pho" type="text" required maxlength="50"
                            name="name" id="name" class="form-control" style= 'border: 1px solid black;color:black'>
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

<div class="modal fade" id="edit-tinh-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                   Chỉnh sửa Tỉnh/Thành Phố
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/addressShip/editTinh') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten tinh/thanh pho" type="text" required
                            name="name" id="names" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Phân Loại <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhap phan loai" type="text" name="type" id="types"
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


<h3>Tỉnh, Thành Phố</h3>
@if (session('message-tinh'))
  <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
      </button>
      <input id='message-tinh' type = 'hidden' value="{{ session('message-tinh') }}" />
  </div>
@endif
@if (session('error-tinh'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
    </button>
    <input id='error-tinh' type = 'hidden' value="{{ session('error-tinh') }}" />
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
                    data-target="#add-tinh-modal"
                    type="button">
                  <span>
                      <i class="fa fa-plus mr-1"></i>
                      Thêm mới Tỉnh, Thành Phố
                  </span>
                  </a>
              </div>
          </div>

          <thead class="bg-primary-600">
          <tr>
              <th>#</th>
              <th>Tên</th>
              <th>Phân Loại</th>
              <th></th>
          </tr>
          </thead>

          <tbody>
          <?php if (!isset($page_tinhtp) || $page_tinhtp == 1) $total = 1 ?>
          <?php if ($page_tinhtp >= 2) $total = ($page_tinhtp - 1) * 6 + 1 ?>
            @foreach($tinhtp as $value)
              <tr class="data-row">
                  <td>{{ $total++ }}</td>
                  <td id="name"><p class = 'text'>{{ $value->name }}</p></td>
                  <td id="type"><p class = 'text'>{{ $value->type }}</p></td>
                  <td class="text-center">
                      <a id="delete-item-tinh"
                         class="btn btn-sm btn-danger btn-icon btn-inline-block mr-1 waves-effect waves-themed"
                         data-toggle="modal"
                         data-item-id="{{$value->id}}"
                         title="">
                          <i class="fa fa-times"></i>
                      </a>
                      <a id="edit-item-tinh"
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
            {{$tinhtp->appends($_GET)->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
