@extends('layout/layout')

@section('page-title', '帳號')

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush

@section('main-content')
<script>
    document.addEventListener('DOMContentLoaded', async function () {
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

        // 初始化總價
        countTotal();

        // 設置計數器功能
        document.querySelectorAll('.counter').forEach(counter => {
            const decrease = counter.querySelector('.decrease');
            const increase = counter.querySelector('.increase');
            const numberInput = counter.querySelector('.number');
            const priceElement = counter.closest('.cart-item-info-cost').querySelector('.price');
            const basePrice = parseInt(priceElement.getAttribute('data-price'), 10);

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
                <form class="cart">
                    <div class="cart-item flex">
                        <img src="../img/2.png" alt="food1" />
                        <div class="cart-item-info">
                            <h4 class="item-title">麵包</h4>
                            <div class="cart-item-info-cost">
                                <div class="counter">
                                    <button type="button" class="decrease">
                                        <img src="{{ asset('assets/img/remove.svg') }}" alt="">
                                    </button>
                                    <input type="number" value="0" min="0" max="99"
                                        class="number body1"></input>
                                    <button type="button" class="increase">
                                        <img src="{{ asset('assets/img/add.svg') }}" alt="">
                                    </button>
                                </div>
                                <div class="price-container flex">
                                    <p class="text-secondary">NT$</p>
                                    <h3 class="price" data-price="100">100</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item flex">
                        <img src="../img/2.png" alt="food1" />
                        <div class="cart-item-info">
                            <h4 class="item-title">麵包</h4>
                            <div class="cart-item-info-cost">
                                <div class="counter">
                                    <button type="button" class="decrease">
                                        <img src="{{ asset('assets/img/remove.svg') }}" alt="">
                                    </button>
                                    <input type="number" value="0" min="0" max="99"
                                        class="number body1"></input>
                                    <button type="button" class="increase">
                                        <img src="{{ asset('assets/img/add.svg') }}" alt="">
                                    </button>
                                </div>
                                <div class="price-container flex">
                                    <p class="text-secondary">NT$</p>
                                    <h3 class="price" data-price="100">100</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item flex">
                        <img src="../img/2.png" alt="food1" />
                        <div class="cart-item-info">
                            <h4 class="item-title">麵包</h4>
                            <div class="cart-item-info-cost">
                                <div class="counter">
                                    <button type="button" class="decrease">
                                        <img src="{{ asset('assets/img/remove.svg') }}" alt="">
                                    </button>
                                    <input type="number" value="0" min="0" max="99"
                                        class="number body1"></input>
                                    <button type="button" class="increase">
                                        <img src="{{ asset('assets/img/add.svg') }}" alt="">
                                    </button>
                                </div>
                                <div class="price-container flex">
                                    <p class="text-secondary">NT$</p>
                                    <h3 class="price" data-price="100">100</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="cart-item cart-total flex">
                    <img src="" alt="">
                    <div class="total-price flex">
                        <h3>總結：</h3>
                        <div class="price-container flex">
                            <p class="text-secondary">NT$</p>
                            <h2 id="total">100</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
@endsection
