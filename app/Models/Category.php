<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function subCategories(){
    	return $this->hasMany('App\Models\Category','parent_id')->where('status',1);
    }

    public function section(){
    	return $this->belongsTo('App\Models\Section','section_id')->select('id','name');
    }

    public function parentcategory(){
    	return $this->belongsTo('App\Models\Category','parent_id')->select('id','category_name');
    }

    public static function catDetails($url){
        $catDetails=Category::select('id','parent_id','category_name','category_url','category_description','meta_title','meta_description','meta_keywords')->with(['subCategories'=>function($query){$query->select('id','parent_id','category_name','category_url','category_description')->where('status',1);
            }])->where('category_url',$url)->first()->toArray();
        //dd($categoryDetails);
        if ($catDetails['parent_id']==0) {
            // show main category only
            $breadcrumbs='<a href="'.url($catDetails['category_url']).'">'.$catDetails['category_name'].'</a>';
        }else{
           // show main category as well as sub category
            $parentcategory=Category::select('category_name','category_url')->where('id',$catDetails['parent_id'])->first()->toArray();
            $breadcrumbs='<a href="'.url($parentcategory['category_url']).'">'.$parentcategory['category_name'].'</a>'.' &nbsp / &nbsp '.'<a href="'.url($catDetails['category_url']).'">'.$catDetails['category_name'].'</a>';
        }

        $catIds=array();
        $catIds[]=$catDetails['id'];
        foreach ($catDetails['sub_categories'] as $key => $subCat) {
            $catIds[]=$subCat['id'];
        }
        //dd($catIds); die();
        return array('catIds'=>$catIds,'catDetails'=>$catDetails,'breadcrumbs'=>$breadcrumbs);
    }

}
