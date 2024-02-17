@extends('admin/layout/dashboard-layout')

@section('dashboard-title')
    修改商品
@endsection

@section('dashboard-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets/vendor/ckeditor5/ckeditor.js') }}"></script>
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
    <form class="func" action="{{ route('handle.editPost') }}" method="POST">
        @csrf
        <input type="hidden" name="editor_uuid" value="{{ $post->uuid }}">
        <div class="func-bar">
            <button class="func-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path
                        d="M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z"
                        fill="currentcolor" />
                </svg>
                <span>儲存</span>
            </button>
            <a class="func-btn" href="{{ route('admin.article') }}">
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
                    <label for="editor-title">標題</label>
                    <input type="text" name="editor_title" id="editor-title" class="editor-input"
                        value="{{ $post->title }}">
                </div>
                <div class="editor-in">
                    <label for="editor-alias">網址</label>
                    <input type="text" name="editor_alias" id="editor-alias" class="editor-input"
                        value="{{ $post->alias }}">
                </div>
                <div class="editor-in">
                    <label for="editor-category">類別</label>
                    <select name="editor_category" id="editor-category" class="editor-input">
                        <option value="">--請選擇--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->uuid }}"
                                @if ($post->category_uid == $category->uuid) selected=selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="editor-in">
                    <label for="editor-sub-category">子類別</label>
                    <select name="editor_sub_category" id="editor-sub-category" class="editor-input">
                        @foreach ($sub_categories as $sub_category)
                            @if ($sub_category->category_uid == $post->category_uid)
                                <option value="{{ $sub_category->uuid }}"
                                    @if ($post->sub_category_uid == $sub_category->uuid) selected=selected @endif>{{ $sub_category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="editor-in">
                    <label for="editor-status">狀態</label>
                    <select name="editor_status" id="editor-status" class="editor-input">
                        <option value="PUBLIC" @if ($post->status == 'PUBLIC') selected=selected @endif>公開</option>
                        <option value="UNLISTED" @if ($post->status == 'UNLISTED') selected=selected @endif>不公開</option>
                        <option value="PRIVATE" @if ($post->status == 'PRIVATE') selected=selected @endif>私人</option>
                    </select>
                </div>
            </div>
            <div class="editor-left">
                <textarea id="editor" name="editor_content">{{ $post->content }}</textarea>
            </div>
        </div>
    </form>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script>
        let editor = document.querySelector("#editor");

        ClassicEditor.create(editor, {
            ckfinder: {
                uploadUrl: "{{ route('ck.upload', ['_token' => csrf_token()]) }}",
            },
        }).catch((error) => {
            console.error(error);
        });

        var categorySelect = document.querySelector("#editor-category");

        $(document).ready(function() {
            $(categorySelect).on("change", function() {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    url: "{{ route('handle.getSubCategory') }}",
                    type: "POST",
                    data: {
                        selectCat: this.value
                    },
                    dataType: "JSON",
                    success: function(response) {
                        var subCatList = 0;
                        subCategory = response.subCategory;
                        var subCatList = $("#editor-sub-category");
                        subCatList.empty();

                        subCategory.forEach(function(subCat) {
                            subCatList.append("<option value='" + subCat.uuid + "'>" +
                                subCat.name + "</option>");
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
