<?php

namespace LacosFofos\Http\Controllers;

use Illuminate\Http\Request;
use LacosFofos\Models\Banner;
use LacosFofos\Models\Category;
use LacosFofos\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $productsAll = Product::inRandomOrder()->where('status', 1)->get();
        $productsAll = json_decode(json_encode($productsAll));
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
        $banners = Banner::where('status' , '1')->get();
        return view('index')->with(compact('productsAll', 'categories_menu', 'categories'));
    }
}
