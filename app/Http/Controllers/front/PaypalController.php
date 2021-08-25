<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\Cart;
use App\Models\ProductsAttribute;
use Session;
use Auth;

class PaypalController extends Controller
{
    public function paypal(){
      if (Session::has('order_id')) {
       Cart::where('user_id',Auth::user()->id)->delete();
       $orderDetail=Order::where('id',Session::get('order_id'))->first()->toArray();
       //echo "<pre>"; print_r($orderDetail); die;
       $nameArr=explode(' ', $orderDetail['name']);
       return view('front.paypal.paypal')->with(compact('orderDetail','nameArr'));
       }else{
        return redirect('/cart');
       }
    }//
    public function PaypalSuccess(){
      if (Session::has('order_id')) {
        Cart::where('user_id',Auth::user()->id)->delete();
        return view('front.paypal.success');
        }else{
         return redirect('/cart');
        }
    }//
    public function PaypalCancel(){
      return view('front.paypal.cancel');
    }//
    public function PaypalIpn(Request $request){
      if($data['payment_status']=='Completed'){
        $order_id=Session::get('order_id');
        Order::where('id',$order_id)->update(['order_status'=>'Paid']);
        $message="Dear Customer your order '.$order_id.' has been placed successfully
        .We will intimate you once your order is shipped";
        $orderDetail=Order::with('orders_products')->where('id',$order_id)->first()->toArray();
        foreach ($orderDetail['orders_products'] as $items) {
          
            $getProductStock=ProductsAttribute::where(['product_id'=>$items['product_id'],'size'=>$items['size']])->first()->toArray();
            $newStock=$getProductStock['stock']-$items['quantity'];
            ProductsAttribute::where(['product_id'=>$items['product_id'],'size'=>$items['size']])->update(['stock'=>$newStock]);
          
        }
        $email=Auth::user()->email;
        $name=Auth::user()->name;
        $messageData=[
          'email'=>$email,
          'name'=>$name,
          'order_ID'=>$order_id,
          'orderDetail'=>$orderDetail
        ];
        Mail::send('front.emails.order',$messageData,function($message) use($email){
          $message->to($email)->subject('Order Placed-E-com Website');
       });
      }
    }//
}
