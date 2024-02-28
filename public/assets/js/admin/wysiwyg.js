let editor = document.querySelector("#editor");

class MyUploadAdapter {
    constructor(loader) {
        this.loader = loader;
        this.url = "{{ route('ck.upload', ['_token' => csrf_token()]) }}";
    }

    upload() {
        return new Promise((resolve, reject) => {
            this._initRequest();
            this._initListeners(resolve, reject);
            this._sendRequest();
        });
    }

    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }

    _initRequest() {
        const xhr = (this.xhr = new XMLHttpRequest());

        xhr.open("POST", this.url, true);
        xhr.responseType = "json";
    }

    _initListeners(resolve, reject) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText =
            "Couldn't upload file:" + ` ${loader.file.name}.`;

        xhr.addEventListener("error", () => reject(genericErrorText));
        xhr.addEventListener("abort", () => reject());
        xhr.addEventListener("load", () => {
            const response = xhr.response;
            if (!response || response.error) {
                return reject(
                    response && response.error
                        ? response.error.message
                        : genericErrorText
                );
            }
            resolve({
                default: response.url,
            });
        });

        if (xhr.upload) {
            xhr.upload.addEventListener("progress", (evt) => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            });
        }
    }

    // Prepares the data and sends the request.
    _sendRequest() {
        const data = new FormData();

        data.append("upload", this.loader.file);
        this.xhr.send(data);
    }
}

function winnowUploadAdapter(editor) {
    editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
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
