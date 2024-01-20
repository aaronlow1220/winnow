<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("testCategoryHandle") }}" method="post">
        @csrf
        <label for="categoryName">分類名稱</label>
        <input type="text" id="categoryName" name="categoryName">
        <label for="alias">網址</label>
        <input type="text" id="alias" name="alias">
        <input type="submit" value="確認">
    </form>
</body>
</html>