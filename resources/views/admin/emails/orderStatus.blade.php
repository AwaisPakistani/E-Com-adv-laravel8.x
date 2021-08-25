<!DOCTYPE html>
<html>
<head>
	<title>Order Status</title>
</head>
<body>
<table style="width: 100%; color: white" bgcolor="black" >
<tr><td>&nbsp;</td></tr>
<tr><td><img style="background: white; padding: 10px;" src="{{asset('front/img/logo.png')}}" alt="Company Logo"></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Hello {{$name}}</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>Dear {{$name}}, order#{{$order_id}} has been updated to {{$order_status}} successfully. </td></tr>
@if(!empty($courier_name)&& !empty($tracking_number))
<tr><td>&nbsp;</td></tr>
Your courier name is <strong>{{$courier_name}}</strong> and tracking number is <strong>{{$tracking_number}}</strong>.
@endif
<tr><td>&nbsp;</td></tr>
<tr><td>Your order details are as below :</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
	<td>
	 <table style="width: 50%; color: black;" cellpadding="5" cellspacing="5" bgcolor="red">
	 	<tr style="color: white;">
	 		<td>Product Name</td>
	 		<td>Code</td>
	 		<td>Size</td>
	 		<td>Color</td>
	 		<td>Quantity</td>
	 		<td>Price</td>
	 	</tr>
	 	@foreach($orderDetail['orders_products'] as $order)
	 	<tr style="color: white;">
	 		<td>{{$order['product_name']}}</td>
	 		<td>{{$order['product_code']}}</td>
	 		<td>{{$order['product_size']}}</td>
	 		<td>{{$order['product_color']}}</td>
	 		<td>{{$order['product_qty']}}</td>
	 		<td>PKR : {{$order['product_price']}}</td>
	 	</tr>
	 	@endforeach
	 	<tr bgcolor="silver">
	 		<td colspan="=" align="right">Shipping Charges</td>
	 		<td>PKR : {{$orderDetail['shipping_charges']}}</td>
	 	</tr>
	 	<tr bgcolor="silver">
	 		<td colspan="=" align="right">Coupon Discount</td>
	 		<td>
	 		@if($orderDetail['coupon_amount']>0)
	 		PKR : {{$orderDetail['coupon_amount']}}
	 		@else
	 		PKR : 0.00
	 		@endif
	 	   </td>
	 	</tr>
	 	<tr bgcolor="silver">
	 		<td colspan="=" align="right">Grand Total</td>
	 		<td>PKR : {{$orderDetail['grand_total']}}</td>
	 	</tr>
	 	
	 </table>
    </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
	<td>
		<table bgcolor="red" style="padding: 15px;">
			<tr>
				<td><strong>Delievery Address</strong></td>
			</tr>
			<tr>
				<td>{{$orderDetail['name']}}</td>
			</tr>
			<tr>
				<td>{{$orderDetail['address']}}</td>
			</tr>
			<tr>
				<td>{{$orderDetail['city']}}</td>
			</tr>
			<tr>
				<td>{{$orderDetail['state']}}</td>
			</tr>
			<tr>
				<td>{{$orderDetail['country']}}</td>
			</tr>
			<tr>
				<td>{{$orderDetail['pincode']}}</td>
			</tr>
			<tr>
				<td>{{$orderDetail['mobile']}}</td>
			</tr>
		</table>
	</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>For any enqury, you can contact us at <a href="mailto:info@ecom-website.com">info@ecom-website.com</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>REgards from E-com Website</td></tr>
<tr><td>&nbsp;</td></tr>
</table>
</body>
</html>
