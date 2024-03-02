@extends('layout/layout')

@section('page-title', '帳號')

@push('category')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                totalToForm();
            }

            // 初始化總價
            countTotal();

            function totalToForm() {
                const formTotal = document.querySelector("#order_total");
                const total = document.querySelector("#total");
                formTotal.value = total.textContent;
            }


            // 設置計數器功能
            document.querySelectorAll('.counter').forEach(counter => {
                const decrease = counter.querySelector('.decrease');
                const increase = counter.querySelector('.increase');
                const numberInput = counter.querySelector('.number');
                const priceElement = counter.closest('.cart-item-info-cost').querySelector('.price');
                const basePrice = parseInt(priceElement.getAttribute('data-price'), 10);

                function initAmount() {
                    let value = parseInt(numberInput.value, 10);
                    value = Math.max(0, Math.min(99, value)); // 確保值在0到99之間
                    numberInput.value = value;
                    updatePrice(numberInput, basePrice);
                }

                initAmount();

                decrease.addEventListener('click', () => {
                    if (numberInput.value > 0) {
                        numberInput.value--;
                        updatePrice(numberInput, basePrice);
                    }
                });

                increase.addEventListener('click', () => {
                    if (numberInput.value < 99) {
                        numberInput.value++;
                        updatePrice(numberInput, basePrice);
                    }
                });

                numberInput.addEventListener('blur', () => {
                    let value = parseInt(numberInput.value, 10);
                    value = Math.max(0, Math.min(99, value)); // 確保值在0到99之間
                    numberInput.value = value;
                    updatePrice(numberInput, basePrice);
                });
            });
        });
    </script>

    <body>
        <section class="section flex">
            <div class="cart-container">
                <h3>購物車</h3>
                <form class="cart" action="{{ route('pageHandle.addOrder') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_uid" value="{{ Auth::user()->uuid }}">
                    @foreach ($cart_items as $item)
                        <div class="cart-item flex">
                            <img src="{{ asset('media/product/' . $item->product_uid . '/' . $item->product_uid . '_cover.jpg') }}"
                                alt="food1" />
                            <div class="cart-item-info">
                                <h4 class="item-title">{{ $items->where('uuid', $item->product_uid)->first()->name }}</h4>
                                <div class="cart-item-info-cost">
                                    <div class="counter">
                                        <button type="button" class="decrease" data-id="{{ $item->uuid }}">
                                            <img src="{{ asset('assets/img/remove.svg') }}" alt="">
                                        </button>
                                        <input type="number" value="{{ $item->quantity }}" min="0" max="99"
                                            class="number body1" data-id="{{ $item->uuid }}" name="item_amount"></input>
                                        <button type="button" class="increase" data-id="{{ $item->uuid }}">
                                            <img src="{{ asset('assets/img/add.svg') }}" alt="">
                                        </button>
                                    </div>
                                    <div class="price-container flex">
                                        <p class="text-secondary">NT$</p>
                                        <h3 class="price"
                                            data-price="@if ($items->where('uuid', $item->product_uid)->first()->discount_price) {{ $items->where('uuid', $item->product_uid)->first()->discount_price }}@else{{ $items->where('uuid', $item->product_uid)->first()->price }} @endif">
                                            @if ($items->where('uuid', $item->product_uid)->first()->discount_price)
                                                {{ $items->where('uuid', $item->product_uid)->first()->discount_price }}@else{{ $items->where('uuid', $item->product_uid)->first()->price }}
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="cart-total flex">
                        <div class="cart-options">
                            <div class="cart-option">
                                <label for="delivery-method">配送方式</label>
                                {{-- <input id="delivery-method" class="option-input" type="text" value="冷凍"
                                    name="delivery_method" disabled> --}}
                                <select class="option-input" name="delivery_method" id="delivery-method">
                                    <option value="freezing">冷凍</option>
                                    <option value="refrigeration">冷藏</option>
                                    <option value="normal">常溫</option>
                                </select>
                            </div>
                            <div class="cart-option">
                                <label for="delivery-address">地址</label>
                                {{-- <input id="delivery-address" class="option-input" type="text" value="貨到付款"
                                    name="delivery_address" disabled> --}}
                                <select name="delivery_address" class="option-input" id="delivery-address">
                                    @if ($user->delivery_address)
                                        <option value="{{ $user->delivery_address }}">{{ $user->delivery_address }}
                                        </option>
                                    @endif
                                    @if ($user->contact_address)
                                        <option value="{{ $user->contact_address }}">{{ $user->contact_address }}</option>
                                    @endif
                                    <option id="other-address" value="other-address">其他地址</option>
                                </select>
                            </div>
                            <div class="cart-option">
                                <label for="custom_address"></label>
                                <input class="option-input" id="custom-address" name="custom_address" type="text"
                                    placeholder="輸入其他地址" value="" disabled>
                            </div>
                        </div>
                        <div class="total-price flex">
                            <h3>總結：</h3>
                            <div class="price-container flex">
                                <p class="text-secondary">NT$</p>
                                <h2 id="total">100</h2>
                                <input type="hidden" name="order_total" value="" id="order_total">
                            </div>
                        </div>
                    </div>
                    <div class="check-out flex">
                        <button class="LG_button" type="submit">
                            結帳
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </body>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            const addAction = document.querySelectorAll(".increase");
            const minusAction = document.querySelectorAll(".decrease");
            const textBoxAction = document.querySelectorAll(".number");
            const delay = 500;

            for (var i = 0; i < addAction.length; i++) {
                addAction[i].addEventListener("click", function() {
                    setTimeout(() => {
                        $.ajax({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                            },
                            url: "{{ route('pageHandle.updateCart') }}",
                            type: "POST",
                            data: {
                                id: $(this).attr("data-id"),
                                amount: $(this).siblings(".number").val(),
                            },
                            dataType: "JSON",
                            success: function(response) {
                                let error = response.error;
                                let status = response.uploaded;

                                if (!status) {
                                    alert("加入購物車失敗，請再試一次");
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }, delay);
                });
                minusAction[i].addEventListener("click", function() {
                    setTimeout(() => {
                        $.ajax({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                            },
                            url: "{{ route('pageHandle.updateCart') }}",
                            type: "POST",
                            data: {
                                id: $(this).attr("data-id"),
                                amount: $(this).siblings(".number").val(),
                            },
                            dataType: "JSON",
                            success: function(response) {
                                let error = response.error;
                                let status = response.uploaded;

                                if (!status) {
                                    alert("加入購物車失敗，請再試一次");
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }, delay);
                });
                textBoxAction[i].addEventListener("change", function() {
                    setTimeout(() => {
                        $.ajax({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                            },
                            url: "{{ route('pageHandle.updateCart') }}",
                            type: "POST",
                            data: {
                                id: $(this).attr("data-id"),
                                amount: $(this).val(),
                            },
                            dataType: "JSON",
                            success: function(response) {
                                let error = response.error;
                                let status = response.uploaded;

                                if (!status) {
                                    alert("加入購物車失敗，請再試一次");
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }, delay);
                });
            };
        });

        // --- 地址 ---

        const dA = document.querySelector("#delivery-address");
        const oA = document.querySelector("#custom-address");

        $(dA).on("change", function() {
            if (dA.value === "other-address") {
                oA.disabled = false;
            } else {
                oA.disabled = true;
            }
        });
    </script>
@endsection
