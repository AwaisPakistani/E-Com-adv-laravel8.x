<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\frontSetting;

class create_front_settings_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frontSettingRecords=[
         ['id'=>1,'image'=>'logo.jpg','social'=>'www.facebook.com']
        ];
        
        frontSetting::insert($frontSettingRecords);
    }
}
