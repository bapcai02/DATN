<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="{{ url('admins/home') }}">
       <img src="{{ asset('admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
   @if(Auth::user()->role_id == 3)
      <li>
        <a href="{{ url('admin/home') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/customer/') }}">
          <i class="zmdi zmdi-invert-colors"></i> <span>Manage Customer</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/user/') }}">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Manage User</span>
        </a>
      </li>

      <li>
        <a href="profile.html">
          <i class="zmdi zmdi-face"></i> <span>Manage Order</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/coupon/') }}">
          <i class="zmdi zmdi-chart"></i> <span>Manage Coupons</span>
        </a>
      </li>
      
      <li>
        <a href="{{ url('admins/product/') }}">
          <i class="zmdi zmdi-grid"></i> <span>Manage Product</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/category/') }}">
          <i class="zmdi zmdi-calendar-check"></i> <span>Manage Categories</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/brand/') }}">
          <i class="zmdi zmdi-calendar-check"></i> <span>Manage Brand</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/feeship/') }}">
          <i class="zmdi zmdi-coffee">
          </i> <span>Manage feeship</span>
        </a>
      </li>

      <li>
        <a href="login.html" >
          <i class="zmdi zmdi-lock"></i> <span>Config</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/addressShip/') }}" >
          <i class="zmdi zmdi-account-circle"></i> <span>Manage Address Ship</span>
        </a>
      </li>

      <li>
        <a href="{{ url('admins/shiper/') }}" >
          <i class="zmdi zmdi-account-circle"></i> <span>Manage Shiper</span>
        </a>
      </li>
  @elseif(Auth::user()->role_id == 2)
      <li>
        <a href="{{ url('cusomer/home') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{url('customer/order')}}">
          <i class="zmdi zmdi-face"></i> <span>Manage Order</span>
        </a>
      </li>
      <li>
        <a href="{{ url('customer/product/') }}">
          <i class="zmdi zmdi-grid"></i> <span>Manage Product</span>
        </a>
      </li>
     
  @elseif(Auth::user()->role_id == 4)
      <li>
        <a href="{{ url('shiper/home') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{url('shiper/order')}}">
          <i class="zmdi zmdi-face"></i> <span>Manage Order</span>
        </a>
      </li>
  @endif
    </ul>
</div>