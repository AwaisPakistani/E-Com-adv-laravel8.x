@extends('layouts.frontLayout.front_layout')
@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Login / Register</li>
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
			<div class="row">
				
					<div class="col-md-6">
						<form action="{{url('/register')}}" method="post" id="register-form" class="clearfix">@csrf
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Create an Account</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Enter Name" required="">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="mobile" placeholder="Enter Mobile Number*">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Enter Email" required="">
							</div>
							<div class="form-group">									
								<input class="input" type="password" name="password" placeholder="Enter Your Password" required="">
							</div>
							<div class="form-group">							
								<input type="checkbox" name="terms" required="">
							</div>
							<div class="form-group">
								 <input type="submit" class="primary-btn" name="register" value="Create an Account">
							</div>
						</div>
					    </form>
					</div>
                                
					<div class="col-md-6">
					  <form action="{{url('/login')}}" method="post" id="login-form" class="clearfix">@csrf
                        <div class="billing-details">
							<div class="section-title">
								<h3 class="title">Already Registered?</h3>
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" required="">
							</div>

							<div class="form-group">									
								<input class="input" type="password" name="password" placeholder="Enter Your Password" required="">
							</div>
							<div class="form-group">
								 <input type="submit" class="primary-btn" name="login" value="Login">&nbsp;&nbsp;&nbsp;
								 <a href="{{url('forgot-password')}}"> Forgot Password ?</a>
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