@extends('layout/layout')

@section('page-title', '帳號')

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/account_info.css') }}">
@endpush

{{-- @section('main-content')
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
                    <a href="{{ route('accountChange', ['info' => 'name']) }}">
                        <button id="name">
                            <img src="{{ asset('assets/img/chevron_right.svg') }}">
                        </button>
                    </a>
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
                    <a href="{{ route('accountChange', ['info' => 'telephone']) }}">
                        <button id="phone">
                            <img src="{{ asset('assets/img/chevron_right.svg') }}">
                        </button>
                    </a>
                </div>
                <div class="justify-space-between">
                    <div class="body1 text-inactive">手機</div>
                    <div class="body1 text-main">
                        @if (!empty($users->phone))
                            {{ $users->phone }}
                        @else
                            未設定
                        @endif
                    </div>
                    <a href="{{ route('accountChange', ['info' => 'phone']) }}">
                        <button id="phone">
                            <img src="{{ asset('assets/img/chevron_right.svg') }}">
                        </button>
                    </a>
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
                    <a href="{{ route('accountChange', ['info' => 'email']) }}">
                        <button id="email">
                            <img src="{{ asset('assets/img/chevron_right.svg') }}">
                        </button>
                    </a>

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
                    <a href="{{ route('accountChange', ['info' => 'contact-address']) }}">
                        <button id="contact-address">
                            <img src="{{ asset('assets/img/chevron_right.svg') }}">
                        </button>
                    </a>
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
                    <a href="{{ route('accountChange', ['info' => 'delivery-address']) }}">
                        <button id="delivery_address">
                            <img src="{{ asset('assets/img/chevron_right.svg') }}">
                        </button>
                    </a>
                </div>
            </div>
            <div class="info_card">
                <h4>訂單查詢</h4>
                <div class="justify-space-between">
                    <div class="body1 text-secondary">訂單</div>
                    <a href="">
                        <button id="order">
                            <img src="{{ asset('assets/img/chevron_right.svg') }}">
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection --}}

@section('main-content')
    <script>
        document.addEventListener('DOMContentLoaded', async function() {


            function bindButtonListeners() {
                const buttons = document.querySelectorAll(
                    '.edit_info_card input[type="button"],.edit_info_card button');
                buttons.forEach(button => {
                    button.addEventListener('click', function() {
                        history.replaceState({
                            content: initialContent,
                            id: 'sub-main'
                        }, '', window.location.pathname);
                        document.getElementById('sub-main').innerHTML = initialContent;
                    });
                });
            }

            function setupModalTriggers() {
                var modalButtons = document.querySelectorAll('button[id]');
                modalButtons.forEach(function(btn) {
                    btn.onclick = function() {
                        var modalId = 'edit_' + btn.id;
                        var modal = document.getElementById(modalId);
                        if (modal) {
                            modal.style.display = "flex";
                        }
                    };
                });

                var closeButtons = document.querySelectorAll('.modal .close');
                closeButtons.forEach(function(btn) {
                    btn.onclick = function() {
                        var modal = btn.closest('.modal');
                        if (modal) {
                            modal.style.display = "none";
                        }
                    };
                });

                window.onclick = function(event) {
                    if (event.target.classList.contains('modal')) {
                        event.target.style.display = "none";
                    }
                };
            }

            function setupCloseIconTriggers() {
                var closeIcons = document.querySelectorAll('.modal img[src="../img/close.svg"]');
                closeIcons.forEach(function(icon) {
                    icon.addEventListener('click', function() {
                        var input = icon.previousElementSibling;
                        if (input && input.tagName === 'INPUT') {
                            input.value = '';
                        }
                    });
                });
            }

            setupModalTriggers();
            setupCloseIconTriggers();
        });
    </script>
    <main class="flex justify-center">
        <div id="sub-main" class="flex flex-column">
            <div>
                <div class="body1 text-secondary">歡迎</div>
                <h2 id="myname">
                    @if (!empty($users->username))
                        {{ $users->username }}
                    @else
                        未設定
                    @endif
                </h2>
            </div>
            <div class="info_card">
                <h4>基本資訊</h4>
                <div class="justify-space-between relative">
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
                <div id="edit_name" class="modal">
                    <form action="/?????.php" method="post" class="edit_info_card">
                        <h3>姓名</h3>
                        <div>
                            <input value="林駿宇" type="text" name="name" placeholder="" class="text-main">
                            <img src="{{ asset('assets/img/close.svg') }}">
                        </div>
                        <div>
                            <input type="button" value="取消" class="close caption">
                            <input type="submit" value="儲存" class="caption">
                        </div>
                    </form>
                </div>
                <div class="divider"></div>

                <div class="justify-space-between relative">
                    <div class="body1 text-inactive">電話</div>
                    <div class="body1 text-main">0912345678</div>
                    <button id="phone">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
                <div id="edit_phone" class="modal">
                    <form action="/?????.php" method="post" class="edit_info_card">
                        <h3>電話</h3>
                        <div>
                            <input type="tel" name="phone" placeholder="" class="text-main">
                            <img src="{{ asset('assets/img/close.svg') }}">
                        </div>
                        <div>
                            <input type="button" value="取消" class="close caption">
                            <input type="submit" value="儲存" class="caption">
                        </div>
                    </form>
                </div>
                <div class="divider"></div>

                <div class="justify-space-between relative">
                    <div class="body1 text-inactive">電子郵件</div>
                    <div class="body1 text-main">1234567@gmail.com(非必要)</div>
                    <button id="email">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
                <div id="edit_email" class="modal">
                    <form action="/?????.php" method="post" class="edit_info_card">
                        <h3>電子郵件</h3>
                        <div>
                            <input type="email" name="email" placeholder="" class="text-main">
                            <img src="{{ asset('assets/img/close.svg') }}">
                        </div>
                        <div>
                            <input type="button" value="取消" class="close caption">
                            <input type="submit" value="儲存" class="caption">
                        </div>
                    </form>
                </div>
            </div>

            <div class="info_card">
                <h4>地址</h4>
                <div class="justify-space-between relative">
                    <div class="body1 text-inactive">聯絡地址</div>
                    <div class="body1  text-main">桃園市大業區大業路大業國小</div>
                    <button id="contact_address">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
                <div id="edit_contact_address" class="modal">
                    <form action="/?????.php" method="post" class="edit_info_card">
                        <h3>聯絡地址</h3>
                        <div>
                            <input type="text" name="contact_address" placeholder="" class="text-main">
                            <img src="{{ asset('assets/img/close.svg') }}">
                        </div>
                        <div>
                            <input type="button" value="取消" class="close caption">
                            <input type="submit" value="儲存" class="caption">
                        </div>
                    </form>
                </div>
                <div class="divider"></div>

                <div class="justify-space-between relative">
                    <div class="body1 text-inactive">寄送地址</div>
                    <div class="body1  text-main">桃園市內壢區內壢路元智幼稚園</div>
                    <button id="delivery_address">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
                <div id="edit_delivery_address" class="modal">
                    <form action="/?????.php" method="post" class="edit_info_card">
                        <h3>寄送地址</h3>
                        <div>
                            <input type="text" name="delivery_address" placeholder="" class="text-main">
                            <img src="{{ asset('assets/img/close.svg') }}">
                        </div>
                        <div>
                            <input type="button" value="取消" class="close caption">
                            <input type="submit" value="儲存" class="caption">
                        </div>
                    </form>
                </div>
            </div>
            <a href="order_list.html" class="caption">訂單查詢 ></a>
        </div>
    </main>
@endsection
