<?php

namespace App\Http\Controllers;

use App\Events\OrderPostedEvent;
use App\Order;
use App\OrderPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{

    public function index()
    {
        $order = Auth::user()->orders()->where('status', '=', 0)->first();
        $orderPositions=[];

        if (!is_null($order)) {
            $orderPositions = $order->orderPositions()->orderBy('created_at')->get()->all();
        }

        return view('front.cart', ['orderPositions' => $orderPositions]);
    }

    public function add($product_id)
    {
        $user = Auth::user();
        $order = $user->orders()->where('status', '=', 0)->first();

        if (is_null($order)) {
            $order = new Order();
            $user->orders()->save($order);
        }

        $orderPosition = new OrderPosition();
        $orderPosition->product_id = $product_id;

        $order->orderPositions()->save($orderPosition);

        return redirect()->route('cart');
    }

    public function delete($orderPosition_id)
    {
        $user = Auth::user();
        OrderPosition::find($orderPosition_id)->delete();

        $order = $user->orders()->where('status', '=', 0)->first();

        if ($order->orderPositions()->count() == 0) {
            $order->delete();
        }

        return back();
    }

    public function send(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email'
        );

        $messages = array(
            'name.required' => 'Укажите Ваше имя',
            'email.required' => 'Укажите Ваш Email',
            'email.email' => 'Некорректный формат Email'
        );

        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            $message = $validation->errors()->first();
            $success = 0;
        } else {
            try {
                $customerName = strip_tags($request->all()['name']);
                $customerName = htmlspecialchars($customerName, ENT_QUOTES);
                $customerEmail = strip_tags($request->all()['email']);
                $customerEmail = htmlspecialchars($customerEmail, ENT_QUOTES);

                $order = Auth::user()->orders()->where('status', '=', 0)->first();
                $order->status = 1;
                $order->customer_name = $customerName;
                $order->customer_email = $customerEmail;
                $order->save();

                event(new OrderPostedEvent($order));
                $success = 1;
                $message = 'Спасибо за заказ. Наш менеджер свяжется с Вами в течение дня.';
            } catch (\Exception $e) {
                $success = 0;
                $message = 'Произошла непредвиденная ошибка. Попробуйте позже или свяжитесь с администратором';
                Log::error($e->getMessage(), ['exception' => $e]);
            }
        }

        $response = json_encode(['message' => $message, 'success' => $success], JSON_UNESCAPED_UNICODE);

        return $response;
    }

}
