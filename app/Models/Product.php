<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category(){
    	return $this->belongsTo('App\Models\Category','category_id');
    }

    public function section(){
    	return $this->belongsTo('App\Models\Section','section_id');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }

    public function attributes(){
    	return $this->hasMany('App\Models\ProductsAttribute');
    }

     public function images(){
        return $this->hasMany('App\Models\ProductsImage');
    }

    public static function filters_products(){
        $productFilters['fabricArray']=array('Cotton','Polyester','Wool');
        $productFilters['sleeveArray']=array('Half Sleeve','Sleeveless','Full Sleeve','Short Sleeve');
        $productFilters['patternArray']=array('Printed','Checked','Plain','Self','Solid');
        $productFilters['fitArray']=array('Regular','Slim');
        $productFilters['occassionArray']=array('Casual','Formal');

        return $productFilters;
    }

    public static function getDiscountedPrice($product_id){
        $proDetails=Product::select('category_id','product_price','product_discount')->where('id',$product_id)->first()->toArray();
        //echo "<pre>"; print_r($proDetails); die();
        $catDetails=Category::select('category_discount')->where('id',$proDetails['category_id'])->first()->toArray();
        if ($proDetails['product_discount']>0) {
            // fi product discout is added from admin panel
            $discountedPrice=$proDetails['product_price']-$proDetails['product_price']*$proDetails['product_discount']/100;

            //saleprice=cost price - discount price
            // 450=500 - {500*10/100}=50
        }elseif ($catDetails['category_discount']>0) {
            //if product discount is not added and category discount from admin panel
            $discountedPrice=$proDetails['product_price']-$proDetails['product_price']*$catDetails['category_discount']/100;
        }else{
            $discountedPrice=0;
        }
        return $discountedPrice;
    }//

    public static function getDiscountedAttrPrice($product_id,$size){
        $proAttrPrice=ProductsAttribute::where(['product_id'=>$product_id,'size'=>$size])->first()->toArray();
        $proDetails=Product::select('product_discount','category_id')->where('id',$product_id)->first()->toArray();
        //echo "<pre>"; print_r($proDetails); die();
        $catDetails=Category::select('category_discount')->where('id',$proDetails['category_id'])->first()->toArray();

        if ($proDetails['product_discount']>0) {
            // fi product discout is added from admin panel
            $final_price=$proAttrPrice['price']-($proAttrPrice['price']*$proDetails['product_discount']/100);
            $discount=$proAttrPrice['price']-$final_price;
            //saleprice=cost price - discount price
            // 450=500 - {500*10/100}=50
        }elseif ($catDetails['category_discount']>0) {
            //if product discount is not added and category discount from admin panel
            $final_price=$proAttrPrice['price']-($proAttrPrice['price']*$catDetails['category_discount']/100);
            $discount=$proAttrPrice['price']-$final_price;
        }else{
            $final_price=$proAttrPrice['price'];
            $discount=0;
        }
        return array('product_price'=>$proAttrPrice['price'],'final_price'=>$final_price,'discount'=>$discount);
    }//

    public static function getProductMainImage($product_id){
      $getProductMainImage=Product::select('main_image')->where('id',$product_id)->first()->toArray();
      return $getProductMainImage['main_image']; 
    }//

    public static function getProductStatus($product_id){
        $getProductStatus=Product::select('status')->where('id',$product_id)->first()->toArray();
        return $getProductStatus['status'];

    } //
    public static function getProductStock($product_id,$product_size){
      $getProductStock=ProductsAttribute::select('stock')->where(['product_id'=>$product_id,'size'=>$product_size])->first()->toArray();
      return $getProductStock['stock'];
    }//
    public static function getAttributeCoount($product_id,$product_size){
      $getProductAttribute=ProductsAttribute::where(['product_id'=>$product_id,'size'=>$product_size,'status'=>1])->count();
      return $getProductAttribute;
    }//
    public static function getCategoryStatus($category_id){
      $getCategoryStatus=Category::select('status')->where('id',$category_id)->first()->toArray();
      return $getCategoryStatus['status'];
    }//
    public static function deleteCartProduct($product_id){
        Cart::where('product_id',$product_id)->delete();
    }//
}
