<?php

namespace LacosFofos\Http\Controllers;

use Illuminate\Http\Request;
use LacosFofos\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_error', 'Categoria adicionada com sucesso');
        }
        $levels = Category::where(['parent_id' => 0])->get();
        return view('admin.category.add_category')->with(compact('levels'));
    }

    public function editCategory(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            Category::where(['id' => $id])->update(['name' => $data['category_name'], 'description' => $data['category_description'], 'url' => $data['category_url']]);
            return redirect('/admin/view-categories')->with('flash_message_error', 'Categoria atualizada com sucesso');
        }
        $categoriesDetails = Category::where(['id' => $id])->first();
        $levels = Category::where(['parent_id' => 0])->get();
        return view('admin.category.add_category')->with(compact('categoriesDetails', 'levels'));
    }

    public function deleteCategories(Request $request, $id = null)
    {
        if (!empty($id)) {
            Category::where(['id' => $id])->delete();
            return redirect()->back()->with('flash_message_error', 'Categoria removida com sucesso');
        }
    }

    public function viewCategories()
    {
        $categories = Category::get();
        $categories = json_decode(json_encode($categories));
        return view('admin.category.view_categories')->with(compact('categories'));
    }
}
