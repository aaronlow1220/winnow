@extends('layout/auth-layout')

@section('page-title', '登入')

@push('login')
    <link rel="stylesheet" href="{{ asset('assets/css/order_success.css') }}">
@endpush

@section('auth-main-content')
    <main class="flex justify-center h-100">
        <div id="sub-main" class="relative flex flex-column align-items-center h-100">
            <div id="success" class="flex align-items-center">
                {{-- <img src="../img/info.png" alt="order_success"> --}}
                <img src="{{ asset('assets/img/info.svg') }}" alt="">
                <h3 class="text-main">請至訂單頁面輸入匯款帳號後五碼</h3>
            </div>
            <div class="flex flex-column align-items-center">
                <h4 class="text-secondary" id="countdown">網頁將在 5 秒之後自動跳轉至該訂單</h4>
                <h4 class="text-secondary">若未跳轉請<a href="{{ route("orderList") }}">點此</a></h4>
            </div>
        </div>
    </main>
    <script>
        let countdown = 5; // 秒數
        let countdownElement = document.querySelector('#countdown');

        let intervalId = setInterval(() => {
            countdown--;
            countdownElement.textContent = '網頁將在 ' + countdown + ' 秒之後自動跳轉';

            if (countdown <= 0) {
                clearInterval(intervalId);
                window.location.href = '{{ route("orderList") }}';
            }
        }, 1000);
    </script>
@endsection
