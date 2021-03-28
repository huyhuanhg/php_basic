<?php
require_once '../../lib/conn.php';
session_start();
if (isset($_POST['readerID'])) {
    $_SESSION['readerID'] = $_POST['readerID'];
    unset($_POST['readerID']);
}
if (isset($_POST['confirm-delete'])) {
//    unset($_POST['confirm-delete']);
    $sql = "DELETE FROM `reader` WHERE readerID = '" . $_SESSION['readerID']."'";
    unset($_SESSION['readerID']);
    $query = mysqli_query($conn, $sql);
    header('location:../../index.php?page=reader');
}
?>
<div style="background-color: aliceblue;width: 40%; margin: 0 auto">
    <div>
        Ban chac chan xoa?
    </div>
    <form action="./ajax/reader/delete-reader.php" method="post">
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