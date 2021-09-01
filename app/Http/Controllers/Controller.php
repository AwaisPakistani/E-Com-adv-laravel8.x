<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\CmsPage;
use App\Models\frontSetting;
use App\Models\Section;
use App\Models\Cart;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(){
    $pages=CmsPage::select('title','url')->where('status',1)->get();
    $settings=frontSetting::first();
       if ($settings) {
                 $settings->social=explode(',', $settings->social);
                 //echo print_r($settings_u->social); die();
                 foreach ($settings->social as $social) {
                   $icon=explode('.', $social);
                   $icons[]=$icon[1];

                 }

       }else{
        $icons[]='';
       }
    $pages=json_decode(json_encode($pages));
    // Categories
    $categories=section::with('categories')->get();
    $categories=json_decode(json_encode($categories));
    $usercartItems=Cart::userCartItems();
     view()->share([
        'pages'=>$pages,
        'setting'=>$settings,
        'icons'=>$icons,
        'categories'=>$categories,
        'usercartItems'=>$usercartItems,
      ]);
   }//
}
