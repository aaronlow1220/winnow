@extends('admin/layout/dashboard-layout')

@section('dashboard-title')
    修改商品
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
            <p>修改成功</p>
        </div>
    @elseif(session()->has('failed'))
        <div class="msg-box failed">
            <p>修改失敗，{{ session()->get('failed') }}</p>
        </div>
    @endif
    <form class="func" action="{{ route('handle.editProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="func-bar">
            <button class="func-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z" fill="currentcolor" />
                </svg>
                <span>儲存</span>
            </button>
            <a class="func-btn" href="{{ route('admin.product') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" fill="currentcolor" />
                </svg>
                <span>取消</span>
            </a>
        </div>
        <div class="editor-container">
            <input type="hidden" name="uuid" value="{{ $product->uuid }}">
            <div class="editor-right">
                <div class="editor-in">
                    <label for="editor-name">封面</label>
                    <input class="editor-input" type="file" name="product_cover" id="editor-product-cover">
                    <img src="{{ asset('media/product/' . $product->uuid . '/' . $product->uuid . '_cover.jpg') }}" alt="" id="product_cover_preview">
                </div>
            <div class="editor-in">
                <label for="editor-name">名稱</label>
                <input type="text" name="product_name" id="editor-name" class="editor-input" value="{{ $product->name }}">
            </div>
            <div class="editor-in">
                <label for="editor-description">商品簡介</label>
                <textarea type="text" name="product_description" id="editor-description" class="editor-input" rows="8">{{ $product->description }}</textarea>
            </div>
            <div class="editor-in">
                <label for="editor-price">價格（NT$）</label>
                <input type="text" name="product_price" id="editor-price" class="editor-input" value="{{ $product->price }}">
            </div>
            <div class="editor-in">
                <label for="editor-promo-price">優惠價（NT$）</label>
                <input type="text" name="product_pprice" id="editor-promo-price" class="editor-input" value="{{ $product->discount_price }}">
            </div>
        </div>
        <div class="editor-right">
            <div class="editor-in">
                <label for="editor-vendor">供應商</label>
                <input type="text" name="product_vendor" id="editor-vendor" class="editor-input" value="{{ $product->vendor }}">
            </div>
            <div class="editor-in">
                <fieldset>
                    <legend>允許配送方式</legend>
                    <div>
                        <input type="checkbox" name="delivery_method[]" id="delivery-1" value="freezing" @if (in_array('freezing', $adm)) @checked(true) @endif>
                        <label for="delivery-1">冷凍</label>
                    </div>
                    <div>
                        <input type="checkbox" name="delivery_method[]" id="delivery-2" value="refrigeration" @if (in_array('refrigeration', $adm)) @checked(true) @endif>
                        <label for="delivery-2">冷藏</label>
                    </div>
                    <div>
                        <input type="checkbox" name="delivery_method[]" id="delivery-3" value="normal" @if (in_array('normal', $adm)) @checked(true) @endif>
                        <label for="delivery-3">常溫</label>
                    </div>
                </fieldset>
            </div>
            <div class="editor-in">
                <label for="editor-halal">是否清真</label>
                <select name="is_halal" id="editor-halal" class="editor-input">
                    <option value="1" @if ($product->is_halal) @selected(true) @endif>是</option>
                    <option value="0" @if (!$product->is_halal) @selected(true) @endif>否</option>
                </select>
            </div>
            <div class="editor-in">
                <label for="editor-status">狀態</label>
                <select name="status" id="editor-status" class="editor-input">
                    <option value="PUBLIC" @if ($product->status == 'PUBLIC') @selected(true) @endif>公開</option>
                    <option value="UNLISTED" @if ($product->status == 'UNLISTED') @selected(true) @endif>不公開</option>
                    <option value="PRIVATE" @if ($product->status == 'PRIVATE') @selected(true) @endif>私人</option>
                </select>
            </div>
        </div>
        </div>
    </form>

    <script>
        let preview = document.querySelector("#product_cover_preview");
        let fileUp = document.querySelector("#editor-product-cover");

        fileUp.onchange = evt => {
            const [file] = fileUp.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
