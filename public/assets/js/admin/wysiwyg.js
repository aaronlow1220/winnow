let editor = document.querySelector("#editor");

ClassicEditor.create(editor, {
    ckfinder: {
        uploadUrl: "{{ route('ck.upload',['_token'=>csrk_token()]) }}",
    },
}).catch((error) => {
    console.error(error);
});
