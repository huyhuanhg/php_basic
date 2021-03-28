<?php
require_once '../../lib/conn.php';
session_start();
if (isset($_POST['bookID'])) {
    $_SESSION['bookID'] = $_POST['bookID'];
    unset($_POST['bookID']);
}
if (isset($_POST['confirm-delete'])) {
//    unset($_POST['confirm-delete']);
    $sql = "DELETE FROM `book` WHERE bookID = '" . $_SESSION['bookID']."'";
    unset($_SESSION['bookID']);
    $query = mysqli_query($conn, $sql);
    header('location:../../index.php?page=book');
}
?>
<div style="background-color: aliceblue;width: 40%; margin: 0 auto">
    <div>
        Ban chac chan xoa?
    </div>
    <form action="./ajax/book/delete-book.php" method="post">
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