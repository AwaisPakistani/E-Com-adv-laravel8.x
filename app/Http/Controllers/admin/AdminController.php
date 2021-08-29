<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\AdminsRole;
use App\Models\OthersSetting;
use Session;
use Image;
class AdminController extends Controller
{
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }//
    
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
    }//

    public function logout(){
    	Auth::guard('admin')->logout();
    	Session::flash('success_message','Successfully logged out');
    	return redirect('admin/login');
    }//

    public function check_current_passowrd(Request $request){
    	$data=$request->all();
    	//echo "<pre>"; print_r(Auth::guard('admin')->user()->password); die();
        //echo "<pre>"; print_r($data); die();
        if (Hash::check($data['curr_pwd'],Auth::guard('admin')->user()->password)) {
            echo "true";
        }else{
            echo "false";
        }

    }//

    public function settings(){
        Session::put('page','settings');
    	  $adminDetails=Admin::where('email',Auth::guard('admin')->user()->email)->first();
    	  return view('admin.settings')->with(compact('adminDetails'));
    }//

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
    }//

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
    }//

    public function admins_subadmins(){
      Session::put('put','adminsSubadmins');
      if (Auth::guard('admin')->user()->type=='subadmin') {
          Session::flash('error_message','YOu have no access for this action');
          return redirect('admin/dashboard');
      }
      
      $admins_subadmins=Admin::get();
      return view('admin.admins_subadmins.admins_subadmins')->with(compact('admins_subadmins'));
    }//
    public function update_adminsSubadmins_status(Request $request){
        if ($request->ajax()) {
       $data=$request->all();
        //echo "<pre>"; print_r($data); die();
       if ($data['status']=='Active') {
         $status=0;
       }else{
         $status=1;
       }
       //echo $status; die();
       Admin::where('id',$data['admins_id'])->update(['status'=>$status]);
       return response()->json(['status'=>$status,'admins_id'=>$data['admins_id']]);
       }
    }//
    public function delete_adminsSubadmins($id){
      $image_name=Admin::where('id',$id)->first();
      //echo "<pre>"; print_r($image_name); die();
      // Image path
      $image_path='images/admin/admin_profiles/small/';
      //check existance and delete image name and delete from folder
      if (file_exists($image_path.$image_name->image)) {
          unlink($image_path.$image_name->image);
      }

      Admin::where('id',$id)->delete();
     
      return redirect()->back()->with('success_message','Banner has been deleted successfully');
    }//
    public function add_edit_adminsSubadmins(Request $request, $id=null){
      if ($id=='') {
        $title="Add Admin / Subadmin";
        $adminData=new Admin;
        $adminData_u=array();
        $message="Admin / Subadmin has been added successfully";
      }else{
         $title="Edit Admin / Subadmin";
         $adminData=Admin::find($id);
         $adminData_u=Admin::where('id',$id)->first();
         $adminData_u=json_decode(json_encode($adminData_u));
         $message="Admin / Subadmin has been updated successfully";
      }
      if ($request->isMethod('post')) {
        $data=$request->all();
        $rules=[
                'admin_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'admin_email'=>'required|email',
                'admin_mobile'=>'required',
                'admin_image'=>'image'
            ];
            $customMessages=[
             'admin_name.required'=>'Admin Name is required',
             'admin_name.regex'=>'Valid Admin Name is required',
             'admin_email.required'=>'Admin Email is required',
             'admin_email.email'=>'Valid Email is required',
             'admin_mobile.required'=>'Admin Mobile is required',
             'banner_image.image'=>'Valid image is required'
            ];
        $this->validate($request,$rules,$customMessages);
        //echo "<pre>"; print_r($data); die;
        if ($id=="") {
          $adminCount=Admin::where('email',$data['admin_email'])->count();
          if ($adminCount > 0) {
            Session::flash('error_message','This email already exists');
            return redirect()->back();
          }
        }
        if ($request->hasFile('admin_image')) {
               $image_tmp=$request->file('admin_image');
               if ($image_tmp->isValid()) {
                   $Org_name=$image_tmp->getClientOriginalName();
                   $ext=$image_tmp->getClientOriginalExtension();
                   $imageName=$Org_name."-".rand(111,99999).'.'.$ext;
                   $imagePath="images/admin/admin_profiles/small/".$imageName;
                   

                   Image::make($image_tmp)->save($imagePath);
                   $adminData->image=$imageName;
               }
            }
        $adminData->name=$data['admin_name'];
        $adminData->type=$data['admin_type'];
        $adminData->mobile=$data['admin_mobile'];
        $adminData->email=$data['admin_email'];
        $adminData->password=bcrypt($data['admin_password']);
        $adminData->status=1;
        $adminData->save();
        Session::flash('success_message',$message);
        return redirect()->back();
      }
      return view('admin.admins_subadmins.add_edit_adminsSubadmins')->with(compact('title','adminData_u'));
    }//
    public function update_admins_roles(Request $request,$id){
      if ($request->isMethod('post')) {
        $data=$request->except('_token');
        //echo "<Pre>"; print_r($data); die;
        AdminsRole::where('admin_id',$id)->delete();


        foreach ($data as $key => $value) {
          //echo "<pre>"; print_r($key); die;
          if (isset($value['view'])) {
            $view=$value['view'];
          }else{
            $view=0;
          }
          //echo print_r($view); die;
           if (isset($value['edit'])) {
            $edit=$value['edit'];
          }else{
            $edit=0;
          }
           if (isset($value['full'])) {
            $full=$value['full'];
          }else{
            $full=0;
          }
          AdminsRole::where('admin_id',$id)->insert(['admin_id'=>$id,'module'=>$key,'view_access'=>$view,'edit_access'=>$edit,'full_access'=>$full]);
        }
        $message="Roles updated successfully";
        Session::flash('success_message',$message);
        return redirect()->back();
      }
      $adminDetail=Admin::where('id',$id)->first()->toArray();
      $adminRoles=AdminsRole::where('admin_id',$id)->get()->toArray();
      //echo "<pre>"; print_r($adminRoles); die;
      $title="Update ".$adminDetail['name']." [".$adminDetail['type']."] Roles/Permissions";
      return view('admin.admins_subadmins.update_roles')->with(compact('title','adminDetail','adminRoles'));
    }//
    public function update_others_settings(Request $request){
      Session::put('page','othersSettings');
      $update_others_settings=OthersSetting::where('id',1)->first()->toArray();
      //dd($others_settings); die;
      $title="Other Settings";
      if ($request->isMethod('post')) {
        $data=$request->all();
        //dd($data); die;
        OthersSetting::where('id',1)->update(['min_cart_value'=>$data['min_cart_value'],'max_cart_value'=>$data['max_cart_value']]);
        $message="Cart settings has been updated successfully";
        Session::flash('success_message',$message);
        return redirect()->back();
      }
      return view('admin.settings.others_settings')->with(compact('update_others_settings','title'));
    }//

}
