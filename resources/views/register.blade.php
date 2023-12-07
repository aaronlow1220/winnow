<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>註冊</title>
</head>

<style>
    .form{
        width: 15%;
        display: flex;
        flex-direction: column;
    }
</style>

<body>
    <h1>註冊</h1>
    <form action="/auth/register-user" method="post" class="form">
        @csrf
        <input type="text" name="registerUsername" id="" placeholder="帳號名稱">
        <input type="text" name="registerRealName" id="" placeholder="真實姓名">
        <input type="email" name="registerEmail" id="" placeholder="電子郵箱">
        <input type="password" name="registerPassword" id="" placeholder="密碼">
        <input type="password" name="registerConfirmPassword" id="" placeholder="確認密碼">
        <input type="submit" value="註冊">
    </form>
</body>
</html>
