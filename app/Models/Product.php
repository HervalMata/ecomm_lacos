<?php

namespace LacosFofos\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function attributes()
    {
        return $this->hasMany('lacosFofos\Models\ProductsAttribute', 'product_id');
    }
}
