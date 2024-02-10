<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    @stack("category")
    @stack('login')
</head>

<body>
    <header id="nav" class="sticky">
        <nav class="flex justify-center align-items-center relative">
            <label for="burger">☰</label>
            <input type="checkbox" id="burger">
            <a id="nav_logo" href="index.html"><img src="{{ asset('assets/img/Logo.png') }}" alt="logo" /></a>
            <div class="flex text-secondary">
              <a href="/latest-news"><div>最新消息</div><img src="{{ asset('assets/img/arrow.svg') }}" /></a>
              <a href="/attractions"><div>忠貞景點</div><img src="{{ asset('assets/img/arrow.svg') }}" /></a>
              <a href="/dishes"><div>迷香忠貞</div><img src="{{ asset('assets/img/arrow.svg') }}" /></a>
              <a href="/dreams"><div>夢想忠貞</div><img src="{{ asset('assets/img/arrow.svg') }}" /></a>
              <a href="/shopping"><div>忠貞購物</div><img src="{{ asset('assets/img/arrow.svg') }}" /></a>
              <a href="/about-us"><div>關於我們</div><img src="{{ asset('assets/img/arrow.svg') }}" /></a>
              <a href="/contact-us"><div>聯絡我們</div><img src="{{ asset('assets/img/arrow.svg') }}" /></a>
            </div>
            <div id="customer-interaction-icons">
              <a href="{{ route('auth.login') }}" class="flex"><img id="icon_person" src="{{ asset('assets/img/Person.svg') }}" alt="login" /></a>
              <a href="cart.html" class="flex"><img id="icon_shopping_cart" src="{{ asset('assets/img/Shopping.svg') }}" alt="shoppingCart" /></a>
            </div>
            <div id="overlay"></div>
          </nav>
    </header>
    @yield('main-content')
    <footer>
    <div>
        <div id="contact-section">
            <div id="logo-section">
                <img src="{{ asset('assets/img/Logo.png') }}" alt="logo" />
                <div class="social-media-icons">
                    <img src="{{ asset('assets/img/facebook.svg') }}" alt="" />
                    <img src="{{ asset('assets/img/instagram.svg') }}" alt="" />
                    <img src="{{ asset('assets/img/youtube.svg') }}" alt="" />
                </div>
            </div>
            <div id="contact-info">
                <div>
                    <img src="{{ asset('assets/img/schedule.svg') }}" alt="" />
                    <div class="body1 text-secondary">平日 8am~10pm</div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/location_on.svg') }}" alt="" />
                    <div class="body1 text-secondary">桃園市平鎮區貿五路36號</div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/alternate_email.svg') }}" alt="" />
                    <div class="body1 text-secondary">zcda10901@gmail.com</div>
                </div>
            </div>
    
    
        </div>
    
        <div class="footer-text">© 2023 忠貞社區發展協會 All Right Reserved.</div>
    </div>
</footer>
</body>

</html>
