<?php

namespace LacosFofos\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function categories()
    {
        return $this->hasMany('LacosFofos\Models\Category');
    }
}
