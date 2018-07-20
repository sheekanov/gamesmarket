@if($pagesQty > 1)
    <ul class="page-nav">
        @if($currentPage > 1)
            <li class="page-nav__item"><a href="{{route(Route::currentRouteName(), $routeParameter)}}?{{$getRequestParameters}}&p={{$currentPage-1}}" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
        @endif
        @for($i=1; $i<=$pagesQty; $i++)
            <li class="page-nav__item"><a href="{{route(Route::currentRouteName(), $routeParameter)}}?{{$getRequestParameters}}&p={{$i}}" class="page-nav__item__link">{{$i}}</a></li>
        @endfor
        @if($currentPage < $pagesQty)
            <li class="page-nav__item"><a href="{{route(Route::currentRouteName(), $routeParameter)}}?{{$getRequestParameters}}&p={{$currentPage+1}}" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
        @endif
    </ul>
@endif