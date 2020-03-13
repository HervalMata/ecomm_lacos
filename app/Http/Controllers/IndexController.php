<?php

namespace LacosFofos\Http\Controllers;

use Illuminate\Http\Request;
use LacosFofos\Models\Category;
use LacosFofos\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $productsAll = Product::get();
        $productsAll = Product::orderBy('id', 'DESC')->get();
        $productsAll = Product::inRandomOrder()->get();
        $categories_menu = "";
        $categories = Category::all();
        foreach ($categories as $cat) {
            $categories_menu .="
            <div class='panel-heading'>
              <h4 class='panel-title'>
                <a data-toggle='collapse' data-parent='#accordian' href='#" . $cat->id . "'>
                    <span class='badge pull-right'><i class='fa fa-plus'></i></span>
                    " .$cat->name ."
                </a>
              </h4>
            </div>
            ";
        }
        return view('index')->with(compact('productsAll', 'categories_menu', 'categories'));
    }
}
