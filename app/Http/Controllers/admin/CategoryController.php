<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use App\Models\AdminsRole;
use Session;
use Auth;
use Image;

class CategoryController extends Controller
{
    public function categories(){
    	Session::put('page','categories');
    	$categories=Category::with(['section','parentcategory'])->get();
        $categories=json_decode(json_encode($categories));
      // Categories restriction
      $categoryModuleCoount=AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'categories'])->count();
      if (Auth::guard('admin')->user()->type=='superadmin') {
        $categoryModuleRole['view_access']=1;
        $categoryModuleRole['edit_access']=1;
        $categoryModuleRole['full_access']=1;
      }
      else if ($categoryModuleCoount==0) {
        $message="YOu don't have access to this module";
        Session::flash('error_message',$message);
        return redirect('admin/dashboard');
      }else{
        $categoryModuleRole=AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'categories'])->first()->toArray();
        //dd($categoryModuleRole); die;
       # echo "<pre>"; print_r($categories); die();
      }
    	return view('admin.categories.categories')->with(compact('categories','categoryModuleRole'));
    }

    public function update_category_status(Request $request){
        if ($request->ajax()) {
    		$data=$request->all();
    		 //echo "<pre>"; print_r($data); die();
    		if ($data['status']=='Active') {
    			$status=0;
    		}else{
    			$status=1;
    		}
    		#echo $status; die();
    		Category::where('id',$data['category_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
    	}
    }

    public function add_edit_category(Request $request,$id=null){
    	if ($id=="") {
    		$title="Add Category";
        // Add Category data
            $category=new Category;
            $category_u=array();
            $getCategories=array();
            $message="Category added successfully";

    	}else{
    		$title="Edit Category";
        // Edit Category data
        $category_u=Category::where('id',$id)->first();
        $category_u=json_decode(json_encode($category_u));
        #echo "<pre>"; print_r($category_u); die();
        $getCategories=Category::with('subCategories')->where(['parent_id'=>0,'section_id'=>$category_u->section_id])->get();
        $getCategories=json_decode(json_encode($getCategories));
        //echo "<pre>"; print_r($getCategories); die();
        $category=Category::find($id);
        $message="Category updated successfully";
    	}
        //Categories validations
        
        if ($request->isMethod('post')) {
            $data=$request->all();
            //echo "<pre>"; print_r($data); die();
            //echo $data['category_image']; die();
             $rules=[
                'category_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'section_id'=>'required',
                'category_url'=>'required',
                'category_image'=>'image'
            ];
            $customMessages=[
             'category_name.required'=>'Name is required',
             'category_name.regex'=>'Valid name is required',
             'section_id.required'=>'Section is required',
             'category_url.required'=>'URL is required',
             'category_image.image'=>'Valid image is required'
            ];
        $this->validate($request,$rules,$customMessages);
            if (empty($data['category_description'])) {
                $data['category_description']='';
            }
            
            if (empty($data['meta_title'])) {
                $data['meta_title']='';
            }
            
            if (empty($data['meta_description'])) {
                $data['meta_description']='';
            }

            if (empty($data['meta_keywords'])) {
                $data['meta_keywords']='';
            }
            $category->parent_id=$data['parent_id'];
            $category->section_id=$data['section_id'];
            $category->category_name=$data['category_name'];
            
            if ($request->hasFile('category_image')) {
                  
                    $image_tmp=$request->file('category_image');
                    if ($image_tmp->isValid()) {
                        
                      $ext=$image_tmp->getClientOriginalExtension();

                      $imageName=rand(111,99999).'.'.$ext;
                      

                      $imagePath="images/admin/categories/small/".$imageName;

                      Image::make($image_tmp)->save($imagePath);
                    }elseif (!empty($data['current_image'])) {
                        $imageName=$data['current_image'];
                    }else{
                        $imageName="";
                    }
            }
            $category->category_image=$imageName;
            $category->category_discount=$data['category_discount'];
            $category->category_description=$data['category_description'];
            $category->category_url=$data['category_url'];
            $category->meta_title=$data['meta_title'];
            $category->meta_description=$data['meta_description'];
            $category->meta_keywords=$data['meta_keywords'];
            $category->status=1;
            $category->save();
             Session::flash('success_message',$message);
                     return redirect()->back();

        }
        $section=Section::get();
        //echo "<pre>"; print_r($sections); die();
    	return view('admin.categories.add_edit_category')->with(compact('title','section','category_u','getCategories'));
    } // end function

    public function append_categories_level(Request $request){
       if ($request->ajax()) {
           $data=$request->all();
           #echo "<pre>"; print_r($data); die();
           $getCategories=Category::with('subCategories')->where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>1])->get();
           //$getCategories=json_decode(json_encode($getCategories),true);
           //echo "<pre>"; print_r($getCategories); die();
           return view('admin.categories.append_categories_level')->with(compact('getCategories'));
       }
    }

    public function delete_category_image($id){
      $image_name=Category::select('category_image')->where('id',$id)->first();
      // Image path
      $image_path='images/admin/categories/small/';
      //check existance and delete image name and delete from folder
      if (file_exists($image_path.$image_name->category_image)) {
          unlink($image_path.$image_name->category_image);
      }
      // delete category image name
      Category::where('id',$id)->update(['category_image'=>'']);
      return redirect()->back()->with('success_message','Image has been deleted successfully');
    }// function ends

    public function delete_category($id){
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Category has been deleted successfully');
    }
}

