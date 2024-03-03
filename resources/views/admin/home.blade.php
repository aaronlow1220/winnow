@extends('admin/layout/dashboard-layout')

@section('dashboard-content')
    <div class="info-data">
        <div class="card">
            <div class="head">
                <div>
                    <h2>最多瀏覽</h2>
                    <p>網站裡最多人次瀏覽的網頁</p>
                </div>
            </div>
            <table class="info-card">
                <thead>
                    <tr>
                        <th>標題</th>
                        <th>分類</th>
                        <th>點擊</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>
                                {{ $cat->where('uuid', $post->category_uid)->first()->name }}
                            </td>
                            <td>{{ $post->hits }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card">
            <div class="head">
                <div>
                    <h2>最多購買</h2>
                    <p>網站裡最多人次購買的商品</p>
                </div>
            </div>
            <table class="info-card">
                <thead>
                    <tr>
                        <th>標題</th>
                        <th>點擊</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->purchase_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
