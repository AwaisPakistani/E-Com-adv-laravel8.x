<?php

namespace App\Http\Controllers\front;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\CmsPage;
use Session;

class CmsPageController extends Controller
{
   
    public function cmsPage(){
        $current_route=Route::getFacadeRoot()->current()->uri();
        $cmsPages=CmsPage::where('status',1)->get()->pluck('url')->toArray();
        //echo "<pre>"; print_r($cmsPages); die;
        //dd($cmsPages); die;
        if(in_array($current_route,$cmsPages)){
            $cmsPageDetail=CmsPage::where('url',$current_route)->first()->toArray();
            //echo "<pre>"; print_r($cmsPageDetail); die;
            $meta_title=$cmsPageDetail['meta_title'];
            $meta_description=$cmsPageDetail['meta_description'];
            $meta_keywords=$cmsPageDetail['meta_keywords'];
            return view('front.pages.cms_page')->with(compact('cmsPageDetail','meta_title','meta_description','meta_keywords'));
        }else{
            abort(404);
        }
    }//
    public function contact_page(Request $request){
      if ($request->isMethod('post')) {
          $data=$request->all();
          //echo "<pre>"; print_r($data); die;
          $rules=[
                'name'=>'required',
                'email'=>'required|email',
                'subject'=>'required',
                'message'=>'required'
            ];
            $customMessages=[
             'name.required'=>'Name is required',
             'email.required'=>'Email is required',
             'email.email'=>'Please enter valid email',
             'subject.required'=>'Subject is required',
             'message.required'=>'Message is required'
            ];
          $this->validate($request,$rules,$customMessages);
          
          $email="dummy@gmail.com";
          $name=$data['name'];
          $subject=$data['subject'];
          $msg=$data['message'];
          $mail=$data['email'];
          $messageData=[
            'mail'=>$mail,
            'name'=>$name,
            'subject'=>$subject,
            'msg'=>$msg
          ];
          Mail::send('front.emails.enquiry',$messageData,function($message) use($email){
            $message->to($email)->subject('Enquiry from E-COM Website');
          });
          $message="Thanks for your enquiry. We will get back to you soon";
          Session::flash('success_message',$message);
          return redirect()->back();
      }
      $meta_title="Contact Us Page";
      return view('front.pages.contact')->with(compact('meta_title'));
    }//
}
