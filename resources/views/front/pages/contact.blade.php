@extends('layouts.frontLayout.front_layout')
@section('content')

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Contact Us</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
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

                 @if($errors->any())
                   <div class="alert alert-danger">
                     <ul>
                      @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                      @endforeach
                     </ul>
                   </div>
                @endif
    </div>
    <!-- MAIN SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="section-title">
						 <h3 class="title">Contact Us</h3>
				</div>
                <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                       <div class="contacts">
                            <h4>Contact Details</h4><br>
                            <strong>Address : </strong>Muhammadi Town Sohan<br>
                             Islamabad Pakistan.<br><br>
                            <strong>Mobile#1 : </strong>+92-300-3333333<br>
                            <strong>Mobile#2 : </strong>+92-300-3333333<br><br>
                            <strong>Email 1 : </strong>info@eshop.com<br>
                            <strong>Email 2 : </strong>eshop@gmail.com<br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Contact Form</h4><br>
                        <form action="{{url('/contact')}}" method="post" id="checkout-form" class="clearfix">@csrf
                    
                        <div class="billing-details">
                            
                            <div class="form-group">
                                <input class="input" type="text" name="name" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="subject" placeholder="subject">
                            </div>
                            <div class="form-group">
                                <textarea style="width: 100%; padding: 15px;" rows="3" name="message" placeholder="Enter Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn primary-btn">Send</button>
                            </div>
                           
                            
                        </div>
                    

                  

                   
                </form>                    </div>
                </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /MAIN SECTION -->
@endsection