<!DOCTYPE html>
<html lang="ru">
<head>
    <title>{{ config('app.name', 'Laravel') }} @yield('page-title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
</head>
<body>
@yield('modal-section')
<div class="main-wrapper">
    <header class="main-header">
        <div class="logotype-container"><a href="/" class="logotype-link"><img src="/img/logo.png" alt="Логотип"></a></div>
        <nav class="main-navigation">
            <ul class="nav-list">
                @foreach(\App\Menu::where('name', '=', 'Main')->first()->menuItems()->get() as $menuItem)
                    <li class="nav-list__item"><a href="{{route($menuItem->route_name)}}" class="nav-list__item__link">{{$menuItem->title}}</a></li>
                @endforeach
            </ul>
        </nav>
        <div class="header-contact">
            <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
        </div>
        <div class="header-container">
            <div class="payment-container">
                @guest
                @else
                <div class="payment-basket__status">
                    <div class="payment-basket__status__icon-block"><a href="/cart" class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
                    <div class="payment-basket__status__basket">
                        <span class="payment-basket__status__basket-value">
                            <?php $order = Auth::user()->orders()->where('status', '=' ,0)->first(); ?>
                            @if(!is_null($order))
                                {{$order->orderPositions()->count()}}
                            @else
                                    0
                            @endif
                        </span>
                        <span class="payment-basket__status__basket-value-descr">товаров</span></div>
                </div>
                @endguest
            </div>
            <div class="authorization-block">
                @guest
                    <a href="/register" class="authorization-block__link">Регистрация</a><a href="/login" class="authorization-block__link">Войти</a>
                @else
                    <span class="authorization-block__link">{{Auth::user()->name}}</span><a href="" class="authorization-block__link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest

            </div>
        </div>
    </header>
    <div class="middle">
        <div class="sidebar">
            <div class="sidebar-item">
                <div class="sidebar-item__title">Категории</div>
                <div class="sidebar-item__content">
                    <ul class="sidebar-category">
                        @foreach(\App\Categorie::all() as $categorie)
                            <li class="sidebar-category__item"><a href="{{route('categories' , ['category_id' => $categorie->id])}}" class="sidebar-category__item__link">{{$categorie->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item__title">Последние новости</div>
                <div class="sidebar-item__content">
                    <div class="sidebar-news">
                        @foreach(\App\News::orderBy('created_at', 'desc')->take(3)->get() as $news)
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="{{$news->thumbnail}}" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                            <div class="sidebar-news__item__title-news"><a href="{{route('news.article', ['news_id' => $news->id])}}" class="sidebar-news__item__title-news__link">{{$news->title}}</a></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="content-top">
                <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
            </div>
            <div class="content-middle">
                <div class="content-head__container">
                    <div class="content-head__title-wrap">
                        <div class="content-head__title-wrap__title bcg-title">@yield('content-title')</div>
                    </div>
                    <div class="content-head__search-block">
                        <div class="search-container">
                            <form class="search-container__form" method="GET" action="{{route('search')}}">
                                {{csrf_field()}}
                                <input type="text" class="search-container__form__input" name="search">
                                <button class="search-container__form__btn">search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-main__container">
                    @yield('main-content')
                </div>
                <div class="content-footer__container">
                    @yield('content-footer')
                </div>
            </div>
            <div class="content-bottom">
                @yield('content-bottom')
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__footer-content">
            <div class="random-product-container">
                <div class="random-product-container__head">Случайный товар</div>
                <div class="random-product-container__content">
                    <div class="item-product">
                        <?php $randProd = \App\Product::inRandomOrder()->first() ?>
                        @if(!is_null($randProd))
                        <div class="item-product__title-product"><a href="{{route('product', ['product_id' => $randProd->id])}}" class="item-product__title-product__link">{{$randProd->name}}</a></div>
                        <div class="item-product__thumbnail"><a href="{{route('product', ['product_id' => $randProd->id])}}" class="item-product__thumbnail__link"><img src="{{$randProd->pic}}" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
                        <div class="item-product__description">
                            <div class="item-product__description__products-price"><span class="products-price">{{$randProd->price}}</span></div>
                            <div class="item-product__description__btn-block"><a href="{{route('cart.add', ['product_id' => $randProd->id])}}" class="btn btn-blue">Купить</a></div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="footer__footer-content__main-content">
                <p>
                    Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
                    онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
                    У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
                    и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
                    коды продления и многое друго. Также здесь всегда можно узнать последние новости
                    из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
                    актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
                    что немаловажно, выгодно!
                </p>
            </div>
        </div>
        <div class="footer__social-block">
            <ul class="social-block__list bcg-social">
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
</body>
</html>