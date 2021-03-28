<?php
require_once '../../lib/conn.php';
session_start();if (isset($_POST['bookID'])) {
    $_SESSION['bookID'] = $_POST['bookID'];
    unset($_POST['bookID']);
}
$book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM book WHERE bookID = '${_SESSION['bookID']}'"));
if (isset($_POST['edit-book'])){
    $bookName = $_POST['edit-bookName'];
    $year = $_POST['edit-year'];
    $soLuong = $_POST['edit-soluong'];
    $type = $_POST['edit-type'];
    $author = $_POST['edit-author'];
    $note = $_POST['edit-note'];
    $sql = "UPDATE `book` ".
"SET `bookName`='${bookName}',`authorName`='${author}',`namXuatBan`='${year}',".
"`soLuongNhap`='${soLuong}',`bookType`='${type}',`bookNote`='${note}' WHERE bookID = '${_SESSION['bookID']}'";
    unset($_SESSION['bookID']);
    mysqli_query($conn, $sql);
    header('location:../../index.php?page=book');
}
?>
<form method="post" action="./ajax/book/edit-book.php">
<input name="edit-bookName" type="text" value="<?=$book['bookName']?>" placeholder="Tên sách"/>
<input name="edit-author" type="text" value="<?=$book['authorName']?>" placeholder="Tác giả"/>
<input name="edit-year" type="text" value="<?=$book['namXuatBan']?>" placeholder="Năm xuất bản"/>
<input name="edit-soluong" type="text" value="<?=$book['soLuongNhap']?>" placeholder="Số lượng"/>
<input name="edit-type" type="text" value="<?=$book['bookType']?>" placeholder="Loại sách"/>
<input name="edit-note" type="text" value="<?=$book['bookNote']?>" placeholder="Ghi chú"/>
<button name="edit-book">sua</button>
<button id="cancel-edit-book" name="cancel-edit-book">huy</button>
</form>
<script>
    $(document).ready(function () {
        $('#cancel-edit-book').click(function (e) {
            e.preventDefault();
            $('#edit-book-form').remove();
        })
    })
</script>
