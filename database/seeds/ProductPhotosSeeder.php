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
        DB::table('product_photos')->insert([
            'product_id' => 1,
            'photo_url' => 'https://cdn-m2.fabelio.com/catalog/product/k/u/kumi_ed_3-4.jpg?auto=format',
            'is_deleted' => false
        ]);

        DB::table('product_photos')->insert([
            'product_id' => 1,
            'photo_url' => 'https://cdn-m2.fabelio.com/catalog/product/k/u/kumi_ed_side.jpg?auto=format',
            'is_deleted' => false
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 1,
            'photo_url' => 'https://cdn-m2.fabelio.com/catalog/product/k/u/kumi_ed_front_1.jpg?auto=format',
            'is_deleted' => false
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 1,
            'photo_url' => 'https://cdn-m2.fabelio.com/catalog/product/i/m/img_9040a.jpg?auto=format',
            'is_deleted' => false
        ]);
        DB::table('product_photos')->insert([
            'product_id' => 1,
            'photo_url' => 'https://cdn-m2.fabelio.com/catalog/product/i/m/img_9038a.jpg?auto=format',
            'is_deleted' => false
        ]);
    }
}
