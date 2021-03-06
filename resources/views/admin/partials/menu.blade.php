<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="{{ url('admins/home') }}">
       <img src="{{ asset('admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Quản Lý</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
   @if(Auth::user()->role_id == 3)
      <li>
        <a href="{{ url('admins/home') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Trang Chủ</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/customer/') }}">
          <i class="zmdi zmdi-invert-colors"></i> <span>Quản Lý Doanh nghiệp</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/user/') }}">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Quản Lý Người Dùng</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/order/') }}">
          <i class="zmdi zmdi-face"></i> <span>Quản Lý Đơn Hàng</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/coupon/') }}">
          <i class="zmdi zmdi-chart"></i> <span>Quản Lý Mã Giảm Giá</span>
        </a>
      </li>
      
      <li>
        <a href="{{ url('admins/product/') }}">
          <i class="zmdi zmdi-grid"></i> <span>Quản Lý Sản Phẩm</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/category/') }}">
          <i class="zmdi zmdi-calendar-check"></i> <span>Quản Lý Thể Loại Sản Phẩm</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/brand/') }}">
          <i class="zmdi zmdi-calendar-check"></i> <span>Quản Lý Nhãn Hàng</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/slider') }}" >
          <i class="zmdi zmdi-lock"></i> <span>Quản Lý Slider</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/addressShip/') }}" >
          <i class="zmdi zmdi-account-circle"></i> <span>Quản Lý Địa Chỉ</span>
        </a>
      </li>

  @elseif(Auth::user()->role_id == 2)
      <li>
        <a href="{{ url('cusomer/home') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Trang Chủ</span>
        </a>
      </li>
      <li>
        <a href="{{url('customer/order')}}">
          <i class="zmdi zmdi-face"></i> <span>Quản Lý Đơn Hàng</span>
        </a>
      </li>
      <li>
        <a href="{{ url('customer/product/') }}">
          <i class="zmdi zmdi-grid"></i> <span>Quản Lý Sản Phẩm</span>
        </a>
      </li>

      <li>
        <a href="{{ url('customer/shop/') }}">
          <i class="zmdi zmdi-grid"></i> <span>Quản Lý Shop</span>
        </a>
      </li>
  @endif
    </ul>
</div>