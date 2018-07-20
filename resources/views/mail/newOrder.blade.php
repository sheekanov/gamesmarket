<p>Поступил заказ <b>№{{$order->id}}</b> от {{$order->updated_at->format('d.m.Y H:i')}}</p>
<p>Пользователь <b>{{$order->user->name}} ({{$order->customer_name}} {{$order->customer_email}})</b> оформил заказ :</p>
<table>
    <thead>
    <tr>
        <th>Товар</th>
        <th>Цена</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->orderPositions()->get()->all() as $orderPosition)
        <tr>
            <td><a href="{{route('product', ['product_id' => $orderPosition->product_id])}}">{{$orderPosition->product->name}}</a></td>
            <td>{{$orderPosition->product->price}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

