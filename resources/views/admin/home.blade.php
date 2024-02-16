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
                    <tr>
                        <td>cell1_1</td>
                        <td>cell2_1</td>
                        <td>cell3_1</td>
                    </tr>
                    <tr>
                        <td>cell1_2</td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                    </tr>
                    <tr>
                        <td>cell1_3</td>
                        <td>cell2_3</td>
                        <td>cell3_3</td>
                    </tr>
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
                        <th>分類</th>
                        <th>點擊</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>cell1_1</td>
                        <td>cell2_1</td>
                        <td>cell3_1</td>
                    </tr>
                    <tr>
                        <td>cell1_2</td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                    </tr>
                    <tr>
                        <td>cell1_3</td>
                        <td>cell2_3</td>
                        <td>cell3_3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
