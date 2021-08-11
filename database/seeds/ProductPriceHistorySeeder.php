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
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2849000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 14:00"
        ]);
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2819000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 15:00"
        ]);
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2819000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 16:00"
        ]);
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2879000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 17:00"
        ]);
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2879000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 18:00"
        ]);
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2879000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 19:00"
        ]);
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2879000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 20:00"
        ]);
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2839000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 21:00"
        ]);
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2819000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 22:00"
        ]);
        DB::table('product_price_history')->insert([
            'product_id' => 1,
            'price' => 2819000,
            'is_deleted' => false,
            'created_at' => "2020-08-11 23:00"
        ]);
    }
}
