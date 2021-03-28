<?php
require_once '../../lib/conn.php';
require_once '../../opp/bridge.php';
$key = $_POST['key'];
unset($_POST['key']);
$sql = "SELECT * FROM `book` WHERE bookName LIKE '%${key}%'";
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    array_push($data, new Book($row['bookID'], $row['bookName'], $row['authorName'], $row['namXuatBan'],
        $row['soLuongNhap'], $row['bookType'], $row['bookNote']));
}
?>
<?php
for ($i = 0; $i < count($data); $i++):
    ?>
    <li>
        <?= $i + 1 ?><br/>
        Mã sách: <?= $data[$i]->getBookID() ?><br/>
        Tên sách: <?= $data[$i]->getDocumentName() ?><br/>
        Tác giả: <?= $data[$i]->getAuthorName() ?><br/>
        Năm xuất bản: <?= $data[$i]->getNamXuatBan() ?><br/>
        Số lượng: <?= $data[$i]->getSoLuongNhap() ?><br/>
        Loại sách: <?= $data[$i]->getBookType() ?><br/>
        Ghi chú: <?= $data[$i]->getBookNote() ?><br/>
        <div id="book-control" style="display: flex; color: blue">
            <div class="edit-book" style="cursor: pointer; margin-right: 30px" bookid = "<?= $data[$i]->getBookID()?>">Sua</div>
            <div class="delete-book" style="cursor: pointer" bookid = "<?= $data[$i]->getBookID()?>">Xoa</div>
        </div>
    </li>
<?php
endfor;
?>
<script>
    $(document).ready(function () {
        $('.delete-book').click(function (e) {
            var bookID = e.target.getAttribute('bookid');
            $('#list-book').after('<div id="detele-msg" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
            $.post('ajax/book/delete-book.php', {bookID : bookID}, function (data) {
                $('#detele-msg').html(data);
            })
        })
        $('.edit-book').click(function (e){
            var bookID = e.target.getAttribute('bookid');
            console.log(bookID)
            $('#list-book').after('<div id="edit-book-form" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
            $.post('ajax/book/edit-book.php', {bookID : bookID}, function (data) {
                $('#edit-book-form').html(data);
            })
        })
    })
</script>