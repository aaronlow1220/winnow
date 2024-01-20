<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <div class="dashboard-post">
            <div class="dashboard-post-editor" id="editor"></div>
            <div class="dashboard-post-settings">
                <label for="title">標題</label>
                <input class="dashboard-post-setting" id="title" type="text" />
                <label for="alias">網址</label>
                <input class="dashboard-post-setting" id="alias" type="text" />
                <label for="category">分類</label>
                <select class="dashboard-post-setting" name="" id="category">
                    <option value="public">公開</option>
                    <option value="unlisted">不公開</option>
                    <option value="private">私人</option>
                </select>
                <label for="sub_category">分類</label>
                <select class="dashboard-post-setting" name="" id="sub_category">
                    <option value="public">公開</option>
                    <option value="unlisted">不公開</option>
                    <option value="private">私人</option>
                </select>
                <label for="status">狀態</label>
                <select class="dashboard-post-setting" name="" id="status">
                    <option value="public">公開</option>
                    <option value="unlisted">不公開</option>
                    <option value="private">私人</option>
                </select>
            </div>
        </div>
        <div>
            <input type="submit" value="儲存">
        </div>
    </form>
    <script src="{{ asset("assets/js/admin/framework/ckeditor.js") }}"></script>
    <script src="{{ asset("assets/js/admin/wysiwyg.js") }}"></script>
</body>
</html>