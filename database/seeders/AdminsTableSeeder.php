<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords=[
         [
         	'id'=>1,'name'=>'admin','type'=>'Admin','mobile'=>'030499994949','email'=>'admin@gmail.com','password'=>'$2y$10$6wnaltn72tnEBmvvUIRGbOVGwZPKRUVNUm1aWOG0g7BcoBzo7Wrbq','image'=>'4.jpg','status'=>1
         ],
         [
         	'id'=>2,'name'=>'sub admin','type'=>'sub admin','mobile'=>'030499994949','email'=>'subadmin@gmail.com','password'=>'$2y$10$6wnaltn72tnEBmvvUIRGbOVGwZPKRUVNUm1aWOG0g7BcoBzo7Wrbq','image'=>'3.jpg','status'=>1
         ],
         [
         	'id'=>3,'name'=>'editor','type'=>'editor','mobile'=>'030499994949','email'=>'editr@gmail.com','password'=>'$2y$10$6wnaltn72tnEBmvvUIRGbOVGwZPKRUVNUm1aWOG0g7BcoBzo7Wrbq','image'=>'5.jpg','status'=>1
         ],
        ];
        
        DB::table('admins')->insert($adminRecords);
        /*foreach ($adminRecords as $key => $record) {
        	\App\Models\Admin::create($record);
        }*/
    }
}
