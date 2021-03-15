@extends('fontend.layouts.master')
@section('content')

<div class="ogami-breadcrumb">
        <div class="container">
          <ul>
            <li> <a class="breadcrumb-link" href="index.html"> <i class="fas fa-home"></i>Home</a></li>
            <li> <a class="breadcrumb-link active" href="index.html">Shop</a></li>
          </ul>
        </div>
      </div>
      <!-- End breadcrumb-->
      <div class="shop-layout">
        <div class="container">
          <div class="row">
            <div class="col-xl-3">
              <div class="shop-sidebar">
                <button class="no-round-btn" id="filter-sidebar--closebtn">Close sidebar</button>
                <div class="shop-sidebar_department">
                  <div class="department_top mini-tab-title underline">
                    <h2 class="title">Departments</h2>
                  </div>
                  <div class="department_bottom">
                    <ul>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Fresh Meat</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Vegetables</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Fruit & Nut Gifts</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Fresh Berries</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Ocean Foods</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Butter & Eggs</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Fastfood</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Fresh Onion</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Papayaya & Crisps</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Oatmeal</a></li>
                      <li> <a class="department-link" href="shop_grid+list_3col.html">Fresh Bananas</a></li>
                    </ul>
                  </div>
                </div>
                <div class="shop-sidebar_price-filter">
                  <div class="price-filter_top mini-tab-title underline">
                    <h2 class="title">Filter By Price</h2>
                  </div>
                  <div class="price-filter_bottom">
                    <p>
                      <label for="amount">Price range:</label>
                      <div class="filter-group">
                        <input id="amount" type="text" readonly="">
                        <button class="normal-btn">Fiter</button>
                      </div>
                    </p>
                    <div id="slider-range"></div>
                  </div>
                </div>
                <div class="shop-sidebar_color-filter">
                  <div class="color-filter_top mini-tab-title underline">
                    <h2 class="title">Color</h2>
                  </div>
                  <div class="color-filter_bottom">
                    <div class="row">
                      <div class="col-6">
                        <div class="color">
                          <div class="visible-color" style="background-color: black;"></div><a href="shop_grid+list_3col.html">Black (12)</a>
                        </div>
                        <div class="color">
                          <div class="visible-color" style="background-color: red;"></div><a href="shop_grid+list_3col.html">Red (4)</a>
                        </div>
                        <div class="color">
                          <div class="visible-color" style="background-color: orange;"></div><a href="shop_grid+list_3col.html">Orange (8)</a>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="color">
                          <div class="visible-color" style="background-color: blue;"></div><a href="shop_grid+list_3col.html">Blue (4)</a>
                        </div>
                        <div class="color">
                          <div class="visible-color" style="background-color: green;"></div><a href="shop_grid+list_3col.html">Green (9)</a>
                        </div>
                        <div class="color">
                          <div class="visible-color" style="background-color: pink;"></div><a href="shop_grid+list_3col.html">Pink (12)</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="shop-sidebar_size">
                  <div class="size_top mini-tab-title underline">
                    <h2 class="title">Popular size</h2>
                  </div>
                  <div class="size_bottom">
                    <form>
                      <div class="size">
                        <input type="checkbox" id="large">
                        <label for="large">Large</label>
                      </div>
                      <div class="size">
                        <input type="checkbox" id="medium">
                        <label for="medium">Medium</label>
                      </div>
                      <div class="size">
                        <input type="checkbox" id="small">
                        <label for="small">Small</label>
                      </div>
                      <div class="size">
                        <input type="checkbox" id="tiny">
                        <label for="tiny">Tiny</label>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="shop-sidebar_tag">
                  <div class="tag_top mini-tab-title underline">
                    <h2 class="title">Product tag</h2>
                  </div>
                  <div class="tag_bottom"><a class="tag-btn" href="shop_grid+list_3col.html">organic</a><a class="tag-btn" href="shop_grid+list_3col.html">vegatable</a><a class="tag-btn" href="shop_grid+list_3col.html">fruits</a><a class="tag-btn" href="shop_grid+list_3col.html">fresh meat</a><a class="tag-btn" href="shop_grid+list_3col.html">fastfood</a><a class="tag-btn" href="shop_grid+list_3col.html">natural</a></div>
                </div>
              </div>
              <div class="filter-sidebar--background" style="display: none"></div>
            </div>
            <div class="col-xl-9">
              <div class="shop-grid-list">
                <div class="shop-products">
                  <div class="shop-products_top mini-tab-title underline">
                    <div class="row align-items-center">
                      <div class="col-6 col-xl-4">
                        <h2 class="title">Shop Grid 03 Col</h2>
                      </div>
                      <div class="col-6 text-right">
                        <div id="show-filter-sidebar">
                          <h5> <i class="fas fa-bars"></i>Show sidebar</h5>
                        </div>
                      </div>
                      <div class="col-12 col-xl-8">
                        <div class="product-option">
                          <div class="product-filter">
                            <select class="select-form" id="sort" name="">
                              <option value="A-Z">A to Z</option>
                              <option value="Z-A">Z to A</option>
                              <option value="High to low price">High to low price</option>
                              <option value="Low to height price">Low to height</option>
                            </select>
                            <select class="select-form" id="sort" name="">
                              <option value="A-Z">Show 10</option>
                              <option value="Z-A">Show 20</option>
                              <option value="High to low price">Show 30</option>
                            </select>
                          </div>
                          <div class="view-method">
                            <p class="active" id="grid-view"><i class="fas fa-th-large"></i></p>
                            <p id="list-view"><i class="fas fa-list"></i></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Using column-->
                  </div>
                  <div class="shop-products_bottom">
                    <div class="row no-gutters-sm">
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product01.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product02.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product03.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product04.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product05.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product06.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product07.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product08.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product09.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product10.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product11.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 col-md-4">
                        <div class="product">
                          <div class="product-img_block"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product12.png" alt=""></a>
                            <button class="quickview no-round-btn smooth">Quick view</button>
                          </div>
                          <div class="product-info_block">
                            <h5 class="product-type">Oranges</h5><a class="product-name" href="shop__detail.html">Pure Pineapple</a>
                            <h3 class="product-price">$14.00 
                              <del>$35.00</del>
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(5)</span></h5>
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor niam</p>
                            <h5 class="product-avaiable">Avability: <span>5 In stock</span></h5>
                            <button class="add-to-wishlist button-borderless"><i class="icon_heart_alt"></i></button>
                          </div>
                          <div class="product-select">
                            <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                            <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                            <button class="add-to-compare round-icon-btn"> <i class="fas fa-random"></i></button>
                            <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                          </div>
                          <div class="product-select_list">
                            <p class="delivery-status">Free delivery</p>
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="shop-pagination">
                    <ul>
                      <li>
                        <button class="no-round-btn smooth active">1</button>
                      </li>
                      <li>
                        <button class="no-round-btn smooth">2</button>
                      </li>
                      <li>
                        <button class="no-round-btn smooth">3</button>
                      </li>
                      <li>
                        <button class="no-round-btn smooth"> <i class="arrow_carrot-2right"></i></button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End shop layout-->
      <div class="partner">
        <div class="container">
          <div class="partner_block d-flex justify-content-between" data-slick="{&quot;slidesToShow&quot;: 6}">
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href=""><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
          </div>
        </div>
      </div>

@endsection