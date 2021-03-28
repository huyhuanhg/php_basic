<?php
$sql = "SELECT bookmanager.*,reader.readerID, reader.fullName, user.account, user.user_name, book.bookID, book.bookName 
FROM `bookmanager`
INNER JOIN reader ON bookmanager.readerID = reader.readerID
INNER JOIN user ON user.account = bookmanager.workerID
INNER JOIN book ON bookmanager.bookID = book.bookID";
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)) array_push(
    $data, new BookManager($row['BMGID'], $row['readerID'], $row['fullName'], $row['bookID'], $row['bookName'],
    $row['workerID'], $row['user_name'], $row['date'], $row['exp'], $row['so_luong'], $row['phi_coc']));
?>

<!--su dung ajax-->
<div id="add-bmg" style="float: right; cursor: pointer; border: blue 1px solid; padding: 10px">Them phieu muon</div>
<form>
    <input type="text" placeholder="Tim kiem phieu muon" name="search-bmg" id="search-bmg">
    <button id="sbm-search-bmg" name="sbm-search-bmg">tim kiem</button>
</form>
<ul id="list-bmg-type" style="display: flex">
    <li style="margin: 10px 20px; cursor: pointer" data="all">tat ca
    </li>
    <li style="margin: 10px 20px; cursor: pointer">het han</li>
    <li style="margin: 10px 20px; cursor: pointer">con han</li>
</ul>
<form>
    <select id="sort-bmg">
        <option value="">sap het han</option>
        <option value="">so luong muon</option>
        <option value="">phi coc</option>
    </select>
</form>
<!---->
<ul id="list-bmg" type="all" key="">

    <?php
    for ($i = 0; $i < count($data); $i++):
        $first_date = strtotime(date("Y-m-d"));
        $second_date = strtotime($data[$i]->getDate());
        $datediff = abs($first_date - $second_date);
        $betwen = floor($datediff / (60 * 60 * 24));
        $thoiHan = $data[$i]->getExp();
        $exp = $betwen - $thoiHan;

        if ( $exp >= 0) {
            $status = "da het han " . $exp . " ngay";
        } else {
            $status = "con " . $exp . " ngay";
        }
        ?>
        <li>
            <?= $i + 1 ?><br/>
            ID: <?= $data[$i]->getBMGID() ?><br/>
            Ten nguoi muon (ID): <?= $data[$i]->getReaderFullName() ?>( <?= $data[$i]->getReaderID() ?>)<br/>
            ten sach (id): <?= $data[$i]->getBookName() ?>( <?= $data[$i]->getBookID() ?>)<br/>
            nhan vien phu trach: <?= $data[$i]->getWorkerFullName() ?><br/>
            thoi han con: <?=$status ?><br/>
            so luong: <?= $data[$i]->getSoLuong() ?><br/>
            phi dat coc: <?= $data[$i]->getPhiCoc() ?><br/>
            <div id="bmg-control" style="display: flex; color: blue">
                <div class="edit-bmg" style="cursor: pointer; margin-right: 30px"
                     bmgid="<?= $data[$i]->getBMGID() ?>">Sua
                </div>
                <div class="delete-bmg" style="cursor: pointer" bmgid="<?= $data[$i]->getBMGID() ?>">Xoa</div>
            </div>
        </li>
    <?php
    endfor;
    ?>

    <script>
        $(document).ready(function () {
            $('.delete-bmg').click(function (e) {
                var bmgID = e.target.getAttribute('bmgid');
                $('#list-bmg').after('<div id="detele-msg" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
                $.post('ajax/bmg/delete-bmg.php', {bmgID: bmgID}, function (data) {
                    $('#detele-msg').html(data);
                })
            })
            $('.edit-bmg').click(function (e) {
                var bmgID = e.target.getAttribute('bmgid');
                $('#list-bmg').after('<div id="edit-bmg-form" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
                $.post('ajax/bmg/edit-bmg.php', {bmgID: bmgID}, function (data) {
                    $('#edit-bmg-form').html(data);
                })
            })
        })
    </script>
</ul>

<script>
    $(document).ready(function () {

        $('#sbm-search-bmg').click(function (e) {
            e.preventDefault();
            var keySearch = $('#search-bmg').val();
            $('#list-bmg').attr('key', keySearch);
            $.post('ajax/bmg/search-bmg.php', {key: keySearch}, function (data) {
                $('#list-bmg').html(data);
            })
        })

        $('#list-bmg-type>li').click(function (e) {
            var dataType = e.target.getAttribute('data')
            var key = $('#list-bmg').attr('key');
            $('#list-bmg').attr('type', dataType);
            $.post('ajax/bmg/bmg-by-type.php',
                {
                    bmgType: dataType,
                    key: key
                },
                function (data) {
                    $('#list-bmg').html(data);
                })
        })

        $('#add-bmg').click(function () {
            $('#list-bmg').after('<div id="add-bmg-form" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
            $.post('ajax/bmg/add-bmg.php', function (data) {
                $('#add-bmg-form').html(data);
            })
        })
    })
</script>
