<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <!-- <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li> -->
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item">
      @if(Auth::user()->role_id == 3)
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
          <span class="user-profile"><img src="{{asset('assets/images/admin.jpg')}}" width = "100px" height= "100px" class="img-circle" alt="user avatar"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
        <li class="dropdown-item user-details">
          <a href="javaScript:void();">
            <div class="media">
              <div class="avatar"><img class="align-self-start mr-3" src="{{asset('assets/images/admin.jpg')}}"  width = "100px" height= "100px" alt="user avatar"></div>
              <div class="media-body">
                @if(Auth::check())
                  <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                  <p class="user-subtitle">{{ Auth::user()->email }}</p>
                @endif
              </div>
            </div>
            </a>
          </li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item"><i class="icon-power mr-2"></i><a href="{{ url('auth/logout') }}">Đăng Xuất</a></li>
        </ul>
      @elseif(Auth::user()->role_id == 2)
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
          <span class="user-profile"><img src="{{asset('assets/images/customer.png')}}" width = "100px" height= "100px" class="img-circle" alt="user avatar"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
        <li class="dropdown-item user-details">
          <a href="javaScript:void();">
            <div class="media">
              <div class="avatar"><img class="align-self-start mr-3" src="{{asset('assets/images/customer.png')}}"  width = "100px" height= "100px" alt="user avatar"></div>
              <div class="media-body">
                @if(Auth::check())
                  <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                  <p class="user-subtitle">{{ Auth::user()->email }}</p>
                @endif
              </div>
            </div>
            </a>
          </li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item"><i class="icon-power mr-2"></i><a href="{{ url('auth/logout') }}"> Logout</a></li>
        </ul>
      @else
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
          <span class="user-profile"><img src="{{asset('assets/images/shiper.png')}}" width = "100px" height= "100px" class="img-circle" alt="user avatar"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
        <li class="dropdown-item user-details">
          <a href="javaScript:void();">
            <div class="media">
              <div class="avatar"><img class="align-self-start mr-3" src="{{asset('assets/images/shiper.png')}}"  width = "100px" height= "100px" alt="user avatar"></div>
              <div class="media-body">
                @if(Auth::check())
                  <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                  <p class="user-subtitle">{{ Auth::user()->email }}</p>
                @endif
              </div>
            </div>
            </a>
          </li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item"><i class="icon-power mr-2"></i><a href="{{ url('auth/logout') }}"> Logout</a></li>
        </ul>
      @endif
    </li>
  </ul>
</nav>
</header>