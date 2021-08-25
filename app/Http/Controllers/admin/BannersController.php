<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Session;
use Image;

class BannersController extends Controller
{
    public function banners(){

      Session::put('page','banners');
    	$banners=Banner::get()->toArray();
    	//dd($banners); die();
    	return view('admin.banners.banners')->with(compact('banners'));
    }// 

    public function update_baneer_status(Request $request){
    	 if ($request->ajax()) {
        $data=$request->all();
         //echo "<pre>"; print_r($data); die();
        if ($data['status']=='Active') {
          $status=0;
        }else{
          $status=1;
        }
        //echo $status; die();
        Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'banner_id'=>$data['banner_id']]);
        }
    }

    public function add_edit_banner(Request $request,$id=null){
      if ($id=='') {
        $title="Add Banner Image";
        $banner=new Banner;
        $banner_u=array();
        $getBanners=array();
        $message="Banner added successfully";
      }else{
        $title="Edit Banner Image";
        $banner_u=Banner::where('id',$id)->first();
        $banner_u=json_decode(json_encode($banner_u));
        #echo "<pre>"; print_r($category_u); die();
        $getBanners=Banner::get();
        $getBanners=json_decode(json_encode($getBanners));
        //echo "<pre>"; print_r($getCategories); die();
        $banner=Banner::find($id);
        $message="Banner updated successfully";
      }
      if ($request->isMethod('post')) {
        $data=$request->all();
         $rules=[
                'banner_title'=>'required|regex:/^[\pL\s\-]+$/u',
                'banner_alt'=>'required|regex:/^[\pL\s\-]+$/u',
                'banner_link'=>'required',
                'banner_image'=>'image'
            ];
            $customMessages=[
             'banner_title.required'=>'Title is required',
             'banner_title.regex'=>'Valid title is required',
             'banner_alt.required'=>'Alt is required',
             'banner_alt.regex'=>'Valid alt is required',
             'banner_link.required'=>'Link is required',
             'banner_image.image'=>'Valid image is required'
            ];
        $this->validate($request,$rules,$customMessages);
        if ($request->hasFile('banner_image')) {
               $image_tmp=$request->file('banner_image');
               if ($image_tmp->isValid()) {
                   $Org_name=$image_tmp->getClientOriginalName();
                   $ext=$image_tmp->getClientOriginalExtension();
                   $imageName=$Org_name."-".rand(111,99999).'.'.$ext;
                   $imagePathSmall="images/admin/banners/small/".$imageName;
                   $imagePathMedium="images/admin/banners/medium/".$imageName;
                   $imagePathLarge="images/admin/banners/large/".$imageName;

                   Image::make($image_tmp)->save($imagePathLarge);
                   Image::make($image_tmp)->resize(600,600)->save($imagePathMedium);
                   Image::make($image_tmp)->resize(300,300)->save($imagePathSmall);
                   $banner->image=$imageName;
               }
            }
        $banner->title=$data['banner_title'];
        $banner->link=$data['banner_link'];
        $banner->alt=$data['banner_alt'];
        $banner->status=1;
        $banner->save();
        Session::flash('success_message',$message);
        return redirect('admin/banners');

      }
      return view('admin.banners.add_edit_banner')->with(compact('title','banner_u'));
    } //

    public function delete_banner($id){
      $image_name=Banner::where('id',$id)->first();
      //echo "<pre>"; print_r($image_name); die();
      // Image path
      $small_image_path='images/admin/banners/small/';
      $medium_image_path='images/admin/banners/medium/';
      $large_image_path='images/admin/banners/large/';
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

      Banner::where('id',$id)->delete();
     
      return redirect()->back()->with('success_message','Banner has been deleted successfully');
    }
}
