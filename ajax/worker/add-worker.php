<?php
require_once '../../lib/conn.php';
if (isset($_POST['add-worker'])){
    $workerID = $_POST['workerID'];
    $fullName = $_POST['worker-fulname'];
    $sex = $_POST['worker-sex'];
    $birthDay = $_POST['worker-ngaySinh'];
    $phone = $_POST['worker-phone'];
    $email = $_POST['worker-email'];
    $type = $_POST['worker-type'];

    $sql = "INSERT INTO `user`(`account`, `password`, `user_name`, `sex`, `ngay_sinh`, `cmt`, `phone`, `email`, `adress`, `type`)".
        " VALUES ('${workerID}','1','${fullName}',${sex},'${birthDay}',null,'${phone}','${email}',null,'${type}')";
    mysqli_query($conn, $sql);
    header('location:../../index.php?page=worker');
}
?>
<form method="post" action="./ajax/worker/add-worker.php">
    <input name="workerID" type="text" placeholder="Tai khoan"/>
    <input name="worker-fulname" type="text" placeholder="Họ và tên"/>
    <input name="worker-sex" type="radio" value="1" checked/>nam
    <input name="worker-sex" type="radio" value="0"/>nu
    <input name="worker-ngaySinh" type="text" placeholder="YYYY-MM-DD"/>
    <input name="worker-phone" type="text" placeholder="Số điện thoại"/>
    <input name="worker-email" type="text" placeholder="Email"/>
    <input name="worker-type" type="text" placeholder="Loại"/>

    <button name="add-worker">them</button>
    <button id="cancel-add-worker" name="cancel-add-worker">huy</button>
</form>
<script>
    $(document).ready(function () {
        $('#cancel-add-worker').click(function (e) {
            e.preventDefault();
            $('#add-worker-form').remove();
        })
    })
</script>
