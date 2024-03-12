@extends('admin/layout/dashboard-layout')

@section('dashboard-title')
    網頁設定
@endsection

@section('dashboard-content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="msg-box failed">
                <p>{{ $error }}</p>
            </div>
        @endforeach
    @endif
    @if (session()->has('success'))
        <div class="msg-box success">
            <p>初始化成功</p>
        </div>
    @elseif(session()->has('failed'))
        <div class="msg-box failed">
            <p>初始化失敗，{{ session()->get('failed') }}</p>
        </div>
    @elseif(session()->has('message'))
        <div class="msg-box failed">
            初始化失敗，設定已初始化
        </div>
    @endif
    <div class="settings-container">
        @if ($settings)
            @foreach ($settings as $setting)
                <a class="setting-content" href="{{ route('admin.editSetting', ['id' => $setting->uuid]) }}">
                    <div class="setting-content-left">
                        <p>{{ $setting->name }}</p>
                    </div>
                    <div class="setting-content-right">
                        <p>{{ $setting->content }}</p>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="M504-480 348-636q-11-11-11-28t11-28q11-11 28-11t28 11l184 184q6 6 8.5 13t2.5 15q0 8-2.5 15t-8.5 13L404-268q-11 11-28 11t-28-11q-11-11-11-28t11-28l156-156Z" fill="currentcolor" />
                            </svg>
                        </span>
                    </div>
                </a>
            @endforeach
        @else
            <a href="{{ route('handle.settingsInit') }}">初始化設定</a>
        @endif

    </div>
@endsection
