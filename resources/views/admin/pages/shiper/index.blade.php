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
   max-width:150px;
}
</style>
<div class="modal fade" id="delete-shiper-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style ='color:black'>Xóa Shiper</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body"> <p  style ='color:black'>Bạn có muốn xóa không ?</p> </div>
            <div class="modal-footer">
                <form action="{{ url('admins/shiper/delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_shiper">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-shiper-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                    Thêm mới Shiper
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admins/shiper/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Chọn User <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" name="user_id" id="user_id" style= 'border: 1px solid black;color:black'>\
                            @foreach($user as $key => $value)
                                <option value ='{{ $value->id }}'>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Tên <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhập tên shiper" type="text" required maxlength="50"
                        name="name" id="name" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Email <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhập Email" type="email" required maxlength="50"
                        name="email" id="email" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Số Điện Thoại <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhập Số Điện Thoại" type="text" required maxlength="50"
                        name="phone" id="phone" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Ảnh <span class="text-danger">*</span>
                        </label>
                        <input type="file" required accept="image/*"name="image" id="image" onchange="loadFile(event)">
                        <img id="output" width="100px" height="100px" src="{{ asset('assets/images/shiper.png') }}"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Thành Phố <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" name="matp" id="matp" style= 'border: 1px solid black;color:black'>\
                            @foreach($tinhtp as $key => $value)
                                <option value ='{{ $value->id }}'>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Quận Huyện <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" name="maqh" id="maqh" style= 'border: 1px solid black;color:black'>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="example-number" style="color:black">
                           Xã Phường <span class="text-danger">*</span>
                        </label>
                        <select required class="form-control" name="maxptr" id="maxptr" style= 'border: 1px solid black;color:black'>

                        </select>
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

<div class="modal fade" id="edit-shiper-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form action="{{ url('admins/feeship/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" id="id" name="id">
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tỉnh/Thành Phố <span class="text-danger">*</span>
                        </label>
                        <input disabled type="text"
                            name="matp" id="tinhtp" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Quận/Huyện <span class="text-danger">*</span>
                        </label>
                        <input disabled type="text" 
                            name="maqh" id="quanhuyen" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Xã/Phường/Thị Trấn <span class="text-danger">*</span>
                        </label>
                        <input disabled type="text" 
                            name="maxptr" id="xaphuong" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Phí Ship <span class="text-danger">*</span>
                        </label>
                        <input type="text" required maxlength="10"
                            name="feeship" id="feeships" class="form-control" style= 'border: 1px solid black;color:black'>
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
    <form action="{{ url('admins/shiper/search') }}" method="GET">
      <div class="row">
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">Tỉnh/Thành Phố</label>
                  <select class="form-control" id="matps" name="matp">                     
                      @foreach($tinhtp as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="col-md-4 col-xs-12 mb-2">
            <div class="form-group">
                <label class="form-label" for="simpleinput">Quận Huyện</label>
                <select class="form-control" id="maqhs" name="maqh">                     
                </select>
            </div>
        </div>

        <div class="col-md-4 col-xs-12 mb-2">
            <div class="form-group">
                <label class="form-label" for="simpleinput">Xã Phường Thị Trấn</label>
                <select class="form-control" id="maxptrs" name="maxptr">                     
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
  @if (session('message-shiper'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button>
        {{ session('message-shiper') }}
    </div>
  @endif
  @if (session('error-shiper'))
  <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
      </button>
      {{ session('error-shiper') }}
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
                      data-target="#add-shiper-modal"
                      type="button">
                    <span>
                        <i class="fa fa-plus mr-1"></i>
                        Thêm mới Phí Ship
                    </span>
                    </a>
                </div>
            </div>

            <thead class="bg-primary-600">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Hình Ảnh</th>
                    <th>Tỉnh/Thành Phố</th>
                    <th>Quận/Huyện</th>
                    <th>Xã/Phường/Thị Trấn</th>
                    <th>ngảy tạo</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            <?php if (!isset($page) || $page == 1) $total = 1 ?>
            <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
              @foreach($shiper as $value)
                <tr class="data-row">
                    <td>{{ $total++ }}</td>
                    <td id="name"><p class = 'text'>{{ $value->name }}</p></td>
                    <td id="email"><p class = 'text'>{{ $value->phone }}</p></td>
                    <td id="phone"><p class = 'text'>{{ $value->email }}</p></td>
                    @if($value->image == null)
                        <td><img width="100px" height="100px" src="{{ asset('assets/images/shiper.png') }}"></td>
                    @else
                        <td><img width="100px" height="100px" src="{{ asset('assets/images') . '/' . $value->image }}"></td>
                    @endif
                    <td id="mtp"><p class = 'text'>{{ \App\Repositories\AddressRepository::getThanhPhoById($value->matp)->name }}</p></td>
                    <td id="mqh"><p class = 'text'>{{ \App\Repositories\AddressRepository::getQuanHuyenById($value->maqh)->name }}</p></td>
                    <td id="mxptr"><p class = 'text'>{{ \App\Repositories\AddressRepository::getXaPhuongById($value->maxptr)->name }}</p></td>
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
              {{ $shiper->links() }}
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
    
    var loadFile = function(event) {
        var lenght = document.getElementById('image').files.length;
        var output = document.getElementById('output');
        if(lenght != 0){
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) 
            }
        }else{
            output.src = "{{ asset('assets/images/shiper.png') }}";
        }
    };
</script>
<script>
  $(document).ready(function() {
  
    $(document).on('click', '#delete-item', function () {
        $(this).addClass('delete-item-trigger-clicked');
        var name = $(this).data('name');
        var options = {
            'backdrop': 'static'
        };
        $('#delete-shiper-modal').modal(options)
    })

    $('#delete-shiper-modal').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");
        var id = el.data('item-id');
        $("#id_shiper").val(id);
    })

    $('#delete-shiper-modal').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#id_shiper").trigger("reset");
    })

    $(document).on('click', '#edit-item', function () {
        $(this).addClass('edit-item-trigger-clicked');
        var name = $(this).data('name');
        var options = {
            'backdrop': 'static'
        };
        $('#edit-feeship-modal').modal(options)
    })

    $('#edit-feeship-modal').on('show.bs.modal', function () {
        var el = $(".edit-item-trigger-clicked");
        var id = el.data('item-id');
        var row = el.closest(".data-row");
        var mtp = row.children("#mtp").text();
        var mqh = row.children("#mqh").text();
        var mxptr = row.children("#mxptr").text();
        var fee = row.children("#fee").text();

        $("#id").val(id);
        $("#tinhtp").val(mtp);
        $("#quanhuyen").val(mqh);
        $("#xaphuong").val(mxptr);
        $("#feeships").val(fee);
    })

    $('#edit-feeship-modal').on('hide.bs.modal', function () {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#id_feeship").trigger("reset");
    })

    var matp = $('#matp').find('option:selected').val();
    $.ajax({
        url: "{{ url('admins/feeship/quanhuyen') }}",
        type: 'GET',
        data: {
            matp
        },
    }).done(function(res){
        for(var i = 0; i < res.length - 1; i++){
            $('#maqh').append($('<option>', {
                value: res[i]['id'],
                text: res[i]['name']
            }));
        }
        var maqh = $('#maqh').find('option:selected').val();
        $.ajax({
            url: "{{ url('admins/feeship/xaphuong') }}",
            type: 'GET',
            data: {
                maqh
            },
        }).done(function(res){
            for(var i = 0; i < res.length - 1; i++){
                $('#maxptr').append($('<option>', {
                    value: res[i]['id'],
                    text: res[i]['name']
                }));
            }
        });
    });

    $('#matp').change(function(){
        var matp = $('#matp').find('option:selected').val();
        $.ajax({
            url: "{{ url('admins/feeship/quanhuyen') }}",
            type: 'GET',
            data: {
                matp
            },
        }).done(function(res){
            $('#maqh').find('option').remove();
            for(var i = 0; i < res.length - 1; i++){
                $('#maqh').append($('<option>', {
                    value: res[i]['id'],
                    text: res[i]['name']
                }));
            }

            var maqh = $('#maqh').find('option:selected').val();
            $.ajax({
                url: "{{ url('admins/feeship/xaphuong') }}",
                type: 'GET',
                data: {
                    maqh
                },
            }).done(function(res){
                $('#maxptr').find('option').remove();
                for(var i = 0; i < res.length - 1; i++){
                $('#maxptr').append($('<option>', {
                    value: res[i]['id'],
                    text: res[i]['name']
                }));
                }
            });
        });
    });

    var matp = $('#matps').find('option:selected').val();
    $.ajax({
        url: "{{ url('admins/feeship/quanhuyen') }}",
        type: 'GET',
        data: {
            matp
        },
    }).done(function(res){
        for(var i = 0; i < res.length - 1; i++){
            $('#maqhs').append($('<option>', {
                value: res[i]['id'],
                text: res[i]['name']
            }));
        }
        var maqh = $('#maqhs').find('option:selected').val();
        $.ajax({
            url: "{{ url('admins/feeship/xaphuong') }}",
            type: 'GET',
            data: {
                maqh
            },
        }).done(function(res){
            for(var i = 0; i < res.length - 1; i++){
                $('#maxptrs').append($('<option>', {
                    value: res[i]['id'],
                    text: res[i]['name']
                }));
            }
        });
    });

    $('#matps').change(function(){
        var matp = $('#matps').find('option:selected').val();
        $.ajax({
            url: "{{ url('admins/feeship/quanhuyen') }}",
            type: 'GET',
            data: {
                matp
            },
        }).done(function(res){
            $('#maqhs').find('option').remove();
            for(var i = 0; i < res.length - 1; i++){
                $('#maqhs').append($('<option>', {
                    value: res[i]['id'],
                    text: res[i]['name']
                }));
            }

            var maqh = $('#maqhs').find('option:selected').val();
            $.ajax({
                url: "{{ url('admins/feeship/xaphuong') }}",
                type: 'GET',
                data: {
                    maqh
                },
            }).done(function(res){
                $('#maxptrs').find('option').remove();
                for(var i = 0; i < res.length - 1; i++){
                    $('#maxptrs').append($('<option>', {
                        value: res[i]['id'],
                        text: res[i]['name']
                    }));
                }
            });
        });
    });
})
</script>

@endpush
@endsection