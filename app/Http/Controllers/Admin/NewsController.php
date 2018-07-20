<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news', ['news' => $news]);
    }

    public function create(Request $request)
    {
        $message ='';
        if (Route::currentRouteName() == 'admin.news.create_post') {
            $rules = array(
                'title' => 'required',
                'text' => 'required',
                'excerpt' => 'required',
                'thumbnail' => 'required|image'
            );

            $messages = array(
                'title.required' => 'Заголовок должен быть заполнен',
                'text.required' => 'Текст должен быть заполнен',
                'excerpt.required' => 'Отрывок должен быть заполнен',
                'thumbnail.required' => 'Следует загрузить картинку',
                'thumbnail.image' => 'Выбранный файл не является изображением'
            );

            $validation = Validator::make($request->all(), $rules, $messages);

            if ($validation->fails()) {
                $message = $validation->errors()->first();
                return view('admin.newsCreate', ['message' => $message]);
            } else {
                $news = new News();
                $news->title = $request->all()['title'];
                $news->text = $request->all()['text'];
                $news->excerpt = $request->all()['excerpt'];
                $news->save();

                Storage::makeDirectory('uploads/news/news-id-' . $news->id);
                $request->file('thumbnail')->move(
                    storage_path() . '/app/public/uploads/news/news-id-' . $news->id,
                    'thumbnail.jpg'
                );
                $news->thumbnail = '/storage/uploads/news/news-id-' . $news->id . '/thumbnail.jpg';
                $news->save();

                return redirect()->route('admin.news');
            }
        }
        return view('admin.newsCreate', ['message' => $message]);
    }


    public function edit($news_id, Request $request)
    {
        $news = News::find($news_id);

        $message ='';
        if (Route::currentRouteName() == 'admin.news.edit_post') {
            $rules = array(
                'title' => 'required',
                'text' => 'required',
                'excerpt' => 'required',
                'thumbnail' => 'image'
            );

            $messages = array(
                'title.required' => 'Заголовок должен быть заполнен',
                'text.required' => 'Текст должен быть заполнен',
                'excerpt.required' => 'Отрывок должен быть заполнен',
                'thumbnail.image' => 'Выбранный файл не является изображением'
            );

            $validation = Validator::make($request->all(), $rules, $messages);

            if ($validation->fails()) {
                $message = $validation->errors()->first();
                return view('admin.newsEdit', ['news' => $news, 'message' => $message]);
            } else {
                $news->title = $request->all()['title'];
                $news->text = $request->all()['text'];
                $news->excerpt = $request->all()['excerpt'];

                if ($request->hasFile('thumbnail')) {
                    $request->file('thumbnail')->move(storage_path() . '/app/public/uploads/news/news-id-' . $news->id, 'thumbnail.jpg');
                    $news->thumbnail = '/storage/uploads/news/news-id-' . $news->id . '/thumbnail.jpg';
                }
                $news->save();
                return redirect()->route('admin.news');
            }
        }

        return view('admin.newsEdit', ['news' => $news, 'message' => $message]);
    }

    public function delete($news_id)
    {
        $news = News::find($news_id);
        $news->delete();

        return redirect()->route('admin.news');
    }
}
