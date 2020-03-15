<?php

use Illuminate\Database\Seeder;
use LacosFofos\Models\ProductsAttribute;

class ProductAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductsAttribute::create([
            'product_id' => 1,
            'sku' => 'LAC001',
            'size' => 'Médio',
            'price' => 27.00,
            'stock' => 1
        ]);

        ProductsAttribute::create([
            'product_id' => 2,
            'sku' => 'LAC002',
            'size' => 'Médio',
            'price' => 30.00,
            'stock' => 1
        ]);

        ProductsAttribute::create([
            'product_id' => 3,
            'sku' => 'LAC001',
            'size' => 'Médio',
            'price' => 35.00,
            'stock' => 1
        ]);

        ProductsAttribute::create([
            'product_id' => 4,
            'sku' => 'TIA001',
            'size' => 'Médio',
            'price' => 30.00,
            'stock' => 1
        ]);

        ProductsAttribute::create([
            'product_id' => 5,
            'sku' => 'TIA002',
            'size' => 'Médio',
            'price' => 35.00,
            'stock' => 1
        ]);

        ProductsAttribute::create([
            'product_id' => 6,
            'sku' => 'TIA003',
            'size' => 'Médio',
            'price' => 40.00,
            'stock' => 1
        ]);

        ProductsAttribute::create([
            'product_id' => 7,
            'sku' => 'VIS001',
            'size' => 'Médio',
            'price' => 40.00,
            'stock' => 1
        ]);

        ProductsAttribute::create([
            'product_id' => 8,
            'sku' => 'VIS002',
            'size' => 'Médio',
            'price' => 45.00,
            'stock' => 1
        ]);

        ProductsAttribute::create([
            'product_id' => 9,
            'sku' => 'VIS003',
            'size' => 'Médio',
            'price' => 50.00,
            'stock' => 1
        ]);
    }
}
