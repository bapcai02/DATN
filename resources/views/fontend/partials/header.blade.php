<header class="pink">
    <div class="header-block d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="header-left d-flex flex-column flex-md-row align-items-center">
              <p class="d-flex align-items-center"><i class="fas fa-envelope"></i>hadv62@wru.vn</p>
              <p class="d-flex align-items-center"><i class="fas fa-phone"></i>+397 368 768</p>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="header-right d-flex flex-column flex-md-row justify-content-md-end justify-content-center align-items-center">
              <div class="social-link d-flex"><a href=""><i class="fab fa-facebook-f"> </i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a href=""><i class="fab fa-pinterest-p"> </i></a></div>
              @if(Auth::check())
                <div class="login d-flex"><a href=""><i class="fas fa-user"></i>{{ Auth::user()->name }}</a></div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="d-flex"><a href="{{ url('logout') }}">Logout</a></div>    
              @else
                <div class="login d-flex"><a href="{{ url('login') }}"><i class="fas fa-user"></i>Login</a></div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navigation d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-2"><a class="logo" href="{{ url('/') }}"><img src="{{ asset('HTML/assets/images/logo.png') }}" alt=""></a></div>
          <div class="col-8">
            <div class="navgition-menu d-flex">
              <ul class="mb-0">
                <li class="toggleable"> <a class="menu-item" href="{{ url('/') }}">Home</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-2">
            <div class="product-function d-flex align-items-center justify-content-end">
              {{-- <div id="wishlist"><a class="function-icon icon_heart_alt" href=""></a></div> --}}
              <div id="cart"><a class="function-icon icon_bag_alt" href="{{ url('/cart') }}"><span>{{ Cart::total() }}</span></a></div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    {{-- <div id="mobile-menu">
      <div class="container">
        <div class="row">
          <div class="col-3">
            <div class="mobile-menu_block d-flex align-items-center"><a class="mobile-menu--control" href="#"><i class="fas fa-bars"></i></a>
              <div id="ogami-mobile-menu">
                <button class="no-round-btn" id="mobile-menu--closebtn">Close menu</button>
                <div class="mobile-menu_items">
                  <ul class="mb-0 d-flex flex-column">
                    <li class="toggleable"> <a class="menu-item active" href="index.html">Home</a><span class="sub-menu--expander"></span>
                    </li>
                    <li class="toggleable"><a class="menu-item" href="shop_grid+list_3col.html">Shop</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
                      <ul class="sub-menu">
                        <li><a href="shop_grid+list_fullwidth.html">Shop grid fullwidth</a></li>
                        <li><a href="shop_grid+list_fullwidth.html">Shop list fullwidth</a></li>
                        <li><a href="shop_grid+list_3col.html">shop grid 3 column</a></li>
                        <li><a href="shop_grid+list_3col.html">shop list 3 column</a></li>
                        <li><a href="shop_detail.html">shop detail</a></li>
                        <li><a href="shop_detail_fullwidth.html">shop detail fullwidth</a></li>
                        <li><a href="shop_checkout.html">checkout</a></li>
                        <li><a href="shop_order_complete.html">order complete</a></li>
                        <li><a href="shop_wishlist.html">wishlist</a></li>
                        <li><a href="shop_compare.html">compare</a></li>
                        <li><a href="shop_cart.html">cart</a></li>
                      </ul>
                    </li>
                    <li class="toggleable"> <a class="menu-item" href="blog_list_sidebar.html">Blog</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
                      <ul class="sub-menu">
                        <li><a href="blog_list_sidebar.html">Blog List Sidebar</a></li>
                        <li><a href="blog_grid_2col.html">Blog Grid 2 column</a></li>
                        <li><a href="blog_grid_sidebar.html">Blog Grid sidebar</a></li>
                        <li><a href="blog_masonry.html">Blog masonry</a></li>
                        <li><a href="blog_grid_1col.html">Blog Grid 1 column sidebar</a></li>
                        <li><a href="blog_detail_sidebar.html">Blog detail sidebar</a></li>
                      </ul>
                    </li>
                    <li class="toggleable"><a class="menu-item" href="#">Pages</a><span class="sub-menu--expander"><i class="icon_plus"></i></span>
                      <ul class="sub-menu">
                        <li><a href="login.html">login</a></li>
                        <li><a href="register.html">register</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="coming_soon.html">coming soon</a></li>
                        <li><a href="about_us.html">about us</a></li>
                        <li><a href="contact_us.html">contact us</a></li>
                        <li><a href="404_error.html">404 error</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="mobile-login">
                  <h2>My account</h2><a href="login.html">Login</a><a href="register.html">Register</a>
                </div>
                <div class="mobile-social"><a href=""><i class="fab fa-facebook-f"> </i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a href=""><i class="fab fa-pinterest-p"> </i></a></div>
              </div>
              <div class="ogamin-mobile-menu_bg"></div>
            </div>
          </div>
          <div class="col-6">
            <div class="mobile-menu_logo text-center d-flex justify-content-center align-items-center"><a href=""><img src="assets/images/logo.png" alt=""></a></div>
          </div>
          <div class="col-3">
            <div class="mobile-product_function d-flex align-items-center justify-content-end"><a class="function-icon icon_heart_alt" href="wishlist.html"></a><a class="function-icon icon_bag_alt" href="shop_cart.html"></a></div>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="navigation-filter"> 
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-4 col-lg-4 col-xl-3 order-2 order-md-1">
            <div class="department-menu_block down">
              <div class="department-menu d-flex justify-content-between align-items-center"><i class="fas fa-bars"></i>DANH MỤC SẢN PHẨM<span><i class="arrow_carrot-up"></i></span></div>
              <div class="department-dropdown-menu down">
                <ul>
                  @foreach($category as $key => $value)
                    <li><a href="{{ url('categories') . '/' . $value->id  }}"> <i class="icon-{{ $key+1 }}"></i>{{ $value->category_name }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-8 col-lg-8 col-xl-9 order-1 order-md-2">
            <div class="row">
              <div class="col-12 col-xl-8">
                <div class="website-search">
                  <div class="row no-gutters">
                    <form action="{{ url('search') }}" method="POST">
                      <div class="col-10 col-md-10 col-lg-6 col-xl-7">
                        <div class="search-input">
                          <input name="text" class="no-round-input no-border" type="text" placeholder="Nhập để tìm kiếm">
                        </div>
                      </div>
                      <div class="col-2 col-md-2 col-lg-2 col-xl-1">
                        <button type="submit" class="no-round-btn black"><i class="icon_search"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-0 col-xl-4">
                <div class="phone-number">
                  <div class="phone-number_icon"><i class="icon_phone"></i></div>
                  <h2>+397 368 768</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>