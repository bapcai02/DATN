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

<div class="modal fade" id="delete-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style ='color:black'>Xóa Mã Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body"> <p  style ='color:black'>Bạn có muốn xóa không ?</p> </div>
            <div class="modal-footer">
                <form action="{{ url('admins/product/delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_product">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit"
                        class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
 
<div class="content-wrapper">
  <div class = "col-md-12 ">
    <form action="{{url('customer/product/search')}}" method="GET">
      <div class="row">
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                <label class="form-label" for="example-date">Date</label>
                <input class="form-control" type="date" name="date">
              </div>
          </div>

          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">product</label>
                  <input type="text" name="product_name" class="form-control" placeholder="product name">
              </div>
          </div>
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">Brand</label>
                  <select class="form-control" id="" name="brand">                     
                      <option value="">Chọn Brand</option>
                      @foreach($brand as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="example-select">Category</label>
                  <select class="form-control" id="example-select" name="category">
                      <option value="">Chọn Category</option>
                      @foreach($category as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>

          <div class="col-md-4 col-xs-12 mb-2">
              <div class="d-flex flex-column align-items-start justify-content-end h-100">
                  <button class="btn btn-primary waves-effect waves-themed" type="submit">
                      <i class="fa fa-search"></i>
                      Search
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
          <div class="table-responsive">
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
          <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
            <div class="row mb-3">
                <div class="col-12">
                    <a class="btn btn-success btn-sm js-btn-add"
                      id="add-worker"
                      href="{{url('customer/product/add')}}"
                      type="button">
                    <span>
                        <i class="fa fa-plus mr-1"></i>
                        Thêm Mới Sản Phẩm
                    </span>
                    </a>
                </div>
            </div>

            <thead class="bg-primary-600">
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Phân Loại</th>
                <th>Tên Thương Hiệu</th>
                <th>Tên shop</th>
                <th>Hình Ảnh</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Mô Tả</th>
                <th>Content</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>

                <tbody>
                    <?php if (!isset($page) || $page == 1) $total = 1 ?>
                    <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
                    @foreach($product as $key => $value)
                        <tr class="data-row">
                            <td>{{ $total++ }}</td>
                            <td>{{ $value->product_name}}</td>
                            <td>{{ \App\Repositories\CategoryRepository::checkCategoryName($value->category_id)->category_name }}</td>
                            <td>{{ \App\Repositories\BrandRepository::checkBrandName($value->brand_id)->brand_name }}</td>
                            <td>{{ \App\Repositories\SellerRepository::checkByName($value->seller_id)->shop_name }}</td>
                            <td><img width="120px" height="120px" src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""></td>
                            <td>{{ $value->product_price }} VND</td>
                            <td>{{ $value->sale }} %</td>
                            <td><p class="text">{{ $value->product_desc }} ...</p></td>
                            <td> <p class="text">{{ $value->product_content }} ...</p></td>
                            
                            @if($value->product_status == 1)
                                <td>Hiển Thị</td>
                            @else
                                <td>Ẩn</td>
                            @endif

                            <td class="text-center">
                                <a id="delete-item"
                                class="btn btn-sm btn-danger btn-icon btn-inline-block mr-1 waves-effect waves-themed"
                                data-toggle="modal"
                                data-item-id="{{ $value->id }}"
                                title="">
                                    <i class="fa fa-times"></i>
                                </a>
                                <a id="edit-item"
                                class="btn btn-sm btn-primary btn-icon btn-inline-block mr-1"
                                title="Edit"
                                data-dismiss="">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
              </table>
              {{ $product->links() }}
            </div>
          </div>
        </div>
      </div>
    </div><!--End Row-->
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
            $('#delete-product-modal').modal(options)
        })

        $('#delete-product-modal').on('show.bs.modal', function () {
            var el = $(".delete-item-trigger-clicked");
            var id = el.data('item-id');
            $("#id_product").val(id);
        })

        $('#delete-product-modal').on('hide.bs.modal', function () {
            $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
            $("#id_product").trigger("reset");
        })
    });

</script>

@endpush
@endsection