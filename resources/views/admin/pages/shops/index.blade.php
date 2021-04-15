@extends('admin.layouts.master')

@section('content')


<div class="modal fade" id="delete-shop-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style ='color:black'>Xóa Shop</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body"> <p  style ='color:black'>Bạn có muốn xóa không ?</p> </div>
            <div class="modal-footer">
                <form action="{{ url('customer/shop/delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_shop">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-shop-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                    Thêm mới Shop
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form >
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Tên shop <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten shop" type="text" maxlength="50"
                            id = "name" name="name" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Thông tin shop <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập thông tin" type="text" name="info" maxlength="20"
                        id = "info" class="form-control" style= 'border: 1px solid black;color:black'>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Địa chỉ (Tỉnh) <span class="text-danger">*</span>
                        </label>
                        <select name="ProvinceID" id="address" required class="form-control" style= 'border: 1px solid black;color:black'>
    
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Địa chỉ (Huyện) <span class="text-danger">*</span>
                        </label>
                        <select name="DistrictID" id="huyen" required class="form-control" style= 'border: 1px solid black;color:black'>
    
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Địa chỉ(Xã,Phường) <span class="text-danger">*</span>
                        </label>
                        <select name="WardCode" id="xa" required class="form-control" style= 'border: 1px solid black;color:black'>
    
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Đóng</button>
                        <button type="button" id="createShop"
                            class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-shop-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: rgb(43, 50, 51)">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black">
                   Chỉnh sửa Shop
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('customer/shop/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" value="" id="id" name="id">
                    <label class="form-label" for="simpleinput" style="color:black">
                            Tên shop <span class="text-danger">*</span>
                        </label>
                        <input placeholder="nhap ten shop" type="text" required maxlength="50"
                            name="name" class="form-control" id ="name" style= 'border: 1px solid black;color:black'>
                    <div class="form-group">
                        <label class="form-label" for="simpleinput" style="color:black">
                            Thông tin shop <span class="text-danger">*</span>
                        </label>
                        <input required placeholder="nhập thông tin" type="text" name="info" maxlength="20"
                            class="form-control" id="info" style= 'border: 1px solid black;color:black'>
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
    <form action="{{ url('customer/shop/search') }}" method="GET">
      <div class="row">
        
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">Tên Shop</label>
                  <input type="text" name="name" class="form-control" placeholder="Nhap Ten"
                  @if(isset($_GET['name'])) value="{{ $_GET['name'] }}"
                    @else id="code" @endif>
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
                      data-target="#add-shop-modal"
                      type="button">
                    <span>
                        <i class="fa fa-plus mr-1"></i>
                        Thêm mới Shop
                    </span>
                    </a>
                </div>
            </div>

            <thead class="bg-primary-600">
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Thông tin</th>
                <th>ShopID</th>
                <th>Token</th>
                <th>ngày tạo</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <?php if (!isset($page) || $page == 1) $total = 1 ?>
            <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
              @foreach($shop as $value)
                <tr class="data-row">
                    <td>{{ $total++ }}</td>
                    <td id="names"><p class = 'text'>{{ $value->shop_name }}</p></td>
                    <td id="infos"><p class = 'text'>{{ $value->shop_info }}</p></td>
                    <td id="shopIDs"><p class = 'text'>{{ $value->shopID ? $value->shopID : null }}</p></td>
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
             
            </div>
            {{ $shop->links() }}
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

    $.ajax({
        type:"POST",
        url: "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/province",
        headers: {
            "Token" : "bf76117c-97a5-11eb-8be2-c21e19fc6803",
            "Content-Type" : "application/json",
        },
    }).done(function(data){
        $.each(data.data,function(key, value)
        {
            $('#address').append('<option value =' + value.ProvinceID + ' >' + value.ProvinceName + '</option>'); 
        });
    }).fail(function(res) {
            swal("System Notification", "Thông tin không đúng" , "error");
    });

    $('#address').change(function(){
        var tinh = $('#address').find('option:selected').val();
        $.ajax({
            type:"GET",
            url: "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/district",
            headers: {
                "Token" : "bf76117c-97a5-11eb-8be2-c21e19fc6803",
                "Content-Type" : "application/json",
            },
            data:{
                "province_id": tinh
            }
        }).done(function(responses){
            $.each(responses.data, function(key, value)
            {
                $('#huyen').append('<option value =' + value.DistrictID + ' >' + value.DistrictName + '</option>'); 
            });
        }).fail(function(res) {
             swal("System Notification", "Thông tin không đúng" , "error");
        });
    })

    $('#huyen').change(function(){
        var huyen = $('#huyen').find('option:selected').val();
        $.ajax({
            type:"GET",
            url: "https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id=" + huyen,
            headers: {
                "Token" : "bf76117c-97a5-11eb-8be2-c21e19fc6803",
                "Content-Type" : "application/json",
            },

        }).done(function(response){
            $.each(response.data, function(key, value)
            {
                $('#xa').append('<option value =' + value.WardCode + ' >' + value.WardName + '</option>'); 
            });
        }).fail(function(res) {
            console.log(res.responseText)
             swal("System Notification", "Thông tin không đúng" , "error");
        });
    })

    $('#createShop').click(function(){
        var district_id = $('#huyen').val();
        var ProvinceID	= $('#address').val();
        var ward_code = $('#xa').val();
        var phone = "0397368768";
        var address = "268 Lê Trọng Tấn, Thanh Xuân, Hà Nội";
        var name = $('#name').val();
        var info = $('#info').val();

        $.ajax({
            type:"GET",
            url: "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shop/register",
            headers: {
                "Token" : "bf76117c-97a5-11eb-8be2-c21e19fc6803",
                "Content-Type" : "application/json",
            },
            data:{
                "district_id": district_id,
                "ward_code": ward_code,
                "name": "TEST",
                "phone": phone,
                "address": address
            }
        }).done(function(response){
            $.ajax({
                type:"POST",
                url: "{{ url('customer/shop/create') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    district_id: district_id,
                    ward_code: ward_code,
                    ProvinceID : ProvinceID,
                    name : name,
                    info :info,
                    shopid : response.data.shop_id
                }
            }).done(function(message){
                swal("System Notification", "Tạo mới Thành công" , "success");
                location.reload();
            }).fail(function(res){
                swal("System Notification", "Thông tin không đúng" , "error");
            })
        }).fail(function(res) {
            console.log(res.responseText)
            swal("System Notification", "Thông tin không đúng" , "error");
        });
    })

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
        $('#delete-shop-modal').modal(options)
    })

    $('#delete-shop-modal').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");
        var id = el.data('item-id');
        $("#id_shop").val(id);
    })

    $('#delete-counpon-modal').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#id_shop").trigger("reset");
    })

    $(document).on('click', '#edit-item', function () {
        $(this).addClass('edit-item-trigger-clicked');
        var options = {
            'backdrop': 'static'
        };
        $('#edit-shop-modal').modal(options)
    })

    $('#edit-shop-modal').on('show.bs.modal', function () {
        var el = $(".edit-item-trigger-clicked");
        var id = el.data('item-id');
        var row = el.closest(".data-row");
        var name = row.children("#names").text();
        var info = row.children("#infos").text();

        $("#id").val(id);
        $("#name").val(name);
        $("#info").val(info);
    })
  })
</script>
@endpush
@endsection