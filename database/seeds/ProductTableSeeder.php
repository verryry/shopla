<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert([
          'id_category' => '1',
          'name' => 'T-shirt',
          'price' => '55',
          'featured_image' => '4040.jpg',
          'size' => 'XL',
          'quantity' => '1',
          'description' => 'Really Good T-shirt for Man',
      ]);
    }
}
