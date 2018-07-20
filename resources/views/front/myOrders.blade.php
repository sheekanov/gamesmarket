@extends('layouts.main');

@section('page-title')| Мои заказы@endsection
@section('content-title')Мои заказы@endsection

@section('main-content')
    <div class="cart-product-list">
        @foreach($orderPositionsPagination->itemsOnPage as $orderPosition)
            <div class="cart-product-list__item">
                <div class="cart-product__item__product-photo"><img src="{{$orderPosition->product()->withTrashed()->first()->pic}}" class="cart-product__item__product-photo__image"></div>
                <div class="cart-product__item__product-name">
                    <div class="cart-product__item__product-name__content"><a href="{{route('product', ['product_id' => $orderPosition->product_id])}}">{{$orderPosition->product()->withTrashed()->first()->name}}</a></div>
                </div>
                <div class="cart-product__item__cart-date">
                    <div class="cart-product__item__cart-date__content">{{$orderPosition->created_at->format('d.m.Y')}}</div>
                </div>
                <div class="cart-product__item__product-price"><span class="product-price__value">{{$orderPosition->product()->withTrashed()->first()->price}} рублей</span></div>
            </div>
        @endforeach
    </div>
@endsection

@section('content-footer')
    {!! $orderPositionsPagination->renderPagination() !!}
@endsection