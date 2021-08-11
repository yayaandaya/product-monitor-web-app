<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Meja Kantor Xaverius',
            'description' => 'Meja Kerja Xaverius yang keren ini bisa menjadi teman kerjamu sehari-hari. Kaki-kakinya yang kokoh tentu dapat menopang semua barangmu. Dengan tinggi 75 cm, kamu dapat melakukan berbagai aktivitasmu dengan nyaman.',
            'link' => 'https://fabelio.com/ip/meja-kantor-xaverius-fbf',
            'is_deleted' => false,
        ]);
    }
}
