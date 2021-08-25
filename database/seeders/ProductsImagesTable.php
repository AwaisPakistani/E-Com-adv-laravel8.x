<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductsImage;

class ProductsImagesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $productsImgsRecords=[
         ['id'=>1,'product_id'=>1,'image'=>'image1.jpg','status'=>1],
         ['id'=>2,'product_id'=>1,'image'=>'image2.jpg','status'=>1],
         ['id'=>3,'product_id'=>1,'image'=>'image3.jpg','status'=>1]
         
        ];
        
        ProductsImage::insert($productsImgsRecords);
    }
}
