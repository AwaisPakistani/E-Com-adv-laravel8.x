@extends('layouts.frontLayout.front_layout')
@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active"><?php echo $categoryDetails['breadcrumbs']; ?></li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				
				<div id="aside" class="col-md-3">

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Price</h3>
						<div id="price-slider"></div>
					</div>
					<!-- aside widget -->
                    
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Color:</h3>
						<ul class="color-option">
							<li><a href="#" style="background-color:#475984;"></a></li>
							<li><a href="#" style="background-color:#8A2454;"></a></li>
							<li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
							<li><a href="#" style="background-color:#9A54D8;"></a></li>
							<li><a href="#" style="background-color:#675F52;"></a></li>
							<li><a href="#" style="background-color:#050505;"></a></li>
							<li><a href="#" style="background-color:#D5B47B;"></a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Size:</h3>
						<ul class="size-option">
							<li class="active"><a href="#">S</a></li>
							<li class="active"><a href="#">XL</a></li>
							<li><a href="#">SL</a></li>
						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					@if(!isset($_REQUEST['search']))
					<div class="aside">
						<h3 class="aside-title">Filter By Fabric:</h3>
						<ul class="size-option">
							@foreach($fabricArray as $fabric)
							<li><input class="fabric" type="checkbox" name="fabric[]" id="{{$fabric}}" value="{{$fabric}}" >&nbsp;&nbsp;{{$fabric}}</li>
							@endforeach
						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Sleeve:</h3>
						<ul class="size-option">
							@foreach($sleeveArray as $sleeve)
							<li><input class="sleeve" type="checkbox" name="sleeve[]" id="{{$sleeve}}" value="{{$sleeve}}">&nbsp;&nbsp;{{$sleeve}}</li>
							@endforeach
						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Pattern:</h3>
						<ul class="size-option">
							@foreach($patternArray as $pattern)
							<li><input class="pattern" type="checkbox" name="pattern[]" id="{{$pattern}}" value="{{$pattern}}">&nbsp;&nbsp;{{$pattern}}</li>
							@endforeach
						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Fit:</h3>
						<ul class="size-option">
							@foreach($fitArray as $fit)
							<li><input class="fit" type="checkbox" name="fit[]" id="{{$fit}}" value="{{$fit}}">&nbsp;&nbsp;{{$fit}}</li>
							@endforeach
						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter By Occassion:</h3>
						<ul class="size-option">
							@foreach($occassionArray as $occassion)
							<li><input class="occassion" type="checkbox" name="occassion[]" id="{{$occassion}}" value="{{$occassion}}">&nbsp;&nbsp;{{$occassion}}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<!-- /aside widget -->
                 
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Brand</h3>
						<ul class="list-links">
							<li><a href="#">Nike</a></li>
							<li><a href="#">Adidas</a></li>
							<li><a href="#">Polo</a></li>
							<li><a href="#">Lacost</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Top Rated Product</h3>
						<!-- widget product -->
						<div class="product product-widget">
							<div class="product-thumb">
								<img src="./img/thumb-product01.jpg" alt="">
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
							</div>
						</div>
						<!-- /widget product -->

						<!-- widget product -->
						<div class="product product-widget">
							<div class="product-thumb">
								<img src="./img/thumb-product01.jpg" alt="">
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
							</div>
						</div>
						<!-- /widget product -->
					</div>
					<!-- /aside widget -->
				</div>
				
				<!-- /ASIDE -->
                <div>
                	<h2 style="text-transform: capitalize;">{{$categoryDetails['catDetails']['category_name']}}</h2><hr>
                	<p>{{$categoryDetails['catDetails']['category_description']}}</p><br>
                </div>
				<!-- MAIN -->
				
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					@if(!isset($_REQUEST['search']))
					<div class="store-filter clearfix">
						<form action="" name="sortProducts" id="sortProducts">
						<div class="pull-left">
							<!--<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>-->
						    <input type="hidden" id="url" name="url" value="{{ $url }}">
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								
								<select class="input" name="sort" id="sort">
									    <option value="">Select</option>
									    <option value="latest_products" @if(isset($_GET['sort']) && $_GET['sort']=="latest_products") selected @endif>Latest</option>
										<option value="product_name_a_z" @if(isset($_GET['sort']) && $_GET['sort']=="product_name_a_z") selected @endif>Name A-Z</option>
										<option value="product_name_z_a" @if(isset($_GET['sort']) && $_GET['sort']=="product_name_z_a") selected @endif>Name Z-A</option>
										<option value="lowest_price" @if(isset($_GET['sort']) && $_GET['sort']=="lowest_price") selected @endif>Low Price 1st</option>
										<option value="highest_price" @if(isset($_GET['sort']) && $_GET['sort']=="highest_price") selected @endif>High Price 1st</option>
								</select>
							    
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
					    </form>
						@endif
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
								</select>
							</div>
							@if(!isset($_REQUEST['search']))
							<ul class="store-pages">
								<!--<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>-->
								@if(isset($_GET['sort']) && !empty($_GET['sort']))
								{{ $categoryProducts->appends(['sort'=>$_GET['sort']])->links() }}
								@else
								{{ $categoryProducts->links() }}
								@endif
							</ul>
							@endif
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<!-- Product Single --
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
											<span class="sale">-20%</span>
										</div>
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										<img src="./img/product01.jpg" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<h2 class="product-name"><a href="#">Proudct Name goes here</a></h2>
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
										</div>
									</div>
								</div>
							</div>
							
							<!-- /Product Single -->
                            <div class="clearfix visible-sm visible-xs"></div>
							<!-- Product Single -->
							<div class="filter_products">
							@include('front.products.ajax_products_listing')
						    </div>
							<!-- /Product Single -->

							<div class="clearfix visible-sm visible-xs"></div>

							<!-- Product Single --
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
											<span class="sale">-20%</span>
										</div>
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										<img src="./img/product03.jpg" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
										</div>
									</div>
								</div>
							</div>
							<!-- /Product Single --

							<div class="clearfix visible-md visible-lg"></div>


					
						</div>
						<!-- /row -->
					   </div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<!--<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>-->
						</div>
						<div class="pull-right">
							<!--<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>-->
							@if(!isset($_REQUEST['search']))
							<ul class="store-pages">
								@if(isset($_GET['sort']) && !empty($_GET['sort']))
								{{ $categoryProducts->appends(['sort'=>$_GET['sort']])->links() }}
								@else
								{{ $categoryProducts->links() }}
								@endif
							</ul>
							@endif
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


@endsection