<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $productsRecords=[ 
         ['id'=>1,'category_id'=>4,'section_id'=>1,'product_name'=>'Black Casual T-shirt','product_code'=>'Bl-01','product_color'=>'black','product_price'=>'1000','product_discount'=>'200','product_weight'=>'200','product_video'=>'','main_image'=>'','description'=>'Description black casual T-shirt','description'=>'','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'','fit'=>'','fit'=>'','occassion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1
         ],
         ['id'=>2,'category_id'=>4,'section_id'=>1,'product_name'=>'Grey Casual T-shirt','product_code'=>'Bl-02','product_color'=>'grey','product_price'=>'2000','product_discount'=>'300','product_weight'=>'220','product_video'=>'','main_image'=>'','description'=>'Description grey casual T-shirt','description'=>'','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'','fit'=>'','fit'=>'','occassion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1
         ]
        
        
        ];
        
        Product::insert($productsRecords);
    }
}
