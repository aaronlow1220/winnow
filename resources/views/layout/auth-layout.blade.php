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
            <a id="nav_logo" href="{{ route('home') }}"><img src="{{ asset('assets/img/Logo.png') }}" alt="logo" /></a>
            <div class="flex text-secondary">
                @foreach ($navs as $nav)
                    @if ($nav->alias != 'about-us' && $nav->alias != 'contact-us')
                        <a href="{{ route('category', ['category' => $nav->alias]) }}">
                            <div>{{ $nav->name }}</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                        </a>
                    @endif
                @endforeach
                <a href="#contact-section">
                    <div>聯絡我們</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
                <a href="{{ route('aboutUs') }}">
                    <div>關於我們</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
            </div>
            <div id="customer-interaction-icons">
                <a href="{{ route('account') }}" class="flex"><img id="icon_person" src="{{ asset('assets/img/Person.svg') }}" alt="login" /></a>
                <a href="{{ route('cart') }}" class="flex"><img id="icon_shopping_cart" src="{{ asset('assets/img/Shopping.svg') }}" alt="shoppingCart" /></a>
            </div>
            <div id="overlay"></div>
        </nav>
    </header>
    @yield('auth-main-content')
</body>

</html>
