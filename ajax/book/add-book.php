<?php
require_once '../../lib/conn.php';
if (isset($_POST['add-book'])){
    $bookID = $_POST['bookID'];
    $bookName = $_POST['bookName'];
    $year = $_POST['year'];
    $soLuong = $_POST['soluong'];
    $type = $_POST['type'];
    $author = $_POST['author'];
    $note = $_POST['note'];
    $sql = "INSERT INTO `book`(`bookID`, `bookName`, `authorName`, `namXuatBan`, `soLuongNhap`, `bookType`, `bookNote`)".
        "VALUES ('${bookID}','${bookName}','${author}','${year}','${soLuong}','${type}','${note}')";
    mysqli_query($conn, $sql);
    header('location:../../index.php?page=book');
}
?>
<form method="post" action="./ajax/book/add-book.php">
    <input name="bookID" type="text" placeholder="Mã sách"/>
    <input name="bookName" type="text" placeholder="Tên sách"/>
    <input name="author" type="text" placeholder="Tác giả"/>
    <input name="year" type="text" placeholder="Năm xuất bản"/>
    <input name="soluong" type="text" placeholder="Số lượng"/>
    <input name="type" type="text" placeholder="Loại sách"/>
    <input name="note" type="text" placeholder="Ghi chú"/>
    <button name="add-book">them</button>
    <button id="cancel-add-book" name="cancel-add-book">huy</button>
</form>
<script>
    $(document).ready(function () {
        $('#cancel-add-book').click(function (e) {
            e.preventDefault();
            $('#add-book-form').remove();
        })
    })
</script>
