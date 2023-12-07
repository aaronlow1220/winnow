<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入</title>
</head>

<style>
    .form{
        width: 15%;
        display: flex;
        flex-direction: column;
    }
</style>

<body>
    <h1>登入</h1>
    <form action="/auth/login-user" method="post" class="form">
        @csrf
        <input type="email" name="loginEmail" id="" placeholder="電子郵箱">
        <input type="password" name="loginPassword" id="" placeholder="密碼">
        <input type="submit" value="登入">
    </form>
</body>
</html>
