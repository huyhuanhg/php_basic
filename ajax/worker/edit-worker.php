<?php
require_once '../../lib/conn.php';
session_start();
if (isset($_POST['workerID'])) {
    $_SESSION['workerID'] = $_POST['workerID'];
    unset($_POST['workerID']);
}
$worker = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `user_name`, `type`  FROM user WHERE account = '${_SESSION['workerID']}'"));
if (isset($_POST['edit-worker'])){
    $type = $_POST['edit-worker-type'];
    $sql = "UPDATE `user` SET `type`='${type}' WHERE `account`='${_SESSION['workerID']}'";
    unset($_SESSION['workerID']);
    mysqli_query($conn, $sql);
    header('location:../../index.php?page=worker');
}
?>
<form method="post" action="./ajax/worker/edit-worker.php">

    sua chuc vu cua <?=$worker['user_name']?>:
    <input name="edit-worker-type" value="<?=$worker['type']?>" type="text"/>

<button name="edit-worker">sua</button>
<button id="cancel-edit-worker" name="cancel-edit-worker">huy</button>
</form>
<script>
    $(document).ready(function () {
        $('#cancel-edit-worker').click(function (e) {
            e.preventDefault();
            $('#edit-worker-form').remove();
        })
    })
</script>
