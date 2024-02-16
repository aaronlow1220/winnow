@extends('layout/layout')

@section('page-title', '帳號')

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/account_info.css') }}">
@endpush

@section('main-content')
    <main class="flex justify-center">
        <div id="sub-main" class="flex flex-column">
            <form action="/?????.php" method="post" class="edit_info_card info_card">
                <div>
                    <a href="{{ route('account') }}"><button type="button"><img src="{{ asset('assets/img/vector.svg') }}"></button></a>
                    <h3>{{ $mod }}</h3>
                </div>
                <input type="{{ $type }}" name="name" placeholder="{{ $mod }}"
                    class="input-width-height fs-1-25rem text-indent-1-19em  border-radius-0-125rem text-inactive" autocomplete="false" value="{{ $user }}">
                <div class="justify-center">
                    <input type="submit" value="保存"
                        class="btn input-width-height fs-1-25rem  border-radius-0-125rem text-secondary">
                    <input type="button" value="取消"
                        class="btn input-width-height fs-1-25rem  border-radius-0-125rem text-secondary">
                </div>
            </form>
        </div>
    </main>
@endsection
