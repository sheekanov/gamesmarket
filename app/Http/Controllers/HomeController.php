<?php

namespace App\Http\Controllers;

use App\CustomClasses\Pagination;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $prods = Product::orderBy('created_at', 'desc')->get();
        $pagination = new Pagination($prods, 6, $request);

        return view('front.home', ['productsPagination' => $pagination]);
    }
}
