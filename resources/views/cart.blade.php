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
                @foreach ($cart_items as $item)
                    <div class="cart-item flex">
                    <img src="{{ asset('media/product/'.$item->product_uid."/".$item->product_uid."_cover.jpg") }}" alt="food1" />
                    <div class="cart-item-info">
                        <h4 class="item-title">{{ $items->where("uuid", $item->product_uid)->first()->name }}</h4>
                        <div class="cart-item-info-cost">
                            <div class="counter">
                                <button type="button" class="decrease">
                                    <img src="{{ asset('assets/img/remove.svg') }}" alt="">
                                </button>
                                <input type="number" value="{{ $item->quantity }}" min="0" max="99" class="number body1"></input>
                                <button type="button" class="increase">
                                    <img src="{{ asset('assets/img/add.svg') }}" alt="">
                                </button>
                            </div>
                            <div class="price-container flex">
                                <p class="text-secondary">NT$</p>
                                <h3 class="price" data-price="@if($items->where("uuid", $item->product_uid)->first()->discount_price){{ $items->where("uuid", $item->product_uid)->first()->discount_price }}@else{{ $items->where("uuid", $item->product_uid)->first()->price }}@endif">@if($items->where("uuid", $item->product_uid)->first()->discount_price){{ $items->where("uuid", $item->product_uid)->first()->discount_price }}@else{{ $items->where("uuid", $item->product_uid)->first()->price }}@endif</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                {{-- <div class="cart-item flex">
                    <img src="../img/2.png" alt="food1" />
                    <div class="cart-item-info">
                        <h4 class="item-title">麵包</h4>
                        <div class="cart-item-info-cost">
                            <div class="counter">
                                <button type="button" class="decrease">
                                    <img src="{{ asset('assets/img/remove.svg') }}" alt="">
                                </button>
                                <input type="number" value="0" min="0" max="99" class="number body1"></input>
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
                                <input type="number" value="0" min="0" max="99" class="number body1"></input>
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
                </div> --}}
            </form>
            <div class="cart-total flex">
                <div class="cart-options">
                    <div class="cart-option">
                        <label for="location">地點</label>
                        <select class="option-input" name="locations" id="locations">
                            <option value="基隆市">基隆市</option>
                            <option value="新北市">新北市</option>
                            <option value="臺北市">臺北市</option>
                            <option value="桃園市">桃園市</option>
                            <option value="新竹市">新竹市</option>
                            <option value="新竹縣">新竹縣</option>
                            <option value="苗栗縣">苗栗縣</option>
                            <option value="臺中市">臺中市</option>
                            <option value="彰化縣">彰化縣</option>
                            <option value="南投縣">南投縣</option>
                            <option value="雲林縣">雲林縣</option>
                            <option value="嘉義市">嘉義市</option>
                            <option value="嘉義縣">嘉義縣</option>
                            <option value="臺南市">臺南市</option>
                            <option value="高雄市">高雄市</option>
                            <option value="屏東縣">屏東縣</option>
                            <option value="臺東縣">臺東縣</option>
                            <option value="花蓮縣">花蓮縣</option>
                            <option value="宜蘭縣">宜蘭縣</option>
                            <option value="澎湖縣">澎湖縣</option>
                            <option value="金門縣">金門縣</option>
                            <option value="連江縣">連江縣</option>
                        </select>
                    </div>
                    <div class="cart-option">
                        <label for="location">配送方式</label>
                        <input class="option-input" type="text" value="冷凍" disabled>
                    </div>
                    <div class="cart-option">
                        <label for="location">交易方法</label>
                        <input class="option-input" type="text" value="貨到付款" disabled>
                    </div>
                </div>
                <div class="total-price flex">
                    <h3>總結：</h3>
                    <div class="price-container flex">
                        <p class="text-secondary">NT$</p>
                        <h2 id="total">100</h2>
                    </div>
                </div>
            </div>
            <div class="check-out flex">
                <button class="LG_button">
                    結帳
                </button>
            </div>
        </div>
    </section>
</body>
@endsection