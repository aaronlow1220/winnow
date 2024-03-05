@extends('layout/layout')

@section('page-title', '帳號')

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/btn.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/first-css/lin.css') }}">
@endpush

@section('main-content')
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            // 初始化總價
            function countTotal() {
                let total = 0;
                document.querySelectorAll('.price').forEach(price => {
                    total += parseInt(price.textContent, 10);
                });
                document.querySelector('#total').textContent = total;
            }

            // 更新單項價格並重新計算總價
            function updatePrice(item, basePrice) {
                const quantity = parseInt(item.value, 10);
                const newPrice = basePrice * quantity;
                item.closest('.cart-item').querySelector('.price').textContent = newPrice;
                countTotal();
            }

            function closeList() {

            }

            // 獲取所有 checkbox 
            const checkboxes = document.querySelectorAll('.checkbox');

            // 獲取所有 .unit 元素
            const units = document.querySelectorAll('.unit');

            // 迴圈綁定事件監聽器
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const unit = checkbox.closest('.unit');
                    unit.style.height = '0px';
                    const cartItems = unit.querySelectorAll('.cart-item');
                    cartItems.forEach(item => {
                        item.style.display = 'none';
                    })
                }

                checkbox.addEventListener('change', (event) => {

                    // 獲取當前checkbox對應的.unit
                    const unit = event.target.closest('.unit');

                    // 獲取同級所有 .cart-item 元素
                    const cartItems = unit.querySelectorAll('.cart-item');

                    // 檢查勾選狀態
                    if (event.target.checked) {
                        // 設定高度為0
                        unit.style.height = '0px';

                        // 迴圈隱藏所有 cart item
                        cartItems.forEach(item => {
                            item.style.display = 'none';
                        })
                    } else {
                        // 移除高度樣式 
                        unit.style.removeProperty('height');


                        // 迴圈隱藏所有 cart item
                        cartItems.forEach(item => {
                            item.style.removeProperty('display');

                        })
                    }

                });

            });

            function onlyNumberKey(evt) {
                // Only ASCII character in that range allowed
                let ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }
        });
    </script>
    <style>
        .unit {
            transition: all ease 0.4s;
        }

        .collapse {
            height: 0;
        }

        .checkbox {
            display: none;
        }

        .toggle {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 45px;
        }

        .bar {
            position: absolute;
            height: 3px;
            width: 40%;
            background-color: #fff;
            transition: all 0.4s;
            border-radius: 5px;
        }

        #bar1 {
            transform: rotate(45deg);
            top: 50%;
            left: 18%;
        }

        #bar2 {
            transform: rotate(-45deg);
            top: 50%;
            right: 18%;
        }

        .checkbox:checked+.toggle #bar1 {
            top: 45%;
            transform: rotate(-45deg);
        }

        .checkbox:checked+.toggle #bar2 {
            top: 45%;
            transform: rotate(45deg);
        }

        .date {
            margin-top: 12px;
            width: 100%;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            background: gray;
            padding: 0 8px;
            box-shadow: 0 0 0 8px gray;
            color: white;
            margin-bottom: 8px
        }

        .date>div {
            align-items: center;
            gap: 10%;
        }

        .submit {
            color: white
        }
    </style>

    <body>
        <section class="section flex">
            <div class="cart-container">
                <h3>購物車</h3>
                <form class="cart" method="POST" action="{{ route('pageHandle.addPaymentAccount') }}">
                    @csrf
                    @foreach ($orders as $order)
                        <div class="unit" style="margin-bottom: 4.5rem;">
                            <div class="date flex">
                                <input type="hidden" name="real_order_uid" value="{{ $order->order_uid }}">
                                <h4>{{ date('Y-m-d', strtotime($order->created_at)) }}</h4>
                                <p>
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
                                <div class="flex">

                                    <p>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                                    <input class="checkbox" type="checkbox" id="checkbox{{ $loop->index }}" @if ($loop->first) @else checked=false @endif>
                                    <label for="checkbox{{ $loop->index }}" class="toggle">
                                        <div class="bar" id="bar1"></div>
                                        <div class="bar" id="bar2"></div>
                                    </label>
                                </div>
                            </div>
                            @foreach ($orderItems as $orderItem)
                                @if ($orderItem->order_uid === $order->uuid)
                                    <div class="cart-item flex">
                                        <img src="{{ asset('media/product/' . $orderItem->product_uid . '/' . $orderItem->product_uid . '_cover.jpg') }}" alt="food1" />
                                        <div class="cart-item-info">
                                            <h4 class="item-title">
                                                {{ $products->where('uuid', $orderItem->product_uid)->first()->name }}</h4>
                                            <div class="cart-item-info-cost">
                                                <div class="counter flex" style="align-items: baseline; gap: 2px; padding: 0 12px;">
                                                    <h4>{{ $orderItem->quantity }}</h4>
                                                    <p class="text-secondary">份</p>
                                                </div>
                                                <div class="price-container flex">
                                                    <p class="text-secondary">NT$</p>
                                                    <h3 class="price" data-price="100">
                                                        @if ($products->where('uuid', $orderItem->product_uid)->first()->discount_price)
                                                            {{ $products->where('uuid', $orderItem->product_uid)->first()->discount_price * $orderItem->quantity }}
                                                        @else
                                                            {{ $products->where('uuid', $orderItem->product_uid)->first()->price * $orderItem->quantity }}
                                                        @endif
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="cart-item flex">
                                <label for="account-five">匯款帳號末五碼</label>
                                <input id="account-five" type="text" placeholder="請輸入匯款帳號末五碼" name="account_five" maxlength="5" value=@if ($order->payment_account) {{ $order->payment_account }} @endif onkeypress=return onlyNumberKey(event)>
                                <button type="submit" class="submit" value="{{ $order->uuid }}" name="uuid">送出</button>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </section>
    </body>
@endsection
