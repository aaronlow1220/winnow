@extends('layout/layout')

@section('page-title', "忠貞購物")

@push('category')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/btn.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/first-css/lin.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/food/shop-nav.css') }}" />
@endpush

@section('main-content')
    <div class="all">
        <div class="toparea">
            <div class="pingtu">
                <img src="{{ asset('assets/img/food-img.png') }}" alt="" />
            </div>
            <div class="textarea">
                <h1 class="HeadLine">忠貞購物</h1>
            </div>
        </div>

        <div class="Shopping-mail">
            <div class="grid-container">
                <div class="grid-item"></div>
                <div class="food-content">
                    <div class="content">
                        <header>
                            <h3 class="shop-name content">雲南米干/米線/粑粑絲</h3>
                        </header>
                        <div class="cash">
                            <h3 class="shop-del content">售價:120元</h3>
                            <h3 class="lower-cash content">87元</h3>
                        </div>
                    </div>
                    <div>
                        <button class="LG_button"><a href="">點我購買 ></a></button>
                    </div>
                </div>
            </div>

            {{-- <div class="grid-container">
                <div class="grid-item"></div>
                <div class="food-content">
                    <div class="content">
                        <header>
                            <h3 class="shop-name content">雲南米干/米線/粑粑絲</h3>
                        </header>
                        <div class="cash">
                            <h3 class="content">售價:120元</h3>
                        </div>
                    </div>
                    <div>
                        <button class="LG_button"><a href="">點我購買 ></a></button>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item"></div>
                <div class="food-content">
                    <div class="content">
                        <header>
                            <h3 class="shop-name content">雲南米干/米線/粑粑絲</h3>
                        </header>
                        <div class="cash">
                            <h3 class="content">售價:120元</h3>
                        </div>
                    </div>
                    <div>
                        <button class="LG_button"><a href="">點我購買 ></a></button>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item"></div>
                <div class="food-content">
                    <div class="content">
                        <header>
                            <h3 class="shop-name content">雲南米干/米線/粑粑絲</h3>
                        </header>
                        <div class="cash">
                            <h3 class="content">售價:120元</h3>
                        </div>
                    </div>
                    <div>
                        <button class="LG_button"><a href="">點我購買 ></a></button>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item"></div>
                <div class="food-content">
                    <div class="content">
                        <header>
                            <h3 class="shop-name content">雲南米干/米線/粑粑絲</h3>
                        </header>
                        <div class="cash">
                            <h3 class="content">售價:120元</h3>
                        </div>
                    </div>
                    <div>
                        <button class="LG_button"><a href="">點我購買 ></a></button>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item"></div>
                <div class="food-content">
                    <div class="content">
                        <header>
                            <h3 class="shop-name content">雲南米干/米線/粑粑絲</h3>
                        </header>
                        <div class="cash">
                            <h3 class="content">售價:120元</h3>
                        </div>
                    </div>
                    <div>
                        <button class="LG_button"><a href="">點我購買 ></a></button>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item"></div>
                <div class="food-content">
                    <div class="content">
                        <header>
                            <h3 class="shop-name content">雲南米干/米線/粑粑絲</h3>
                        </header>
                        <div class="cash">
                            <h3 class="content">售價:120元</h3>
                        </div>
                    </div>
                    <div>
                        <button class="LG_button"><a href="">點我購買 ></a></button>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item"></div>
                <div class="food-content">
                    <div class="content">
                        <header>
                            <h3 class="shop-name content">雲南米干/米線/粑粑絲</h3>
                        </header>
                        <div class="cash">
                            <h3 class="content">售價:120元</h3>
                        </div>
                    </div>
                    <div>
                        <button class="LG_button"><a href="">點我購買 ></a></button>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item"></div>
                <div class="food-content">
                    <div class="content">
                        <header>
                            <h3 class="shop-name content">雲南米干/米線/粑粑絲</h3>
                        </header>
                        <div class="cash">
                            <h3 class="content">售價:120元</h3>
                        </div>
                    </div>
                    <div>
                        <button class="LG_button"><a href="">點我購買 ></a></button>
                    </div>
                </div>
            </div> --}}
        </div>
    @endsection
