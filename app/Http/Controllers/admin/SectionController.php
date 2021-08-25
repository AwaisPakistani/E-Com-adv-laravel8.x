<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Session;

class SectionController extends Controller
{
    public function sections(){
    	Session::put('page','sections');
    	$sections=Section::get();
    	return view('admin.sections.sections')->with(compact('sections'));
    }

    public function update_section_status(Request $request){
    	if ($request->ajax()) {
    		$data=$request->all();
    		#echo "<pre>"; print_r($data); die();
    		if ($data['status']=='Active') {
    			$status=0;
    		}else{
    			$status=1;
    		}
    		#echo $status; die();
    		Section::where('id',$data['section_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
    	}
    }
}
