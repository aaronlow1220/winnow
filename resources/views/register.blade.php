@extends('layout/auth-layout')

@section('page-title', '註冊')

@push('register')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endpush

@section('auth-main-content')
    <main class="flex justify-center h-100 main-bg2">
        <div id="sub-main" class="relative flex align-items-center h-100">
            <div class="flex justify-center w-100">
                <div id="ad-tittle">
                    <div class="relative">
                        <p class="absolute left--3px top-138px color-white fs-3rem line-height-110">關於</p>
                        <p class="absolute left-47px color-white font-notoseriftc-bold fs-5-375rem line-height-110">忠貞
                        </p>
                    </div>
                </div>
                <p class="ad-content ad-content1">
                    透過導覽活動規劃與推廣，利用在地現有之資源，建構符合市場需求形態之導覽活動，以吸引遊客到訪，促進地方產業發展。並在活動中培訓在地或對地方創生產業之人員，成為市場地方創生之生力軍。
                </p>
                <p class="ad-content ad-content2">忠貞社區發展協會為非以營利為目的之社會團體，以促進社區發展，增進社區凝聚力，推展福利社區化，建立社區照顧服務體系為宗旨。</p>
            </div>
            <div id="register" class="flex right-0 flex flex-column justify-center bg-white h-100">
                <div class="flex flex-column align-items-center gap-3rem fs-1-25rem">
                    <h3>帳號註冊</h3>
                    <form action="{{ route('authHandle.registerUser') }}" method="post" class="flex flex-column gap-3rem">
                        <div class="flex flex-column gap-1-5rem">
                            <input type="text" name="email" placeholder="電子郵件"
                                class="input-width-height fs-1-25rem text-indent-1-19em  border-radius-0-125rem text-inactive">
                            <input type="text" name="password" placeholder="密碼"
                                class="input-width-height fs-1-25rem text-indent-1-19em  border-radius-0-125rem text-inactive">
                            <input type="text" name="password" placeholder="確認密碼"
                                class="input-width-height fs-1-25rem text-indent-1-19em  border-radius-0-125rem text-inactive">
                        </div>
                        <input type="submit" value="註冊"
                            class="btn input-width-height fs-1-25rem  border-radius-0-125rem text-secondary">

                    </form>
                    <p class="text-inactive"><a href="{{ route('auth.login') }}"
                            class="text-secondary text-decoration-none font-notoseriftc-medium hover-decoration">改為登入</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
