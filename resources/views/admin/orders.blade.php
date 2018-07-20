@extends('admin.base')

@section('main-content')
    <div class="row mb-3">
        <h2 class="col-lg-12">Заказы</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Номер</th>
                    <th>Дата</th>
                    <th>Пользователь</th>
                    <th>Имя покупателя</th>
                    <th>Email для связи</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr id="{{$order->id}}">
                        <td>{{$order->id}}</td>
                        <td>{{$order->updated_at->format('d.m.Y')}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->customer_email}}</td>
                        <td><a class="badge badge-primary" href="{{route('admin.orders.view' , ['order_id' => $order->id])}}">Просмотр</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection