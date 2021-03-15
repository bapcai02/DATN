@extends('fontend.layouts.master')
@section('content')

<div class="ogami-breadcrumb">
        <div class="ogami-container-fluid">
          <ul>
            <li> <a class="breadcrumb-link" href="index.html"> <i class="fas fa-home"></i>Home</a></li>
            <li> <a class="breadcrumb-link" href="shop_grid+list_3col.html">Shop</a></li>
            <li> <a class="breadcrumb-link active" href="">Shop Detail Fullwidth</a></li>
          </ul>
        </div>
      </div>
      <!-- End breadcrumb-->
      <div class="shop-layout">
        <div class="ogami-container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="shop-detail shop-detail-fullwidth">
                <div class="row">
                  <div class="col-12 col-xl-5">
                    <div class="shop-detail_img">
                      <button class="round-icon-btn" id="zoom-btn"> <i class="icon_zoom-in_alt"></i></button>
                      <div class="row">
                        <div class="col-3">
                          <div class="slide-img" data-slick="{&quot;vertical&quot;: true}">
                            <div class="slide-img_block"><img src="assets/images/shop/zoom_img_1.png" alt="product image"></div>
                            <div class="slide-img_block"><img src="assets/images/shop/zoom_img_2.png" alt="product image"></div>
                            <div class="slide-img_block"><img src="assets/images/shop/zoom_img_3.png" alt="product image"></div>
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="big-img">
                            <div class="big-img_block"><img src="assets/images/shop/zoom_img_1.png" alt="product image"></div>
                            <div class="big-img_block"><img src="assets/images/shop/zoom_img_2.png" alt="product image"></div>
                            <div class="big-img_block"><img src="assets/images/shop/zoom_img_3.png" alt="product image"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="img_control"></div>
                  </div>
                  <div class="col-12 col-xl-7">
                    <div class="row">
                      <div class="col-md-7 col-lg-7 col-xxl-8">
                        <div class="shop-detail_info">
                          <h5 class="product-type color-type">Oranges</h5>
                          <h2 class="product-name">Pure Pineapple</h2>
                          <div class="product-describe_block">
                            <p class="product-describe">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p class="product-describe">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p class="product-describe">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id est laborum.</p>
                            <p class="product-describe">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventor.</p>
                            <p class="product-describe">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem</p>
                          </div>
                          <div class="product-category">
                            <h5 class="category">SKU:<span>A1359</span></h5>
                            <h5 class="category">Categories:<span><a href="product_grid+list_3col.html">Fastfood</a><a href="product_grid+list_3col.html">Orange</a></span></h5>
                            <h5 class="category">Tag:<span><a href="product_grid+list_3col.html">Food</a><a href="product_grid+list_3col.html">Organic</a></span></h5>
                          </div>
                          <div class="product-share">
                            <h5>Share link:</h5><a href=""><i class="fab fa-facebook-f"> </i></a><a href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a href=""><i class="fab fa-pinterest-p"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5 col-lg-5 col-xxl-4">
                        <div class="shop-detail_info shop-detail_info-full">
                          <p class="delivery-status">Free delivery</p>
                          <div class="price-rate">
                            <h3 class="product-price"> 
                              <del>$35.00</del>$14.00
                            </h3>
                            <h5 class="product-rated"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><span>(15)</span></h5>
                          </div>
                          <div class="color-select">
                            <h5>Select Color:</h5><a class="color bg-danger" href="#"></a><a class="color bg-success" href="#"></a><a class="color bg-info" href="#"></a>
                          </div>
                          <div class="quantity-select">
                            <label for="quantity">Quatity:</label>
                            <input class="no-round-input" id="quantity" type="number" min="0" value="1">
                          </div>
                          <div class="product-select">
                            <button class="add-to-cart normal-btn outline">Add to Cart</button>
                            <button class="add-to-compare normal-btn outline">+ Add to Compare</button>
                          </div>
                          <div class="product-guarante">
                            <p class="guarante">Satisfaction 100% Guaranteed</p>
                            <p class="guarante">Free shipping on orders over $99</p>
                            <p class="guarante">14 day easy Return</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="shop-detail_more-info">
                      <div id="tab-so3">
                        <ul class="mb-0">
                          <li class="active"><a href="#tab-1">DESCRIPTION</a></li>
                          <li><a href="#tab-2">SPECIFICATIONS</a></li>
                          <li> <a href="#tab-3">Customer Reviews (02)</a></li>
                        </ul>
                        <div id="tab-1">
                          <div class="description-block">
                            <div class="description-item_block">
                              <div class="row align-items-center justify-content-around">
                                <div class="col-12 col-md-4">
                                  <div class="description-item_img"><img class="img-fluid" src="assets/images/shop/shop_detail_full_img.png" alt="description image"></div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="description-item_text">
                                    <h2>Product information</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiustempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. S totam rem aperiam, eaque ipsa</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="tab-2">
                          <div class="specifications_block">
                            <table class="shop_attributes table-bordered">
                              <tbody>
                                <tr>
                                  <th>Weight</th>
                                  <td class="product_weight">10 oz</td>
                                </tr>
                                <tr>
                                  <th>Dimensions</th>
                                  <td class="product_dimensions">15 × 12 × 20 in</td>
                                </tr>
                                <tr>
                                  <th>Color</th>
                                  <td class="product_color">Black, Blue, Gray, Green</td>
                                </tr>
                                <tr>
                                  <th>Size</th>
                                  <td class="product_size">L, M, S, XL</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div id="tab-3"> 
                          <div class="customer-reviews_block">
                            <div class="customer-review">
                              <div class="row">
                                <div class="col-12 col-sm-3 col-lg-2 col-xxl-1">
                                  <div class="customer-review_left">
                                    <div class="customer-review_img text-center"><img class="img-fluid" src="assets/images/shop/reviewer_01.png" alt="customer image"></div>
                                    <div class="customer-rate"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i></div>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-9 col-lg-10 col-xxl-11">
                                  <div class="customer-comment"> 
                                    <h5 class="comment-date">27 Aug 2016</h5>
                                    <h3 class="customer-name">Jenney Kelley</h3>
                                    <p class="customer-commented">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="customer-review">
                              <div class="row">
                                <div class="col-12 col-sm-3 col-lg-2 col-xxl-1">
                                  <div class="customer-review_left">
                                    <div class="customer-review_img text-center"><img class="img-fluid" src="assets/images/shop/reviewer_02.png" alt="customer image"></div>
                                    <div class="customer-rate"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i></div>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-9 col-lg-10 col-xxl-11">
                                  <div class="customer-comment"> 
                                    <h5 class="comment-date">27 Aug 2016</h5>
                                    <h3 class="customer-name">Jenney Kelley</h3>
                                    <p class="customer-commented">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="add-review">
                              <div class="add-review_top">
                                <h2>Add Review</h2>
                              </div>
                              <div class="add-review_bottom">
                                <form action="" method="post">
                                  <div class="row">
                                    <div class="col-12 col-md-6">
                                      <input class="no-round-input" type="text" placeholder="Name*">
                                    </div>
                                    <div class="col-12 col-md-6">
                                      <input class="no-round-input" type="text" placeholder="Email*">
                                    </div>
                                    <div class="col-12">
                                      <div class="rating">
                                        <h5>Your rating:</h5><span><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></span>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <textarea class="textarea-form" id="review" name="" cols="30" rows="5" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                      <button class="normal-btn">Submit Review</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="related-product">
                <div class="related-product_top mini-tab-title underline">
                  <h2 class="title">Related Products</h2>
                </div>
                <div class="related-product_bottom">
                  <div class="row no-gutters-sm">
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                      <div class="product"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product02.png" alt=""></a>
                        <h5 class="product-type">Oranges</h5>
                        <h3 class="product-name">Pure Pineapple</h3>
                        <h3 class="product-price">$14.00 
                          <del>$35.00</del>
                        </h3>
                        <div class="product-select">
                          <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                          <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                          <button class="add-to-compare round-icon-btn"><i class="fas fa-random"></i></button>
                          <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                      <div class="product"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product03.png" alt=""></a>
                        <h5 class="product-type">Oranges</h5>
                        <h3 class="product-name">Apple</h3>
                        <h3 class="product-price">$30.00
                          <del>$45.00</del>
                        </h3>
                        <div class="product-select">
                          <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                          <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                          <button class="add-to-compare round-icon-btn"><i class="fas fa-random"></i></button>
                          <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                      <div class="product"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product04.png" alt=""></a>
                        <h5 class="product-type">Oranges</h5>
                        <h3 class="product-name">Pure Pineapple</h3>
                        <h3 class="product-price">$14.00 
                          <del>$35.00</del>
                        </h3>
                        <div class="product-select">
                          <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                          <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                          <button class="add-to-compare round-icon-btn"><i class="fas fa-random"></i></button>
                          <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                      <div class="product"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product05.png" alt=""></a>
                        <h5 class="product-type">Oranges</h5>
                        <h3 class="product-name">Pure Pineapple</h3>
                        <h3 class="product-price">$14.00 
                          <del>$35.00</del>
                        </h3>
                        <div class="product-select">
                          <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                          <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                          <button class="add-to-compare round-icon-btn"><i class="fas fa-random"></i></button>
                          <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                      <div class="product"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product06.png" alt=""></a>
                        <h5 class="product-type">Oranges</h5>
                        <h3 class="product-name">Pure Pineapple</h3>
                        <h3 class="product-price">$14.00 
                          <del>$35.00</del>
                        </h3>
                        <div class="product-select">
                          <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                          <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                          <button class="add-to-compare round-icon-btn"><i class="fas fa-random"></i></button>
                          <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                      <div class="product"><a class="product-img" href="shop_detail.html"><img src="assets/images/product/product07.png" alt=""></a>
                        <h5 class="product-type">Oranges</h5>
                        <h3 class="product-name">Apple</h3>
                        <h3 class="product-price">$30.00
                          <del>$45.00</del>
                        </h3>
                        <div class="product-select">
                          <button class="add-to-wishlist round-icon-btn"> <i class="icon_heart_alt"></i></button>
                          <button class="add-to-cart round-icon-btn">  <i class="icon_bag_alt"></i></button>
                          <button class="add-to-compare round-icon-btn"><i class="fas fa-random"></i></button>
                          <button class="quickview round-icon-btn"> <i class="far fa-eye"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End shop layout-->
      <div class="partner partner_block-bgless">
        <div class="ogami-container-fluid">
          <div class="partner_block d-flex justify-content-between" data-slick="{&quot;slidesToShow&quot;: 8}">
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href=""><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_02.png" alt="partner logo"></a></div>
            <div class="partner--logo" href=""> <a href="#"><img src="assets/images/partner/partner_01.png" alt="partner logo"></a></div>
          </div>
        </div>
      </div>

@endsection