<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use Session;
use Validator;

class CmsController extends Controller
{
    public function CmsPages(){
        Session::put('page','cms_pages');
    	$cms_pages=CmsPage::get();
    	return view('admin.pages.cms_pages')->with(compact('cms_pages'));
    }//
    public function update_cms_page_status(Request $request){
    	if ($request->ajax()) {
    		$data=$request->all();
    		//echo "<pre>"; print_r($data); die();
    		if ($data['status']=='Active') {
    			$status=0;
    		}else{
    			$status=1;
    		}
    		#echo $status; die();
    		CmsPage::where('id',$data['cmsPage_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'cmsPage_id'=>$data['cmsPage_id']]);
    	}
    }//
    public function add_edit_cmsPage(Request $request, $id=null){
        if ($id=="") {

          $title="Add CMS Page";
          $cmsPage=new CmsPage; 
          $message="CMS Page has added successfully";
          $cmsPage_u='';
        }else{
          $title="Edit CMS Page";
          $cmsPage=CmsPage::find($id);
          $message="CMS Page has updated successfully";
          $cmsPage_u=CmsPage::where('id',$id)->first();
          $cmsPage_u=json_decode(json_encode($cmsPage_u));
        }
         
        if ($request->isMethod('post')) {
            $data=$request->all();
            //dd($data); die;
            $rules=[
                'title'=>'required',
                'url'=>'required',
                'description'=>'required'
            ];
            $customMessages=[
             'title.required'=>'Title is required',
             'url.required'=>'URL is required',
             'description.required'=>'CMS Page description is required'
            ];
           $this->validate($request,$rules,$customMessages);
           if (empty($data['meta_title'])) {
               $data['meta_title']='';
           }
            if (empty($data['meta_description'])) {
               $data['meta_description']='';
           }
            if (empty($data['meta_keywords'])) {
               $data['meta_keywords']='';
           }
           $cmsPage->title=$data['title'];
           $cmsPage->description=$data['description'];
           $cmsPage->url=$data['url'];
           $cmsPage->meta_title=$data['meta_title'];
           $cmsPage->meta_description=$data['meta_description'];
           $cmsPage->meta_keywords=$data['meta_keywords'];
           $cmsPage->status=1;
           $cmsPage->save();

           Session::flash('success_message',$message);
           return redirect()->back();
        }
      return view('admin.pages.add_edit_cmsPage')->with(compact('title','cmsPage','cmsPage_u'));
    }//
    public function delete_cms_page($id){
        CmsPage::where('id',$id)->delete();
        return redirect()->back()->with('success_message','CMS Page has been deleted successfully');
    }//
}
