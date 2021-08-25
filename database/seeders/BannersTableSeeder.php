<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannersRecords=[
         ['id'=>1,'image'=>'image1.jpg','link'=>'image1link','title'=>'image1Title','alt'=>'Banner1','status'=>1],
         ['id'=>2,'image'=>'image2.jpg','link'=>'image2link','title'=>'image2Title','alt'=>'Banner2','status'=>1],
         ['id'=>3,'image'=>'image3.jpg','link'=>'image3link','title'=>'image3Title','alt'=>'Banner3','status'=>1],
        ];
        
        Banner::insert($bannersRecords);
    }
}
