<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Session;
use Image;
class AdminController extends Controller
{
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }
    
    public function login(Request $request){
    	if ($request->isMethod('post')) {
    		$data=$request->all();
    		#echo $pass=Hash::make($data['password']); die();
    		#echo print_r($data); die();

    		// Auth::guard always need hashed password it will not recognize simple password
    		if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])) {
    			return redirect('admin/dashboard');
    		}else{
    			Session::flash('error_message','Invalid email or password.Try again');
    			return redirect()->back();
    			// or
    			#return redirect()->back()->with('flash_message_error','Your email or password is incorrect. Plz try again');
    		}
    	}
    	return view('admin.login');
    }

    public function logout(){
    	Auth::guard('admin')->logout();
    	Session::flash('success_message','Successfully logged out');
    	return redirect('admin/login');
    }

    public function check_current_passowrd(Request $request){
    	$data=$request->all();
    	//echo "<pre>"; print_r(Auth::guard('admin')->user()->password); die();
        //echo "<pre>"; print_r($data); die();
        if (Hash::check($data['curr_pwd'],Auth::guard('admin')->user()->password)) {
            echo "true";
        }else{
            echo "false";
        }

    }

    public function settings(){
        Session::put('page','settings');
    	$adminDetails=Admin::where('email',Auth::guard('admin')->user()->email)->first();
    	return view('admin.settings')->with(compact('adminDetails'));
    }

    public function update_current_passowrd(Request $request){
        if ($request->isMethod('post')) {
            $data=$request->all();
            #echo "<pre>"; print_r($data); die();
             if (Hash::check($data['current_password'],Auth::guard('admin')->user()->password)) {
                 if ($data['new_password']==$data['confirm_password']) {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                     Session::flash('success_message','Your passowrd has been updated successfully');
                     return redirect()->back();
                 }else{
                     Session::flash('error_message','New password is not matching with confirm passowrd');
                     return redirect()->back();
                 }
             }else{
                 Session::flash('error_message','Current password is incorrect');
                 return redirect()->back();
             }
        }
    }

    public function update_admin_details(Request $request){
        Session::put('page','update-admin-details');
        if ($request->isMethod('post')) {
            $data=$request->all();
            $rules=[
                'name'=>'required|regex:/^[\pL\s\-]+$/u',
                'mobile'=>'required|numeric',
                'image'=>'image'
            ];
            $customMessages=[
             'name.required'=>'Name is required',
             'name.alpha'=>'Valid name is required',
             'mobile.required'=>'Mobile is required',
             'mobile.numeric'=>'Valid mobile is required',
             'image.image'=>'Valid image is required'
            ];
            $this->validate($request,$rules,$customMessages);
            #echo "string1"; die();
           if ($request->hasFile('image')) {
                  
                    $image_tmp=$request->file('image');
                    if ($image_tmp->isValid()) {
                        
                      $ext=$image_tmp->getClientOriginalExtension();

                      $imageName=rand(111,99999).'.'.$ext;
                      

                      $imagePath="images/admin/admin_profiles/small/".$imageName;

                      Image::make($image_tmp)->save($imagePath);
                    }elseif (!empty($data['current_image'])) {
                        $imageName=$data['current_image'];
                    }else{
                        $imageName="";
                    }
            }

            #echo "string"; die();  
           # $imageName=$data['image'];
            Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'image'=>$imageName]);
             Session::flash('success_message','Detail has been updated successfully');
                     return redirect()->back();
        }
       // $adminDetails=Admin::get();
        return view('admin.update_admin_details');
    }
}
