<?php 
use App\Models\Cart;
use App\Models\Product;
?>
@extends('layouts.frontLayout.front_layout')
@section('content')

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
	<div class="section">
		<div class="container">
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
          <form action="{{url('checkout')}}" method="post" name="checkoutForm" id="checkoutForm" >@csrf
	       <div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Checkout</h3>
							</div>
							<div id="AppendCartItems">
<br><br>

<table class="shopping-cart-table table">
	<thead>
		<tr>
			<th>
				<h3>Delievery Addresses  <a href="{{url('add-edit-delivery-address')}}" class="primary-btn pull-right" style="font-size: 15px; border-radius: 15px;">Add New</a></h3>
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach($deliveryAddresses as $address)
		<tr>
			<td>
				<span> 
				<div class="control-group">
					<input type="radio" id="address{{$address['id']}}" name="address_id" value="{{$address['id']}}"shipping_charges="{{$address['shipping_charges']}}"total_price="{{$total_price}}" coupon_amount="{{Session::get('couponAmount')}}" codPincodeCount="{{$address['codPincodeCount']}}" prepaidPincodeCount="{{$address['prepaidPincodeCount']}}">
					<label>
						{{$address['name']}} , {{$address['address']}} , {{$address['city']}} , {{$address['state']}} , {{$address['country']}} , {{$address['pincode']}} , {{$address['mobile']}}
					</label>
				</div>
               </span>
			</td>
			<td>
				<a href="{{url('add-edit-delivery-address/'.$address['id'])}}" class="btn btn-info">Edit</a>
				<a href="{{url('delete-delivery-address/'.$address['id'])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this coupon?')">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		
	</tfoot>
<!-- Cart Table -->
</table>
<br><br>
<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php $sub_total=0; $disc=0; ?>
									@foreach($usercartItems as $cart)
									<?php $getProductAttrPrice=Product::getDiscountedAttrPrice($cart['product_id'],$cart['size']); ?>
									<tr>
										<td class="thumb"><img src="{{asset('images/admin/products/small/'.$cart['product']['main_image'])}}" alt=""></td>
										<td class="details">
											<a href="#">{{$cart['product']['product_name']}}</a>
											<ul>
												<li><span>Size: {{$cart['size']}}</span></li>
												<li><span>Color: {{$cart['product']['product_color']}}</span></li>
												<li><span>Code: {{$cart['product']['product_code']}}</span></li>
											</ul>
										</td>
										@if(!empty($getProductAttrPrice['product_discount']))
										<td class="price text-center">
											<strong>PKR:<?php $price=$getProductAttrPrice['product_discount'];
                                             echo $price.'<br>';
                                             echo "Unit Discount * Quantity :";
                                             $disc=$getProductAttrPrice['discount'];
                                             echo 'PKR : '.$disc=$disc*$cart['quantity'];
											 ?> 
											</strong><br><del class="font-weak"><small>
										<?php 
                                         //$oldPrice=$getProductAttrPrice+$cart['product']['product_discount'];
                                         //echo $oldPrice;
										?>
										
										PKR:{{$getProductAttrPrice['product_price']}}
										
									    </small></del>
									    
									   </td>

									   @else
									   <td class="price text-center">
									   	<strong>
									   PKR:<?php $price=$getProductAttrPrice['product_price'];
                                           echo $price.'<br>';
                                           echo "Unit Discount * Quantity :";
                                           $disc=$getProductAttrPrice['discount'];
                                           echo 'PKR : '.$disc=$disc*$cart['quantity'];

									   ?>
									    </strong>
									   </td>
									   @endif

										<td class="qty text-center">
											<span style="font-size: 15px;">
											  {{$cart['quantity']}}
										    </span>
											<!--<input class="input" type="number" value="{{$cart['quantity']}}">-->
										</td>

										<td class="total text-center"><strong class="primary-color">
											<?php 

                                             $total=$price*$cart['quantity'];
                                             echo 'PKR : '.$total.'<br>';
                                             
                                             echo 'Discounted Total='.$sub=$total-$disc;
                                             $sub_total=$sub_total+$sub;
											?>
										</strong></td>


										


										
										
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									
									<tr>
										
									</tr>



                                    <tr>
										<th class="empty" colspan="3"></th>
										<th>SUB TOTAL</th>
										<td colspan="2" class="cpnAmnt">
										<h4>PKR : {{$total_price}} : {{$sub_total}}</h4>
										</td>
									</tr>

									
									<tr>
										<th class="empty" colspan="3"></th>
										<th>COUPON DISCOUNT</th>
										<td colspan="2" class="cpnAmnt">
										@if(!empty($cart))
											@if(Session::has('couponAmount'))
											<h4>PKR : {{Session::get('couponAmount')}}</h4>
											@else
											<h4>Amount : 0.00</h4>
											@endif
										@else
										<h4>PKR : 0.00</h4>
										@endif
										</td>
									</tr>

									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPPING CHARGES</th>
										<td colspan="2" class="cpnAmnt">
										<h4 class="shipping_charges">PKR : 0</h4>
										
										</td>
									</tr>

									<tr>
										<th class="empty" colspan="3"></th>
										<th>GRAND TOTAL</th>
										<th colspan="2" class="total grand_total">
										@if(!empty($cart))
											@if(Session::has('couponAmount'))
											<?php $grand_total=$sub_total-Session::get('couponAmount');

											echo 'PKR : '.$grand_total; ?>
                                            
											@else
                                              <?php
                                              $grand_total=$sub_total-0;
                                              echo 'PKR : '.$grand_total;
											  ?>
											@endif
										@else 
										PKR : 0.00
										@endif 
										<?php

										 Session::put('grand_total',$grand_total);?> 
										</th>
									</tr>
								</tfoot>
							</table>

						    </div>

						    <div class="pull-left">
						    	
						    		<b>Payment Methods :</b>&nbsp;&nbsp;
								<span class="codMethod">	
						    		<input type="radio" name="payment_gateway" id="COD"
									value="COD">&nbsp;&nbsp;<strong>COD</strong>
                                </span>
									&nbsp;&nbsp;&nbsp;
								  <span class="prepaidMethod">
						    		<input type="radio" name="payment_gateway" id="paypal"
									 value="paypal">&nbsp;&nbsp;<strong>Paypal</strong>
                                  </span>

						    	
						    </div>
							<div class="pull-right">
								<span>
								  <a href="{{url('/cart')}}" class="primary-btn">Back to Cart</a>
								  <button type="submit" name="checkout" class="primary-btn">Place Order </i></button>
							    </span>
							</div>
						</div>
	       </div>
	     </form>
	    </div>
    </div>
@endsection