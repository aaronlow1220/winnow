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
    });
</script>

<body>
    <section class="section flex">
        <div class="cart-container">
            <h3>購物車</h3>
            <form class="cart">
                <div class="unit" style="margin-bottom: 4rem;">
                    <div class="date flex" style="margin-top: 12px; width: 100%; flex-wrap: wrap; justify-content: space-between; align-items: baseline; background: gray; padding: 0 8px; box-shadow: 0 0 0 8px gray; color: white; margin-bottom: 8px">
                        <h4>2024/1/21</h4>
                        <p>#1234235</p>
                    </div>
                    <div class="cart-item flex">
                        <img src="../img/2.png" alt="food1" />
                        <div class="cart-item-info">
                            <h4 class="item-title">麵包</h4>
                            <div class="cart-item-info-cost">
                                <div class="counter flex" style="align-items: baseline; gap: 2px; padding: 0 12px;">
                                    <h4>3</h4>
                                    <p class="text-secondary">份</p>
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
                                <div class="counter flex" style="align-items: baseline; gap: 2px; padding: 0 12px;">
                                    <h4>3</h4>
                                    <p class="text-secondary">份</p>
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
                                <div class="counter flex" style="align-items: baseline; gap: 2px; padding: 0 12px;">
                                    <h4>3</h4>
                                    <p class="text-secondary">份</p>
                                </div>
                                <div class="price-container flex">
                                    <p class="text-secondary">NT$</p>
                                    <h3 class="price" data-price="100">100</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="unit" style="margin-bottom: 8px;">
                    <div class="date flex" style="margin-top: 12px; width: 100%; flex-wrap: wrap; justify-content: space-between; align-items: baseline; background: gray; padding: 0 8px; box-shadow: 0 0 0 8px gray; color: white; margin-bottom: 8px">
                        <h4>2024/1/21</h4>
                        <p>#1234235</p>
                    </div>
                    <div class="cart-item flex">
                        <img src="../img/2.png" alt="food1" />
                        <div class="cart-item-info">
                            <h4 class="item-title">麵包</h4>
                            <div class="cart-item-info-cost">
                                <div class="counter flex" style="align-items: baseline; gap: 2px; padding: 0 12px;">
                                    <h4>3</h4>
                                    <p class="text-secondary">份</p>
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
                                <div class="counter flex" style="align-items: baseline; gap: 2px; padding: 0 12px;">
                                    <h4>3</h4>
                                    <p class="text-secondary">份</p>
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
                                <div class="counter flex" style="align-items: baseline; gap: 2px; padding: 0 12px;">
                                    <h4>3</h4>
                                    <p class="text-secondary">份</p>
                                </div>
                                <div class="price-container flex">
                                    <p class="text-secondary">NT$</p>
                                    <h3 class="price" data-price="100">100</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
@endsection