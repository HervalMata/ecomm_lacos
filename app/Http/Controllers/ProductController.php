<?php

namespace LacosFofos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use LacosFofos\Models\Coupon;
use LacosFofos\Models\Product;
use LacosFofos\Models\Category;
use Image;
use LacosFofos\Models\ProductsAttribute;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_error', "Categorias estão perdidas!");
            }
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            if (!empty($data['description'])) {
                $product->description = $data['description'];
            } else {
                $product->description = '';
            }
            if (!empty($data['care'])) {
                $product->care = $data['care'];
            } else {
                $product->care = '';
            }
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $product->price = $data['price'];
            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                   $extension = $image_tmp->getClientOriginalExtension();
                   $filename = rand(111, 99999) . '.' . $extension;
                   $large_image_path = 'images/backend_images/products/large'.$filename;
                   $medium_image_path = 'images/backend_images/products/medium'.$filename;
                   $small_image_path = 'images/backend_images/products/small'.$filename;
                   Image::make($image_tmp)->save($large_image_path);
                   Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                   Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
                   $product->image = $filename;
                }
            }
            $product->status = $status;
            $product->save();
            return redirect()->back()->with('flash_message_success', "Produto adicionado com sucesso!");
        }

        $categories = Category::where(['parent_id' => 0])->get();
        $categories_drop_down = "<option value='' selected disabled>Selecione</option>";
        foreach ($categories as $cat) {
            $categories_drop_down = "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_drop_down .= "<option value='" . $sub_cat->id . "'>&nbsp;--&nbsp;". $sub_cat->name ."</option>";
            }
        }
        return view('admin.product.add_product')->with(compact('categories_drop_down'));
    }

    public function editProduct(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_error', "Categorias estão perdidas!");
            }

            if (empty($data['description'])) {
                $data['description'] = '';
            }
            if (empty($data['care'])) {
                $data['care'] = '';
            }
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                   $extension = $image_tmp->getClientOriginalExtension();
                   $filename = rand(111, 99999) . '.' . $extension;
                   $large_image_path = 'images/backend_images/products/large'.$filename;
                   $medium_image_path = 'images/backend_images/products/medium'.$filename;
                   $small_image_path = 'images/backend_images/products/small'.$filename;
                   Image::make($image_tmp)->save($large_image_path);
                   Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                   Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
                }

            } else if (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }
            Product::where(['id' => $id])->update([
                'category_id' => $data['category_id'],
                'product_name' => $data['product_name'],
                'product_code' => $data['product_code'],
                'product_color' => $data['product_color'],
                'description' => $data['description'],
                'care' => $data['care'],
                'status => $status',
                'price' => $data['price'],
                'image' => $filename
             ]);
            return redirect()->back()->with('flash_message_success', "Produto atualizado com sucesso!");
        }
        $productDetails = Product::where(['id' => $id])->first();
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option='' selected disabled>Selecione</option>";
        foreach ($categories as $cat) {
            if ($cat->id == $productDetails->category_id) {
                $selected = "selected";
            } else {
                $selected = '';
            }

            $categories_dropdown = "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                if ($sub_cat->id == $productDetails->category_id) {
                    $selected = "selected";
                } else {
                    $selected = '';
                }
                $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--&nbsp;". $sub_cat->name ."</option>";
            }
        }
        return view('admin.product.edit_product')->with(compact('productDetails', 'categories_dropdown'));
    }

    public function deleteProduct($id = null)
    {
        Product::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_error', 'Produto foi removido com sucesso.');
    }

    public function deleteProductImage($id = null)
    {
        $productImage = Product::where(['id' => $id])->first();

        $large_image_path = 'images/backend_images/products/large';
        $medium_image_path = 'images/backend_images/products/medium';
        $small_image_path = 'images/backend_images/products/small';

        if (file_exists($large_image_path.$productImage->image)) {
            unlink($large_image_path.$productImage->image);
        }

        if (file_exists($medium_image_path.$productImage->image)) {
            unlink($medium_image_path.$productImage->image);
        }

        if (file_exists($small_image_path.$productImage->image)) {
            unlink($small_image_path.$productImage->image);
        }

        Product::where(['id' => $id])->update(['image' => '']);
        return redirect()->back()->with('flash_message_error', 'Imagem do produto foi removida com sucesso.');
    }

    public function viewProducts()
    {
        $products = Product::get();
        $products = json_decode(json_encode($products));
        foreach ($products as $key => $val) {
            $category_name = Category::where(['id' => $val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        return view('admin.product.view_products')->with(compact('products'));
    }

    public function addAttributes(Request $request, $id = null)
    {
        $productDetails = Product::with('attributes')->where(['id' => $id])->first();

        $categoryDetails = Category::where(['id' => $productDetails->category_id])->first();
        $category_name = $categoryDetails->name;

        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach ($data['sku'] as $key => $val ) {
                if (!empty($val)) {
                    $attrCountSKU = ProductsAttribute::where(['sku' => $val])->count();
                    if ($attrCountSKU > 0) {
                        return redirect('admin/add-attributes/' . $id)->with('flas_message_error', 'SKU já existe. Por favor adicione outro SKU');
                    }
                    $attrCountSizes = ProductsAttribute::where(['product_id' => $id, 'size' => $data['size'][$key]])->count();
                    if ($attrCountSizes > 0) {
                        return redirect('admin/add-attributes/' . $id)->with('flas_message_error', 'Este Tamanho já existe. Por favor adicione outro Tamanho');
                    }
                    $attribute = new ProductsAttribute();
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
            return redirect('admin/add-attributes/' . $id)->with('flash_message_success', 'Atributos dos produtos adicionados com sucesso.');
        }
        $title = "Adicione Atributos";
        return view('admin.product.add_attributes')->with(compact('title','productDetails', 'category_name'));
    }

    public function editAttributes(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach ($data['idAttr'] as $key => $attr ) {
                ProductsAttribute::where(['id' => $data['idAttr'][$key]])->update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
            }
            return redirect()->back()->with('flash_message_error', 'Atributos do produto atualizados');
        }
    }

    public function deleteAttribute($id = null)
    {
        ProductsAttribute::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_error', 'Atributo do produto removido com sucesso.');
    }

    public function products($url = null)
    {
        $categories = Category::all();
        $categoriesDetails = Category::where(['url' => $url, 'status' => 1])->first();
        $productsAll = Product::where(['category_id' => $categoriesDetails->id])->get();
        return view('products.listing')->with(compact('categories', 'categoriesDetails', 'productsAll'));
    }

    public function product($id = null)
    {
        $productDetails = Product::with('attributes')->where('id', $id)->first();
        $productDetails = json_decode(json_encode($productDetails));
        $relatedProducts = Product::where('id', '!=', $id)->where(['category_id' => $productDetails->category_id])->get();
        $categories = Category::all();
        $total_stock = ProductsAttribute::where('product_id', $id)->sum('stock');
        return view('products.detail')->with(compact('productDetails', 'categories', 'total_stock', 'relatedProducts'));
    }

    public function getProductPrice(Request $request)
    {
        $data = $request->all();
        $proArr = explode("-", $data['idSize']);
        $proAttr = ProductsAttribute::where(['product_id' => $proArr[0], 'size' => $proArr[1]])->first();
        echo $proAttr->price;
        echo "#";
        echo $proAttr->stock;
    }

    public function addToCart(Request $request)
    {
        $data = $request->all();

        if (empty($data['user_email'])) {
            $data['user_email'] = '';
        }

        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = str_random(40);
            Session::put('session_id', $session_id);
        }

        if (empty($data['session_id'])) {
            $data['session_id'] = '';
        }

        $sizeArr = explode("-", $data['size']);

        $countProducts = DB::table('cart')->where(['product_id' => $data['product_id'], 'product_color' => $data['product_color'],
            'size' => $sizeArr[1], 'session_id' => $data['session_id']])->count();

        if ($countProducts > 0) {
            return redirect()->back()->with('flash_message_error', 'Produto já existe no carrinho.');
        } else {

            $getSKU = ProductsAttribute::select('sku')->where(['product_id' => $data['product_id'], 'size' => $sizeArr[1]])->first();

            DB::table('cart')->insert(['product_id' => $data['product_id'], 'product_name' => $data['product_name'],
                'product_code' => $getSKU, 'product_color' => $data['product_color'], 'price' => $data['price'],
                'size' => $sizeArr[1], 'quantity' => $data['quantity'], 'user_email' => $data['user_email'], 'session_id' => $data['session_id']]);
        }
        return redirect('cart')->with('flash_message_success', 'Produto foi adicionado para o carrinho!');
    }

    public function cart()
    {
        $session_id = Session::get('session_id');
        $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }
        return view('products.cart')->with(compact('userCart'));
    }

    public function deleteCartProduct($id = null)
    {
        DB::table('cart')->where('id', $id)->delete();
        return redirect('cart')->with('flash_message_success', 'Produto foi removido do carrinho!');
    }

    public function updateCartQuantity($id = null, $quantity = null)
    {
        $getCartDetails = DB::table('cart')->where(['id' => $id])->first();
        $getAttributeStock = ProductsAttribute::where('sku', $getCartDetails->product_code)->first();
        echo $getAttributeStock->stock; echo "--";
        $updated_quantity = $getCartDetails->quantity + $quantity;
        if ($getAttributeStock->stock >= $updated_quantity) {
            DB::table('cart')->where('id', $id)->increment('quantity', $quantity);
            return redirect('cart')->with('flash_message_success', 'A quantidade do produto foi aumentada no carrinho!');
        } else {
            return redirect('cart')->with('flash_message_error', 'A quantidade do produto requerido nãom está disponível');
        }

    }

    public function applyCoupon(Request $request)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data = $request->all();
        $couponCount = Coupon::where('coupon_code', $data['coupon_code'])->count();
        if ($couponCount == 0) {
            return redirect()->back()->with('flash_message_error', 'Cupom invalído');
        } else {
            $couponDetails = Coupon::where('coupon_code', $data['coupon_code'])->first();
            if ($couponDetails->status == 0) {
                return redirect()->back()->with('flash_message_error', 'Este Cupom não está ativo');
            }
            $expiry_date = $couponDetails->expiry_date;
            $current_date = date('Y-m-d');
            if ($expiry_date < $current_date) {
                return redirect()->back()->with('flash_message_error', 'Este Cupom está expirado');
            }
            $session_id = Session::get('session_id');
            $user_cart = DB::table('cart')->where(['session_id' => $session_id])->get();
            $total_amount = 0;
            foreach ($user_cart as $item) {
                $total_amount = $total_amount + ($item->price * $item->quantity);
            }
            if ($couponDetails->amount_type == "Fixed") {
                $couponAmount = $couponDetails->amount;
            } else {
                $couponAmount = $total_amount * ($couponDetails->amount/100);
            }
            Session::put('CouponAmount', $couponAmount);
            Session::put('CouponCode', $data['coupon_code']);

            return redirect()->back()->with('flash_message_error', 'O Código do Cupom foi aplicado com sucesso. Você tem um desconto disponível');
        }
    }
}
