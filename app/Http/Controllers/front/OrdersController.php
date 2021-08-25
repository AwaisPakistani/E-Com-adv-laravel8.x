<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrdersController extends Controller
{
    public function orders(){
    	$orders=Order::with('orders_products')->where('user_id',Auth::user()->id)->orderBy('id','desc')->get()->toArray();
    	//dd($orders); die;
    	return view('front.orders.orders')->with(compact('orders'));
    }//
    public function orderDetail($id){
    	$orderDetail=Order::with('orders_products')->where('id',$id)->first()->toArray();
    	//dd($orderDetail); die();
    	return view('front.orders.order_detail')->with(compact('orderDetail'));
    }
}
