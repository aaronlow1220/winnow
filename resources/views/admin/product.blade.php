@extends('admin/layout/dashboard-layout')

@section('admin-title', '商品管理')

@section('dashboard-title')
    商品管理
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
    <form class="func" id="form" method="post" action="{{ route('handle.productListAction') }}">
        @csrf
        <div class="func-bar">
            <a class="func-btn" href="{{ route('admin.addProduct') }}">
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
                <a id="dlt-btn" data-value="remove">下架所選</a>
            </div>
        </div>
        <div class="table-container">
            <table class="wn-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="selectAll" id="selectAll" onclick="checkSelect()" /></th>
                        <th>標題</th>
                        <th>清真</th>
                        <th>售價</th>
                        <th>狀態</th>
                        <th>修改時間</th>
                        <th>購買次數</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><input type="checkbox" name="sSelector[]" id="" class="sSelector" value="{{ $product->uuid }}" /></td>
                            <td><a href="{{ route('admin.editProduct', ['id' => $product->uuid]) }}">{{ $product->name }}</a></td>
                            <td>
                                @if ($product->is_halal == 1)
                                    是
                                @else
                                    否
                                @endif
                            </td>
                            <td>NT @if ($product->discount_price)
                                    {{ $product->discount_price }}
                                @else
                                    {{ $product->price }}
                                @endif
                            </td>
                            <td>{{ $product->status }}</td>
                            <td>{{ date('Y-m-d', strtotime($product->modified_at)) }}</td>
                            <td>{{ $product->purchase_count }}</td>
                        </tr>
                    @endforeach
            </table>
        </div>
        {{-- <div class="wn-paginator">
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
        </div> --}}
    </form>
    <script>
        document.getElementById("dlt-btn").onclick = function() {
            document.getElementById("selectedAction").value = this.dataset.value;
            document.getElementById("form").submit();
        }
    </script>
@endsection
