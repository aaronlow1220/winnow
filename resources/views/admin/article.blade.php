@extends('admin/layout/dashboard-layout')

@section("dashboard-title")
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
                        <th>建立時間</th>
                        <th>點擊次數</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>雲南米干/米線/粑粑絲</td>
                        <td>迷香忠貞</td>
                        <td>雲南</td>
                        <td>某某某</td>
                        <td>公開</td>
                        <td>2022/12/23</td>
                        <td>1000000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                        <td>cell4_2</td>
                        <td>cell5_2</td>
                        <td>cell6_2</td>
                        <td>cell7_2</td>
                        <td>cell8_2</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                        <td>cell4_2</td>
                        <td>cell5_2</td>
                        <td>cell6_2</td>
                        <td>cell7_2</td>
                        <td>cell8_2</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                        <td>cell4_2</td>
                        <td>cell5_2</td>
                        <td>cell6_2</td>
                        <td>cell7_2</td>
                        <td>cell8_2</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                        <td>cell4_2</td>
                        <td>cell5_2</td>
                        <td>cell6_2</td>
                        <td>cell7_2</td>
                        <td>cell8_2</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                        <td>cell4_2</td>
                        <td>cell5_2</td>
                        <td>cell6_2</td>
                        <td>cell7_2</td>
                        <td>cell8_2</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                        <td>cell4_2</td>
                        <td>cell5_2</td>
                        <td>cell6_2</td>
                        <td>cell7_2</td>
                        <td>cell8_2</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                        <td>cell4_2</td>
                        <td>cell5_2</td>
                        <td>cell6_2</td>
                        <td>cell7_2</td>
                        <td>cell8_2</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                        <td>cell4_2</td>
                        <td>cell5_2</td>
                        <td>cell6_2</td>
                        <td>cell7_2</td>
                        <td>cell8_2</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="sSelector" id="" class="sSelector" /></td>
                        <td>cell2_2</td>
                        <td>cell3_2</td>
                        <td>cell4_2</td>
                        <td>cell5_2</td>
                        <td>cell6_2</td>
                        <td>cell7_2</td>
                        <td>cell8_2</td>
                    </tr>
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
