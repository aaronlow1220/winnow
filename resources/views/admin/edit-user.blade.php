@extends('admin/layout/dashboard-layout')

@section('dashboard-content')
    <form class="func" action="{{ route('handle.editUser') }}" method="POST">
        @csrf
        @if (session()->has('success'))
            <div class="msg-box success">
                <p>修改成功</p>
            </div>
        @elseif(session()->has('failed'))
            <div class="msg-box failed">
                <p>修改失敗，請再試一次</p>
            </div>
        @endif
        <input type="hidden" name="subCategory" value="{{ $users->uuid }}">
        <div class="func-bar">
            <button class="func-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z"
                        fill="currentcolor" />
                </svg>
                <span>儲存</span>
            </button>
            <a class="func-btn" href="{{ route('admin.user') }}">
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
                    <label for="editor-username">名稱</label>
                    <p class="info-only" id="editor-username">{{ $users->username }}</p>
                </div>
                <div class="editor-in">
                    <label for="editor-email">Email</label>
                    <p class="info-only" id="editor-email">{{ $users->email }}</p>
                </div>
                <div class="editor-in">
                    <label for="editor-status">狀態</label>
                    <select name="status" id="editor-status" class="editor-input">
                        <option value="ACTIVE" @if ($users->status == 'ACTIVE') selected @endif>啟用</option>
                        <option value="DEACTIVE" @if ($users->status == 'DEACTIVE') selected @endif>停用</option>
                    </select>
                </div>
                <div class="editor-in">
                    <label for="editor-isAdmin">管理員</label>
                    <select name="isAdmin" id="editor-isAdmin" class="editor-input">
                        <option value="1" @if ($users->is_admin == 1) selected @endif>是</option>
                        <option value="0" @if ($users->is_admin == 0) selected @endif>否</option>
                    </select>
                </div>
                <div class="editor-in">
                    <label for="editor-resetPassword">重置密碼</label>
                    <div id="editor-resetPassword" class="reset-btn">重置密碼</div>
                    @if (session()->has('reset-pass'))
                        預設密碼為：{{ session()->get('reset-pass') }}
                    @endif
                </div>
            </div>
        </div>
    </form>
    <script>
        const resetPasswordBtn = document.querySelector("#editor-resetPassword");

        resetPasswordBtn.addEventListener("click", function(event) {
            if (window.confirm("確定重置{{ $users->username }}的密碼?")) {
                var resetId = "{{ route('handle.resetPassword', ['id'=> $users->uuid]) }}";
                window.location.replace(resetId);
            }
        });
    </script>
@endsection
