<?php
use App\Models\Product;
?>
@extends('layouts.frontLayout.front_layout')
@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active"><a href="{{url('/orders')}}">Orders</a></li>
				<li>Order #{{$orderDetail['id']}} Detail</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
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

                 @if($errors->any())
                   <div class="alert alert-danger">
                     <ul>
                      @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                      @endforeach
                     </ul>
                   </div>
                @endif
           <!-- Row Start -->
           <div class="row">
           	<div class="col-md-12">
           		<div class="section-title">
						 <h3 class="title">Order #{{$orderDetail['id']}} Detail </h3>
			    </div>
           	</div>
           </div>
            <div class="row">
            	<div class="col-md-6">
            		
					<table class="table">
						<thead>
							
						</thead>
						<tbody>
							<tr>
								<td colspan="=2" class="text-center">
									<h3>Order Detail</h3>
								</td>
							</tr>
							<tr>
								<td>Order Date</td>
								<td>{{date('d-m-Y',strtotime($orderDetail['created_at']))}}</td>
							</tr>
							<tr>
								<td>Order Status</td>
								<td>{{$orderDetail['order_status']}}</td>
							</tr>
							@if(!empty($orderDetail['courier_name']))
							<tr>
								<td>Courier Nme</td>
								<td>{{$orderDetail['courier_name']}}</td>
							</tr>
							@endif
							@if(!empty($orderDetail['tracking_number']))
							<tr>
								<td>Tracking Number</td>
								<td>{{$orderDetail['tracking_number']}}</td>
							</tr>
							@endif
							<tr>
								<td>Order Total Amount</td>
								<td>{{$orderDetail['grand_total']}}</td>
							</tr>
							<tr>
								<td>Shipping Charges</td>
								<td>{{$orderDetail['shipping_charges']}}</td>
							</tr>
							<tr>
								<td>Coupon Code</td>
								<td>{{$orderDetail['coupon_code']}}</td>
							</tr>
							<tr>
								<td>Coupon Amount</td>
								<td>{{$orderDetail['coupon_amount']}}</td>
							</tr>
							<tr>
								<td>Payment Method</td>
								<td>{{$orderDetail['payment_method']}}</td>
							</tr>
						</tbody>
						<tfoot>
							
						</tfoot>
						
					</table>
            	</div>

            	<div class="col-md-6">
            		
					<table class="table">
						<thead>
							
						</thead>
						<tbody>
							<tr>
								<td colspan="=2" class="text-center">
									<h3>Delievery Address</h3>
								</td>
							</tr>
							<tr>
								<td>Name</td>
								<td>{{$orderDetail['name']}}</td>
							</tr>
							<tr>
								<td>Address</td>
								<td>{{$orderDetail['address']}}</td>
							</tr>
							<tr>
								<td>City</td>
								<td>{{$orderDetail['city']}}</td>
							</tr>
							<tr>
								<td>State</td>
								<td>{{$orderDetail['state']}}</td>
							</tr>
							<tr>
								<td>Country</td>
								<td>{{$orderDetail['country']}}</td>
							</tr>
							<tr>
								<td>Pincode</td>
								<td>{{$orderDetail['pincode']}}</td>
							</tr>
							<tr>
								<td>Mobile</td>
								<td>{{$orderDetail['mobile']}}</td>
							</tr>
						</tbody>
						<tfoot>
							
						</tfoot>
						
					</table>
            	</div>
            </div>
           <!--  Row End -->
           
           
<br><br><br>
           <!-- Row Start -->
			<div class="row">
				
					<div class="col-md-12">
						
					     
					    <table class="table">
					    	<thead>
					    	  <tr>
					    	  	<th>Product Image</th>
					    		<th>Product Code</th>
					    		<th>Product Name</th>
					    		<th>Product Size</th>
					    		<th>Product Color</th>
					    		<th>Product quantity</th>
					    		<th></th>
					    	 </tr>
					    	</thead>
					    	<tbody>
					    		@foreach($orderDetail['orders_products'] as $detail)
					    		<tr>
					    			<td>
					    				<?php $getProMainImage=Product::getProductMainImage($detail['product_id']) ?>
					    				<a target="_blank" href="{{url('product/'.$detail['product_id'])}}"><img src="{{asset('images/admin/products/small/'.$getProMainImage)}}" alt="Main Image" width="100px"></a>
					    			</td>
					    			<td>{{$detail['product_code']}}</td>
					    			<td>{{$detail['product_name']}}</td>
					    			<td>{{$detail['product_size']}}</td>
					    			<td>{{$detail['product_color']}}</td>
					    			<td>{{$detail['product_qty']}}</td>
					    		</tr>
					    		@endforeach
					    	</tbody>
					    	<tfoot>
					    		<tr>
					    		<th></th>
					    		<th></th>
					    		<th></th>
					    		<th></th>
					    		<th></th>
					    		<th></th>
					    	 </tr>
					    	</tfoot>
					    </table>
					</div>
                                
					


			
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection