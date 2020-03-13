<?php

use Illuminate\Database\Seeder;
use LacosFofos\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Laços',
            'parent_id' => 0,
            'description' => 'Laços para enfeitar cabelo',
            'url' => 'teste',
            'status' => 1
        ]);
        Category::create([
            'name' => 'Tiaras',
            'parent_id' => 0,
            'description' => 'Tiaras lindas para enfeitar cabelo',
            'url' => 'teste',
            'status' => 1
        ]);
        Category::create([
            'name' => 'Viseira',
            'parent_id' => 0,
            'description' => 'Viseiras para enfeitar cabelo',
            'url' => 'teste',
            'status' => 1
        ]);
    }
}
