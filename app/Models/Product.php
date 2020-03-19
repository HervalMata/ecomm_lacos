<?php

namespace LacosFofos\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function attributes()
    {
        return $this->hasMany('LacosFofos\Models\ProductsAttribute', 'product_id');
    }
}
