@extends('layout/layout')

@section('page-title', '忠貞購物')

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}" />
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
            @foreach ($items as $item)
                <div class="grid-container">
                    <div class="grid-item"><img class="imgCon" src="{{ asset('media/product/' . $item->uuid . '/' . $item->uuid . '_cover.jpg') }}" alt=""></div>
                    <div class="food-content">
                        <div class="content">
                            <header>
                                <h3 class="shop-name content">{{ $item->name }}</h3>
                            </header>
                            <div class="cash">
                                <h3 class=" @if ($item->discount_price) shop-del @endif content">售價:
                                    {{ $item->price }}</h3>
                                @if ($item->discount_price)
                                    <h3 class="lower-cash content">{{ $item->discount_price }}元</h3>
                                @endif

                            </div>
                        </div>
                        <div>
                            <a href="{{ route('product', ['id' => $item->uuid]) }}"><button class="LG_button">點我購買 ></button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
