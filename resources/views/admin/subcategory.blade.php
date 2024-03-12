@extends('admin/layout/dashboard-layout')

@section('admin-title', '類別管理 - 子類別')

@section('dashboard-title')
    類別管理 - 子類別
@endsection

@section('dashboard-content')
    <div class="func">
        <div class="func-bar">
            <a class="func-btn" href="{{ route('admin.addSubCategory') }}">
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
        </div>
        <div class="table-container">
            <table class="wn-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="selectAll" id="selectAll" onclick="checkSelect()" /></th>
                        <th>名稱</th>
                        <th>網址</th>
                        <th>母類別</th>
                        <th>狀態</th>
                        <th>修改時間</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subCategories as $subCategory)
                        <tr>
                            <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                            <td><a
                                    href="{{ route('admin.editSubCategory', ['id' => $subCategory->uuid]) }}">{{ $subCategory->name }}</a>
                            </td>
                            <td>{{ $subCategory->alias }}</td>
                            <td>
                                @foreach ($categories as $category)
                                    @if ($category->uuid == $subCategory->category_uid)
                                        {{ $category->name }}
                                    @break
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $subCategory->status }}</td>
                        <td>{{ date('Y-m-d', strtotime($subCategory->modified_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
