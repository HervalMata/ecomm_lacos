<?php

namespace LacosFofos\Http\Controllers;

use Illuminate\Http\Request;
use LacosFofos\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $productsAll = Product::get();
        $productsAll = Product::orderBy('id', 'DESC')->get();
        $productsAll = Product::inRandomOrder()->get();
        return view('index')->with(compact('productsAll'));
    }
}
