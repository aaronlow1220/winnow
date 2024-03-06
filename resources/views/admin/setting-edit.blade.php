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
            <p>新增成功</p>
        </div>
    @elseif(session()->has('failed'))
        <div class="msg-box failed">
            <p>新增失敗，{{ session()->get('failed') }}</p>
        </div>
    @endif
    <div class="settings-container">
        <div class="func-bar">
            <a class="func-btn" href="{{ route('admin.settings') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" fill="currentcolor" />
                </svg>
                <span>返回</span>
            </a>
        </div>
        <form class="setting-edit-container" action="{{ route('handle.updateSetting') }}" method="post">
            @csrf
            <h1>{{ $setting->name }}</h1>
            <input type="hidden" name="setting_id" value="{{ $id }}">
            <input type="text" name="setting_edit" class="setting-textBox" value="@if ($setting->content) {{ $setting->content }} @endif">
            <button class="setting-button" type="submit">確認</button>
        </form>
    </div>
@endsection
