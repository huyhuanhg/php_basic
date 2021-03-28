<?php
require_once '../../lib/conn.php';
if (isset($_POST['add-reader'])){
    $readerID = $_POST['readerID'];
    $fullName = $_POST['reader-fulname'];
    $sex = $_POST['reader-sex'];
    $birthDay = $_POST['reader-ngaySinh'];
    $phone = $_POST['reader-phone'];
    $email = $_POST['reader-email'];
    $adress = $_POST['reader-adress'];
    $cmt = $_POST['reader-cmt'];
    $type = $_POST['reader-type'];

    $sql = "INSERT INTO `reader`(`readerID`, `fullName`, `cmt`, `adress`, `sex`, `birthDay`, `readerType`, `phone`, `email`)".
        " VALUES ('${readerID}','${fullName}','${cmt}','${adress}',${sex},'${birthDay}','${type}','${phone}','${email}')";
    mysqli_query($conn, $sql);
    header('location:../../index.php?page=reader');
}
?>
<form method="post" action="./ajax/reader/add-reader.php">
    <input name="readerID" type="text" placeholder="Mã bạn đọc"/>
    <input name="reader-fulname" type="text" placeholder="Họ và tên"/>
    <input name="reader-sex" type="radio" value="1" checked/>nam
    <input name="reader-sex" type="radio" value="0"/>nu
    <input name="reader-ngaySinh" type="text" placeholder="YYYY-MM-DD"/>
    <input name="reader-phone" type="text" placeholder="Số điện thoại"/>
    <input name="reader-email" type="text" placeholder="Email"/>
    <input name="reader-adress" type="text" placeholder="Địa chỉ"/>
    <input name="reader-cmt" type="text" placeholder="CMT"/>
    <input name="reader-type" type="text" placeholder="Loại"/>

    <button name="add-reader">them</button>
    <button id="cancel-add-reader" name="cancel-add-reader">huy</button>
</form>
<script>
    $(document).ready(function () {
        $('#cancel-add-reader').click(function (e) {
            e.preventDefault();
            $('#add-reader-form').remove();
        })
    })
</script>
