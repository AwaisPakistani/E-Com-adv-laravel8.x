<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use Session;

class ShippingController extends Controller
{
    public function view_shipping_charges(){
    	Session::put('page','shipping_charges');
    	$shipping_charges=ShippingCharge::get()->toArray();
    	//dd($shipping_charges); die;
    	return view('admin.shipping.view_shipping_charges')->with(compact('shipping_charges'));
    }//
    public function edit_shipping_charges(Request $request,$id){
    	$shippingDetail=ShippingCharge::where('id',$id)->first()->toArray();
    	//dd($shippingDetail); die;
    	if ($request->isMethod('post')) {
    		$data=$request->all();
            ShippingCharge::where('id',$id)->update(['0_500g'=>$data['0_500g'],'501_1000g'=>$data['501_1000g'],'1001_2000g'=>$data['1001_2000g'],'2001_5000g'=>$data['2001_5000g'],'above_5000g'=>$data['above_5000g']]);
    		/*$shipping_charges=ShippingCharge::find($id);
    		$shipping_charges->0_500g=$data['0_500g'];
            $shipping_charges->501_1000g=$data['501_1000g'];
            $shipping_charges->1001_2000g=$data['1001_2000g'];
            $shipping_charges->2001_5000g=$data['2001_5000g'];
            $shipping_charges->above_5000g=$data['above_5000g'];
    		$shipping_charges->save();*/
    		$message="Shipping Charges updated Successfully";
    		Session::flash('success_message',$message);
    		return redirect()->back();
    	}
    	return view('admin.shipping.edit_shipping_charges')->with(compact('shippingDetail'));
    }//
    
     public function update_shipping_status(Request $request){
    	if ($request->ajax()) {
    		$data=$request->all();
    		//echo "<pre>"; print_r($data); die();
    		if ($data['status']=='Active') {
    			$status=0;
    		}else{
    			$status=1;
    		}
    		#echo $status; die();
    		ShippingCharge::where('id',$data['shipping_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'shipping_id'=>$data['shipping_id']]);
    	}
    }
}
