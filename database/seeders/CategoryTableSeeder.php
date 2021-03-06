<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesRecords=[ 
         ['id'=>1,'parent_id'=>0,'section_id'=>1,'category_name'=>'T-Shirts','category_image'=>'','category_discount'=>80,'category_description'=>'description','category_url'=>'t-shirts','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1
         ],
         ['id'=>2,'parent_id'=>1,'section_id'=>1,'category_name'=>'Casual T-Shirts','category_image'=>'','category_discount'=>80,'category_description'=>'description','category_url'=>'casulal-t-shirts','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1
         ]
        
        ];
        
        Category::insert($categoriesRecords);
    }
}
