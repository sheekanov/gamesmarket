@extends('layouts.main')
@section('page-title')| Новости@endsection
@section('content-title')Новости@endsection

@section('main-content')
    <div class="news-block content-text clearfix">
        <h3 class="content-text__title">
           {{$news->title}}
        </h3>
        <div class="article__thumbnail">
            <img src="{{$news->thumbnail}}" alt="Image" class="alignleft img-news">
        </div>
        <div class="article__user-content">
            {!! $news->text !!}
        </div>
    </div>
@endsection

@section('content-bottom')
    @include('front.content-bottom');
@endsection