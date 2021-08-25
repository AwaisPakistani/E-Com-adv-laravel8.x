@extends('layouts.frontLayout.front_layout')
@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Account</li>
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
						<form action="{{url('/account')}}" method="post" id="update-account-form" class="clearfix">@csrf
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">My Account</h3>
								<h4>Enter your contact details</h4>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Enter Name" value="{{$userDetails['name']}}" required="" pattern="[A-Za-z]+">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Enter Address" value="{{$userDetails['address']}}" required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="Enter City" value="{{$userDetails['city']}}" required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="state" placeholder="Enter State" value="{{$userDetails['state']}}" required="">
							</div>
							<div class="form-group">
								<select class="input" type="text" name="country">
									<option value="">Select Country</option>
									@foreach($countries as $country)
									<option value="{{$country['country_name']}}" @if($country['country_name']==$userDetails['country']) selected="" @endif>{{$country['country_name']}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="pincode" placeholder="Enter Pincode" value="{{$userDetails['pincode']}}" required="">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="mobile" placeholder="Enter Mobile Number*" value="{{$userDetails['mobile']}}">
							</div>
							<div class="form-group">
								<input class="input" value="{{$userDetails['email']}}" readonly="">
							</div>
							<div class="form-group">
								 <input type="submit" class="primary-btn" name="account" value="Update Account">
							</div>
						</div>
					    </form>
					</div>
                                
					<div class="col-md-6">
					  <form action="{{url('/update-user-password')}}" method="post" id="update-password-form" class="clearfix">@csrf
                        <div class="billing-details">
							<div class="section-title">
								<h3 class="title">Update Password?</h3>
							</div>

							<div class="form-group">									
								<input class="input" type="password" id="current_password" name="current_password" placeholder="Enter Current Password" required=""><br>
								<span id="chkUserPwd"></span>
							</div>
							<div class="form-group">									
								<input class="input" type="password" id="new_password" name="new_password" placeholder="Enter New Password" required="">
							</div>
							<div class="form-group">									
								<input class="input" type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter Password" required="">
							</div>
							<div class="form-group">
								 <input type="submit" class="primary-btn" name="update-password" value="Update Password">
							</div>
						</div>
					  </form>
					</div>


			
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection