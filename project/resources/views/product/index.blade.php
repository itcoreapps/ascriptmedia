@extends('layouts.master')

@section('new_products')


<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <!--<div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                        </ul>
                    </div>-->
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="./img/product01.png" alt="">
                                        <!--<div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>-->
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$ 980.00 </h4>
                                        <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span>0.0002</h4>
                                        <!--<div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>-->
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <!-- /product -->

                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="./img/product02.png" alt="">
                                        <div class="product-label">
                                            <!--<span class="new">NEW</span>-->
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 </h4>
                                        <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                        <!--<div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>-->
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <div class="add-to-cart">
<form action="addToCart" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <button class="add-to-cart-btn " ><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </form>
                                    </div>
                                </div>
                                <!-- /product -->

                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="./img/product03.png" alt="">
                                        <div class="product-label">
                                            <!--<span class="sale">-30%</span>-->
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 </h4>
                                        <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                        
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <div class="add-to-cart">
                                                        <button class="add-to-cart-btn addTcart" data-data='{{$product->p_id}}'><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <!-- /product -->

                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="./img/product04.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 </h4>
                                        <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                        <!--<div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>-->
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                       <div class="add-to-cart">
                                                        <button class="add-to-cart-btn addTcart" data-data='{{$product->p_id}}'><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <!-- /product -->

                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="./img/product05.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 </h4>
                                        <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                        <!--<div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>-->
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <div class="add-to-cart">
                                                        <button class="add-to-cart-btn addTcart" data-data='{{$product->p_id}}'><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <!-- /product -->
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<div class="section"  id = "slider">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">>

        </div>
    </div>
</div>

@endsection


@section('products')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <!--<div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-1">
                            <label for="category-1">
                                <span></span>
                                CAT 1
                                <small>(120)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-2">
                            <label for="category-2">
                                <span></span>
                                CAT 2
                                <small>(740)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-3">
                            <label for="category-3">
                                <span></span>
                                CAT 3
                                <small>(1450)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-4">
                            <label for="category-4">
                                <span></span>
                                CAT 4
                                <small>(578)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-5">
                            <label for="category-5">
                                <span></span>
                                CAT 5
                                <small>(120)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-6">
                            <label for="category-6">
                                <span></span>
                                CAT 6
                                <small>(740)</small>
                            </label>
                        </div>
                    </div>
                </div>-->
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <!--<div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-1">
                            <label for="brand-1">
                                <span></span>
                                SAMSUNG
                                <small>(578)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-2">
                            <label for="brand-2">
                                <span></span>
                                LG
                                <small>(125)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-3">
                            <label for="brand-3">
                                <span></span>
                                SONY
                                <small>(755)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-4">
                            <label for="brand-4">
                                <span></span>
                                SAMSUNG
                                <small>(578)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-5">
                            <label for="brand-5">
                                <span></span>
                                LG
                                <small>(125)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-6">
                            <label for="brand-6">
                                <span></span>
                                SONY
                                <small>(755)</small>
                            </label>
                        </div>
                    </div>
                </div>-->
                <!-- /aside Widget -->
        
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="./img/product01.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 </h4>
                            <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                        </div>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src="./img/product02.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 </h4>
                            <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                        </div>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src="./img/product03.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00</h4>
                            <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Cheaper</option>
                                <option value="1">Newer</option>
                            </select>
                        </label>

                        <!--<label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>-->
                    </div>
                    <!--<ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>-->
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/product01.png" alt="">
                                <div class="product-label">
                                    <!--<span class="sale">-30%</span>
                                    <span class="new">NEW</span>-->
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price"> $980.00 </h4>
                                <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                <!--<div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>-->
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->

                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/product02.png" alt="">
                                <div class="product-label">
                                    <!--<span class="new">NEW</span>-->
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price"> $980.00 </h4>
                                <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                <!--<div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>-->
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->

                    <div class="clearfix visible-sm visible-xs"></div>

                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/product03.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price"> $980.00 </h4>
                                <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->

                    <div class="clearfix visible-lg visible-md"></div>

                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/product04.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price"> $980.00 </h4>
                                <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                            
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->

                    <div class="clearfix visible-sm visible-xs"></div>

                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/product05.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price"> $980.00 </h4>
                                <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->

                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/product06.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price"> $980.00 </h4>
                                <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                <!--<div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>-->
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->

                    <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/product07.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price"> $980.00 </h4>
                                <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                <!--<div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>-->
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->

                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/product08.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price"> $980.00 </h4>
                                <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->

                    <div class="clearfix visible-sm visible-xs"></div>

                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/product09.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price"> $980.00 </h4>
                                <h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> 0.0002</h4>
                                
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->
@endsection