@extends('master')
@section('container')
@include('ourJs')

		<!-- BREADCRUMB -->
		<!--<div id="breadcrumb" class="section">
			
			<div class="container">
			
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li>
						</ul>
					</div>
				</div>
		
			</div>
		
		</div>-->
		<!-- /BREADCRUMB -->


				<!-- SECTION -->
				<div class="section">
					<!-- container -->
					<div class="container">
						<!-- row -->
						<div class="row">
				<div  id="sucsCart"></div>

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

											@foreach($prod as $product)
											@foreach($product->images as $pro)
												<!-- product -->
												<div class="product">
													<div class="product-img">
														<img src="/img/{{$pro->img_path}}" alt="">
														<!--<div class="product-label">
															<span class="sale">-30%</span>
															<span class="new">NEW</span>
														</div>-->
													</div>
													<div class="product-body">
														<p class="product-category">{{$product->cat->c_name}}</p>
														<h3 class="product-name"><a href="/product/{{$product->p_id}}">{{$product->p_name}}</a></h3>
														<h4 class="product-price">EGP {{$product->p_price_egp}} </h4>
														<h4 class="product-price">$ {{$product->p_price_dollar}} </h4>
														<h4 class="product-price"><span class="fa fa-btc" aria-hidden="true"></span>{{$product->p_price_bitcoins}}</h4>
														<!--<div class="product-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>-->
														<div class="product-btns">
															<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
															
															<button class="quick-view" onclick="window.location.href='/product/{{$product->p_id}} '; " ><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
														
														</div>
													</div>
													<div class="add-to-cart">
													
													<form class="  " role="form"  >
                                                            @csrf
                  
                     
                                         <input type="hidden" name="p_id" value="{{$product->p_id}}">
                   
                                          

                                           <input type="hidden" name="qty" value="1"  min="0" >
                                           <button  type="submit" class="add-to-cart-btn addTcart "  > <i class="fa fa-shopping-cart" ></i> add to cart</button>
                  
                                             </form>
														
													
													</div>
												</div>
												<!-- /product -->
												@endforeach
											@endforeach
		
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


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
								@if($categories !="")
							@foreach($categories as $category)
							

								<div class="input-checkbox" >
									<input type="checkbox" id="category-{{ $category->c_id}}" value="{{ $category->c_id}}" class="checkSingle">
									<label for="category-{{ $category->c_id}}">
										<span></span>
										{{ $category->c_name}}
										<small>(120)</small>
									</label>
								</div>
							
							@endforeach
							@endif

							
							</div>
						</div>
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
                   
					   <div id="productData">
						 
							<!-- product -->
							<div id="indexDel">
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
										<h3 class="product-name"><a href="#">{{$product->p_name}}</a></h3>
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
										<form class="  " role="form"  >
                                                            @csrf
                  
                     
                                         <input type="hidden" name="p_id" value="{{$product->p_id}}">
                   
                                          

                                           <input type="hidden" name="qty" value="1"  min="0" >
                                           <button  type="submit" class="add-to-cart-btn addTcart "  > <i class="fa fa-shopping-cart" ></i> add to cart</button>
                  
                                             </form>
									</div>
								</div>
							</div>
							
							<!-- /product -->
							@endforeach
							@endforeach
							<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
						</div>
						</div>
					</div>	


						

							

						

						
							
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

@endsection
