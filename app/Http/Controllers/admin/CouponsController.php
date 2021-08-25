<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Section;
use App\Models\User;
use Session;

class CouponsController extends Controller
{
    public function coupons(){
    	Session::put('page','coupons');
    	$coupons=Coupon::get();
    	return view('admin.coupons.coupons')->with(compact('coupons'));
    }
    
    public function update_coupon_status(Request $request){
    	if ($request->ajax()) {
    		$data=$request->all();
    		//echo "<pre>"; print_r($data); die();
    		if ($data['status']=='Active') {
    			$status=0;
    		}else{
    			$status=1;
    		}
    		#echo $status; die();
    		Coupon::where('id',$data['coupon_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'coupon_id'=>$data['coupon_id']]);
    	}
    }

	public function add_edit_coupon(Request $request,$id=null){
        if ($id=='') {
            $title="Add Coupon";
            $coupon=new Coupon;
            $selCats=array();
            $selUsers=array();
            $coupon_u='';
            $message="Coupon has been added successfully";
        }else{
            $coupon=Coupon::find($id);
            $title="Edit Coupon";
            $selCats=explode(',', $coupon['categories']);
            $selUsers=explode(',', $coupon['users']);
            $coupon_u=Coupon::where('id',$id)->first();
            $coupon_u=json_decode(json_encode($coupon_u));
            $message="Coupon has been updated successfully";
        }
       
        

        if ($request->isMethod('post')) {
            $data=$request->all();

            // validations
            $rules=[
                'categories'=>'required',
                'coupon_option'=>'required',
                'coupon_type'=>'required',
                'amount_type'=>'required',
                'amount'=>'required|numeric',
                'expiry_date'=>'required'
            ];
            $customMessages=[
             'categories.required'=>'Select Category',
             'coupon_option.required'=>'Select Couption Option',
             'coupon_type.required'=>'Select Coupon Type',
             'amount_type.required'=>'Select Amount Type',
             'amount.required'=>'Enter Amount',
             'amount.numeric'=>'Amount must be numeric',
             'expiry_date.required'=>'Enter Expiry Date',
            ];
           $this->validate($request,$rules,$customMessages);
            /*echo "<pre>";print_r($data); die();*/
            if (isset($data['categories'])) {
                $categories=implode(',', $data['categories']);
            }
             if (isset($data['users'])) {
                $users=implode(',', $data['users']);
            }else{
                $users="";
            }

            if ($data['coupon_option']=='Automatic') {
                $coupon_code=mt_rand(1000,10000000);
            }else{
                $coupon_code=$data['coupon_code'];
            }
           // echo $categories."<br>".$users."<br>".$coupon_code; die();
            $coupon->coupon_option=$data['coupon_option'];
            $coupon->coupon_code=$coupon_code;
            $coupon->categories=$categories;
            $coupon->users=$users;
            $coupon->coupon_type=$data['coupon_type'];
            $coupon->amount_type=$data['amount_type'];
            $coupon->amount=$data['amount'];
            $coupon->expiry_date=$data['expiry_date'];
            $coupon->status=1;
            $coupon->save();

            ////////
          
            //echo "<pre>"; print_r($data); die();
           Session::flash('succees_message',$message);
            return redirect('admin/coupons');
        }
          // Categories
        $categories=section::with('categories')->get();
        $categories=json_decode(json_encode($categories));
        // users
        $users=User::select('email')->where('status',1)->get()->toArray();

		return view('admin/coupons/add_edit_coupon')->with(compact('title','coupon','coupon_u','categories','users','selCats','selUsers'));
	}
    // public function coupons(){

    //     $coupons=Coupon::get();
    //     return view('coupons');
    // }
    public function delete_coupon($id){
        Coupon::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Coupon has been deleted successfully');
    }
}
