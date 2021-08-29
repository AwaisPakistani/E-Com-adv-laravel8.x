<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use Session;

class CurrencyController extends Controller
{
    public function currencies(){
      Session::put('page','currencies');
      $currencies=Currency::get();
      return view('admin.currencies.currencies')->with(compact('currencies'));
    }//
    public function update_currencies_status(Request $request){
    	if ($request->ajax()) {
    		$data=$request->all();
    		//echo "<pre>"; print_r($data); die();
    		if ($data['status']=='Active') {
    			$status=0;
    		}else{
    			$status=1;
    		}
    		#echo $status; die();
    		Currency::where('id',$data['currency_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'currency_id'=>$data['currency_id']]);
    	}
    }//
    public function add_edit_currency(Request $request,$id=null){
        if ($id=='') {
            $title="Add Currency";
            $currency=new Currency;
            $currency_u='';
            $message="Currency has been added successfully";
        }else{
            $currency=Currency::find($id);
            $title="Edit Currency";
            $currency_u=Currency::where('id',$id)->first();
            $currency_u=json_decode(json_encode($currency_u));
            $message="Currency has been updated successfully";
        }
       
        

        if ($request->isMethod('post')) {
            $data=$request->all();

            // validations
            $rules=[
                'currency_code'=>'required|regex:/^[\pL\s\-]+$/u',
                'currency_rate'=>'required|integer'
            ];
            $customMessages=[
             'currency_code.required'=>'Currency Code required',
             'currency_code.regex'=>'Please enter valid Currency Code',
             'currency_rate.required'=>'Currency Rate required',
             'currency_rate.numeric'=>'Currency Rate must be an integer',
            ];
           $this->validate($request,$rules,$customMessages);
            //echo "<pre>";print_r($data); die();
            
           // echo $categories."<br>".$users."<br>".$coupon_code; die();
            $currency->currency_code=$data['currency_code'];
            $currency->currency_rate=$data['currency_rate'];
            $currency->status=1;
            $currency->save();

            ////////
          
            //echo "<pre>"; print_r($data); die();
           Session::flash('success_message',$message);
            return redirect('admin/currencies');
        }

		return view('admin/currencies/add_edit_currency')->with(compact('title','currency','currency_u'));
	}//
	public function delete_currency($id){
        Currency::where('id',$id)->delete();
        Session::flash('succees_message','Currency has been deleted successfully');
        return redirect()->back();
    }//
}
