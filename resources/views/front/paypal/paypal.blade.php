@extends('layouts.frontLayout.front_layout')
@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Paypal</li>
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
			<div class="row">
				
					<div class="col-md-12">
						<h1>Thanks</h1>
						<div class="text-center">
							<h3>Your order has been placed!</h3>
							<h4>Your order number is {{Session::get('order_id')}} and total payable total amount is PKR:  {{Session::get('grand_total')}}</h4>
							<H4>Please make payment by clicking on below payment button.</H4>
							<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                              <input type="hidden" name="cmd" value="_xclick">
                              <input type="hidden" name="business" value="sb-otfn57078565@business.example.com">
                              <input type="hidden" name="item_name" value="{{Session::get('order_id')}}">
                              <input type="hidden" name="item_number" value="MEM32507725{{Session::get('order_id')}}">
                              <input type="hidden" name="amount" value="{{round(Session::get('grand_total'),2)}}">
                              <input type="hidden" name="tax" value="1">
                              <input type="hidden" name="quantity" value="1">
                              <input type="hidden" name="currency_code" value="USD">

                              <!-- Enable override of buyers's address stored with PayPal . -->
                              <input type="hidden" name="address_override" value="1">
                              <!-- Set variables that override the address stored with PayPal. -->
                              <input type="hidden" name="first_name" value="{{$nameArr[0]}}">
                              @if(!empty($nameArr[1]))
                              <input type="hidden" name="last_name" value="{{$nameArr[1]}}">
                              @endif
                              <input type="hidden" name="address1" value="{{$orderDetail['address']}}">
                              <input type="hidden" name="city" value="{{$orderDetail['city']}}">
                              <input type="hidden" name="email" value="{{$orderDetail['email']}}">
                              <input type="hidden" name="state" value="{{$orderDetail['state']}}">
                              <input type="hidden" name="mobile" value="{{$orderDetail['mobile']}}">
                              <input type="hidden" name="zip" value="{{$orderDetail['pincode']}}">
                              <input type="hidden" name="country" value="{{$orderDetail['country']}}">
                              <input type="hidden" name="return" value="{{url('paypal/success')}}">
                              <input type="hidden" name="cancel" value="{{url('paypal/cancel')}}">
                              <input type="hidden" name="cancel" value="{{url('paypal/ipn')}}">
                              <input type="image" name="submit"
                              src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                              alt="PayPal - The safer, easier way to pay online">
                            </form>
						</div>

					</div>
                        <?php
                          Session::forget('order_id');
                          Session::forget('grand_total');
                          Session::forget('couponCode');
                          Session::forget('couponAmount');
                        ?>        
					


			
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection