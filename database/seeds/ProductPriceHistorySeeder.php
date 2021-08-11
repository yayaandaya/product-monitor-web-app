<?php

use Illuminate\Database\Seeder;

class ProductPriceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2829000,
            'is_deleted' => false,
            'created_at' => "2021-08-11 13:00"
        ]);
    }
}
