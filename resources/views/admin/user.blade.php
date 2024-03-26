@extends('admin/layout/dashboard-layout')

@section('dashboard-title')
    人員管理 - 使用者
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
            <p>{{ session()->get('success')['success_m'] }}筆修改成功，{{ session()->get('success')['failed_m'] }}筆修改失敗</p>
        </div>
    @endif
    <form class="func" id="form" method="POST" action="{{ route('handle.userListAction') }}">
        @csrf
        <div class="func-bar">
            <a class="func-btn" href="{{ route('admin.create_article') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" fill="currentcolor" />
                </svg>
                <span>新增</span>
            </a>
            <button class="func-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z" fill="currentcolor" />
                </svg>
                <span>更多動作</span>
            </button>
            <div class="dropdown-content">
                <input id="selectedAction" type="hidden" name="action" value="">
                <a id="dlt-btn" data-value="remove">停用所選</a>
            </div>
        </div>
        <div class="table-container">
            <table class="wn-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="selectAll" id="selectAll" onclick="checkSelect()" /></th>
                        <th>名稱</th>
                        <th>電子郵件地址</th>
                        <th>狀態</th>
                        <th>修改時間</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><input type="checkbox" name="sSelector[]" id="" class="sSelector" value="{{ $user->uuid }}"/></td>
                            <td><a href="{{ route('admin.editUser', ['id' => $user->uuid]) }}">{{ $user->username }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @switch($user->status)
                                    @case('ACTIVE')
                                        啟用
                                    @break

                                    @case('DEACTIVE')
                                        停用
                                    @break

                                    @default
                                @endswitch
                            </td>
                            <td>{{ $user->modified_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
    <script>
        document.getElementById("dlt-btn").onclick = function() {
            document.getElementById("selectedAction").value = this.dataset.value;
            document.getElementById("form").submit();
        }
    </script>
@endsection
