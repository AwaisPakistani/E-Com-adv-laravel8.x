<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\MOdels\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencyRecords=[
         ['id'=>1,'currency_code'=>'SD','currency_rate'=>'40','status'=>1],
         ['id'=>2,'currency_code'=>'GBP','currency_rate'=>'224','status'=>1],
         ['id'=>3,'currency_code'=>'EUR','currency_rate'=>'190','status'=>1],
         ['id'=>4,'currency_code'=>'YEN','currency_rate'=>'50','status'=>1],
         ['id'=>5,'currency_code'=>'USD','currency_rate'=>'165','status'=>1]
        ];
        
        Currency::insert($currencyRecords);
    }
}
