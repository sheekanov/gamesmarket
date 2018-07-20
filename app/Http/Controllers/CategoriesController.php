<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\CustomClasses\Pagination;
use Illuminate\Http\Request;
use App\Product;

class CategoriesController extends Controller
{
    public function index($categorie_id, Request $request)
    {
        $prods = Product::where('categorie_id', '=', $categorie_id)->orderBy('created_at', 'desc')->get();
        $pagination = new Pagination($prods, 6, $request, ['categorie_id' => $categorie_id]);
        $data = [
            'content_title' => 'Игры в разделе ' . Categorie::find($categorie_id)->name,
            'productsPagination' => $pagination,
        ];
        return view('front.categories', $data);
    }
}
