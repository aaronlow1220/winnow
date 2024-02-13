@extends('layout/layout')

@section('page-title', '帳號')

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/account_info.css') }}">
@endpush

@section('main-content')
    <main class="flex justify-center">
        <div id="sub-main" class="flex flex-column">
            <div class="body1 text-secondary">歡迎</div>
            <h2 id="myname">{{ $users->username }}</h2>
            <div class="info_card">
                <h4>基本資訊</h4>
                <div class="justify-space-between">
                    <div class="body1 text-inactive">姓名</div>
                    <div class="body1 text-main">
                        @if (!empty($users->username))
                            {{ $users->username }}
                        @else
                            未設定
                        @endif
                    </div>
                    <button type="button" id="name">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
            </div>

            <div class="info_card">
                <h4>聯絡資訊</h4>
                <div class="justify-space-between">
                    <div class="body1 text-inactive">電話</div>
                    <div class="body1 text-main">
                        @if (!empty($users->telephone))
                            {{ $users->telephone }}
                        @else
                            未設定
                        @endif
                    </div>
                    <button id="phone">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
                <div class="justify-space-between">
                    <div class="body1 text-inactive">電子郵件</div>
                    <div class="body1 text-main">
                        @if (!empty($users->email))
                            {{ $users->email }}
                        @else
                            未設定
                        @endif
                    </div>
                    <button id="email">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
            </div>

            <div class="info_card">
                <h4>地址</h4>
                <div class="justify-space-between">
                    <div class="body1 text-inactive">聯絡地址</div>
                    <div class="body1  text-main">
                        @if (!empty($users->contact_address))
                            {{ $users->contact_address }}
                        @else
                            未設定
                        @endif
                    </div>
                    <button id="contact_address">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
                <div class="justify-space-between">
                    <div class="body1 text-inactive">寄送地址</div>
                    <div class="body1  text-main">
                        @if (!empty($users->delivery_address))
                            {{ $users->delivery_address }}
                        @else
                            未設定
                        @endif
                    </div>
                    <button id="delivery_address">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
            </div>
            <div class="info_card">
                <h4>訂單查詢</h4>
                <div class="justify-space-between">
                    <div class="body1 text-secondary">訂單</div>
                    <button id="order">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
