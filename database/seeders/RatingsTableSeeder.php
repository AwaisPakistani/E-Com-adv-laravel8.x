<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $ratingsRecords=[
         ['id'=>1,'user_id'=>4,'product_id'=>1,'review'=>'Nice Service','rating'=>3,'status'=>1],
         ['id'=>2,'user_id'=>4,'product_id'=>2,'review'=>'Nice Service','rating'=>4,'status'=>1],
         ['id'=>3,'user_id'=>4,'product_id'=>3,'review'=>'Nice Service','rating'=>5,'status'=>1]
         
        ];
        
        Rating::insert($ratingsRecords);
    }
}
