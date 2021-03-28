<?php
require_once 'lib/conn.php';
require_once 'opp/bridge.php';
session_start();
if (isset($_POST['register'])) {
    if ($_POST['account'] != '') {
        $acc = $_POST['account'];
        $sql = "SELECT * FROM `user` WHERE account = '${acc}'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        if ($row > 0) {
            header('location:register.php');
        }
    } else header('location:register.php');
    if ($_POST['password'] != '' && $_POST['confirm-password'] != '' && $_POST['password'] == $_POST['confirm-password']) {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else header('location:register.php');
    if ($_POST['fullname'] != '') $fullname = $_POST['fullname'];
    else header('location:register.php');
    $sex = $_POST['sex'];
    if ($_POST['phone'] != '') $phone = $_POST['phone'];
    else header('location:register.php');
    if ($_POST['email'] != '') $email = $_POST['email'];
    else header('location:register.php');
    if ($_POST['adress'] != '') $adress = $_POST['adress'];
    else header('location:register.php');
    if ($_POST['day'] != '' && $_POST['day'] > 0 && $_POST['day'] <= 31 &&
        $_POST['month'] != '' && $_POST['month'] > 0 && $_POST['month'] <= 12 &&
        $_POST['year'] != '' && $_POST['year'] > 0) {
        $ngaySinh = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
    } else header('location:register.php');

    $sqlInsert = "INSERT INTO `user`(`account`, `password`, `user_name`, `sex`, `ngay_sinh`, `phone`, `email`, `adress`) 
VALUES ('${acc}','${pass}','${fullname}',${sex},'${ngaySinh}','${phone}','${email}','${adress}')";
    $queryInsert = mysqli_query($conn, $sqlInsert);
    $_SESSION['user'] = new User($acc, $fullname, $sex, $ngaySinh, '0', $phone, $email, $adress, null);
}

if (isset($_POST['login']) && $_POST['acc'] != '' && $_POST['pass'] != '') {
    $acc = $_POST['acc'];
    $pass = $_POST['pass'];
    unset($_POST['acc']);
    unset($_POST['pass']);
    $sql = "SELECT * FROM `user` WHERE account = '${acc}'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);
    if ($row > 0) {
        $user = mysqli_fetch_assoc($query);
        if (password_verify($pass, $user['password']))
            $_SESSION['user'] = new User($user['account'], $user['user_name'], $user['sex'], $user['ngay_sinh'],
                $user['type'], $user['phone'], $user['email'], $user['adress'], $user['cmt']);
    }
}
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<?php
if (isset($_GET['page']))
    if ($_GET['page'] == 'logout') {
        session_destroy();
        header('location:login.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý sách thư viện</title>
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous">
    </script>
    <style>
        .menu {
            float: left;
            width: 30%;
            height: 100vh;
            border-right: 2px solid black;
        }

        .content {
            float: left;
            width: 60%;
            height: 100vh;
        }

        .wrap::after {
            display: block;
            content: '';
            clear: left;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="menu">
        <div><a href="index.php?page=info">Xem thông tin cá nhân</a></div>
        <div><a href="index.php?page=book">Xem Sách trong thư viện</a></div>
        <div><a href="index.php?page=reader">Xem danh sách bạn đọc</a></div>
        <div><a href="index.php?page=worker">Xem Nhân viên thư viện</a></div>
        <div><a href="index.php?page=bookmanager">Xem thông tin mượn sách</a></div>
    </div>
    <div class="content">
        <?php
        if (isset($_GET['page']))
            if ($_GET['page'] == 'info') require_once 'pages/info.php';
            elseif ($_GET['page'] == 'book') require_once 'pages/book.php';
            elseif ($_GET['page'] == 'reader') require_once 'pages/reader.php';
            elseif ($_GET['page'] == 'worker') require_once 'pages/worker.php';
            elseif ($_GET['page'] == 'bookmanager') require_once 'pages/bookmanager.php';
        ?>
    </div>
</div>
</body>
</html>
