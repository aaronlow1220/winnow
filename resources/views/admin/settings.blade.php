@extends('admin/layout/dashboard-layout')

@section('dashboard-title')
    網頁設定
@endsection

@section('dashboard-content')
    <div class="settings-container">
        @foreach ($settings as $setting)
        <div class="setting-content">
            <div class="setting-content-left">
                <p>{{ $setting->name }}</p>
            </div>
            <div class="setting-content-right">
                <p>{{ $setting->content }}</p>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M504-480 348-636q-11-11-11-28t11-28q11-11 28-11t28 11l184 184q6 6 8.5 13t2.5 15q0 8-2.5 15t-8.5 13L404-268q-11 11-28 11t-28-11q-11-11-11-28t11-28l156-156Z" fill="currentcolor"/></svg>
                </span>
            </div>
        </div>
        @endforeach
    </div>
@endsection
