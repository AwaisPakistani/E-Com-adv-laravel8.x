@extends('layouts.frontLayout.front_layout')
@section('content')
<?php 
use App\Models\Product;
?>
<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="{{url('/'.$productDetail['category']['category_url'])}}">{{$productDetail['category']['category_name']}}</a></li>
				<li class="active">{{$productDetail['product_name']}}</li>
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
				 @if(Session::has('error_message')) 
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ Session::get('error_message')}}</strong>
              </div>
                 @endif   

                 @if(Session::has('success_message')) 
                       <div class="alert alert-success alert-block">
                           <button type="button" class="close" data-dismiss="alert">×</button> 
                               <strong>{{ Session::get('success_message')}}</strong>
                       </div>
                 @endif
                 @if(Session::has('flash_message_warning')) 
                       <div class="alert alert-warning alert-block">
                           <button type="button" class="close" data-dismiss="alert">×</button> 
                               <strong>{!! session('flash_message_warning') !!}</strong>
                       </div>
                 @endif
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="{{asset('images/admin/products/large/'.$productDetail['main_image'])}}" alt="">
							</div>
							@foreach($productDetail['images'] as $image)
							<div class="product-view">
								<img src="{{asset('images/admin/products/large/'.$image['image'])}}" alt="">
							</div>
							@endforeach
						</div>
						<div id="product-view">
							<div class="product-view">
								<img src="{{asset('images/admin/products/small/'.$productDetail['main_image'])}}" alt="">
							</div>
							@foreach($productDetail['images'] as $image)
							<div class="product-view">
								<img src="{{asset('images/admin/products/small/'.$image['image'])}}" alt="">
							</div>
							@endforeach
						</div>
					</div>
					<form action="{{url('/add-to-cart')}}" method="post" >@csrf
					<div class="col-md-6">
						<div class="product-body">
							<input type="hidden" name="product_id" value="{{ $productDetail['id'] }}">
							<h2 class="product-name">{{$productDetail['product_name']}}</h2>
							<h3 class="product-price">PKR : <span class="getAttrPrice" style="font-weight: normal;">
							
								<?php echo $discountedPrice=Product::getDiscountedPrice($productDetail['id']); ?>

							</span>
							<del class="product-old-price">
								@if(!isset($discountedPrice))
								PKR : {{$productDetail['product_price']}}
								@endif
							</del>
							<br>
							
							
						    </h3>
						    <div class="currency_exchanges" style="font-weight:normal; font-size:20px;">
								<p>
								@foreach($getCurrencies as $currency)
								{{$currency['currency_code']}} : 
								<?php $currencyConvert=$productDetail['product_price']/$currency['currency_rate'];
                                 echo round($currencyConvert,2);
								 ?>
								 <br>
								@endforeach
							</div>
							<div>
								<div class="product-rating">
									@if(!empty($ratings))
									@php
									$totalRates=0;
									foreach($ratings as $rate){
									$totalRates=$totalRates+$rate->rating;
									
									}
									$total_reviews=count($ratings);
									$avg=$totalRates/$total_reviews;
                                    $totalAvg=round($avg);
									@endphp
									@if($totalAvg==1)
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									@elseif($totalAvg==2)
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									@elseif($totalAvg==3)
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									@elseif($totalAvg==4)
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o-empty"></i>
									@elseif($totalAvg==5)
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									@else
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									<i class="fa fa-star-o-empty"></i>
									@endif
									@endif
									
								</div>
								
								<a href="#reviews">
									@if(!empty($ratings))
									<!-- Number of reviews -->
									{{count($ratings)}} Review(s) / Add Review
									@else 
									0 Review / Add Review
									@endif
								</a>
							</div>
							<p><strong>Availability :</strong> <b>{{$total_stock}}</b> items In Stock</p>
							@if(!empty($productDetail['brand']['name']))
							<p><strong>Brand:</strong> 
							{{$productDetail['brand']['name']}}
						    </p>
							@endif
							@if(!empty($productDetail['description']))
							<p>{{$productDetail['description']}}</p>
							@endif
							<div class="product-options">
								<ul class="size-option">
									
									<select style="padding: 5px; padding-right: 20px; font-size: 15px;" name="size" id="getPrice" product_id="{{$productDetail['id']}}">
										<option value="">Select Size</option>
										@foreach($productDetail['attributes'] as $attr)
										<option>{{$attr['size']}}</option>
										@endforeach
									</select>
								</ul>
								<ul class="color-option">
									<li><span class="text-uppercase">Colour:</span></li>

									<li><a href="" style="background-color: {{$productDetail['product_color']}};">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$productDetail['product_color']}}</a></li><br>
									
									<li><span class="text-uppercase">More Colours:</span></li>
									@if(count($groupProducts)>0)
									  @foreach($groupProducts as $gp)
									  <li><a href="{{url('product/'.$gp['id'])}}" style="background-color: {{$gp['product_color']}};">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.</a></li> 
									  @endforeach
									@endif
									<!--<li class="active"><a href="#" style="background-color:#475984;"></a></li>
									<li><a href="#" style="background-color:#8A2454;"></a></li>
									<li><a href="#" style="background-color:#BF6989;"></a></li>
									<li><a href="#" style="background-color:#9A54D8;"></a></li>-->
								</ul>
							</div>

							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">QTY: </span>
									<input class="input" type="number" name="quantity">
								</div>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								<div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								</div><br><br>
								<span class="text-uppercase">Pincode:</span>
								<input style="height: 35px; width: 140px;" type="text" id="pincodeInputCheck" name="pincodeCheck" placeholder="Check Pincode">&nbsp;<button type="button" id="checkPincode" class="btn btn-default" style="border-radius: 100%; padding: 10px;">Go</button> <br>
								<span id="pinMsg"></span>
							</div>
						</div>
					</div>
				    </form>
					<div class="col-md-12">
						<div class="product-tab" id="reviews">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#description">Description</a></li>
								<li><a data-toggle="tab" href="#tab1">Details</a></li>
								<li><a data-toggle="tab" href="#tab2">Product Video</a></li>
								<li><a data-toggle="tab" href="#tab3">
									@if(!empty($ratings))
									Reviews ({{count($ratings)}})
									@else
									Reviews (0)
									@endif
								</a></li>
							</ul>
							<div class="tab-content">
								<div id="description" class="tab-pane fade in active">
									<p>{{$productDetail['description']}}
                                    
									</p>
								</div>
								<div id="tab1" class="tab-pane fade in">
									<p>
										<ol>
                                    	<li><stong>Code : </stong>{{$productDetail['product_code']}}</li>
                                    	@if(!empty($productDetail['wash_care']))
                                    	<li><stong>Wash Care : </stong>{{$productDetail['wash_care']}}</li>
                                    	@endif
                                    	@if(!empty($productDetail['fabric']))
                                    	<li><stong>Fabric : </stong>{{$productDetail['fabric']}}</li>
                                    	@endif
                                    	@if(!empty($productDetail['sleeve']))
                                    	<li><stong>Sleeve : </stong>{{$productDetail['sleeve']}}</li>
                                    	@endif
                                    	@if(!empty($productDetail['pattern']))
                                        <li><stong>Pattern : </stong>{{$productDetail['pattern']}}</li>
                                        @endif
                                        @if(!empty($productDetail['fit']))
                                        <li><stong>Fitting : </stong>{{$productDetail['fit']}}</li>
                                        @endif
                                        @if(!empty($productDetail['occassion']))
                                        <li><stong>Occassion : </stong>{{$productDetail['occassion']}}</li>	
                                        @endif
                                    </ol>
									</p>
								</div>
								<div id="tab2" class="tab-pane fade in">

									<p>
										<?php $path=$productDetail['product_video']; ?></p>
									@if(!empty($path))
									<video controls="" width="640" height="360px">
										<source src="{{url('videos/admin/products/'.$path)}}" type="video/mp4">
									</video>
									@else
									<p>Video not available.</p>
									@endif
								</div>
								<div id="tab3" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												@if(!empty($ratings))
												@foreach($ratings as $rating)
												<div class="single-review">
													<div class="review-heading">
														
														<div><a href="#"><i class="fa fa-user-o"></i> {{$rating->user->name}}</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> {{date("F j, Y, g:i a", strtotime($rating->created_at))}}</a></div>
														<div class="review-rating pull-right">
															@if($rating->rating==1)
															<i class="fa fa-star"></i>
															@elseif($rating->rating==2)
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															@elseif($rating->rating==3)
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															@elseif($rating->rating==4)
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															@elseif($rating->rating==5)
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															@else
															<i class="fa fa-star-o empty"></i>
															@endif
														</div>
													</div>
													<div class="review-body">
														<p>{{$rating->review}}</p>
													</div>
												</div>
										 		@endforeach
												@else
												<p>This product is not rated yet.</p>
												@endif

												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<!-- <p>Your email address will not be published.</p> -->
											<form action="{{url('/add-rating')}}" method="post" class="review-form" name="ratingForm" id="ratingForm">@csrf
												<!-- <div class="form-group">
													<input class="input" type="text" placeholder="Your Name" />
												</div>
												<div class="form-group">
													<input class="input" type="email" placeholder="Email Address" />
												</div> -->
												<div class="form-group">
													<input class="input" type="hidden" name="user_id" value="" />
												</div>
												<div class="form-group">
													<input class="input" type="hidden" name="product_id" value="{{$productDetail['id']}}"/>
												</div>
												<div class="form-group">
													<textarea class="input" name="review" placeholder="Your review" required></textarea>
												</div>  
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Your Rating: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Related Products</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach($relatedProducts as $rel)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<a href="{{url('/product/'.$rel['id'])}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
							@if(!empty($rel['main_image']))
							<img src="{{asset('images/admin/products/small/'.$rel['main_image'])}}" alt="">
							@else
							<img src="{{asset('images/admin/products/small/dummy.png')}}" alt="">
							@endif
						</div>
						<div class="product-body">
							<h3 class="product-price">{{$rel['product_price']}}</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">{{$rel['product_name']}}</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<a href="{{url('/product/'.$rel['id'])}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection