<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;

class IndexController extends Controller
{
   
   public function index(){
   	  $featuredCount=Product::where('is_featured','Yes')->count();
   	  // we can use json also instead of toArray, but I'll use here toArray
   	  //  For use toArray $featuredItems=Product::where('is_featured','Yes')->get()->toArray();
   	  $featuredItems=Product::where('is_featured','Yes')->where('status',1)->get();

   	  //dd($featuredItems); die(); // dd use for debugging purpose

   	  // For featured items chunk if loop of all items slides at a time but in my case no need for chunk
   	  $latestProducts=Product::orderBy('id','Desc')->limit(4)->where('status',1)->get()->toArray();
      // pages
      
      //echo "<pre>"; print_r($pages); die;
        //$latestProducts=json_decode(json_encode($latestProducts),true);
        //echo "<pre>"; print_r($latestProducts); die();
        //$featuredChunk=array_chunk($featuredItems, 4);
        $sections=Section::where('status',1)->get();
   	  $page_name="Index";
      $meta_title="Shopping Website";
      $meta_description="The website for shopping purposes. You can shop here every of clothers in which men, women and  kids clothes are included as well as you can buy ready made and simple";
      $meta_keywords="Shopping websitre, E-commerce website, Online Shopping";
   	  return view('front.index')->with(compact('page_name','featuredItems','latestProducts','page_name','meta_title','meta_description','meta_keywords','sections'));
   }//
}
