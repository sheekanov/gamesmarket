<?php

namespace App\Http\Controllers;

use App\CustomClasses\Pagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrdersController extends Controller
{
    public function index(Request $request)
    {

        $orders = Auth::user()->orders()->where('status', '=', 1)->orderBy('created_at', 'desc')->get();

        $orderPositions = $orders->map(function ($item) {
            return $item->orderPositions()->get();
        })->collapse();

        $pagination = new Pagination($orderPositions, 6, $request);

        return view('front.myOrders', ['orderPositionsPagination' => $pagination]);
    }
}
