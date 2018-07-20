<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings', ['email' => Setting::find(1)->value, 'message' => '']);
    }

    public function send(Request $request)
    {
        $setting = Setting::find(1);
        $message = '';

        $rules = array(
            'email' => 'required|email',
        );

        $messages = array(
            'email.required' => 'Email должен быть заполнен',
            'email.email' => 'Некорректный формат Email'
        );

        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            $message = $validation->errors()->first();
            return view('admin.settings', ['email' => $setting->value, 'message' => $message]);
        } else {
            $setting->value = $request->all()['email'];
            $setting->save();
        }

        return redirect(route('admin'));
    }
}
