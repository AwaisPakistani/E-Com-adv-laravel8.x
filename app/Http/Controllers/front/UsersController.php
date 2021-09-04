<?php
namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use\Models\Product;
use App\Models\Cart;
use Session;
use Auth;

class UsersController extends Controller
{
    // public function login_register(){
    // 	return view('front.users.login_register');
    // }

    public function login_register(Request $request){
        if ($request->isMethod('post')) {
           $data=$request->except('_token');
           //echo "<pre>"; print_r($data); die;
           $userCount=User::where('email',$data['email'])->count();
           if ($userCount>0) {
             $message="User already exists";
             Session ::flash('error_message',$message);
             return redirect()->back();
           }else{
               $user=new User;
               $user->name=$data['name'];
               $user->mobile=$data['mobile'];
               $user->email=$data['email'];
               $user->password=bcrypt($data['password']);
               $user->status=0;
               $user->save();

               $email=$data['email'];
               $messageData=[
                'email'=>$data['email'],
                'name'=>$data['name'],
                'code'=>base64_encode($data['email'])
               ];
               //echo print_r($messageData); die();
                    Mail::send('front.emails.confirmation',$messageData, function($message) use($email){
                        $message->to($email)->subject('Confirm your Shopping Website account');
                    });
                    $message="Please confirm your email to activate your account";
                    Session::flash('success_message',$message);
                    return redirect()->back();
               /*if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                   if (!empty(Session::get('session_id'))) {
                       $session_id=Session::get('session_id');
                       $user_id=Auth::user()->id;
                       //echo $session_id; die();
                       //echo $user_id; die();
                       Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                    }
                    $email=$data['email'];
                    $messageData=['email'=>$data['email'],'name'=>$data['name'],'mobile'=>$data['mobile']];
                    Mail::send('front.emails.register',$messageData, function($message) use($email){
                        $message->to($email)->subject('Confirm your Shopping Website account');
                    });
                    $message="You have registered successfully";
                    Session ::flash('success_message',$message);
                    return redirect('/cart');
                   //return redirect('/t-shirts');
               }*/
               
               
           }
        }
        // here
        return view('front.users.login_register');
    }//
     public function login_user(Request $request){
       if ($request->isMethod('post')) {
        $data=$request->all();
        //echo "<pre>"; print_r($data); die();
        if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
          $userStatus=User::where('email',$data['email'])->first();
          if ($userStatus->status==0) {
            $message="Your account is not activated yet. Please check your email to activate your account";
            Session::flash('error_message',$message);
            return redirect()->back();
          }
          if (!empty(Session::get('session_id'))) {
            $session_id=Session::get('session_id');
            $user_id=Auth::user()->id;
            //echo $session_id; die();
            //echo $user_id; die();
            Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
            return redirect('/account');
          }
          
        }else{
          $message="Your email or password is incorrect";
          Session::flash('error_message',$message);
          return redirect()->back();
        }
       }
    }//

    public function check_email(Request $request){
      // check email for user registration
      $data=$request->all();
      $emailCount=User::where('email',$data['email'])->count();
      if ($emailCount>0) {
          echo "false";
        }
        else{
          echo "true";die();
        }
    }//

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }//

    public function forgot_password(Request $request){
      if ($request->isMethod('post')) {
        $data=$request->all();
        //echo "<pre>";  print_r($data); die();
        $userCount=User::where('email',$data['email'])->count();
        if ($userCount == 0) {
          $message="Your email does not exist.Please check again";
          Session::put('flash_message_warning',$message);
          return redirect()->back();
        }
        $randorm_password=rand();
        $new_password=bcrypt($randorm_password);
        User::where('email',$data['email'])->update(['password'=>$new_password]);

        $username=User::select('name')->where('email',$data['email'])->first();

        $email=$data['email'];
        $name=$username->name;
        $password=$randorm_password;
         $messageData=['email'=>$email,'name'=>$name,'password'=>$password];
          Mail::send('front.emails.forgot_password',$messageData, function($message) use($email){
              $message->to($email)->subject('Check your email to get new password');
          });
          $message="Check your email to get new password";
          Session::flash('success_message',$message);
          //Session::forget('error_message');
          return redirect('login-register');
      }
      return view('front.users.forgot_password');
    }

    public function confirm_account($code){
      $email=base64_decode($code);
      $userCount=User::where('email',$email)->count();
      if ($userCount>0) {
        $userDetails=User::where('email',$email)->first();
        if ($userDetails->status==1) {
          $message="Your email account is already activated.Please login";
          Session::put('error_message',$message);
          return redirect('/login-register');
        }else{
          User::where('email',$email)->update(['status'=>1]);

          $messageData=['email'=>$email,'name'=>$userDetails['name'],'mobile'=>$userDetails['mobile']];
          Mail::send('front.emails.register',$messageData, function($message) use($email){
              $message->to($email)->subject('Confirm your Shopping Website account');
          });
          $message="You email account is activated. You can login now";
          Session::flash('success_message',$message);
          return redirect('/login-register');
          //return redirect('/t-shirts');
          
        }
      }else{
        abort(404);
      }
    }//

    public function account(Request $request){
      $user_id=Auth::user()->id;
      $userDetails=User::find($user_id)->toArray();
      $countries=Country::where('status',1)->get()->toArray();
      //dd($countries); die();
      //dd($userDetails); die();
      if ($request->isMethod('post')) {
        $data=$request->all();

        $rules=[
                'name'=>'required|regex:/^[\pL\s\-]+$/u',
                'mobile'=>'required|numeric',
            ];
            $customMessages=[    
             'name.required'=>'Name is required',
             'name.regex'=>'Valid name is required',
             'mobile.required'=>'Product Mobile is required',
             'mobile.numeric'=>'Valid Mobile is required',
            ];
           $this->validate($request,$rules,$customMessages);

        $user=User::find($user_id);
        $user->name=$data['name'];
        $user->address=$data['address'];
        $user->city=$data['city'];
        $user->state=$data['state'];
        $user->country=$data['country'];
        $user->pincode=$data['pincode'];
        $user->mobile=$data['mobile'];
        $user->save();
        $message="Your account details have been updated successfully";
        Session::flash('success_message',$message);
        return redirect()->back();
      }
      return view('front.users.account')->with(compact('userDetails','countries'));
    }//

    public function check_userCurrent_password(Request $request){
      if ($request->isMethod('post')) {
        $data=$request->all();
        //echo "<pre>"; print_r($data); die();
        $user_id=Auth::user()->id;
        //echo $user_id; die();
        //$checkpass=User::->where('id',$user_id)->first();
        //dd($checkpass); die();
        $checkpass=User::select('password')->where('id',$user_id)->first();
        //echo "<pre>"; print_r($checkpass); die();
        //echo Hash::$checkpass->password; die();
        if (Hash::check($data['current_password'],$checkpass->password)) {
          return "true";
        }else{
          return "false";
        }

      }
    }//
    public function update_user_password(Request $request){
      if ($request->isMethod('post')) {
        $data=$request->all();
        //echo "<pre>"; print_r($data); die();
        $user_id=Auth::user()->id;
        //echo $user_id; die();
        //$checkpass=User::->where('id',$user_id)->first();
        //dd($checkpass); die();
        $checkpass=User::select('password')->where('id',$user_id)->first();
        //echo "<pre>"; print_r($checkpass); die();
        //echo Hash::$checkpass->password; die();
        if (Hash::check($data['current_password'],$checkpass->password)) {
          //echo "<pre>"; print_r($data); die();
          $new_password=bcrypt($data['new_password']);
          //echo $new_password; die();
          User::where('id',$user_id)->update(['password'=>$new_password]);
          $message="Password updated successfully";
          Session::flash('success_message',$message);
          return redirect()->back();
        }else{
          $message="Current Password is incorrect";
          Session::flash('error_message',$message);
          return redirect()->back();        }

      }
    }//
    



   
}
