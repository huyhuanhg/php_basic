<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form method="post" action="index.php">
        <input type="text" name="account" placeholder="Tài khoản">
        <input type="password" name="password" placeholder="Mật khẩu">
        <input type="password" name="confirm-password" placeholder="Nhập lại mật khẩu">
        <input type="text" name="fullname" placeholder="Họ tên">
        <input type="radio" name="sex" value="0" checked>Nam
        <input type="radio" name="sex" value="1">Nữ
        <input type="number" name="day" placeholder="Ngày">
        <input type="number" name="month" placeholder="Tháng">
        <input type="number" name="year" placeholder="Nắm">
        <input type="text" name="phone" placeholder="Số điện thoại">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="adress" placeholder="Địa chỉ">
        <button name="register">Đăng ký</button>
        <a href="login.php">Đăng nhập</a>
    </form>
</body>
</html>