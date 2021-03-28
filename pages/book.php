
<?php
$sql = "SELECT * FROM `book`";
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)){
    array_push($data, new Book($row['bookID'],$row['bookName'],$row['authorName'],$row['namXuatBan'],
        $row['soLuongNhap'],$row['bookType'],$row['bookNote']));
}
$sqlL = "SELECT bookType FROM `book` GROUP BY bookType";
$queryL = mysqli_query($conn, $sqlL);
$dataL = [];
while ($row = mysqli_fetch_assoc($queryL)){
    array_push($dataL, $row);
}
?>

<!--su dung ajax-->
<div id="add-book" style="float: right; cursor: pointer; border: blue 1px solid; padding: 10px">Them sach</div>
<form>
    <input type="text" placeholder="Tim kiem sach" name="search-book" id="search-book">
    <button id="sbm-search" name="sbm-search">tim kiem</button>
</form>
<ul id="list-book-type" style="display: flex" data="1">
    <li style="margin: 10px 20px; cursor: pointer" data="all">tat ca
    </li>
    <?php
    foreach ($dataL as $value):
        ?>
        <li style="margin: 10px 20px; cursor: pointer" data="<?=$value['bookType']?>">
            <?=$value['bookType']?>
        </li>
    <?php
    endforeach;
    ?>
</ul>
<form>
    <select id="sort">
        <option value="bookName">sap xep theo ten</option>
        <option value="namXuatBan">sap xep theo nam xuat ban</option>
        <option value="soLuongNhap">sap xep theo so luong nhap</option>
    </select>
</form>
<!---->
<ul id="list-book" order="" type="all" key="">

    <?php
    for ($i=0 ; $i< count($data); $i++):
        ?>
        <li>
            <?=$i+1?><br/>
            Mã sách: <?= $data[$i]->getBookID()?><br/>
            Tên sách: <?= $data[$i]->getDocumentName()?><br/>
            Tác giả: <?= $data[$i]->getAuthorName()?><br/>
            Năm xuất bản: <?= $data[$i]->getNamXuatBan()?><br/>
            Số lượng: <?= $data[$i]->getSoLuongNhap()?><br/>
            Loại sách: <?= $data[$i]->getBookType()?><br/>
            Ghi chú: <?= $data[$i]->getBookNote()?><br/>
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
                $('#list-book').after('<div id="edit-book-form" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
                $.post('ajax/book/edit-book.php', {bookID : bookID}, function (data) {
                    $('#edit-book-form').html(data);
                })
            })
        })
    </script>
</ul>

<script>
    $(document).ready(function () {

        $('#sbm-search').click(function (e) {
            e.preventDefault();
            var keySearch = $('#search-book').val();
            $('#list-book').attr('key', keySearch);
            $.post('ajax/book/search-book.php', {key : keySearch}, function (data) {
                $('#list-book').html(data);
            })
        })

        $('#sort').change(function (e) {
            var key = $('#list-book').attr('key');
            var type = $('#list-book').attr('type');
            var order = $('#sort').val();
            $('#list-book').attr('order', order);
            $.post('ajax/book/book-by-type.php',
                {bookType : type,
                    key: key,
                    order: order},
                function (data) {
                    $('#list-book').html(data);
                })
        })

        $('#list-book-type>li').click(function (e){
            var dataType = e.target.getAttribute('data')
            var key = $('#list-book').attr('key');
            var order = $('#list-book').attr('order');
            $('#list-book').attr('type', dataType);
            $.post('ajax/book/book-by-type.php',
                {bookType : dataType,
                key: key,
                order: order},
                function (data) {
                $('#list-book').html(data);
            })
        })

        $('#add-book').click(function () {
            $('#list-book').after('<div id="add-book-form" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
            $.post('ajax/book/add-book.php', function (data) {
                $('#add-book-form').html(data);
            })
        })
    })
</script>
