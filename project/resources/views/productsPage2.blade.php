
@foreach($prod as $product)
								@foreach($product->images as $pro)
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="/img/{{$pro->img_path}}" alt="">
										<div class="product-label">
											<!--<span class="sale">-30%</span>
											<span class="new">NEW</span>-->
										</div>
									</div>
								    <div class="product-body">
										<p class="product-category">{{$product->cat->c_name}}</p>
										<h3 class="product-name"><a href="/product/{{$product->p_id}}">{{$product->p_name}}</a></h3>
										<h4 class="product-price">EGP {{$product->p_price_egp}} </h4>
										<h4 class="product-price"> ${{$product->p_price_dollar}} </h4>
										<h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span> {{$product->p_price_bitcoins}}</h4>
										<!--<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>-->
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="quick-view" onclick="window.location.href='/product/{{$product->p_id}} '; "><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn addTcart2" data-data='{{$product->p_id}}'><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
							</div>
							<!-- /product -->
							@endforeach
							@endforeach
							<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
