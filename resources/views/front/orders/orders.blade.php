@extends('layouts.frontLayout.front_layout')
@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Orders</li>

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
						<div class="section-title">
						 <h3 class="title">Orders</h3>
					    </div>
					   
					    <table class="table">
					    	<thead>
					    	  <tr>
					    		<th>Order ID</th>
					    		<th>Order Products</th>
					    		<th>Payment Method</th>
					    		<th>Grand Total</th>
					    		<th>Created On</th>
					    		<th></th>
					    	 </tr>
					    	</thead>
					    	<tbody>
					    		@foreach($orders as $order)
					    		<tr>
					    			<td>{{$order['id']}}</td>
					    			<td>
					    				@foreach($order['orders_products'] as $pro)
                                          {{$pro['product_code']}}<br>
					    				@endforeach
					    			</td>
					    			<td>{{$order['payment_method']}}</td>
					    			<td>{{$order['grand_total']}}</td>
					    			<td>{{date('d-m-Y',strtotime($order['created_at']))}}</td>
					    			<td><a href="{{url('orders/'.$order['id'])}}" class="btn btn-warning">View Detail</a></td>
					    		</tr>
					    		@endforeach
					    	</tbody>
					    	<tfoot>
					    		<tr>
					    		<th>Order ID</th>
					    		<th>Order Products</th>
					    		<th>Payment Method</th>
					    		<th>Grand Total</th>
					    		<th>Created On</th>
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