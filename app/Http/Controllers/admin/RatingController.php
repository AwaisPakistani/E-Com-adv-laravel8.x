<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Session;

class RatingController extends Controller
{
    public function ratings(){
        Session::put('page','ratings');
        $ratings=Rating::with('user','product')->where('status',1)->get();
        $ratings=json_decode(json_encode($ratings));
        //echo "<pre>"; print_r($ratings); die;
        return view('admin.ratings.ratings')->with(compact('ratings'));
    }//
    public function update_ratings_status(Request $request){
        if ($request->ajax()) {
           $data=$request->all();
            //echo "<pre>"; print_r($data); die();
           if ($data['status']=='Active') {
               $status=0;
           }else{
               $status=1;
           }
           #echo $status; die();
           Rating::where('id',$data['rating_id'])->update(['status'=>$status]);
           return response()->json(['status'=>$status,'rating_id'=>$data['rating_id']]);
       }
   }// function ends
}
