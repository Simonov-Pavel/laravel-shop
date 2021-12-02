<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('main.online_shop'): @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">@lang('main.online_shop')</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('index')><a href="{{route('index')}}">@lang('main.all_products')</a></li>
                <li @routeactive('categor*')><a href="{{route('categories')}}">@lang('main.category')</a></li>
                <li @routeactive('bascet')><a href="{{route('bascet')}}">@lang('main.in_bascet')</a></li>
                <!--<li><a href="http://internet-shop.tmweb.ru/reset">Сбросить проект в начальное состояние</a></li>-->
                <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{App\Services\Currency\CurrencyConversion::getCurrencySymbol()}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach(App\Services\Currency\CurrencyConversion::getCurrencies() as $currency)
                            <li><a href="{{ route('currency', $currency->code) }}">{{$currency->symbol}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{ route('register') }}">@lang('main.register')</a></li>
                <li><a href="{{ route('login') }}">@lang('main.login')</a></li>
                @endguest
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('main.welcome'), {{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @admin 
                            <li><a href="{{ route('admin') }}">@lang('main.admin_panel')</a></li>
                        @endadmin
                            <li><a href="{{ route('user') }}">@lang('main.personal_account')</a></li>
                    </ul>
                </li>
                <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background:transparent; border:none; color:#fff; padding-top:15px" 
                    onclick="event.preventDefault(); this.closest('form').submit();">@lang('main.logout')</button>
                </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @elseif(session()->has('warning'))
            <p class="alert alert-warning">{{session()->get('warning')}}</p>
        @endif
        @yield('content')
    </div>
</div>
</body>
</html>