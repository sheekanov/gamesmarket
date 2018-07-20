@extends('layouts.main');

@section('page-title')| Новости@endsection
@section('content-title')Новости@endsection

@section('main-content')
    <div class="news-list__container">
        @foreach($newsPagination->itemsOnPage as $item)
            <div class="news-list__item">
                <div class="news-list__item__thumbnail"><img src="{{$item->thumbnail}}"></div>
                <div class="news-list__item__content">
                    <div class="news-list__item__content__news-title">{{$item->title}}</div>
                    <div class="news-list__item__content__news-date">{{$item->created_at->format('d.m.Y')}}</div>
                    <div class="news-list__item__content__news-content">
                        {!! $item->excerpt !!}
                    </div>
                </div>
                <div class="news-list__item__content__news-btn-wrap"><a href="{{route('news.article', ['news_id' => $item->id])}}" class="btn btn-brown">Подробнее</a></div>
            </div>
        @endforeach
    </div>
@endsection

@section('content-footer')
    {!! $newsPagination->renderPagination() !!}
@endsection