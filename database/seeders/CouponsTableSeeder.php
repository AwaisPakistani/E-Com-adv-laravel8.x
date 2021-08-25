<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $couponsRecords=[
         ['id'=>1,'coupon_option'=>'Manual','coupon_code'=>'test10','categories'=>'2,3','users'=>'dummy@gmailc.om,faiza@gmail.com','coupon_type'=>'single','amount_type'=>'Percenteage','amount'=>'10','expiry_date'=>'2020-12-31','status'=>1],
        ];
        
        Coupon::insert($couponsRecords);
    }
}
