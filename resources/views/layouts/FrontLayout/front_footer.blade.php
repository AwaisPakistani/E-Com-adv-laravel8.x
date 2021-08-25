<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="{{url('/')}}">
		                      <!-- <img src="{{asset('front/img/logo.png')}}" alt=""> -->
		                      @if($setting->image)
                                <img src="{{asset('images/admin/logo/'.$setting->image)}}"    />
                              @endif
		                    </a>
						</div>
						<!-- /footer logo -->
                        @if($setting->about)
                             <p>{{$setting->about}}</p>
                        @endif
                        
                        
						<!-- footer social -->
						<ul class="footer-social">
							
							<!-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li> -->
							@foreach($setting->social as $key=>$social)

                              <li><a href="{{$social}}"><i class="fa fa-{{$icons[$key]}}"></i></a></li>
                            @endforeach
						</ul>

						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="{{url('/account')}}">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
							<!--<li><a href="#">Compare</a></li>-->
							<li><a href="{{url('/checkout')}}">Checkout</a></li>
							@if(Auth::check())
								<li><a href="{{url('/account')}}"> My Account</a></li>
								<li><a href="{{url('/logout')}}"> Logout</a></li>
						    @else
								<li><a href="{{url('/login-register')}}"></i> Login / Register</a></li>
							@endif
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							@if(!empty($pages))
							@foreach($pages as $page)
							<li><a href="{{$page->url}}">{{$page->title}}</a></li>
		                    @endforeach	
		                    @endif						
		                    <li><a href="{{url('contact')}}">Contact Us</a></li>
							
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>