@extends('layout/layout')

@section('page-title', '帳號')

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/account_info.css') }}">
@endpush

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
                var closeIcons = document.querySelectorAll('.modal img');
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

                <div class="divider"></div>

                <div class="justify-space-between relative">
                    <div class="body1 text-inactive">手機</div>
                    <div class="body1 text-main">
                        @if (!empty($users->phone))
                            {{ $users->phone }}
                        @else
                            未設定
                        @endif
                    </div>
                    <button id="phone">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
                <div class="divider"></div>

                <div class="justify-space-between relative">
                    <div class="body1 text-inactive">電話</div>
                    <div class="body1 text-main">
                        @if (!empty($users->telephone))
                            {{ $users->telephone }}
                        @else
                            未設定
                        @endif
                    </div>
                    <button id="telephone">
                        <img src="{{ asset('assets/img/chevron_right.svg') }}">
                    </button>
                </div>
                <div class="divider"></div>

                <div class="justify-space-between relative">
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
                <div class="justify-space-between relative">
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
                <div class="divider"></div>

                <div class="justify-space-between relative">
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
            <a href="{{ route('orderList') }}" class="caption">訂單查詢 ></a>
            <a id="logOut" href="{{ route('authHandle.logout') }}" class="body1 btn-tertiary">登出</a>
        </div>

        {{-- --- --}}
        <form action="{{ route('pageHandle.accountChange') }}" method="post">
            @csrf
            <input type="hidden" name="user_uid" value="{{ $users->uuid }}">
            <div id="edit_name" class="modal">
                <div class="edit_info_card">
                    <h3>姓名</h3>
                    <div>
                        <input value="@if (!empty($users->username)){{ $users->username }}@endif" type="text"
                            name="name" placeholder="姓名" class="text-main">
                        <img src="{{ asset('assets/img/close.svg') }}">
                    </div>
                    <div>
                        <input type="button" value="取消" class="close caption">
                        <input type="submit" value="儲存" class="caption">
                    </div>
                </div>
            </div>

            <div id="edit_phone" class="modal">
                <div class="edit_info_card">
                    <h3>手機</h3>
                    <div>
                        <input type="tel" name="phone" placeholder="手機" class="text-main"
                            value="@if (!empty($users->phone)){{ $users->phone }}@endif">
                        <img src="{{ asset('assets/img/close.svg') }}">
                    </div>
                    <div>
                        <input type="button" value="取消" class="close caption">
                        <input type="submit" value="儲存" class="caption">
                    </div>
                </div>
            </div>

            <div id="edit_telephone" class="modal">
                <div class="edit_info_card">
                    <h3>電話</h3>
                    <div>
                        <input type="tel" name="telephone" placeholder="電話" class="text-main"
                            value="@if (!empty($users->telephone)){{ $users->telephone }}@endif">
                        <img src="{{ asset('assets/img/close.svg') }}">
                    </div>
                    <div>
                        <input type="button" value="取消" class="close caption">
                        <input type="submit" value="儲存" class="caption">
                    </div>
                </div>
            </div>

            <div id="edit_email" class="modal">
                <div class="edit_info_card">
                    <h3>電子郵件</h3>
                    <div>
                        <input type="email" name="email" placeholder="電子郵件" class="text-main"
                            value="
                    @if (!empty($users->email)){{ $users->email }}@endif">
                        <img src="{{ asset('assets/img/close.svg') }}">
                    </div>
                    <div>
                        <input type="button" value="取消" class="close caption">
                        <input type="submit" value="儲存" class="caption">
                    </div>
                </div>
            </div>

            <div id="edit_contact_address" class="modal">
                <div class="edit_info_card">
                    <h3>聯絡地址</h3>
                    <div>
                        <input type="text" name="contact_address" placeholder="聯絡地址" class="text-main"
                            value="@if (!empty($users->contact_address)){{ $users->contact_address }}@endif">
                        <img src="{{ asset('assets/img/close.svg') }}">
                    </div>
                    <div>
                        <input type="button" value="取消" class="close caption">
                        <input type="submit" value="儲存" class="caption">
                    </div>
                </div>
            </div>

            <div id="edit_delivery_address" class="modal">
                <div class="edit_info_card">
                    <h3>寄送地址</h3>
                    <div>
                        <input type="text" name="delivery_address" placeholder="寄送地址" class="text-main"
                            value="@if (!empty($users->delivery_address)){{ $users->delivery_address }}@endif">
                        <img src="{{ asset('assets/img/close.svg') }}">
                    </div>
                    <div>
                        <input type="button" value="取消" class="close caption">
                        <input type="submit" value="儲存" class="caption">
                    </div>
                </div>
            </div>
        </form>
    </main>
    @if (session()->has('success'))
        <script>
            alert("修改成功！");
        </script>
    @elseif(session()->has('failed'))
        <script>
            alert("修改失敗！請再試一次");
        </script>
    @endif

@endsection
