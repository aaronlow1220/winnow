@extends('admin/layout/dashboard-layout')

@section('dashboard-title')
    修改商品
@endsection

@section('dashboard-content')
    <style>
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .func-btn:hover+.dropdown-content {
            display: block;
        }
    </style>
    <div class="func">
        <div class="func-bar">
            <a class="func-btn" href="">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" fill="currentcolor" />
                </svg>
                <span>新增</span>
            </a>
            <button class="func-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z"
                        fill="currentcolor" />
                </svg>
                <span>更多動作</span>
            </button>
            <div class="dropdown-content">
                <a href="#">Action 1</a>
                <a href="#">Action 2</a>
                <a href="#">Action 3</a>
            </div>
        </div>
        <div class="order-detail">
            <div class="order-card">
                <h2>訂單：#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h2>
                <hr>
                <div class="order-card-seperate">
                    <div class="order-card-part">
                        <p>姓名：{{ $user->username }}</p>
                        <p>地址：{{ $order->delivery_address }}</p>
                        <p>配送方式：{{ $order->delivery_method }}</p>
                    </div>
                    <div class="order-card-part">
                        <p>匯款帳號後五碼：{{ $order->payment_account }}</p>
                        <p>訂單日期：{{ $order->created_at }}</p>
                        <p>狀態：
                            @switch($order->status)
                                @case('NOT_PAID')
                                    未付款
                                @break

                                @case('SHIP_PENDING')
                                    待出貨
                                @break

                                @case('SHIPPED')
                                    已出貨
                                @break

                                @case('CANCELED')
                                    已取消
                                @break

                                @case('REFUND')
                                    退貨/退款
                                @break

                                @default
                                    未知
                                @break
                            @endswitch
                        </p>
                    </div>
                </div>
            </div>
            <div class="order-card">
                <div class="order-card-title">
                    <h2>商品</h2>
                    <span>3件</span>
                </div>
                <hr>
                <div class="order-product-list">
                    @foreach ($orderItems as $item)
                        <div class="order-product">
                            <div class="order-product-img">
                                <img class="order-product-img" src="{{ asset('media/product/'.$item->product_uid."/".$item->product_uid."_cover.jpg") }}" alt="">
                            </div>
                            <div class="order-product-info">
                                <h3>{{ $products->where("uuid", $item->product_uid)->first()->name }}</h3>
                                <p>數量：{{ $item->quantity }}份</p>
                                <p>總價：NT400</p>
                            </div>
                        </div>
                        <div class="line"></div>
                    @endforeach

                    {{-- <div class="order-product">
                        <div class="order-product-img">
                            <img class="order-product-img" src="{{ asset('assets/img/i32.jpg') }}" alt="">
                        </div>
                        <div class="order-product-info">
                            <h3>Product Name</h3>
                            <p>數量：3份</p>
                            <p>總價：NT400</p>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="order-product">
                        <div class="order-product-img">
                            <img class="order-product-img" src="{{ asset('assets/img/i32.jpg') }}" alt="">
                        </div>
                        <div class="order-product-info">
                            <h3>Product Name</h3>
                            <p>數量：3份</p>
                            <p>總價：NT400</p>
                        </div>
                    </div>
                    <div class="line"></div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
