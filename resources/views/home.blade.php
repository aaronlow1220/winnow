<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>歡迎 | 忠貞社區發展協會</title>
</head>
<body>
<h1>首頁</h1>
<h2>{{ $test }}</h2>
@if ($isAdmin)
<h3>isAdmin = {{ $isAdmin }}</h3>
@endif

<a href="{{ route("testUpload") }}">Test Upload</a>
<a href="{{ route("testCategory") }}">Test Category</a>
</body>
</html>
