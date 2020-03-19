<?php

use Illuminate\Database\Seeder;
use LacosFofos\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => 1,
            'product_name' => 'Laço 001',
            'product_code' => 'L001',
            'product_color' => 'Roxo',
            'description' => 'Laço roxo maravilhoso',
            'status' => 1,
            'price' => 27.00,
            'image' => '5555.jpg'
        ]);

        Product::create([
            'category_id' => 1,
            'product_name' => 'Laço 002',
            'product_code' => 'L002',
            'product_color' => 'Rosa',
            'description' => 'Laço rosa maravilhoso',
            'status' => 1,
            'price' => 30.00,
            'image' => '6666.jpg'
        ]);

        Product::create([
            'category_id' => 1,
            'product_name' => 'Laço 003',
            'product_code' => 'L003',
            'product_color' => 'Azul',
            'description' => 'Laço azul maravilhoso',
            'status' => 1,
            'price' => 35.00,
            'image' => '7777.jpg'
        ]);

        Product::create([
            'category_id' => 2,
            'product_name' => 'Tiara 001',
            'product_code' => 'T001',
            'product_color' => 'Roxo',
            'description' => 'Tiara roxa maravilhosa',
            'status' => 1,
            'price' => 30.00,
            'image' => '2222.jpg'
        ]);

        Product::create([
            'category_id' => 2,
            'product_name' => 'Tiara 002',
            'product_code' => 'T002',
            'product_color' => 'Amarela',
            'description' => 'Tiara amarela maravilhosa',
            'status' => 1,
            'price' => 35.00,
            'image' => '3333.jpg'
        ]);

        Product::create([
            'category_id' => 2,
            'product_name' => 'Tiara 003',
            'product_code' => 'T003',
            'product_color' => 'Rosa',
            'description' => 'Tiara rosa maravilhosa',
            'status' => 1,
            'price' => 40.00,
            'image' => '4444.jpg'
        ]);

        Product::create([
            'category_id' => 3,
            'product_name' => 'Viseira 001',
            'product_code' => 'V001',
            'product_color' => 'Roxo',
            'description' => 'Viseira roxa maravilhosa',
            'status' => 1,
            'price' => 40.00,
            'image' => '8888.jpg'
        ]);

        Product::create([
            'category_id' => 3,
            'product_name' => 'Viseira 002',
            'product_code' => 'V002',
            'product_color' => 'Branco',
            'description' => 'Viseira branca maravilhosa',
            'status' => 1,
            'price' => 45.00,
            'image' => '9999.jpg'
        ]);

        Product::create([
            'category_id' => 3,
            'product_name' => 'Viseira 003',
            'product_code' => 'V003',
            'product_color' => 'Azul',
            'description' => 'Viseira azul maravilhosa',
            'status' => 1,
            'price' => 50.00,
            'image' => '10000.jpg'
        ]);
    }
}
