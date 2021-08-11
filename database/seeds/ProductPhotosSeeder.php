<?php

use Illuminate\Database\Seeder;

class ProductPhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_photos')->insert([
            'product_id' => 1,
            'photo_url' => 'https://cdn-m2.fabelio.com/catalog/product/k/u/kumi_ed_back.jpg?auto=format',
            'is_deleted' => false
        ]);
    }
}
