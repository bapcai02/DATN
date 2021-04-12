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

 
<div class="content-wrapper">
  <div class = "col-md-12 ">
    <form action="{{url('admins/product/search')}}" method="GET">
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
          <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
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
                <th>Ngày tạo</th>
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
                            @if(\App\Repositories\ProductRepository::getImage($value->id) != null)
                                <td><img width="120px" height="120px" src="{{ asset('assets/images').'/'. \App\Repositories\ProductRepository::getImage($value->id)->image }}" alt=""/></td>
                            @else 
                                <td><img src="" alt=""></td>
                            @endif
                            <td>{{ $value->product_price }} VND</td>
                            <td>{{ $value->sale }} %</td>
                            <td><p class="text">{{ $value->product_desc }} ...</p></td>
                            <td> <p class="text">{{ $value->product_content }} ...</p></td>
                            
                            @if($value->product_status == 1)
                                <td>Hiển Thị</td>
                            @else
                                <td>Ẩn</td>
                            @endif
                            <td>{{ $value->created_at }}</td>
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

@endpush
@endsection