<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page-title')</title>
    @stack("top-link")
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    @stack('category')
    @stack('login')
</head>

<body>
    @yield("top")
    <nav id="nav" class="sticky">
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
                <a href="/shop">
                    <div>忠貞購物</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
                <a href="/about-us">
                    <div>關於我們</div><img src="{{ asset('assets/img/arrow.svg') }}" />
                </a>
                <a href="#contact-section">
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
    </nav>
    @yield('main-content')
    <footer>
        <div>
            <div id="contact-section">
                <div id="logo-section">
                    <img src="{{ asset('assets/img/Logo.png') }}" alt="logo" />
                    <div class="social-media-icons">
                        <a
                            href="@foreach ($settings as $setting)
                        @if ($setting->uuid == '1f0e60f4efa3d42cb3a383244d8e0d23')
                            {{ $setting->content }}
                        @break
                    @endif @endforeach"><img
                                src="{{ asset('assets/img/facebook.svg') }}" alt="" /></a>
                        <a
                            href="@foreach ($settings as $setting)
                        @if ($setting->uuid == '5aed058c2aed48a4f05c50b92f17cb46')
                            {{ $setting->content }}
                        @break
                    @endif @endforeach"><img
                                src="{{ asset('assets/img/instagram.svg') }}" alt="" /></a>
                        <a
                            href="@foreach ($settings as $setting)
                        @if ($setting->uuid == 'faf62a02ad04290f7e5c150fc2844ce6')
                            {{ $setting->content }}
                        @break
                    @endif @endforeach"><img
                                src="{{ asset('assets/img/youtube.svg') }}" alt="" /></a>
                    </div>
                </div>
                <div id="contact-info">
                    <div>
                        <img src="{{ asset('assets/img/schedule.svg') }}" alt="" />
                        <div class="body1 text-secondary">平日 8am~10pm</div>
                    </div>
                    <div>
                        <img src="{{ asset('assets/img/location_on.svg') }}" alt="" />
                        <div class="body1 text-secondary">
                            @foreach ($settings as $setting)
                                @if ($setting->uuid == '7650487a8758fd50c87d6c9cff0aa5ac')
                                    {{ $setting->content }}
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/alternate_email.svg') }}" alt="" />
                    <div class="body1 text-secondary">
                        @foreach ($settings as $setting)
                            @if ($setting->uuid == '0aa9ce0dd9e62e1adb42101d186e272f')
                                {{ $setting->content }}
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        </div>


    </div>

    <div class="footer-text">
        @foreach ($settings as $setting)
            @if ($setting->uuid == '93e781df4729f7677af31122c1253bce')
                {{ $setting->content }}
            @break
        @endif
    @endforeach
</div>
</div>
</footer>
</body>

</html>
