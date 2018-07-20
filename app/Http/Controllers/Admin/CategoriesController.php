<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categorie::orderBy('created_at', 'desc')->get();
        return view('admin.categories', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $message ='';
        if (Route::currentRouteName() == 'admin.categories.create_post') {
            $rules = array(
                'name' => 'required',
                'description' => 'required'
            );

            $messages = array(
                'name.required' => 'Название должно быть заполнено',
                'description.required' => 'Описание должно быть заполнено',
            );

            $validation = Validator::make($request->all(), $rules, $messages);
            if ($validation->fails()) {
                $message = $validation->errors()->first();
                return view('admin.categoriesCreate', ['message' => $message]);
            } else {
                $categorie = new Categorie();
                $categorie->name = $request->all()['name'];
                $categorie->description = $request->all()['description'];
                $categorie->save();
                return redirect()->route('admin.categories');
            }
        }

        return view('admin.categoriesCreate', ['message' => $message]);
    }

    public function edit($categorie_id, Request $request)
    {

        $categorie = Categorie::find($categorie_id);

        $message ='';
        if (Route::currentRouteName() == 'admin.categories.edit_post') {
            $rules = array(
                'name' => 'required',
                'description' => 'required'
            );

            $messages = array(
                'name.required' => 'Название должно быть заполнено',
                'description.required' => 'Описание должно быть заполнено',
            );

            $validation = Validator::make($request->all(), $rules, $messages);
            if ($validation->fails()) {
                $message = $validation->errors()->first();
                return view('admin.categoriesEdit', ['categorie' => $categorie, 'message' => $message]);
            } else {
                $categorie->name = $request->all()['name'];
                $categorie->description = $request->all()['description'];
                $categorie->save();
                return redirect()->route('admin.categories');
            }
        }

        return view('admin.categoriesEdit', ['categorie' => $categorie, 'message' => $message]);
    }

    public function delete($categorie_id)
    {
        $categorie = Categorie::find($categorie_id);
        $categorie->delete();
        return redirect()->route('admin.categories');
    }
}
