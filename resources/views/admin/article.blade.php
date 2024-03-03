@extends('admin/layout/dashboard-layout')

@section('admin-title', '文章管理')

@section('dashboard-title')
    文章管理
@endsection

@section('dashboard-content')
    <div class="func">
        <div class="func-bar">
            <a class="func-btn" href="{{ route('admin.create_article') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" fill="currentcolor" />
                </svg>
                <span>新增</span>
            </a>
            <button class="func-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z"
                        fill="currentcolor" />
                </svg>
                <span>更多動作</span>
            </button>
            <div class="search-bar">
                <input type="search" placeholder="搜尋" />
            </div>
        </div>
        <div class="table-container">
            <table class="wn-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="selectAll" id="selectAll" onclick="checkSelect()" /></th>
                        <th>標題</th>
                        <th>分類</th>
                        <th>子分類</th>
                        <th>作者</th>
                        <th>狀態</th>
                        <th>修改時間</th>
                        <th>點擊次數</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                            <td><a href="{{ route('admin.editPost', $article->uuid) }}">{{ $article->title }}</a></td>
                            <td>
                                @foreach ($categories as $category)
                                    @if ($category->uuid == $article->category_uid)
                                        {{ $category->name }}
                                    @break
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($sub_categories as $sub_category)
                                @if ($sub_category->uuid == $article->sub_category_uid)
                                    {{ $sub_category->name }}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($users as $user)
                            @if ($user->uuid == $article->admin_uid)
                                {{ $user->username }}
                            @break
                        @endif
                    @endforeach
                </td>
                <td>{{ $article->status }}</td>
                <td>{{ date('Y-m-d', strtotime($article->modified_at)) }}</td>
                <td>{{ $article->hits }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="wn-paginator">
<div class="paginator">
    <a href="#">&laquo;</a>
    <a href="#" class="active">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">&raquo;</a>
</div>
</div>
</div>
@endsection
