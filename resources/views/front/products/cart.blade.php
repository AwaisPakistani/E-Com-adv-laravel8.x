@extends('layouts.frontLayout.front_layout')
@section('content')

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Cart</li>
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
              <?php Session::forget('error_message'); ?>
                 @endif   

                 @if(Session::has('success_message')) 
                       <div class="alert alert-success alert-block">
                           <button type="button" class="close" data-dismiss="alert">×</button> 
                               <strong>{{ Session::get('success_message')}}</strong>
                       </div>
                       <?php Session::forget('success_message'); ?>
                 @endif
                 @if(Session::has('flash_message_warning')) 
                       <div class="alert alert-warning alert-block">
                           <button type="button" class="close" data-dismiss="alert">×</button> 
                               <strong>{!! session('flash_message_warning') !!}</strong>
                       </div>
                 @endif
	       <div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">View Cart</h3>
							</div>
							<div id="AppendCartItems">
							@include('front.products.cart_items')
						    </div>
							<div class="pull-right">
								<span>
								  <a href="{{url('/')}}" class="primary-btn">Continue Shopping</a>
								  
								  <?php 
								  if (count($usercartItems)==0) {
								  	?>
								  <a href="#" class="primary-btn">Checkout</a>
								  <?php
								   } 
								  else
								   {

								   ?>
                                  <a href="{{url('checkout')}}" class="primary-btn">Checkout >></a>
                                  <?php
                                  }
                                  ?>
								  
								  
							    </span>
							</div>
						</div>

	       </div>
	    </div>
    </div>
@endsection