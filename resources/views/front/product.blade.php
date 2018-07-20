@extends('layouts.main')
@section('page-title')| Товары@endsection
@section('content-title'){{$this_product->name}} в разделе {{$this_product->categorie->name}}@endsection
@section('main-content')
    <div class="product-container">
        <div class="product-container__image-wrap"><img src="{{$this_product->pic}}" class="image-wrap__image-product"></div>
        <div class="product-container__content-text">
            <div class="product-container__content-text__title">{{$this_product->name}}</div>
            <div class="product-container__content-text__price">
                <div class="product-container__content-text__price__value">
                    Цена:@if($this_product->trashed()) 0 @else <b>{{$this_product->price}}</b>@endif
                    руб
                </div>
                @if(!$this_product->trashed())<a href="{{route('cart.add', ['product_id' => $this_product->id])}}" class="btn btn-blue">Купить</a>@endif
            </div>
            <div class="product-container__content-text__description">
                @if($this_product->trashed())
                    <p>Данный товар более недоступен</p>
                @else
                    {!! $this_product->description !!}
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content-bottom')
    @include('front.content-bottom');
@endsection