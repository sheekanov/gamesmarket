@extends('admin.base')

@section('main-content')
    <div class="row mb-3">
        <h2 class="col-lg-12">Категории</h2>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{route('admin.categories.create')}}" role="button">Добавить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Номер</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $categorie)
                    <tr id="{{$categorie->id}}">
                        <td>{{$categorie->id}}</td>
                        <td>{{$categorie->name}}</td>
                        <td>{{$categorie->description}}</td>
                        <td><a class="badge badge-primary" href="{{route('admin.categories.edit' , ['categorie_id' => $categorie->id])}}">Изменить</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection