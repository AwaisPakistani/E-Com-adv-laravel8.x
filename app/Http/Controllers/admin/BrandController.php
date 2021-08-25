<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;

class BrandController extends Controller
{
    public function brands(){
        Session::put('page','brands');
    	$brands=Brand::get();
    	return view('admin.brands.brands')->with(compact('brands'));
    }

    public function update_brands_status(Request $request){
        if ($request->ajax()) {
        $data=$request->all();
         //echo "<pre>"; print_r($data); die();
        if ($data['status']=='Active') {
          $status=0;
        }else{
          $status=1;
        }
        #echo $status; die();
        Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
      }
    }

    public function add_edit_brand(Request $request,$id=null){
    	if ($id=='') {
    		$title="Add Brand";
    		$brand=new Brand;
            $brand_u='';
    		$message="Brand has been added successfully";
    	}else{
    		$title="Edit Brand";
            $brand_u=Brand::where('id',$id)->first();
            $brand_u=json_decode(json_encode($brand_u));
    		$brand=Brand::find($id);
    		$message="Brand has been updated successfully";
    	}
    	if ($request->isMethod('post')) {
    		$data=$request->all();
    		$rules=[
                'brand_name'=>'required|regex:/^[\pL\s\-]+$/u'
            ];
            $customMessages=[
             'brand_name.required'=>'Product Name is required',
             'brand_name.regex'=>'Valid name is required'
            ];
           $this->validate($request,$rules,$customMessages);
    		//echo "<pre>"; print_r($data); die();
    		$brand->name=$data['brand_name'];
    		$brand->save();
    		Session::flash('succees_message',$message);
    		return redirect('admin/brands');
    	}
    	return view('admin.brands.add_edit_brand')->with(compact('title','brand','brand_u'));
    }// function ends

    public function delete_brand($id){
        Brand::where('id',$id)->delete();
        Session::flash('succees_message','Brand has been deleted successfully');
        return redirect()->back();
    }
}
