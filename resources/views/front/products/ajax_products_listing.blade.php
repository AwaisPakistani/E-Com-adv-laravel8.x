<?php
use App\Models\Product;
use App\Models\Rating;
?>
@foreach($categoryProducts as $product)

							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<a href="{{url('product/'.$product['id'])}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
										
                                  @if(isset($product['main_image']))
									<?php $image_path='images/admin/products/small/'.$product['main_image']; ?>
								  @else
								    <?php $image_path=''; ?>
								  @endif
									 @if(!empty($product['main_image']) && file_exists($image_path))
									 <img src="{{asset('images/admin/products/small/'.$product['main_image'])}}" alt="">
									 @else
									 <img src="{{asset('images/admin/products/small/dummy.png')}}" alt="Product Image">
									 @endif
									 </div>
									<div class="product-body">
										<h3 class="product-price">
                                             <?php $discountedPrice=Product::getDiscountedPrice($product['id']);; ?>
                                              @if($discountedPrice > 0)
                                              PKR : <?php echo $discountedPrice; ?>
                                              <span style="font-size: 15px;color:red;"><del>PKR : {{ $product['product_price']}}</del></span></h3>
                                              @else
                                              PKR :  {{ $product['product_price']}}
                                              @endif
										<div class="product-rating" style="font-size: 15px;">
										<?php
										$ratings=Rating::with('user')->where(['product_id'=>$product['id'],'status'=>1])->get();
										$ratings=json_decode(json_encode($ratings));
										?>
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
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        @elseif($totalAvg==2)
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        @elseif($totalAvg==3)
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        @elseif($totalAvg==4)
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        @elseif($totalAvg==5)
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        <i class="fa fa-star"></i>
								            	        @else
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	        <i class="fa fa-star-o empty"></i>
								            	   @endif
											@else
											     <i class="fa fa-star-o empty"></i>
								                 <i class="fa fa-star-o empty"></i>
								                 <i class="fa fa-star-o empty"></i>
								                 <i class="fa fa-star-o empty"></i>
								                 <i class="fa fa-star-o empty"></i>
								            @endif
										</div>
										<h2 class="product-name"><a href="#">{{ $product['product_name']}}</a></h2>
										<h4>@if(!empty($product['brand']['name'])) {{$product['brand']['name']}}  @endif</h4>
									
								       
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
											<a href="{{url('product/'.$product['id'])}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
										</div>
									</div>
								</div>
							</div>

							@endforeach