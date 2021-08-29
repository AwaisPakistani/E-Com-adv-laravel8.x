<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        #$this->call(AdminsTableSeeder::class);
        //$this->call(SectionsTableSeeder::class);
        //$this->call(CategoryTableSeeder::class);
         //$this->call(ProductsTableSeeder::class);
         //$this->call(ProductsAttributesTableSeeder::class);
         //$this->call(ProductsImagesTable::class);
         //$this->call(BrandsTableSeeder::class);
        //$this->call(BannersTableSeeder::class);
        //$this->call(CouponsTableSeeder::class);
        //$this->call(DelieveryAddressTableSeeder::class);
        //$this->call(OrderStatusTableSeeder::class);  
        //$this->call(CmsPagesTableSeeder::class);
        //$this->call(create_front_settings_seeder::class);
        //$this->call(CurrenciesTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
         
    }
}//
