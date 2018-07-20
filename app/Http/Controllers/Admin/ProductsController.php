<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products', ['products' => $products]);
    }

    public function create(Request $request)
    {
        $categories = Categorie::all();

        $message ='';
        if (Route::currentRouteName() == 'admin.products.create_post') {
            $rules = array(
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'pic' => 'required|image'
            );

            $messages = array(
                'name.required' => 'Название должно быть заполнено',
                'description.required' => 'Описание должно быть заполнено',
                'price.required' => 'Цена должна быть заполнена',
                'price.numeric' => 'Цена должна быть числовым значением',
                'pic.required' => 'Следует загрузить картинку',
                'pic.image' => 'Выбранный файл не является изображением'
            );

            $validation = Validator::make($request->all(), $rules, $messages);

            if ($validation->fails()) {
                $message = $validation->errors()->first();
                return view('admin.productsCreate', ['categories' => $categories, 'message' => $message]);
            } else {
                $product = new Product();
                $product->name = $request->all()['name'];
                $product->categorie_id = $request->all()['categorie_id'];
                $product->description = $request->all()['description'];
                $product->price = $request->all()['price'];
                $product->save();

                Storage::makeDirectory('uploads/products/prod-id-' . $product->id);

                $request->file('pic')
                    ->move(storage_path() . '/app/public/uploads/products/prod-id-' . $product->id, 'productPic.jpg');

                $product->pic = '/storage/uploads/products/prod-id-' . $product->id . '/productPic.jpg';
                $product->save();
                return redirect()->route('admin.products');
            }
        }

        return view('admin.productsCreate', ['categories' => $categories, 'message' => $message]);
    }

    public function edit($product_id, Request $request)
    {
        $product = Product::find($product_id);
        $categories = Categorie::all();

        $message ='';
        if (Route::currentRouteName() == 'admin.products.edit_post') {
            $rules = array(
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'pic' => 'image'
            );

            $messages = array(
                'name.required' => 'Название должно быть заполнено',
                'description.required' => 'Описание должно быть заполнено',
                'price.required' => 'Цена должна быть заполнена',
                'price.numeric' => 'Цена должна быть числовым значением',
                'pic.image' => 'Выбранный файл не является изображением'
            );

            $validation = Validator::make($request->all(), $rules, $messages);

            if ($validation->fails()) {
                $message = $validation->errors()->first();
                return view('admin.productsEdit', [
                    'product' => $product,
                    'categories' => $categories,
                    'message' => $message
                    ]);
            } else {
                $product->name = $request->all()['name'];
                $product->description = $request->all()['description'];
                $product->price = $request->all()['price'];
                $product->categorie_id = $request->all()['categorie_id'];
                if ($request->hasFile('pic')) {
                    $request->file('pic')->move(
                        storage_path() . '/app/public/uploads/products/prod-id-' . $product->id,
                        'productPic.jpg'
                    );
                    $product->pic = '/storage/uploads/products/prod-id-' . $product->id . '/productPic.jpg';
                }
                $product->save();
                return redirect()->route('admin.products');
            }
        }

        return view('admin.productsEdit', ['product' => $product, 'categories' => $categories, 'message' => $message]);
    }


    public function delete($product_id)
    {

        $product = Product::find($product_id);
        $product->delete();
        return redirect()->route('admin.products');
    }
}
