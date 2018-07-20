@extends('layouts.main');
@section('content-title')Последние товары@endsection

@section('main-content')
    <div class="products-columns">
        @foreach($productsPagination->itemsOnPage as $product)
            <div class="products-columns__item">
                <div class="products-columns__item__title-product"><a href="{{route('product', ['product_id' => $product->id])}}" class="products-columns__item__title-product__link">{{$product->name}}</a></div>
                <div class="products-columns__item__thumbnail"><a href="{{route('product', ['product_id' => $product->id])}}" class="products-columns__item__thumbnail__link"><img src="{{$product->pic}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                <div class="products-columns__item__description"><span class="products-price">{{$product->price}} руб</span><a href="{{route('cart.add', ['product_id' => $product->id])}}" class="btn btn-blue">Купить</a></div>
            </div>
        @endforeach
    </div>
@endsection

@section('content-footer')
    {!! $productsPagination->renderPagination() !!}
@endsection