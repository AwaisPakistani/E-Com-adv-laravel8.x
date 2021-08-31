<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Session;
use Image;

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
    }//
	public function add_edit_section(Request $request,$id=null){
		if ($id=='') {
			  $title="Add Sectio";
			  $section=new Section;
			  $section_u=array();
			  $message="Section has added successfully";
		  }else{
			   $title="Update Section";
			   $section_u=Section::where('id',$id)->first();
			   $section_u=json_decode(json_encode($section_u));
			   #echo "<pre>"; print_r($category_u); die();
			   //echo "<pre>"; print_r($getCategories); die();
			   $section=Section::find($id);
			   $message="Section has updated successfully";
		  }
		  if ($request->isMethod('post')) {
			  //$data=$request->all();
			  $data=$request->except('_token');
			  //echo "<pre>"; print_r($data); die;
			  //  or without tocken
			  $data=$request->except('_token');
			  if($request->hasFile('image')){
				  $image_tmp = $data['image'];
				  if ($image_tmp->isValid()) {
					  // Upload Images after Resize
					  $extension = $image_tmp->getClientOriginalExtension();
					  $fileName = rand(111,99999).'.'.$extension;

					  $imagePathSmall="images/admin/sections/small/".$fileName;
                      $imagePathMedium="images/admin/sections/medium/".$fileName;
                      $imagePathLarge="images/admin/sections/large/".$fileName;

                      Image::make($image_tmp)->save($imagePathLarge);
                      Image::make($image_tmp)->resize(600,600)->save($imagePathMedium);
                      Image::make($image_tmp)->resize(300,300)->save($imagePathSmall);
					  $section->image = $fileName; 
				  }
			  }
			  if (empty($data['iamge'])) {
				  $data['iamge']='';
			  }
			  $section->name=$data['secton_name'];
			  $section->status=0;
			  $section->save();
  
			  Session::flash('success_message',$message);
			  return redirect()->back();
		  }
		return view('admin.sections.add_edit_section')->with(compact('section_u','title'));
	}//
	public function delete_section_image($id){
		$image_name=Section::select('image')->where('id',$id)->first();
		// Image path
		$small_image_path='images/admin/sections/small/';
		$medium_image_path='images/admin/sections/medium/';
		$large_image_path='images/admin/sections/large/';
		//check existance and delete image name and delete from folder
		if (file_exists($small_image_path.$image_name->image)) {
			unlink($small_image_path.$image_name->image);
		}
		if (file_exists($medium_image_path.$image_name->image)) {
			unlink($medium_image_path.$image_name->image);
		}
		if (file_exists($large_image_path.$image_name->image)) {
			unlink($large_image_path.$image_name->image);
		}
		// delete category image name
		Section::where('id',$id)->update(['image'=>'']);
		return redirect()->back()->with('success_message','Image has been deleted successfully');
	  }// function ends
}
