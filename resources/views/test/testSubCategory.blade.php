<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("testSubCategoryHandle") }}" method="post">
        @csrf
        <label for="categoryUid">分類</label>
        <select name="categoryUid" id="categoryUid">
            @foreach ($categories as $category)
                <option value="{{ $category->uuid }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="subCategoryName">子分類名稱</label>
        <input type="text" id="subCategoryName" name="subCategoryName">
        <label for="alias">網址</label>
        <input type="text" id="alias" name="alias">
        <input type="submit" value="確認">
    </form>
</body>
</html>