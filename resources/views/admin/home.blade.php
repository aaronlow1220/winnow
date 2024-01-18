@extends('admin/layout/dashboard-layout')

@section("pageTitle", "首頁")

@section('dashboard-content')
    <div class="dashboard-row">
        <div class="dashboard-info-card">
            <div class="dashboard-ic-title">
                <div class="dashboard-ic-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M80-480v-80h120v80H80Zm136 222-56-58 84-84 58 56-86 86Zm28-382-84-84 56-58 86 86-58 56Zm476 480L530-350l-50 150-120-400 400 120-148 52 188 188-80 80ZM400-720v-120h80v120h-80Zm236 80-58-56 86-86 56 56-84 86Z"
                            fill="currentcolor" />
                    </svg>
                </div>
                <div class="dashboard-ic-main-text">
                    <p>最多瀏覽</p>
                </div>
            </div>
            <div class="dashboard-ic-subtitle">
                <p>網站裡最多人次瀏覽的網頁</p>
            </div>
            <div class="dashboard-ic-content">
                <div class="dashboard-ic-info-table">
                    <table class="dashboard-ic-info-table-content">
                        <thead>
                            <tr>
                                <th>標題</th>
                                <th>分類</th>
                                <th>點擊</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>標題 1</td>
                                <td>分類分類</td>
                                <td>10000</td>
                            </tr>
                            <tr>
                                <td>標題 2</td>
                                <td>分類分類</td>
                                <td>10000</td>
                            </tr>
                            <tr>
                                <td>標題 3</td>
                                <td>分類分類</td>
                                <td>10000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="dashboard-info-card">
            <div class="dashboard-ic-title">
                <div class="dashboard-ic-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M240-80q-33 0-56.5-23.5T160-160v-480q0-33 23.5-56.5T240-720h80q0-66 47-113t113-47q66 0 113 47t47 113h80q33 0 56.5 23.5T800-640v480q0 33-23.5 56.5T720-80H240Zm0-80h480v-480h-80v80q0 17-11.5 28.5T600-520q-17 0-28.5-11.5T560-560v-80H400v80q0 17-11.5 28.5T360-520q-17 0-28.5-11.5T320-560v-80h-80v480Zm160-560h160q0-33-23.5-56.5T480-800q-33 0-56.5 23.5T400-720ZM240-160v-480 480Z"
                            fill="currentcolor" />
                    </svg>
                </div>
                <div class="dashboard-ic-main-text">
                    <p>最多購買</p>
                </div>
            </div>
            <div class="dashboard-ic-subtitle">
                <p>網站裡最多人次購買的商品</p>
            </div>
            <div class="dashboard-ic-content">
                <div class="dashboard-ic-info-table">
                    <table class="dashboard-ic-info-table-content">
                        <thead>
                            <tr>
                                <th>標題</th>
                                <th>分類</th>
                                <th>點擊</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>標題 1</td>
                                <td>分類分類</td>
                                <td>10000</td>
                            </tr>
                            <tr>
                                <td>標題 2</td>
                                <td>分類分類</td>
                                <td>10000</td>
                            </tr>
                            <tr>
                                <td>標題 3</td>
                                <td>分類分類</td>
                                <td>10000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-row">
        <div class="dashboard-info-card">
            <div class="dashboard-ic-title">
                <div class="dashboard-ic-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M320-280q17 0 28.5-11.5T360-320q0-17-11.5-28.5T320-360q-17 0-28.5 11.5T280-320q0 17 11.5 28.5T320-280Zm0-160q17 0 28.5-11.5T360-480q0-17-11.5-28.5T320-520q-17 0-28.5 11.5T280-480q0 17 11.5 28.5T320-440Zm0-160q17 0 28.5-11.5T360-640q0-17-11.5-28.5T320-680q-17 0-28.5 11.5T280-640q0 17 11.5 28.5T320-600Zm120 320h240v-80H440v80Zm0-160h240v-80H440v80Zm0-160h240v-80H440v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"
                            fill="currentcolor" />
                    </svg>
                </div>
                <div class="dashboard-ic-main-text">
                    <p>待辦事項清單</p>
                </div>
            </div>
            <div class="dashboard-ic-subtitle">
                <p>您的待處理事項</p>
            </div>
            <div class="dashboard-ic-content ic-todo">
                <div class="dashboard-ic-todo">
                    <h1 class="dashboard-ic-todo-count">100</h1>
                    <p class="dashboard-ic-todo-project">待確認訂單</p>
                </div>
                <div class="dashboard-ic-todo">
                    <h1 class="dashboard-ic-todo-count">100</h1>
                    <p class="dashboard-ic-todo-project">待付款訂單</p>
                </div>
                <div class="dashboard-ic-todo">
                    <h1 class="dashboard-ic-todo-count">100</h1>
                    <p class="dashboard-ic-todo-project">待出貨訂單</p>
                </div>
            </div>
        </div>
    </div>
@endsection
