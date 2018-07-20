<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($product_id)
    {
        $thisProd = Product::withTrashed()->find($product_id);


        $latestProds = Product::where('id', '!=', $product_id)->orderBy('created_at', 'desc')->take(3)->get();
        $data = [
            'this_product' => $thisProd,
            'latest_products' => $latestProds
        ];

        return view('front.product', $data);
    }
}
