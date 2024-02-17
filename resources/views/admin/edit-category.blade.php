@extends('admin/layout/dashboard-layout')

@section('dashboard-title')
    修改類別
@endsection

@section('dashboard-content')
    <form class="func" action="{{ route('handle.editCategory') }}" method="POST">
        @csrf
        @if(session()->has("success"))
        <div class="msg-box success">
            <p>修改成功</p>
        </div>
        @elseif(session()->has("failed"))
        <div class="msg-box failed">
            <p>修改失敗，請再試一次</p>
        </div>
        @endif
        <input type="hidden" name="category" value="{{ $categories->uuid }}">
        <div class="func-bar">
            <button class="func-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z"
                        fill="currentcolor" />
                </svg>
                <span>儲存</span>
            </button>
            <a class="func-btn" href="{{ route('admin.category') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"
                        fill="currentcolor" />
                </svg>
                <span>取消</span>
            </a>
        </div>
        <div class="editor-container">
            <div class="editor-right">
                <div class="editor-in">
                    <label for="editor-name">名稱</label>
                    <input type="text" name="categoryName" id="editor-name" class="editor-input"
                        value="{{ $categories->name }}">
                </div>
                <div class="editor-in">
                    <label for="editor-alias">網址</label>
                    <input type="text" name="alias" id="editor-alias" class="editor-input"
                        value="{{ $categories->alias }}">
                </div>
                <div class="editor-in">
                    <label for="editor-status">狀態</label>
                    <select name="status" id="editor-status" class="editor-input">
                        <option value="ACTIVE" @if ($categories->status == 'ACTIVE') selected @endif>公開</option>
                        <option value="UNLISTED" @if ($categories->status == 'UNLISTED') selected @endif>不公開</option>
                        <option value="PRIVATE" @if ($categories->status == 'PRIVATE') selected @endif>私人</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
@endsection
