@extends('layouts.frontLayout.front_layout')
@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Delievery Address</li>
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
				
					<div class="col-md-6">
						<form @if(empty($address['id'])) action="{{url('/add-edit-delivery-address')}}" @else action="{{url('/add-edit-delivery-address/'.$address['id'])}}" @endif method="post" id="update-account-form" class="clearfix">@csrf
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">{{$title}}</h3>
								
							</div>
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Enter Name"  required="" @if(isset($address['name'])) value="{{$address['name']}}" @else value="{{old('name')}}" @endif>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Enter Address" @if(isset($address['name'])) value="{{$address['address']}}" @else value="{{old('address')}}" @endif required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="Enter City" @if(isset($address['city'])) value="{{$address['city']}}" @else value="{{old('city')}}" @endif required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="state" placeholder="Enter State" @if(isset($address['state'])) value="{{$address['state']}}" @else value="{{old('state')}}" @endif required="">
							</div>
							<div class="form-group">
								<select class="input" type="text" name="country" required="">
									<option value="">Select Country</option>
									@foreach($countries as $country)
									<option value="{{$country['country_name']}}" @if($country['country_name']==$address['country']) selected="" @elseif($country['country_name']==old('country')) selected="" @endif>{{$country['country_name']}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="pincode" placeholder="Enter Pincode" @if(isset($address['pincode'])) value="{{$address['pincode']}}" @else value="{{old('pincode')}}" @endif required="">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="mobile" placeholder="Enter Mobile Number*" @if(isset($address['mobile'])) value="{{$address['mobile']}}" @else value="{{old('mobile')}}" @endif>
							</div>
							
							<div class="form-group">
								 <input type="submit" class="primary-btn" name="account" value="{{$button}}">
								 
								 <a href="{{url('checkout')}}" class="primary-btn">Back to Checkout</a>
							</div>
						</div>
					    </form>
					</div>
                                
					<div class="col-md-6">
					  
					</div>


			
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection