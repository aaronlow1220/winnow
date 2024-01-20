<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/food.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <script src="{{ asset('assets/js/food.js') }}" defer></script>
</head>

<body>
    <header id="nav" class="sticky">
        <nav class="flex justify-center align-items-center relative">
            <a id="nav_logo" href="index.html"><img src="{{ asset('assets/img/Logo.png') }}" alt="logo" /></a>
            <div class="flex flex-1-0-0 justify-space-between max-w-50rem text-secondary">
                <a href="news.html">最新消息</a>
                <a href="attractions.html">忠貞景點</a>
                <a href="{{ route("dishes") }}">迷香忠貞</a>
                <a href="dream.html">夢想忠貞</a>
                <a href="shopping.html">忠貞購物</a>
                <a href="about.html">關於我們</a>
                <a href=".html">聯絡我們</a>
            </div>
            <div id="customer-interaction-icons">
                <a href="{{ route('auth.login') }}" class="flex"><img id="icon_person"
                        src="{{ asset('assets/img/Person.svg') }}" alt="login" /></a>
                <a href="cart.html" class="flex"><img id="icon_shopping_cart"
                        src="{{ asset('assets/img/Shopping.svg') }}" alt="shoppingCart" /></a>
            </div>
        </nav>
    </header>
@yield("main-content")
    <footer>
        <div class="contact-section">
            <div class="contact-info-r">
                zcda10901@gmail.com<br />
                桃園市平鎮區貿五路36號<br />
                平日 8am~10pm
            </div>
            <div class="flex-column">
                <img src="{{ asset('assets/img/Logo.png') }}" alt="logo" />
                <div class="../social-media-icons">
                    <img src="{{ asset('assets/img/facebook.svg') }}" alt="" />
                    <img src="{{ asset('assets/img/instagram.svg') }}" alt="" />
                    <img src="{{ asset('assets/img/youtube.svg') }}" alt="" />
                </div>
            </div>
            <div class="contact-info-l">
                zcda10901@gmail.com<br />
                桃園市平鎮區貿五路36號<br />
                平日 8am~10pm
            </div>
        </div>
        <div class="footer-text">© 2023 忠貞社區發展協會 All Right Reserved.</div>
    </footer>
</body>

</html>