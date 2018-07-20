<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AboutController extends Controller
{
    public function index()
    {
        $latestProds = Product::orderBy('created_at', 'desc')->take(3)->get();

        return view('front.about', ['latest_products' => $latestProds]);
    }
}
