@extends('admin/layout/dashboard-layout')

@section('dashboard-title')
    修改商品
@endsection

@section('dashboard-content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="msg-box failed">
                <p>{{ $error }}</p>
            </div>
        @endforeach
    @endif
    @if (session()->has('success'))
        <div class="msg-box success">
            <p>修改成功</p>
        </div>
    @elseif(session()->has('failed'))
        <div class="msg-box failed">
            <p>修改失敗，{{ session()->get('failed') }}</p>
        </div>
    @endif
    <div class="func">
        <div class="func-bar">
            <a class="func-btn" href="{{ route('admin.orderList', ['status' => 'all']) }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"
                        fill="currentcolor" />
                </svg>
                <span>關閉</span>
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
                <a href="{{ route('handle.updateOrder', ['id' => $order->uuid, 'status' => 'SHIPPED']) }}">送出訂單</a>
                <a href="{{ route('handle.updateOrder', ['id' => $order->uuid, 'status' => 'CANCELED']) }}">取消訂單</a>
            </div>
        </div>
        <div class="order-detail">
            <div class="order-card">
                <h2>訂單：#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h2>
                <hr>
                <div class="order-card-seperate">
                    <div class="order-card-part">
                        <div class="order-card-info">
                            <p class="order-card-info-tip">姓名</p>
                            <p class="order-card-info-value">{{ $user->username }}</p>
                        </div>
                        <div class="order-card-info">
                            <p class="order-card-info-tip">地址</p>
                            <p class="order-card-info-value">{{ $order->delivery_address }}</p>
                        </div>
                        <div class="order-card-info">
                            <p class="order-card-info-tip">配送方式</p>
                            <p class="order-card-info-value">{{ $order->delivery_method }}</p>
                        </div>
                    </div>
                    <div class="order-card-part">
                        <div class="order-card-info">
                            <p class="order-card-info-tip">匯款帳號後五碼</p>
                            <p class="order-card-info-value">{{ $order->payment_account }}</p>
                        </div>
                        <div class="order-card-info">
                            <p class="order-card-info-tip">訂單日期</p>
                            <p class="order-card-info-value">{{ $order->created_at }}</p>
                        </div>
                        <div class="order-card-info">
                            <p class="order-card-info-tip">狀態</p>
                            <p class="order-card-info-value">
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
            </div>
            <div class="order-card">
                <div class="order-card-title">
                    <h2>商品</h2>
                    <span>{{ $orderItems->count() }}件</span>
                </div>
                <hr>
                <div class="order-product-list">
                    @foreach ($orderItems as $item)
                        <div class="order-product">
                            <div class="order-product-img">
                                <img class="order-product-img"
                                    src="{{ asset('media/product/' . $item->product_uid . '/' . $item->product_uid . '_cover.jpg') }}"
                                    alt="">
                            </div>
                            <div class="order-product-info">
                                <h3>{{ $products->where('uuid', $item->product_uid)->first()->name }}</h3>
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
