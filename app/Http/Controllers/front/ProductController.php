<?php

namespace App\Http\Controllers\front;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsAttribute;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\User;
use App\Models\DelieveryAddress;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\ShippingCharge;
use App\Models\OthersSetting;
use App\Models\Brand;
use App\Models\Currency;
use DB;
use Session;
use Auth;

class ProductController extends Controller
{
    public function listing(Request $request){
        Paginator::useBootstrap();
    	if ($request->ajax()) {
    		$data=$request->all();
    		$url=$data['url'];
    		//echo "<pre>"; print_r($data); die();
    		//dd($data); die();
    		$categoryCounnt=Category::where(['category_url'=>$url,'status'=>1])->count();
    	    if ($categoryCounnt > 0) {
    		//echo "Category exists"; die();
    		$categoryDetails=Category::catDetails($url);
    		// without pagination
    		//$categoryProducts=Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1)->get()->toArray();
    		// With Pagination
    		$categoryProducts=Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
            //echo $data['sort']; die();
            //echo "<pre>"; print_r($data); die();
            if (isset($data['brand']) && !empty($data['brand'])) {
            $brandIds=Brand::select('id')->whereIn('name',$data['brand'])->pluck('id');
            //dd($brandIds); die;
            $categoryProducts->whereIn('products.brand_id',$brandIds);
            }
            if (isset($data['fabric']) && !empty($data['fabric'])) {
            $categoryProducts->whereIn('products.fabric',$data['fabric']);
            }
             if (isset($data['sleeve']) && !empty($data['sleeve'])) {
            $categoryProducts->whereIn('products.sleeve',$data['sleeve']);
            }
             if (isset($data['pattern']) && !empty($data['pattern'])) {
            $categoryProducts->whereIn('products.pattern',$data['pattern']);
            }
             if (isset($data['fit']) && !empty($data['fit'])) {
            $categoryProducts->whereIn('products.fit',$data['fit']);
            }
             if (isset($data['occassion']) && !empty($data['occassion'])) {
            $categoryProducts->whereIn('products.occassion',$data['occassion']);
            }


    		if (isset($data['sort']) && !empty($data['sort'])) {
    			if ($data['sort']=='latest_products') {
    				$categoryProducts->orderBy('id','Desc');
    			}elseif ($data['sort']=='product_name_a_z') {
    				$categoryProducts->orderBy('product_name','asc');
    			}elseif ($data['sort']=='product_name_z_a') {
    				$categoryProducts->orderBy('product_name','desc');
    			}elseif ($data['sort']=='lowest_price') {
    				$categoryProducts->orderBy('product_price','asc');
    			}elseif ($data['sort']=='highest_price') {
    				$categoryProducts->orderBy('product_price','desc');
    			}
    		}else{
    			$categoryProducts->orderBy('id','desc');
    		}
    		$categoryProducts=$categoryProducts->paginate(24);
    		//dd($categoryProducts); die();
    		$showSide="show-on-click";
    		//echo "<pre>"; print_r($categoryDetails); 
    		//dd($categoryProducts); die();
            $products_filters=Product::filters_products();
            //dd($products_filters); die();
            $fabricArray=$products_filters['fabricArray'];
            $sleeveArray=$products_filters['sleeveArray'];
            $patternArray=$products_filters['patternArray'];
            $fitArray=$products_filters['fitArray'];
            $occassionArray=$products_filters['occassionArray'];
            // Brand Array
            $brandArray=Brand::select('name')->where('status',1)->pluck('name');
            //dd($brandArray); die;

    		return view('front.products.ajax_products_listing')->with(compact('categoryDetails','categoryProducts','showSide','url','fabricArray','sleeveArray','patternArray','brandArray','fitArray','occassionArray'));
    	    }else{
    	    	abort(404);
    	    }
    	}else{
        $url=Route::getFacadeRoot()->current()->uri();
    	$categoryCounnt=Category::where(['category_url'=>$url,'status'=>1])->count();
        if ((isset($_REQUEST['search']) && !empty($_REQUEST['search'])) || (isset($_REQUEST['category_search']) && !empty($_REQUEST['category_search']))) {
            $search_product=$_REQUEST['search'];
            $categoryDetails['breadcrumbs']=$search_product;
            $categoryDetails['catDetails']['category_name']=$search_product;
            $categoryDetails['catDetails']['category_description']=$search_product;
            $categoryProducts=Product::with('brand')->where(function($query)use($search_product){
                $query->where('product_name','like','%'.$search_product.'%')
                ->orWhere('product_code','like','%'.$search_product.'%')
                ->orWhere('product_color','like','%'.$search_product.'%')
                ->orWhere('description','like','%'.$search_product.'%');
            })->where('status',1);
            $categoryProducts=$categoryProducts->get();
            $page_name='';
            $showSide="show-on-click";
            return view('front.products.listing')->with(compact('categoryDetails','categoryProducts','showSide','page_name'));

        }
    	else if ($categoryCounnt > 0) {
    		//echo "Category exists"; die();
    		$categoryDetails=Category::catDetails($url);
    		// without pagination
    		//$categoryProducts=Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1)->get()->toArray();
    		// With Pagination
    		$categoryProducts=Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
    		/*if (isset($_GET['sort']) && !empty($_GET['sort'])) {
    			if ($_GET['sort']=='latest_products') {
    				$categoryProducts->orderBy('id','desc');
    			}elseif ($_GET['sort']=='product_name_a_z') {
    				$categoryProducts->orderBy('product_name','asc');
    			}elseif ($_GET['sort']=='product_name_z_a') {
    				$categoryProducts->orderBy('product_name','desc');
    			}elseif ($_GET['sort']=='lowest_price') {
    				$categoryProducts->orderBy('product_price','asc');
    			}elseif ($_GET['sort']=='highest_price') {
    				$categoryProducts->orderBy('product_price','desc');
    			}
    		}else{
    			$categoryProducts->orderBy('id','desc');
    		}*/
    		$categoryProducts=$categoryProducts->paginate(24);
    		$showSide="show-on-click";
            $meta_title=$categoryDetails['catDetails']['meta_title'];
            $meta_description=$categoryDetails['catDetails']['meta_description'];
            $meta_keywords=$categoryDetails['catDetails']['meta_keywords'];
             
    		//echo "<pre>"; print_r($categoryDetails); 
    		//dd($categoryProducts); die();
              $products_filters=Product::filters_products();
        //dd($products_filters); die();
        $fabricArray=$products_filters['fabricArray'];
        $sleeveArray=$products_filters['sleeveArray'];
        $patternArray=$products_filters['patternArray'];
        $fitArray=$products_filters['fitArray'];
        $occassionArray=$products_filters['occassionArray'];
        // Brand Filter
        $brandArray=Brand::select('name')->where('status',1)->pluck('name');
        $page_name='';
    		return view('front.products.listing')->with(compact('categoryDetails','categoryProducts','showSide','url','fabricArray','sleeveArray','patternArray','fitArray','occassionArray','page_name','meta_title','meta_description','meta_keywords','brandArray'));
    	}else{
    		abort(404);
    	}
    }// end else
    }// function

    public function product_detail($id){
        $productDetail=Product::with(['category','brand','attributes'=>function($query){
            $query->where('status',1);
        },'images'])->find($id)->toArray();

        // frelated products
        $relatedProducts=Product::where('category_id',$productDetail['category']['id'])->where('id','!=',$id)->limit(4)->inRandomOrder()->get()->toArray();
        //dd($relatedProducts); die();
        //dd($productDetail); die();
        $total_stock=ProductsAttribute::where('product_id',$id)->sum('stock');
        $groupProducts=array();
        if (!empty($productDetail['group_code'])) {
            $groupProducts=Product::select('id','product_color')->where('id','!=',$id)->where(['group_code'=>$productDetail['group_code'],'status'=>1])->get()->toArray();
            //dd($groupProducts); die;
        }
        // Currencies
        $getCurrencies=Currency::select('currency_code','currency_rate')->where('status',1)->get()->toArray();
        //dd($getCurrencies); die;
        // Seo
        $meta_title=$productDetail['meta_title'];
        $meta_description=$productDetail['meta_description'];
        $meta_keywords=$productDetail['meta_keywords'];
        return view('front.products.product_detail')->with(compact('productDetail','total_stock','relatedProducts','groupProducts','meta_title','meta_description','meta_keywords','getCurrencies'));
    }

    public function get_product_price(Request $request){
        if ($request->ajax()) {
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;
            //$get_product_price=ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->first();
            $get_discountedAttr_price=Product::getDiscountedAttrPrice($data['product_id'],$data['size']);
            //dd($get_discountedAttr_price['product_price']); die;
            /// Currencies conversion
            $getCurrencies=Currency::select('currency_code','currency_rate')->where('status',1)->get()->toArray();
            $get_discountedAttr_price['currency']="";
            foreach ($getCurrencies as $currency) {
                $get_discountedAttr_price['currency'].='<br>';
                $get_discountedAttr_price['currency'].=$currency['currency_code'];
                $get_discountedAttr_price['currency'].=' : ';
                $get_discountedAttr_price['currency'].=round($get_discountedAttr_price['final_price']/$currency['currency_rate'],2);

            }
            
            return $get_discountedAttr_price;
        }
        
    }// 

    public function add_to_cart(Request $request){
        if ($request->isMethod('post')) {
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;
            if ($data['quantity']<=0) {
                $data['quantity']=1;
            }
            if (empty($data['size'])) {
                $message="Please select size";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            //dd($data); die();
            $getProductStock=ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->first()->toArray();
            $stock=$getProductStock['stock'];
            if ($stock < $data['quantity']) {
               $msg="Required stock is not available";
               Session::flash('error_message',$msg);
               return redirect()->back();
            }

            //$countProducts=Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->count();
            

           $session_id=Session::get('session_id');
            if (empty($session_id)) {
                $session_id=Session::getId();
                Session::put('session_id',$session_id);
            }

            if (Auth::check()) {
                $countProducts=Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>Auth::user()->id])->count();
            }else{
                $countProducts=Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>Session::get('session_id')])->count();
            }
            if ($countProducts > 0) {
               $msg="Requested size product is already in cart";
               Session::flash('error_message',$msg);
               return redirect()->back();
            }
           if (Auth::check()) {
             $user_id=Auth::user()->id;
           }else{
             $user_id=0;
           }
                /*Cart::insert(['session_id'=>$session_id,'product_id'=>$data['product_id'],'size'=>$data['size'],'quantity'=>$data['quantity']]);*/
                // Two ways for insert above one and below one
                $cart=new Cart;
                $cart->session_id=$session_id;
                $cart->user_id=$user_id;
                $cart->product_id=$data['product_id'];
                $cart->size=$data['size'];
                $cart->quantity=$data['quantity'];
                $cart->save();
                $msg="Product has been added into cart successfullly";
                Session::flash('success_message',$msg);
                return redirect('/cart');
            
        }
    }//

    public function cart(Request $request){
        $usercartItems=Cart::userCartItems();
        // dd($usercartItems);; die();
        $meta_title="Shopping Cart";
        $meta_description="Shopping Cart of Shopping Website";
        $meta_keywords="Shopping cart, Shopping cart of E-com Website";
        return view('front.products.cart')->with(compact('usercartItems','meta_title','meta_description','meta_keywords'));
    }//

    public function update_cart_qty(Request $request){
        if ($request->ajax()) {
            $data=$request->all();
            //echo "<pre>"; print_r($data)
            //dd($data);
            // die();
            $cartDetails=Cart::find($data['cartId']);
            $availableStock=ProductsAttribute::select('stock')->where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size']])->first()->toArray(); 
            if ($data['qty']>$availableStock['stock']) {
                return response()->json([
                 'status'=>false,
                 'message'=>'Product stock is not available',
                 'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
                ]);
            }
            $availableSize=ProductsAttribute::where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size'],'status'=>1])->count();
            if ($availableSize==0) {
                 return Response::json(array(view('front.products.cart_items')->with(compact('userCartItems'))));
                //return response()->json([
                // 'status'=>false,
                // 'message'=>'Product size is not available',
                // 'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
                //]);
            }
            //echo $availableStock['stock']; die();
            //echo "<pre>"; print_r($data); die();
            Cart::where('id',$data['cartId'])->update(['quantity'=>$data['qty']]);
            $userCartItems=Cart::userCartItems();
            
            // For coupon Apply
            if (Session::has('couponAmount')) {
            Session::forget('couponAmount');
            }
            //return redirect()->back();
            //echo "<pre>"; print_r($usercartItems); die();
            return response()->json([
                 'status'=>true,
                 'view'=>(String)View::make('front.products.cart')->with(compact('userCartItems'))
             ]);
           // $response->assertJsonPath('front.products.cart', 'userCartItems'); 
                      
        }
    }//

    public function delete_cart_item(Request $request){
      if ($request->ajax()) {
          $data=$request->all();
          //echo "<pre>"; print_r($data); die();
          Cart::where('id',$data['cartId'])->delete();
          // For coupon Apply
            if (Session::has('couponAmount')) {
            Session::forget('couponAmount');
            }
          $userCartItems=Cart::userCartItems();
          /*return Response::json(array(view('front.products.cart')->with(compact('userCartItems'))));*/
         // return Response::json(array('view' => View::make('front.products.cart',array('userCartItems'=>$StruserCartItems))->render()));
          return response()->json([
           'status'=>true,
           'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))]);
           // ]);
      }
    }//
    public function apply_coupon(Request $request){
      if ($request->ajax()) {
          $data=$request->all();
          //echo "<pre>";print_r($data); die;
          $couponCount=Coupon::where('coupon_code',$data['code'])->count();
          if ($couponCount==0) {
            Session::forget('couponCode');
            Session::forget('couponAmount');
            //echo "<script>alert('This coupon is not valid')</script>";
              return response()->json(['status'=>false,'message'=>'This coupon is not valid to apply :-)']);
          }else{
            // For other checks

            // Coupon is anactive
            $couponDetails=Coupon::where('coupon_code',$data['code'])->first();

            if ($couponDetails->status==0) {
                $message='This coupon is not active';
            }
            // for expired coupon
            $expiredCoupon=$couponDetails->expiry_date;
            $current_date=date('Y-m-d');
            if ($expiredCoupon<$current_date) {
                $message='This Coupon has expired';
            }
            // For single time coupon code
            if ($couponDetails->coupon_type=='Single Time') {
                $couponCount=Order::where(['coupon_code'=>$data['code'],'user_id'=>Auth::user()->id])->count();
                if ($couponCount>=1) {
                    $message="This Coupon Code is already availed by you.";
                }
            }
            // Check categories for coupons
            $catArr=explode(',', $couponDetails->categories);
            $usercartItems=Cart::userCartItems();
            
            // Check users for coupons
            if (!empty($couponDetails->users)) {
            $userArr=explode(',',$couponDetails->users);
            foreach ($userArr as $key => $user) {
                $getUserID=User::select('id')->where('email',$user)->first()->toArray();
                $userID[]=$getUserID['id'];
               }
            }
            

            $total_amount=0;
            foreach ($usercartItems as $key => $item) {
                // for categories
                if (!in_array($item['product']['category_id'], $catArr)) {
                    $message="This Coupon code is not for one of the selected categories";
                }
                if (!empty($couponDetails->users)) {
                // users

                    if (!in_array($item['user_id'], $userID)) {
                        $message="This Coupon code is not for you";
                    }
                }
                $attrPrice=Product::getDiscountedAttrPrice($item['product_id'],$item['size']);
                //echo $attrPrice['final_price']; die;
                //echo $item['quantity']; die;
                 $total_amount=$total_amount+($attrPrice['final_price']*$item['quantity']); 
            }
            //echo $item['quantity']; die;
             //echo $total_amount; die;
            //echo $total_amount; die;
            if (isset($message)) {
                return response()->json(['status'=>false,'message'=>$message]);
            }else{
                //echo "Coupon can be successfullly redeemed"; die;

                if ($couponDetails->amount_type=="Fixed") {
                    $couponAmount=$couponDetails->amount;
                }else{
                    $couponAmount=$total_amount*($couponDetails->amount/100);
                }
                //echo $couponAmount; die;
                //Session::put('total_amount',$total_amount);
                //echo $couponAmount; die;

                Session::put('couponAmount',$couponAmount);
                Session::put('couponCode',$data['code']);
                
                

                $message="coupon code successfullly applied";
                return response()->json(['status'=>true,'message'=>$message,'couponAmount'=>$couponAmount]);
            }
          }
      }
    }//
    public function checkout(Request $request){
        $usercartItems=Cart::userCartItems();
        if (count($usercartItems)==0) {
            $message="Shopping Cart is empty. So Please add products to Checkout";
            Session::put('error_message',$message);
            return redirect('/cart');
        }
       
        $total_price=0;
        $total_weight=0;
        foreach ($usercartItems as $item) {
           // echo "<pre>"; print_r($item); die;
         $product_weight=$item['product']['product_weight'];
         $total_weight=$total_weight+($product_weight*$item['quantity']);
         $attrPrice=Product::getDiscountedAttrPrice($item['product_id'],$item['size']);
         $total_price=$total_price+($attrPrice['final_price']*$item['quantity']);
         //echo "<pre>"; print_r($total_weight); die;
        }
        $CartSetting=OthersSetting::where('id',1)->first()->toArray();
        // Restriction for Minimum amount
        if ($total_price<$CartSetting['min_cart_value']) {
            $error_message="MInimum Cart amount must be ". $CartSetting['min_cart_value']." rupees";
            Session::flash('error_message',$error_message);
            return redirect()->back();
        }
        if ($total_price>$CartSetting['max_cart_value']) {
            $error_message="Maximum Cart amount must be ". $CartSetting['max_cart_value']." rupees";
            Session::flash('error_message',$error_message);
            return redirect()->back();
        }
        //echo "<pre>"; print_r($total_weight); die;

        //echo $total_weight; die;
         $deliveryAddresses=DelieveryAddress::deliveryAddresses();
        //dd($deliveryAddresses); die;

        //echo "<pre>"; print_r($deliveryAddresses); die;
        // dd($usercartItems);; die();
        foreach ($deliveryAddresses as $key => $value) {
         $shipping_charges=ShippingCharge::getShippingCharges($total_weight,$value['country']);
         $deliveryAddresses[$key]['shipping_charges']=$shipping_charges;
         
         $deliveryAddresses[$key]['codPincodeCount']=DB::table('cod_pincodes')->where('pincodes',$value['pincode'])->count();
         $deliveryAddresses[$key]['prepaidPincodeCount']=DB::table('prepaid_pincodes')->where('pincodes',$value['pincode'])->count();

        }
        //echo "<pre>"; print_r($deliveryAddresses); die;
        if ($request->isMethod('post')) {
            $data=$request->all();
            //dd($data); die();
            // website securty checks
            foreach ($usercartItems as $key => $cart) {
                // To check if product is not available or disabled
                $product_status=Product::getProductStatus($cart['product_id']);
                if ($product_status==0) {
                    Product::deleteCartProduct($cart['product_id']);
                    $message=$cart['product']['product_name']." is not available for sale now. So it has removed from your cart";
                    Session::flash('error_message',$message);
                    return redirect('/cart');
                }
                // To check if stock is not available
                $product_stock=Product::getProductStock($cart['product_id'],$cart['size']);
                if ($product_stock==0) {
                    $message="Product ".$cart['product']['product_name']." of selected size is not available for sale now. So remove this product from cart";
                    Session::flash('error_message',$message);
                    return redirect('/cart');
                }
                // To chck disabled or deleted proudct's attribute
                $productAttributeCount=Product::getAttributeCoount($cart['product_id'],$cart['size']);
                if ($productAttributeCount==0) {
                    $message="Product ".$cart['product']['product_name']." of selected size is not available for sale now. So remove this product from cart";
                    Session::flash('error_message',$message);
                    return redirect('/cart');
                }
                // To check if category if disabled
                $getCategoryStatus=Product::getCategoryStatus($cart['product']['category_id']);
                if ($getCategoryStatus==0) {
                    $message="Category of Product ".$cart['product']['product_name']." is not available for sale now. So remove this product from cart";
                    Session::flash('error_message',$message);
                    return redirect('/cart');
                }
            }
            //echo Session::get('grand_total');
            if (empty($data['address_id'])) {
                $message="Please select address id";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            if (empty($data['payment_gateway'])) {
                $message="Please select Payment Method";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            //print_r($data); die;
            if ($data['payment_gateway']=='COD') {
                $payment_method='COD';
            }else{
                $payment_method='Prepaid';
            }
            //echo $data['address_id']; die;
            $deliveryAddresses=DelieveryAddress::where('id',$data['address_id'])->first()->toArray();
            // get shipping charges
            $shipping_charges=ShippingCharge::getShippingCharges($total_weight,$deliveryAddresses['country']); 
            $grand_total=$total_price+$shipping_charges-Session::get('couponAmount');
            // insert grand_toatal in session
            Session::put('grand_total',$grand_total);
            //dd($grand_total); die;

            DB::beginTransaction();
            //dd($deliveryAddresses); die;
            $order=new Order;
            $order->user_id=Auth::user()->id;
            $order->name=$deliveryAddresses['name'];
            $order->address=$deliveryAddresses['address'];
            $order->city=$deliveryAddresses['city'];
            $order->state=$deliveryAddresses['state'];
            $order->country=$deliveryAddresses['country'];
            $order->pincode=$deliveryAddresses['pincode'];
            $order->mobile=$deliveryAddresses['mobile'];
            $order->email=Auth::user()->email;
            $order->shipping_charges=$shipping_charges;
            $order->coupon_code=Session::get('couponCode');
            $order->coupon_amount=Session::get('couponAmount');
            $order->order_status='New';
            $order->payment_method=$payment_method;
            $order->payment_gateway=$data['payment_gateway'];
            $order->grand_total=Session::get('grand_total');
            $order->save();

            $order_id=DB::getPdo()->lastInsertId();
            $cartItems=Cart::where('user_id',Auth::user()->id)->get()->toArray();
            foreach ($cartItems as $key => $items) {
                $cartItem=new OrdersProduct;
                $cartItem->order_id=$order_id;
                $cartItem->user_id=Auth::user()->id;

                $getProductDetails=Product::select('product_name','product_code','product_color')->where('id',$items['product_id'])->first()->toArray();
                $cartItem->product_id=$items['product_id'];
                $cartItem->product_name=$getProductDetails['product_name'];
                $cartItem->product_code=$getProductDetails['product_code'];
                $cartItem->product_color=$getProductDetails['product_color'];
                $cartItem->product_size=$items['size'];

                $getDiscountedAttrPrice=Product::getDiscountedAttrPrice($items['product_id'],$items['size']);

                $cartItem->product_price=$getDiscountedAttrPrice['final_price'];
                $cartItem->product_qty=$items['quantity']; 
                $cartItem->save();
                if ($data['payment_gateway']=='COD') {
                  $getProductStock=ProductsAttribute::where(['product_id'=>$items['product_id'],'size'=>$items['size']])->first()->toArray();
                  $newStock=$getProductStock['stock']-$items['quantity'];
                  ProductsAttribute::where(['product_id'=>$items['product_id'],'size'=>$items['size']])->update(['stock'=>$newStock]);
                }
            }
            Cart::where('user_id',Auth::user()->id)->delete();
            Session::put('order_id',$order_id);
            DB::commit();


            if ($data['payment_gateway']=="COD") {
                $orderDetail=Order::with('orders_products')->where('id',$order_id)->first()->toArray();
                //dd($orderDetail); die;
                //$userDetail=User::where('id',$orderDetail['user_id'])->first()->toArray();
                $email=Auth::user()->email;
                $messageData=[
                   'email'=>$email,
                   'name'=>Auth::user()->name,
                   'order_id'=>$order_id,
                   'orderDetail'=>$orderDetail

                ];
                Mail::send('front.emails.order',$messageData,function($message) use($email){
                   $message->to($email)->subject('Order Placed-E-com Website');
                });
                return redirect('/thanks');
            }elseif($data['payment_gateway']='Paypal'){
                // 
                return redirect('/paypal');
            }else{
                echo "Prepaid method";
            }
            $message="Order has been placed";
            Session::flash('success_message',$message);
            return redirect('/cart');
        }
        $meta_title="Checkout Page";
        
        //dd($deliveryAddresses); die;
        return view('front.products.checkout')->with(compact('usercartItems','deliveryAddresses','total_price','meta_title'));
    }//
    public function thanks(Request $request){
       if (Session::has('order_id')) {
       Cart::where('user_id',Auth::user()->id)->delete();
       return view('front.products.thanks');
       }else{
        return redirect('/cart');
       }
    }//
    public function add_edit_delivery_address(Request $request, $id=null){
       if ($id=="") {
           $title="Add Delivery Address";
           $button="Add";
           $message="Your address have been added successfully";
           $address=new DelieveryAddress;
       }else{
           $title="Edit Delivery Address";
           $button="Update";
           $message="Your address have been updated successfully";
           $address=DelieveryAddress::find($id);
       }
       if ($request->isMethod('post')) {
           $data=$request->all();
           //dd($data); die;
           $rules=[
                'name'=>'required|regex:/^[\pL\s\-]+$/u|min:3',
                'mobile'=>'required|numeric|digits:11',
                'address'=>'required|min:20',
                'city'=>'required|regex:/^[\pL\s\-]+$/u|min:5',
                'state'=>'required|regex:/^[\pL\s\-]+$/u|min:5',
                'country'=>'required',
                'pincode'=>'required|numeric|digits:5',
            ];
            $customMessages=[    
             'name.required'=>'Name is required',
             'name.regex'=>'Valid name is required',
             'name.min'=>'Name must be atleast 3 characters',
             'mobile.required'=>'Mobile number is required',
             'mobile.numeric'=>'Valid Mobile number is required',
             'mobile.digits'=>'You mobile number must be atleast 11 digits',
             'address.required'=>'Address is required',
             'address.min'=>'Address must be atleast 20 characters',
             'city.required'=>'City is required',
             'city.regex'=>'Valid City name is required',
             'city.min'=>'City must be atleast 5 characters',
             'state.required'=>'State is required',
             'state.regex'=>'Valid State name is required',
             'state.min'=>'State must be atleast 5 characters',
             'country.required'=>'Country is required',
             'pincode.required'=>'Pincode is required',
             'pincode.numeric'=>'Valid pincode is required',
             'pincode.digits'=>'You pincode must be atleast 5 digits',

            ];
           $this->validate($request,$rules,$customMessages);

        //$user=DelieveryAddress::find($user_id);
        $address->user_id=Auth::user()->id;
        $address->name=$data['name'];
        $address->address=$data['address'];
        $address->city=$data['city'];
        $address->state=$data['state'];
        $address->country=$data['country'];
        $address->pincode=$data['pincode'];
        $address->mobile=$data['mobile'];
        $address->save();
        
        Session::flash('success_message',$message);
        return redirect()->back();
       }
       $countries=Country::where('status',1)->get()->toArray();
       return view('front.products.add_edit_delivery_address')->with(compact('title','countries','button','address'));
    }//
    public function delete_delivery_address($id){
         DelieveryAddress::where('id',$id)->delete();
         return redirect()->back()->with('success_message','Delivery Address has been deleted successfully');
    }//
    public function checkPincode(Request $request){
        if ($request->isMethod('post')) {
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;
            if (is_numeric($data['pincode']) && $data['pincode']>0 && round($data['pincode'],0)) {
                $codPincodeCount=DB::table('cod_pincodes')->where('pincodes',$data['pincode'])->count();
                $prepaidPincodeCount=DB::table('prepaid_pincodes')->where('pincodes',$data['pincode'])->count();
                if ($codPincodeCount==0 && $prepaidPincodeCount==0) {
                echo "<label style='color:red;'>This pincode is not available for delivery</label>";
                }else{
                    echo "This pincode is available for delivery";
                }
        
            }else{
                echo "<label style='color:red;'>This pincode is not valid</label>";
            }
        }
    }//
    

}
