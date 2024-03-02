@extends('admin/layout/dashboard-layout')

@section("admin-title", "新增文章")

@section('dashboard-title')
    新增文章
@endsection

@section('dashboard-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="msg-box failed">
                <p>{{ $error }}</p>
            </div>
        @endforeach
    @endif
    @if (session()->has('success'))
        <div class="msg-box success">
            <p>新增成功</p>
        </div>
    @elseif(session()->has('failed'))
        <div class="msg-box failed">
            <p>新增失敗，{{ session()->get('failed') }}</p>
        </div>
    @endif
    <form class="func" action="{{ route('handle.storePost') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="editor-cover-pic">封面圖</label>
                    <input type="file" name="cover_pic" id="editor-cover-pic">
                    <img src="" alt="" id="cover_pic_preview">
                </div>
                <div class="editor-in">
                    <label for="editor-title">標題</label>
                    <input type="text" name="editor_title" id="editor-title" class="editor-input">
                </div>
                <div class="editor-in">
                    <label for="editor-alias">網址</label>
                    <input type="text" name="editor_alias" id="editor-alias" class="editor-input">
                </div>
                <div class="editor-in">
                    <label for="editor-category">類別</label>
                    <select name="editor_category" id="editor-category" class="editor-input">
                        <option value="">--請選擇--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="editor-in">
                    <label for="editor-sub-category">子類別</label>
                    <select name="editor_sub_category" id="editor-sub-category" class="editor-input">
                        <option value="">--請選擇--</option>
                    </select>
                </div>
                <div class="editor-in">
                    <label for="editor-status">狀態</label>
                    <select name="editor_status" id="editor-status" class="editor-input">
                        <option value="PUBLIC">公開</option>
                        <option value="UNLISTED">不公開</option>
                        <option value="PRIVATE">私人</option>
                    </select>
                </div>
            </div>
            <div class="editor-left">
                <textarea id="editor" name="editor_content"></textarea>
            </div>
        </div>
    </form>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/admin/wysiwyg.js') }}"></script> --}}
    <script>
        let preview = document.querySelector("#cover_pic_preview");
        let fileUp = document.querySelector("#editor-cover-pic");

        fileUp.onchange = evt => {
            const [file] = fileUp.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
        // let editor = document.querySelector("#editor");


        // ClassicEditor.create(editor, {
        //     ckfinder: {
        //         uploadUrl: "{{ route('ck.upload', ['_token' => csrf_token()]) }}",
        //     },
        //     mediaEmbed: {
        //         previewsInData: true,
        //     },
        // }).catch((error) => {
        //     console.error(error);
        // });
        let editor = document.querySelector("#editor");

        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    }));
            }

            // Aborts the upload process.
            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }

            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open('POST', "{{ route('ck.upload', ['_token' => csrf_token()]) }}", true);
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener('error', () => reject(genericErrorText));
                xhr.addEventListener('abort', () => reject());
                xhr.addEventListener('load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }

                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve({
                        default: response.url
                    });
                });

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', evt => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }

            // Prepares the data and sends the request.
            _sendRequest(file) {
                // Prepare the form data.
                const data = new FormData();

                data.append('upload', file);

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.

                // Send the request.
                this.xhr.send(data);
            }
        }

        function winnowUploadAdapter(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter(loader);
            };
        }

        ClassicEditor.create(editor, {
            extraPlugins: [winnowUploadAdapter],
            mediaEmbed: {
                previewsInData: true,
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
