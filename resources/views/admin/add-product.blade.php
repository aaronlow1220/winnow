@extends('admin/layout/dashboard-layout')

@section('dashboard-title')
    新增商品
@endsection

@section('dashboard-content')
    <form class="func" action="{{ route('handle.addProduct') }}" method="POST">
        @csrf
        <div class="func-bar">
            <button class="func-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z"
                        fill="currentcolor" />
                </svg>
                <span>儲存</span>
            </button>
            <a class="func-btn" href="{{ route('admin.product') }}">
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
                    <label for="editor-name">封面</label>
                    <input type="file" name="product_cover" id="editor-name" class="editor-input" value="">

                </div>
                <div class="editor-in">
                    <label for="editor-name">其他照片</label>
                    <input type="file" name="product_images[]" id="editor-name" class="editor-input" value=""
                        multiple="multiple">
                        <img class="img-preview" src="{{ asset('assets/img/admin/test_img.jpg') }}" alt="">


                </div>
                <div class="editor-in">
                    <label for="editor-name">名稱</label>
                    <input type="text" name="product_name" id="editor-name" class="editor-input" value="">
                </div>
                <div class="editor-in">
                    <label for="editor-name">商品簡介</label>
                    <textarea type="text" name="product_description" id="editor-name" class="editor-input" value="" rows="8"></textarea>
                </div>
                <div class="editor-in">
                    <label for="editor-alias">價格（NT$）</label>
                    <input type="text" name="product_price" id="editor-alias" class="editor-input" value="">
                </div>
                <div class="editor-in">
                    <label for="editor-alias">優惠價（NT$）</label>
                    <input type="text" name="product_promotion" id="editor-alias" class="editor-input" value="">
                </div>
            </div>
            <div class="editor-right">
                <div class="editor-in">
                    <fieldset>
                        <legend>允許配送方式</legend>
                        <div>
                            <input type="checkbox" name="delivery-1" id="delivery-1">
                            <label for="delivery-1">冷藏</label>
                        </div>
                        <div>
                            <input type="checkbox" name="delivery-2" id="delivery-2">
                            <label for="delivery-2">常溫</label>
                        </div>
                    </fieldset>
                </div>
                <div class="editor-in">
                    <label for="editor-halal">是否清真</label>
                    <select name="is_halal" id="editor-halal" class="editor-input">
                        <option value="1">是</option>
                        <option value="0" selected>否</option>
                    </select>
                </div>
                <div class="editor-in">
                    <label for="editor-status">狀態</label>
                    <select name="status" id="editor-status" class="editor-input">
                        <option value="ACTIVE">公開</option>
                        <option value="UNLISTED">不公開</option>
                        <option value="PRIVATE">私人</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
@endsection
