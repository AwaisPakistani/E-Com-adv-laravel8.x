<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to E-shop!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="{{url('/orders')}}">Orders</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">FAQ</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">English (ENG)</a></li>
								<li><a href="#">Russian (Ru)</a></li>
								<li><a href="#">French (FR)</a></li>
								<li><a href="#">Spanish (Es)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						
						<a class="logo" href="{{url('/')}}">
		                 <!-- <img src="{{asset('front/img/logo.png')}}" alt=""> -->
		                  @if($setting->image)
                            <img src="{{asset('images/admin/logo/'.$setting->image)}}" />
                          @endif
		                </a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form action="{{url('/search-products')}}" method="get">@csrf 
							<input name="search" class="input search-input" type="text" placeholder="Enter your keyword">
							<select name="category_search" class="input search-categories">
								<option value="0">All Categories</option>
								@foreach($categories as $sec)
                                <optgroup label="{{$sec->name}}"></optgroup>
                                @foreach($sec->categories as $cat)
                                  <option value="{{ $cat->category_name }}">&nbsp;&nbsp;{{ $cat->category_name }}</option>
                                  @foreach($cat->sub_categories as $sub)
                                       <option value="{{ $sub->category_name }}" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $sub->category_name }}</option>
                                  @endforeach   
                                @endforeach
                                @endforeach
							</select>
							<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="#" class="text-uppercase">Login</a> / <a href="#" class="text-uppercase">Join</a>
							<ul class="custom-menu">
								<li><a href="{{url('/account')}}"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
								<!--<li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>-->
								<li><a href="{{url('/checkout')}}"><i class="fa fa-check"></i> Checkout</a></li>
								@if(Auth::check())
								<li><a href="{{url('/account')}}"><i class="fa fa-user"></i> My Account</a></li>
								<li><a href="{{url('/logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
								@else
								<li><a href="{{url('/login-register')}}"><i class="fa fa-user-plus"></i> Login / Register</a></li>
								@endif
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty totalCartItems">{{totalCartItems()}}</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span>35.20$</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										@foreach($cartItems as $item)
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="{{asset('images/admin/products/small/'.$item['product']['main_image'])}}" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">{{$cart['product']['product_price']}}<span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">{{$item['product']['product_name']}}</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
										@endforeach
										
									</div>
									<div class="shopping-cart-btns">
										<a href="{{url('/cart')}}" class="main-btn">View Cart</a>
										<a href="{{url('checkout')}}" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	