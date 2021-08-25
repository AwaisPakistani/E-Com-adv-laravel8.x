<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CmsPage;

class CmsPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cmsPageRecords=[
         ['id'=>1,'title'=>'About Us','description'=>'About Us description','url'=>'about-us','meta_title'=>'About Us','meta_description'=>'About Us meta description','meta_keywords'=>'about us,about e-commerce','status'=>1],
         ['id'=>2,'title'=>'Privacy Policy','description'=>'Privacy Policy description','url'=>'privacy-policy','meta_title'=>'Privacy Policy','meta_description'=>'Privacy Policy meta description','meta_keywords'=>'privacy policy,privacy policy of e-commerce','status'=>1],
        ];
        
        CmsPage::insert($cmsPageRecords);
    }
}
