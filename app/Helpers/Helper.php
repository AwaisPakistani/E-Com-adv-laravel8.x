<?php 
use App\Models\Cart;
use App\Models\Rating;
use App\Models\Product;
function totalCartItems(){
	if (Auth::check()) {
		$user_id=Auth::user()->id;
		$totalCartItems=Cart::where('user_id',$user_id)->sum('quantity');
	}else{
        $session_id=Session::get('session_id');
        $totalCartItems=Cart::where('session_id',$session_id)->sum('quantity');
	}
	return $totalCartItems;
}//
function totalPrice(){
	$cart=Cart::userCartItems();
	//dd($cart); die;
	$sub_total=0;$disc=0;
	foreach ($cart as $key) {
		$getProductAttrPrice=Product::getDiscountedAttrPrice($key['product_id'],$key['size']);
		//dd($getProductAttrPrice); die;
		$price=$getProductAttrPrice['product_price'];
	    $disc=$getProductAttrPrice['discount'];
	    $disc=$disc*$key['quantity'];

		$total=$price*$key['quantity'];
        $sub=$total-$disc;
        $sub_total=$sub_total+$sub;

		//dd($totalPrice); die;
		//echo $totalPrice; die;
	}
	
	return $sub_total;
}//
function headerCart(){
	$usercartItems=Cart::userCartItems();

	foreach($usercartItems as $cart){    
		                                
									     echo $item='<div class="product product-widget">
											<div class="product-thumb">
											<img src="asset("images/admin/products/small/".$cart["product"]["main_image"])" alt="image">
											</div>
											<div class="product-body">
												<h3 class="product-price">
												'.$cart['product']['product_price'].'
												<span class="qty">x
												'.$cart['quantity'].'
												</span></h3>
												<h2 class="product-name"><a href="#">
												'.$cart['product']['product_name'].'
												</a></h2>
												<h2 class="product-name"><a href="#">Size :
												'.$cart['size'].'
											    </a></h2>
											</div>
										</div>';
	}
	
}
function ratings(){
	$prId=Product::select('id')->first()->toArray();
	//echo print_r($prId); die;
	$ratings=Rating::with('user')->where(['product_id'=>$prId['id'],'status'=>1])->get();
	$ratings=json_decode(json_encode($ratings));
	//echo print_r($ratings); die;
	if (!empty($ratings)) {
		$totalRates=0;
		foreach($ratings as $rate){
		$totalRates=$totalRates+$rate->rating;			
		}
		$total_reviews=count($ratings);
		$avg=$totalRates/$total_reviews;
		$totalAvg=round($avg);
		 if($totalAvg==1){
			echo $totalAvg ='
			<i class="fa fa-star"></i>
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>';
	     }
	     elseif($totalAvg==2){
			echo $totalAvg ='
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>';
	     }elseif($totalAvg==3){
			echo $totalAvg ='
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>';
	     }elseif($totalAvg==4){
			echo $totalAvg ='
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star-o-empty"></i>';
	     }elseif($totalAvg==5){
			echo $totalAvg ='
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>';
	     }else{
			echo $totalAvg ='
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>
			<i class="fa fa-star-o-empty"></i>';
	     }
	}else{
		    echo $totalAvg ='
		    <i class="fa fa-star-o-empty"></i>
		    <i class="fa fa-star-o-empty"></i>
		    <i class="fa fa-star-o-empty"></i>
		    <i class="fa fa-star-o-empty"></i>
		    <i class="fa fa-star-o-empty"></i>';
	}
	return $totalAvg;

}//