<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2>
                <h3 class="pull-right">Order # {{$orderDetail['id']}}</h3><br>
                <span class="pull-right">
                <?php echo DNS1D::getBarcodeHTML($orderDetail['id'], 'C39');
                 ?>

                </span><br>
                
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					{{$userDetail['name']}}<br>
    					@if(!empty($userDetail['address'])) {{$userDetail['address']}} @endif<br>
    					@if(!empty($userDetail['city']))
                        {{$userDetail['city']}} @endif<br>
                        @if(!empty($userDetail['state']))
                        {{$userDetail['state']}} @endif<br>
                        @if(!empty($userDetail['country']))
                        {{$userDetail['country']}} @endif<br>
                        @if(!empty($userDetail['pincode'])) {{$userDetail['pincode']}} @endif<br>
                        @if(!empty($userDetail['mobile']))
                        {{$userDetail['mobile']}} @endif
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					{{$orderDetail['name']}}<br>
                        {{$orderDetail['address']}}<br>
                        {{$orderDetail['city']}}<br>
                        {{$orderDetail['state']}}<br>
                        {{$orderDetail['country']}}<br>
                        {{$orderDetail['pincode']}}<br>
                        {{$orderDetail['mobile']}}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					{{$orderDetail['payment_method']}}<br>
    					{{$orderDetail['email']}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{date("F j, Y, g:i a",strtotime($orderDetail['created_at']))}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @foreach($orderDetail['orders_products'] as $pro)
    							<tr>
    								<td>
                                    Name : {{$pro['product_name']}} <br>
                                    Code : {{$pro['product_code']}} <br>
                                    Size : {{$pro['product_size']}} <br>
                                    Color : {{$pro['product_color']}} 
                                    <?php echo DNS1D::getBarcodeHTML($pro['product_code'], 'C39');
                                    // echo DNS2D::getBarcodeHTML($pro['product_code'], 'QRCODE'); ?>                       
                                    </td>
    								<td class="text-center">PKR : {{$pro['product_price']}}</td>
    								<td class="text-center">{{$pro['product_qty']}}</td>
    								<td class="text-right">PKR : <?php echo $pro['product_price']*$pro['product_qty']; ?></td>
    							</tr>
                                @endforeach
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">PKR : {{$orderDetail['grand_total']}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">PKR : {{$orderDetail['shipping_charges']}}</td>
    							</tr>
                                @if(!empty($orderDetail['coupon_amount']))
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Discount</strong></td>
                                    <td class="no-line text-right">PKR : {{$orderDetail['coupon_amount']}}</td>
                                </tr>
                                @endif
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">PKR : {{$orderDetail['grand_total']}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>