<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\section;
use App\Models\Category;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;
use App\Models\Brand;
use Session;
use Image;

class ProductsController extends Controller
{
    public function products(){
    	Session::put('page','products');
    	$products=Product::with(['category'=>function($query)
    		{$query->select('id','category_name');}
    		,'section'=>function($query){
    			$query->select('id','name');
    		}])->get();
    	//$products=json_decode(json_encode($products));
    	//echo "<pre>"; print_r($products); die();
    	return view('admin.products.products')->with(compact('products'));
    }

    public function update_product_status(Request $request){
    	 if ($request->ajax()) {
    		$data=$request->all();
    		 //echo "<pre>"; print_r($data); die();
    		if ($data['status']=='Active') {
    			$status=0;
    		}else{
    			$status=1;
    		}
    		#echo $status; die();
    		Product::where('id',$data['product_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
    	}
    }// function ends

    public function delete_product($id){
    	Product::where('id',$id)->delete();
    	return redirect()->back()->with('success_message','Product has been deleted successfully');
    }

    public function add_edit_product(Request $request,$id=null){
        if ($id=="") {
            $title="Add Product";
            // Add Product Data code
            $products=new Product;
            $product_u=array();
            $message="Product has been added successfully";
        }else{
            $title="Edit Product";
            // Edit Product Data code
            // foe fetch data into edit foem
            $product_u=Product::where('id',$id)->first();
            $product_u=json_decode(json_encode($product_u));
            // For Editing of data
            $products=Product::find($id);
            $message="Product has been updated successfully";
        }

        if ($request->isMethod('post')) {
            $data=$request->all();
            //$data=json_decode(json_encode($data),true);
            //echo "<pre>"; print_r($data); die();
            $rules=[
                'category_id'=>'required',
                'brand_id'=>'required',
                'product_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'product_code'=>'required|regex:/^[\w-]*$/',
                'product_color'=>'required|regex:/^[\pL\s\-]+$/u',
                'product_price'=>'required|numeric',
                'category_image'=>'image'
            ];
            $customMessages=[
             'category_id.required'=>'Category is required',
             'brand_id.required'=>'Brand is required',    
             'product_name.required'=>'Product Name is required',
             'product_name.regex'=>'Valid name is required',
             'product_code.required'=>'Product Code is required',
             'product_code.regex'=>'Valid code is required',
             'product_color.required'=>'Product Color is required',
             'product_color.regex'=>'Valid color name is required',      
             'product_price.required'=>'Product price is required',
             'product_price.numeric'=>'Valid Product price is required',
             'category_image.image'=>'Valid image is required'
            ];
           $this->validate($request,$rules,$customMessages);

            if (empty($data['featured'])) {
                $featured='No';
            }else{
                $featured='Yes';
            }//echo $featured; die();
            if (empty($data['group_code'])) {
              $group_code='';
          }else{
              $group_code=$data['group_code'];
          }
            
             if (empty($data['product_video'])) {
                $videoName='';
            }
             if (empty($data['product_image'])) {
                $imageName='';
            }
            if (empty($data['product_description'])) {
                $data['product_description']='';
            }
            if (empty($data['product_discount'])) {
              $data['product_discount']='';
          }
            if (empty($data['meta_description'])) {
                $data['meta_description']='';
            }
            if (empty($data['meta_title'])) {
                $data['meta_title']='';
            }
            if (empty($data['meta_keywords'])) {
                $data['meta_keywords']='';
            }
             if (empty($data['wash_care'])) {
                $data['wash_care']='';
            }
             if (empty($data['fabric'])) {
                $data['fabric']='';
            }
             if (empty($data['sleeve'])) {
                $data['sleeve']='';
            }
             if (empty($data['pattern'])) {
                $data['pattern']='';
            }
             if (empty($data['fit'])) {
                $data['fit']='';
            }
             if (empty($data['occassion'])) {
                $data['occassion']='';
            }
            if ($request->hasFile('product_image')) {
               $image_tmp=$request->file('product_image');
               if ($image_tmp->isValid()) {
                   $Org_name=$image_tmp->getClientOriginalName();
                   $ext=$image_tmp->getClientOriginalExtension();
                   $imageName=$Org_name."-".rand(111,99999).'.'.$ext;
                   $imagePathSmall="images/admin/products/small/".$imageName;
                   $imagePathMedium="images/admin/products/medium/".$imageName;
                   $imagePathLarge="images/admin/products/large/".$imageName;

                   Image::make($image_tmp)->save($imagePathLarge);
                   Image::make($image_tmp)->resize(600,600)->save($imagePathMedium);
                   Image::make($image_tmp)->resize(300,300)->save($imagePathSmall);
                   $products->main_image=$imageName;
               }
            }
            //Video Add code
             if ($request->hasFile('product_video')) {
               $video_tmp=$request->file('product_video');
               if ($video_tmp->isValid()) {
                   $Org_VideoName=$video_tmp->getClientOriginalName();
                   $videoExt=$video_tmp->getClientOriginalExtension();
                   $videoName=$Org_VideoName."-".rand().'.'.$videoExt;
                   $videoName=$Org_VideoName."-".rand().'.'.$videoExt;
                   $videoPath="videos/admin/products/".$videoName;
                   $video_tmp->move($videoPath,$videoName);

                   $products->product_video=$videoName;
               }
            }

            $category_detail=Category::find($data['category_id']);
            $products->section_id=$category_detail->section_id;
            $products->brand_id=$data['brand_id'];
            $products->category_id=$data['category_id'];
            $products->product_name=$data['product_name'];
            $products->product_code=$data['product_code'];
            $products->product_color=$data['product_color'];
            $products->product_price=$data['product_price'];
            $products->product_discount=$data['product_discount'];
            $products->product_weight=$data['product_weight'];
            $products->product_name=$data['product_name']; 
            $products->product_name=$data['product_name'];
            $products->description=$data['product_description']; 
            $products->meta_title=$data['meta_title']; 
            $products->meta_description=$data['meta_description']; 
            $products->meta_keywords=$data['meta_keywords']; 
            $products->wash_care=$data['wash_care'];
            $products->fabric=$data['fabric'];
            $products->sleeve=$data['sleeve'];
            $products->pattern=$data['pattern'];
            $products->fit=$data['fit'];
            $products->occassion=$data['occassion'];
            $products->group_code=$data['group_code'];
            $products->is_featured=$featured;
            $products->status=1;
            $products->save();
            Session::flash('success_message',$message);
            return redirect('admin/products');  

        }

        // Filters Array
        /*$fabricArray=array('Cotton','Polyester','Wool');
        $sleeveArray=array('Half Sleeve','Sleeveless','Full Sleeve','Short Sleeve');
        $patternArray=array('Printed','Checked','Plain','Self','Solid');
        $fitArray=array('Regular','Slim');
        $occassionArray=array('Casual','Formal');*/
        $products_filters=Product::filters_products();
        //dd($products_filters); die();
        $fabricArray=$products_filters['fabricArray'];
        $sleeveArray=$products_filters['sleeveArray'];
        $patternArray=$products_filters['patternArray'];
        $fitArray=$products_filters['fitArray'];
        $occassionArray=$products_filters['occassionArray'];




        // Categories
        $categories=section::with('categories')->get();
        $categories=json_decode(json_encode($categories));
        //echo "<pre>"; print_r($categories); die();
        $brands=Brand::where('status',1)->get();
        //$brands=json_decode(json_decode($brands),true);
        return view('admin.products.add_edit_product')->with(compact('title','fabricArray','sleeveArray','patternArray','fitArray','occassionArray','categories','product_u','brands'));
    }// function ends

    public function delete_product_image($id){
      $image_name=Product::select('main_image')->where('id',$id)->first();
      // Image path
      $small_image_path='images/admin/products/small/';
      $medium_image_path='images/admin/products/medium/';
      $large_image_path='images/admin/products/large/';
      //check existance and delete image name and delete from folder
      if (file_exists($small_image_path.$image_name->main_image)) {
          unlink($small_image_path.$image_name->main_image);
      }
       if (file_exists($medium_image_path.$image_name->main_image)) {
          unlink($medium_image_path.$image_name->main_image);
      }
       if (file_exists($large_image_path.$image_name->main_image)) {
          unlink($large_image_path.$image_name->main_image);
      }
      // delete category image name
      Product::where('id',$id)->update(['main_image'=>'']);
      return redirect()->back()->with('success_message','Image has been deleted successfully');
    } // function ends

    public function delete_product_video($id){
      $video_name=Product::select('product_video')->where('id',$id)->first();
      // Image path
      $video_path='videos/admin/products/'.$video_name;
      //check existance and delete image name and delete from folder
      if (file_exists($video_path.$video_name->product_video)) {
          unlink($video_path.$video_name->product_video);
      }
      // delete category image name
      Product::where('id',$id)->update(['product_video'=>'']);
      return redirect()->back()->with('success_message','Product has been deleted successfully');
    }// function ends here

    public function add_product_attr(Request $request,$id){
      if ($request->isMethod('post')) {
        $data=$request->all();
       // echo "<pre>"; print_r($data); die();
        foreach ($data['sku'] as $key => $value) {
          if (!empty($value)) {
            // sku already exists code
            $attrCountAttr=ProductsAttribute::where(['sku'=>$value])->count();
            if ($attrCountAttr > 0) {
              return redirect()->back()->with('error_message','This sku already exists.');
            }
            // size already exist code
           /* $attrSizeAttr=ProductsAttribute::where(['size'=>$data['size']])->count();
            if ($attrSizeAttr > 0) {
              return redirect()->back()->with('error_message','This size already exists.');
            }*/
            $attribute=new ProductsAttribute;
            $attribute->product_id=$id;
            $attribute->sku=$value;
            $attribute->size=$data['size'][$key];
            $attribute->price=$data['price'][$key];
            $attribute->stock=$data['stock'][$key];
            $attribute->status=1; 
            $attribute->save();
          }
        }
        return redirect()->back()->with('success_message','Product attributes has been added successfully');  
      }
      $productData=Product::select('id','product_name','product_code','product_color','product_price','main_image')->with('attributes')->find($id);

      $productData=json_decode(json_encode($productData));
      //echo "<pre>"; print_r($productData); die();
      $title="Products Attributes";
      return view('admin.products.add_attributes')->with(compact('productData','title'));
    } // Function ends here

    public function edit_product_attr(Request $request,$id){
       if ($request->isMethod('post')) {
         $data=$request->all();
         //echo "<pre>"; print_r($data); die();
         foreach ($data['attrId'] as $key => $attr) {
           if (!empty($attr)) {
           // echo "hi"; die();
             ProductsAttribute::where(['id'=>$data['attrId'][$key]])->update(['price'=>$data['price'][$key],'size'=>$data['size'][$key],'stock'=>$data['stock'][$key],'sku'=>$data['sku'][$key]]);
           }
         }
         return redirect()->back();
       }
    }

    public function update_attribute_status(Request $request){
       if ($request->ajax()) {
        $data=$request->all();
         //echo "<pre>"; print_r($data); die();
        if ($data['status']=='Active') {
          $status=0;
        }else{
          $status=1;
        }
        #echo $status; die();
        ProductsAttribute::where('id',$data['attribute_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'attribute_id'=>$data['attribute_id']]);
      }
    }// function ends

    public function delete_attribute($id){
      ProductsAttribute::where('id',$id)->delete();
      return redirect()->back()->with('success_message','Product Attribute has been deleted successfully');
    } // functio ends

    public function add_product_images(Request $request,$id){
      if ($request->isMethod('post')) {
        //echo "<pre>"; print_r($data); die();
        if ($request->hasFile('image')) {
          $images=$request->file('image');
         //echo "<pre>"; print_r($images); die();
         foreach ($images as $key => $image) {
           $proImages=new ProductsImage;
           $image_tmp=Image::make($image);
           $ext=$image->getClientOriginalExtension();
           $imageName=rand(111,999999).time().".".$ext;

           $imagePathSmall="images/admin/products/small/".$imageName;
           $imagePathMedium="images/admin/products/medium/".$imageName;
           $imagePathLarge="images/admin/products/large/".$imageName;

           Image::make($image_tmp)->save($imagePathLarge);
           Image::make($image_tmp)->resize(600,600)->save($imagePathMedium);
           Image::make($image_tmp)->resize(300,300)->save($imagePathSmall);
           $proImages->image=$imageName;
           $proImages->product_id=$id;
           $proImages->save();
              
         }
         Session::flash('success_message','Images added successfully');
         return redirect()->back();

        }
      }
       $productData=Product::with('images')->select('id','product_name','product_code','product_color','main_image')->find($id);
       $productData=json_decode(json_encode($productData));
       //echo "<pre>"; print_r($productData); die();
       $title="Add Images";
       return view('admin.products.add_images')->with(compact('productData','title'));
    }// function ends

    public function update_image_status(Request $request){
       if ($request->ajax()) {
        $data=$request->all();
         //echo "<pre>"; print_r($data); die();
        if ($data['status']=='Active') {
          $status=0;
        }else{
          $status=1;
        }
        #echo $status; die();
        ProductsImage::where('id',$data['image_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'image_id'=>$data['image_id']]);
      }
    }

    public function delete_image($id){
      $image_name=ProductsImage::select('image')->where('id',$id)->first();
      //echo "<pre>"; print_r($image_name); die();
      // Image path
      $small_image_path='images/admin/products/small/';
      $medium_image_path='images/admin/products/medium/';
      $large_image_path='images/admin/products/large/';
      //check existance and delete image name and delete from folder
      if (file_exists($small_image_path.$image_name->image)) {
          unlink($small_image_path.$image_name->image);
      }
       if (file_exists($medium_image_path.$image_name->image)) {
          unlink($medium_image_path.$image_name->image);
      }
       if (file_exists($large_image_path.$image_name->image)) {
          unlink($large_image_path.$image_name->image);
      }

      ProductsImage::where('id',$id)->delete();
     
      return redirect()->back()->with('success_message','Product Image has been deleted successfully');
    }
}

