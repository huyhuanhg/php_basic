<?php
require_once '../../lib/conn.php';
session_start();
if (isset($_POST['workerID'])) {
    $_SESSION['workerID'] = $_POST['workerID'];
    unset($_POST['workerID']);
}
if (isset($_POST['confirm-delete'])) {
    $sql = "DELETE FROM `user` WHERE account = '" . $_SESSION['workerID']."'";
    unset($_SESSION['workerID']);
    $query = mysqli_query($conn, $sql);
    header('location:../../index.php?page=worker');
}
?>
<div style="background-color: aliceblue;width: 40%; margin: 0 auto">
    <div>
        Ban chac chan xoa?
    </div>
    <form action="./ajax/worker/delete-worker.php" method="post">
        <button name="confirm-delete">xoa</button>
    </form>
    <div id="huy-delete" style="cursor: pointer">huy</div>
</div>
</div>
<script>
    $(document).ready(function () {

        $('#huy-delete').click(function () {
            $('#detele-msg').remove();
        })
    })
</script>