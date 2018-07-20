@extends('admin.base')

@section('main-content')
    <div class="row mb-3">
        <h2 class="col-lg-12">Заказ №{{$order->id}} от {{$order->updated_at->format('d.m.Y H:i')}}</h2>
    </div>
    <div class="row mb-5">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{route('admin.orders')}}" role="button">Назад</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <table class="table">
                <tr>
                    <td><b>Пользователь</b></td>
                    <td>{{$order->user->name}}</td>
                </tr>
                <tr>
                    <td><b>Имя покупателя</b></td>
                    <td>{{$order->customer_name}}</td>
                </tr>
                <tr>
                    <td><b>Email для связи</b></td>
                    <td>{{$order->customer_email}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Продукт</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tfoot>
                <tr class="table-active">
                    <td><b>Итого:</b></td>
                    <td><b>
                        {{$order->orderPositions()->get()->map(function($item) {
                            return $item->product()->withTrashed()->first()->price;
                                })->sum()}}
                    </td></b>
                </tr>
                </tfoot>
                <tbody>
                @foreach($order->orderPositions()->get() as $orderPosition)
                    <tr id="{{$orderPosition->id}}">
                        <td><a href="{{route('product', ['product_id' => $orderPosition->product_id])}}">{{$orderPosition->product()->withTrashed()->first()->name}}</a></td>
                        <td>{{$orderPosition->product()->withTrashed()->first()->price}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection