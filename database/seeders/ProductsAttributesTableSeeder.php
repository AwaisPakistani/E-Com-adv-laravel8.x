<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductsAttribute;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsAttrRecords=[
         ['id'=>1,'product_id'=>1,'size'=>'Small','price'=>500,'stock'=>50,'sku'=>'Bl-02-S','status'=>1],
         ['id'=>2,'product_id'=>1,'size'=>'Medium','price'=>700,'stock'=>40,'sku'=>'Bl-02-M','status'=>1],
         ['id'=>3,'product_id'=>1,'size'=>'Large','price'=>1000,'stock'=>30,'sku'=>'Bl-02-L','status'=>1]
         
        ];
        
        ProductsAttribute::insert($productsAttrRecords);
    }
}
