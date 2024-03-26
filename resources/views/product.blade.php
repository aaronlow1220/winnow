@extends('layout/layout')

@section('page-title', $product->name)

@push('category')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/food/shopping-cart.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/first-css/lin.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/btn.css') }}">
    <script src="{{ asset('assets/js/shopping-scorllbar.js') }}"></script>
@endpush

@section('main-content')
    <div class="shopping-content">
        <div class="shop-content">
            <div class="Shopping-img">
                <div class="image-p">
                    <img class="shopping-image" src="{{ asset('media/product/' . $product->uuid . '/' . $product->uuid . '_cover.jpg') }}" alt="">
                </div>
                <div class="text">
                    <h3 class="Second-Titlecontent">{{ $product->name }}</h3>
                    <h4 class="content">{{ $product->description }}</h4>
                </div>
            </div>
            <div class="shopping-text">
                <div class="content-tex">
                    <h3 class="content">產品資訊</h3>
                    <div class="shop-textbox">
                        <p class="content">清真</p>
                        <p class="content">：</p>
                        <p class="content">
                            @if ($product->is_halal)
                                是
                            @else
                                否
                            @endif
                        </p>
                    </div>

                    {{-- <div class="shop-textbox">
                        <p class="content">重量</p>
                        <p class="content">：</p>
                        <p class="content">600ml±5ml</p>
                    </div>

                    <div class="shop-textbox">
                        <p class="content">重量</p>
                        <p class="content">：</p>
                        <p class="content">600ml</p>
                    </div> --}}
                    <div class="sell">
                        <h4 class="content">售價</h4>
                        <p class="Second-Titlecontent">NT {{ $product->price }}</p>
                    </div>
                </div>
                <div class="shopping-btn">
                    <a id="black">
                        <button id="black-btn">
                            <p>加入</p><img src="{{ asset('assets/img/add_shopping_cart.svg') }}" alt="">
                        </button>
                    </a>
                    <a style="width: 190px;" id="purchase"> <button class="LG_button" style="width: 100%; height: 100%;">購買</button></a>
                </div>
            </div>
        </div>

        {{-- <div class="PC foods-scrollbar">
            <div class="scrollbar-slider">
                <button id="left-side"><img src="{{ asset('assets/img/arrow-left.svg') }}" alt=""></button>
                <div class="scrollbar-contents">
                    @foreach ($items as $item)
                        <div class="scrollbar-content">
                            <div class="slider-img">
                            </div>
                            <div class="slider-text">
                                <header>
                                    <h3 class="content">{{$item->name}}</h3>
                                </header>
                                <h3 class="content">售價: @if($item->discount_price) {{ $item->discount_price }} @else {{ $item->price }} @endif</h3>
                            </div>
                        </div>
                    @endforeach
                    <div class="scrollbar-content">
                        <div class="slider-img">
                        </div>
                        <div class="slider-text">
                            <header>
                                <h3 class="content">雲南米干/米線/粑粑絲</h3>
                            </header>
                            <h3 class="content">售價:120元</h3>
                        </div>
                    </div>

                    <div class="scrollbar-content">
                        <div class="slider-img">
                        </div>
                        <div class="slider-text">
                            <header>
                                <h3 class="content">雲南米干/米線/粑粑絲</h3>
                            </header>
                            <h3 class="content">售價:140元</h3>
                        </div>
                    </div>

                    <div class="scrollbar-content">
                        <div class="slider-img">
                        </div>
                        <div class="slider-text">
                            <header>
                                <h3 class="content">雲南米干/米線/粑粑絲</h3>
                            </header>
                            <h3 class="content">售價:160元</h3>
                        </div>
                    </div>

                    <div class="scrollbar-content">
                        <div class="slider-img">
                        </div>
                        <div class="slider-text">
                            <header>
                                <h3 class="content">雲南米干/米線/粑粑絲</h3>
                            </header>
                            <h3 class="content">售價:180元</h3>
                        </div>
                    </div>

                    <div class="scrollbar-content">
                        <div class="slider-img">
                        </div>
                        <div class="slider-text">
                            <header>
                                <h3 class="content">雲南米干/米線/粑粑絲</h3>
                            </header>
                            <h3 class="content">售價:200元</h3>
                        </div>
                    </div>

                    <div class="scrollbar-content">
                        <div class="slider-img">
                        </div>
                        <div class="slider-text">
                            <header>
                                <h3 class="content">雲南米干/米線/粑粑絲</h3>
                            </header>
                            <h3 class="content">售價:220元</h3>
                        </div>
                    </div>
                </div>
                <button id="right-side"><img src="{{ asset('assets/img/arrow-right.svg') }}" alt=""></button>
            </div>
        </div> --}}

        {{-- <div class="PH foodbar">
            <div class="textbar">
                <p class="Main-Titlecontent" style="font-weight: bold;">再看看...</p>
            </div>
            <div class="fd-scroll">
                <div class="scroll-cotent">
                    <div class="PHscroll-conent">
                        <div class="scroll-img">
                            <img class="fd-miniimg" src="/img/Rectangle 9.png" alt="">
                        </div>
                        <div class="fd-textbox">
                            <h3 class="Second-Titlecontent" style="font-weight: 600;">名稱</h3>
                            <p class="Last">內容</p>
                            <p class="Second-Titlecontent">價格</p>
                        </div>
                    </div>
                    <hr>
                    <div class="PHscroll-conent">
                        <div class="scroll-img">
                            <img class="fd-miniimg" src="/img/Rectangle 9.png" alt="">
                        </div>
                        <div class="fd-textbox">
                            <h3 class="Second-Titlecontent" style="font-weight: 600;">名稱</h3>
                            <p class="Last">內容</p>
                            <p class="Second-Titlecontent">價格</p>
                        </div>
                    </div>
                    <hr>
                    <div class="PHscroll-conent">
                        <div class="scroll-img">
                            <img class="fd-miniimg" src="/img/Rectangle 9.png" alt="">
                        </div>
                        <div class="fd-textbox">
                            <h3 class="Second-Titlecontent" style="font-weight: 600;">名稱</h3>
                            <p class="Last">內容</p>
                            <p class="Second-Titlecontent">價格</p>
                        </div>
                    </div>
                    <hr>
                    <div class="PHscroll-conent">
                        <div class="scroll-img">
                            <img class="fd-miniimg" src="/img/Rectangle 9.png" alt="">
                        </div>
                        <div class="fd-textbox">
                            <h3 class="Second-Titlecontent" style="font-weight: 600;">名稱</h3>
                            <p class="Last">內容</p>
                            <p class="Second-Titlecontent">價格</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    @if (Auth::user())
        <script>
            $(document).ready(function() {
                let addToCard = document.querySelector("#black");
                $(addToCard).on("click", function() {
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        url: "{{ route('pageHandle.addToCart') }}",
                        type: "POST",
                        data: {
                            user_uid: "{{ Auth::user()->uuid }}",
                            product_uid: "{{ $product->uuid }}"
                        },
                        dataType: "JSON",
                        success: function(response) {
                            let error = response.error;
                            let status = response.uploaded

                            if (status) {
                                alert("已成功加入購物車！");
                            } else {
                                alert("加入購物車失敗，請再試一次");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                function loginFirst() {
                    if (window.confirm("請先登入")) {
                        window.location.href = "{{ route('auth.login') }}"
                    }
                }
                let addToCard = document.querySelector("#black");
                let purchase = document.querySelector("#purchase")
                $(addToCard).on("click", function() {
                    loginFirst();
                });
                $(purchase).on("click", function() {
                    loginFirst();
                });
            });
        </script>
    @endif
@endsection
