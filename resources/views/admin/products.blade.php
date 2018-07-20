@extends('admin.base')

@section('main-content')
    <div class="row mb-3">
        <h2 class="col-lg-12">Продукты</h2>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{route('admin.products.create')}}" role="button">Добавить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Номер</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr id="{{$product->id}}">
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->categorie()->withTrashed()->first()->name}}</td>
                        <td>{{$product->price}}</td>
                        <td><a class="badge badge-primary" href="{{route('admin.products.edit' , ['product_id' => $product->id])}}">Изменить</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection