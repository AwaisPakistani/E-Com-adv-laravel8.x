<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\User;
use Session;
use Auth;


class RatingsController extends Controller
{
    public function add_rating(Request $request){
        if ($request->isMethod('post')) {
            $data=$request->except('_token');
            //echo "<pre>"; print_r($data); die;
            if (!Auth::check()) {
                $message="Please login first to rate this product";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            
            $user_id=Auth::user()->id;
            $userCount=Rating::where(['product_id'=>$data['product_id'],'user_id'=>$user_id])->count();
            //echo $userCount; die;
            if ($userCount>0) {
                $message="You have already reviewed to this product";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            $rating=new Rating;
            $rating->user_id=$user_id;
            $rating->product_id=$data['product_id'];
            $rating->review=$data['review'];
            $rating->rating=$data['rating'];
            $rating->status=1;
            $rating->save();
            
            $message="You have successfully rated this product";
            Session::flash('success_message',$message);
            return redirect()->back();
        }
    }//
}
