<?php 
use App\Models\Cart;
use App\Models\Product;
?>
<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php $sub_total=0; $disc=0; ?>
									@foreach($usercartItems as $cart)
									<?php $getProductAttrPrice=Product::getDiscountedAttrPrice($cart['product_id'],$cart['size']); ?>
									<tr>
										<td class="thumb"><img src="{{asset('images/admin/products/small/'.$cart['product']['main_image'])}}" alt=""></td>
										<td class="details">
											<a href="#">{{$cart['product']['product_name']}}</a>
											<ul>
												<li><span>Size: {{$cart['size']}}</span></li>
												<li><span>Color: {{$cart['product']['product_color']}}</span></li>
												<li><span>Code: {{$cart['product']['product_code']}}</span></li>
											</ul>
										</td>
										@if(!empty($getProductAttrPrice['product_discount']))
										<td class="price text-center">
											<strong>PKR:<?php $price=$getProductAttrPrice['product_discount'];
                                             echo $price.'<br>';
                                             echo "Unit Discount * Quantity :";
                                             $disc=$getProductAttrPrice['discount'];
                                             echo 'PKR : '.$disc=$disc*$cart['quantity'];
											 ?> 
											</strong><br><del class="font-weak"><small>
										<?php 
                                         //$oldPrice=$getProductAttrPrice+$cart['product']['product_discount'];
                                         //echo $oldPrice;
										?>
										
										PKR:{{$getProductAttrPrice['product_price']}}
										
									    </small></del>
									    
									   </td>

									   @else
									   <td class="price text-center">
									   	<strong>
									   PKR:<?php $price=$getProductAttrPrice['product_price'];
                                           echo $price.'<br>';
                                           echo "Unit Discount * Quantity :";
                                           $disc=$getProductAttrPrice['discount'];
                                           echo 'PKR : '.$disc=$disc*$cart['quantity'];

									   ?>
									    </strong>
									   </td>
									   @endif

										<td class="qty text-center">
											<span style="font-size: 15px;">
											   
											   	<input style="width: 30px; height: 35px;" type="text" id="appendedInputButtons" value="{{$cart['quantity']}}">
											   	<button class="btnItemUpdate qtyMinus" style="background-color: blue; color: white; padding: 10px; padding-top: 5px; padding-bottom: 5px;" data_cartId="{{$cart['id']}}" >
											   -</button>
											   <button class="btnItemUpdate qtyPlus" style="background-color: blue; color: white; padding: 10px; padding-top: 5px; padding-bottom: 5px;" data_cartId="{{$cart['id']}}" >
											   +</button>
											  
										    </span>
											<!--<input class="input" type="number" value="{{$cart['quantity']}}">-->
										</td>

										<td class="total text-center"><strong class="primary-color">
											<?php 

                                             $total=$price*$cart['quantity'];
                                             echo 'PKR : '.$total.'<br>';
                                             
                                             echo 'Discounted Total='.$sub=$total-$disc;
                                             $sub_total=$sub_total+$sub;
											?>
										</strong></td>


										


										<td class="text-right"><button class="main-btn icon-btn btnItemDelete" remove_cartId="{{$cart['id']}}"><i class="fa fa-close"></i></button></td>
										
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th style="background-color:white;" colspan="3">
									      <form id="ApplyCoupon" method="post" action="javascript:void(0);" @if(Auth::check()) user="1" @endif>@csrf
										   Coupon Code : 
                                           <input type="text" name="coupon_code" style="height:35px; border-radius:10px;" id="code" placeholder="Enter Coupon Code" required=""> 
										   <button class="primary-btn" style="border-radius: 10%;">Apply</button>
										  </form>
									    </th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">PKR : {{$sub_total}}</th>
									</tr>
									<tr>
										
									</tr>
									
									<tr>
										<th class="empty" colspan="3"></th>
										<th>COUPON DISCOUNT</th>
										<td colspan="2" class="cpnAmnt">
										@if(!empty($cart))
											@if(Session::has('couponAmount'))
											<h4>PKR : {{Session::get('couponAmount')}}</h4>
											@else
											<h4>Amount : 0.00</h4>
											@endif
										@else
										<h4>PKR : 0.00</h4>
										@endif
										</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>GRAND TOTAL</th>
										<th colspan="2" class="total">
										@if(!empty($cart))
											@if(Session::has('couponAmount'))
											<?php $grand_total=$sub_total-Session::get('couponAmount');
											echo 'PKR : '.$grand_total; ?>
                                            
											@else
											  <?php
                                              $grand_total=$sub_total-0;
                                              echo 'PKR : '.$grand_total;
											  ?>
											@endif
										@else 
										PKR : 0.00
										@endif  
										</th>
									</tr>
								</tfoot>
							</table>