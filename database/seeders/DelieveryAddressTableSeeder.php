<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DelieveryAddress;

class DelieveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DelAddRecords=[
         ['id'=>1,'user_id'=>1,'address'=>'Sohan Islamabad','city'=>'Islamabad','state'=>'Capital Territory','country'=>'Pakistan','pincode'=>46000,'mobile'=>'03034452424','status'=>1],
         ['id'=>2,'user_id'=>1,'address'=>'Khanna pul Rawalpindi','city'=>'Rawalpindi','state'=>'Punjab','country'=>'Pakistan','pincode'=>44000,'mobile'=>'03044452424','status'=>1],
        ];
        
        DelieveryAddress::insert($DelAddRecords);
    }
}
