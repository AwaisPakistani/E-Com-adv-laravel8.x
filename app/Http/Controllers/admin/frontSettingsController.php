<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontSetting;
use Session;
use Image;

class frontSettingsController extends Controller
{
    public function frontSettings(){
        Session::put('page','frontSettings');
    	$frontSettings=frontSetting::get();
    	//dd($frontSettings); die;
    	return view('admin.settings.frontSettings')->with(compact('frontSettings'));
    }//
    public function edit_front_settings(Request $request,$id=null){
      if ($id=='') {
            $settings=new frontSetting;
            $settings_u=array();
            $message="Settings added successfully";
        }else{
             
             $settings_u=frontSetting::where('id',$id)->first();
             $settings_u=json_decode(json_encode($settings_u));
              if ($settings_u) {
                 $settings_u->social=explode(',', $settings_u->social);
                 //echo print_r($settings_u->social); die();
              }
             #echo "<pre>"; print_r($category_u); die();
             //echo "<pre>"; print_r($getCategories); die();
             $settings=frontSetting::find($id);
             $message="Front Settings updated successfully";
        }
        if ($request->isMethod('post')) {
            //$data=$request->all();
            //  or without tocken
            $data=$request->except('_token');
            //echo "<pre>"; print_r($data); die;
            //dd($data); die;
            // if ($request->hasFile('image')) {
            //         $image_tmp=$request->file('image');
            //         if ($image_tmp->isValid()) {
                        
            //           $ext=$image_tmp->getClientOriginalExtension();

            //           $imageName=rand(111,99999).'.'.$ext;
                      

            //           $imagePath="images/admin/logo/".$imageName;

            //           Image::make($image_tmp)->resize(600,300)->save($imagePath);
            //         }elseif (!empty($data['current_image'])) {
            //             $imageName=$data['current_image'];
            //         }else{
            //             $imageName="";
            //         }
            // }
            if($request->hasFile('image')){
                $image_tmp = $data['image'];
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/admin/logo/'.'/'.$fileName;
                    Image::make($image_tmp)->save($large_image_path);
                    $settings->image = $fileName; 
                }
            }
            if ($request->has('social')) {
                $data['social']=implode(',', $data['social']);
               // print_r($data['social']);
                //die();
            }
            //$settings->image=$imageName;
            $settings->social=$data['social'];
            $settings->about=$data['about'];
            $settings->save();

            Session::flash('success_message',$message);
            return redirect()->back();
        }
      return view('admin.settings.editFrontSettings')->with(compact('settings_u'));
    }//
    public function delete_logo($id){
      $image_name=frontSetting::select('image')->where('id',$id)->first();
      //echo print_r($image_name); die();
      // Image path
      $image_path='images/admin/logo/';
      //check existance and delete image name and delete from folder
      if (file_exists($image_path.$image_name->image)) {
          unlink($image_path.$image_name->image);
      }
      // delete category image name
      frontSetting::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message','Image has been deleted successfully');
    }//
}
