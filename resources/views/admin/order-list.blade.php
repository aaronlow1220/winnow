@extends('admin/layout/dashboard-layout')

@section('admin-title', '電子商務 - 全部')

@section('dashboard-title')
    電子商務 - {{ $title }}
@endsection

@section('dashboard-content')
    <div class="func">
        <div class="func-bar">
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
                        <th>訂單編號</th>
                        <th>買家</th>
                        <th>實付金額</th>
                        <th>狀態</th>
                        <th>修改時間</th>
                        <th>建立時間</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                            <td><a
                                    href="{{ route('admin.order', ['id' => $order->uuid]) }}">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</a>
                            </td>
                            <td>{{ $users->where('uuid', $order->user_uid)->first()->username }}</td>
                            <td>NT {{ $order->total }}</td>
                            <td>
                                @switch($order->status)
                                    @case('NOT_PAID')
                                        未付款
                                    @break

                                    @case('SHIP_PENDING')
                                        待出貨
                                    @break

                                    @case('SHIPPED')
                                        已出貨
                                    @break

                                    @case('CANCELED')
                                        已取消
                                    @break

                                    @case('REFUND')
                                        退貨/退款
                                    @break

                                    @default
                                        未知
                                    @break
                                @endswitch
                            </td>
                            <td>{{ date('Y-m-d', strtotime($order->modified_at)) }}</td>
                            <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
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
    </div>
@endsection
