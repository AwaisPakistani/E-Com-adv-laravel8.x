<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $productsBrandsRecords=[
         ['id'=>1,'name'=>'Gul Ahmed','status'=>1],
         ['id'=>2,'name'=>'J dot','status'=>1],
         ['id'=>3,'name'=>'P-Wire','status'=>1]
         
        ];
        
        Brand::insert($productsBrandsRecords);
    }
}
