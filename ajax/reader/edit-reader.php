<?php
require_once '../../lib/conn.php';
session_start();
if (isset($_POST['readerID'])) {
    $_SESSION['readerID'] = $_POST['readerID'];
    unset($_POST['readerID']);
}
$reader = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM reader WHERE readerID = '${_SESSION['readerID']}'"));
if (isset($_POST['edit-reader'])){
    $fullName = $_POST['edit-reader-fulname'];
    $sex = $_POST['edit-reader-sex'];
    $birthDay = $_POST['edit-reader-ngaySinh'];
    $phone = $_POST['edit-reader-phone'];
    $email = $_POST['edit-reader-email'];
    $adress = $_POST['edit-reader-adress'];
    $cmt = $_POST['edit-reader-cmt'];
    $type = $_POST['edit-reader-type'];
    $sql = "UPDATE `reader` SET `fullName`='${fullName}',`cmt`='${cmt}',`adress`='${adress}',`sex`=${sex},`birthDay`='${birthDay}',".
        "`readerType`='${type}',`phone`='${phone}',`email`='${email}' WHERE `readerID`='${_SESSION['readerID']}'";
    unset($_SESSION['readerID']);
    mysqli_query($conn, $sql);
    header('location:../../index.php?page=reader');
}
?>
<form method="post" action="./ajax/reader/edit-reader.php">
    <input name="edit-readerID" value="<?=$reader['readerID']?>" type="text" placeholder="Mã bạn đọc"/>
    <input name="edit-reader-fulname" value="<?=$reader['fullName']?>" type="text" placeholder="Họ và tên"/>
    <input name="edit-reader-sex" type="radio" value="1" <?=$reader['sex']==1?'checked':''?>/>nam
    <input name="edit-reader-sex" type="radio" value="0" <?=$reader['sex']==0?'checked':''?>/>nu
    <input name="edit-reader-ngaySinh" value="<?=$reader['birthDay']?>" type="text" placeholder="YYYY-MM-DD"/>
    <input name="edit-reader-phone" value="<?=$reader['phone']?>" type="text" placeholder="Số điện thoại"/>
    <input name="edit-reader-email" value="<?=$reader['email']?>" type="text" placeholder="Email"/>
    <input name="edit-reader-adress" value="<?=$reader['adress']?>" type="text" placeholder="Địa chỉ"/>
    <input name="edit-reader-cmt" value="<?=$reader['cmt']?>" type="text" placeholder="CMT"/>
    <input name="edit-reader-type" value="<?=$reader['readerType']?>" type="text" placeholder="Loại"/>

<button name="edit-reader">sua</button>
<button id="cancel-edit-reader" name="cancel-edit-reader">huy</button>
</form>
<script>
    $(document).ready(function () {
        $('#cancel-edit-reader').click(function (e) {
            e.preventDefault();
            $('#edit-reader-form').remove();
        })
    })
</script>
