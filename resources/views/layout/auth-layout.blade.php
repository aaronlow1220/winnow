<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page-title')</title>
    @stack('login')
    @stack('register')
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
</head>

<body class="flex flex-column justify-space-between h-100vh">
    <header id="nav" class="sticky">
        <nav class="flex justify-center align-items-center relative">
            <label for="burger">☰</label>
            <input type="checkbox" id="burger">
            <a id="nav_logo" href="{{ route('home') }}"><img src="{{ asset('assets/img/Logo.png') }}"
                    alt="logo" /></a>
            <div class="flex text-secondary">
                <a href="/latest-news">
                    <div>最新消息</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
                <a href="/attractions">
                    <div>忠貞景點</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
                <a href="/dishes">
                    <div>迷香忠貞</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
                <a href="/dreams">
                    <div>夢想忠貞</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
                <a href="/shopping">
                    <div>忠貞購物</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
                <a href="/about-us">
                    <div>關於我們</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
                <a href="/contact-us">
                    <div>聯絡我們</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
            </div>
            <div id="customer-interaction-icons">
                <a href="{{ route('account') }}" class="flex"><img id="icon_person"
                        src="{{ asset('assets/img/Person.svg') }}" alt="login" /></a>
                <a href="{{ route('cart') }}" class="flex"><img id="icon_shopping_cart"
                        src="{{ asset('assets/img/Shopping.svg') }}" alt="shoppingCart" /></a>
            </div>
            <div id="overlay"></div>
        </nav>
    </header>
    @yield('auth-main-content')
</body>

</html>
