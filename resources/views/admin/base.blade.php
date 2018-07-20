@extends('layouts.app')

@section('page-title')| Административная панель@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 test-block">
                <nav>
                    <ul class="nav nav-pills flex-column">
                        @foreach(\App\Menu::where('name', '=', 'Admin')->first()->menuItems()->get() as $menuItem)
                            <li class="nav-item">
                                <?php
                                    $routes = explode('.', Route::currentRouteName());
                                ?>
                                <a class="nav-link @if($routes[0] .'.'. $routes[1] == $menuItem->route_name) active @endif" href="{{route($menuItem->route_name)}}">{{$menuItem->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-lg-9">
                @yield('main-content')
            </div>
        </div>
    </div>
@endsection