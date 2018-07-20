@extends('admin.base')

@section('main-content')
    <div class="row mb-3">
        <h2 class="col-lg-12">Новости</h2>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="{{route('admin.news.create')}}" class="btn btn-primary">Добавить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Номер</th>
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $item)
                    <tr id="{{$item->id}}">
                        <td>{{$item->id}}</td>
                        <td>{{$item->created_at->format('d.m.Y')}}</td>
                        <td>{{$item->title}}</td>
                        <td><a class="badge badge-primary" href="{{route('admin.news.edit' , ['news_id' => $item->id])}}">Редактировать</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection