
<?php
$sql = "SELECT * FROM `reader`";
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)){
    array_push($data, new Reader($row['readerID'],$row['fullName'],$row['adress'],$row['sex'],
        $row['phone'],$row['birthDay'],$row['readerType'],$row['cmt'],$row['email']));
}
$sqlL = "SELECT readerType FROM `reader` GROUP BY readerType";
$queryL = mysqli_query($conn, $sqlL);
$dataL = [];
while ($row = mysqli_fetch_assoc($queryL)){
    array_push($dataL, $row);
}
?>

<!--su dung ajax-->
<div id="add-reader" style="float: right; cursor: pointer; border: blue 1px solid; padding: 10px">Them nguoi doc</div>
<form>
    <input type="text" placeholder="Tim kiem nguoi doc" name="search-reader" id="search-reader">
    <button id="sbm-search-reader" name="sbm-search-reader">tim kiem</button>
</form>
<ul id="list-reader-type" style="display: flex">
    <li style="margin: 10px 20px; cursor: pointer" data="all">tat ca
    </li>
    <?php
    foreach ($dataL as $value):
        ?>
        <li style="margin: 10px 20px; cursor: pointer" data="<?=$value['readerType']?>">
            <?=$value['readerType']?>
        </li>
    <?php
    endforeach;
    ?>
</ul>
<!---->
<ul id="list-reader"  type="all" key="">

    <?php
    for ($i=0 ; $i< count($data); $i++):
        ?>
        <li>
            <?=$i+1?><br/>
            Mã người đọc: <?= $data[$i]->getReaderID()?><br/>
            Tên người đọc: <?= $data[$i]->getFullName()?><br/>
            Giới tính: <?= $data[$i]->getSex()!=0?'nam':"nu"?><br/>
            Ngày sinh: <?= $data[$i]->getBirthDay()?><br/>
            Số điện thoại: <?= $data[$i]->getPhone()?><br/>
            Địa chỉ: <?= $data[$i]->getAdress()?><br/>
            Loại: <?= $data[$i]->getReaderType()?><br/>
            Email:<?= $data[$i]->getEmail()?><br/>
            CMT:<?= $data[$i]->getCmt()?><br/>
            <div id="reader-control" style="display: flex; color: blue">
                <div class="edit-reader" style="cursor: pointer; margin-right: 30px" readerid = "<?= $data[$i]->getReaderID()?>">Sua</div>
                <div class="delete-reader" style="cursor: pointer" readerid = "<?= $data[$i]->getReaderID()?>">Xoa</div>
            </div>
        </li>
    <?php
    endfor;
    ?>

    <script>
        $(document).ready(function () {
            $('.delete-reader').click(function (e) {
                var readerID = e.target.getAttribute('readerid');
                $('#list-reader').after('<div id="detele-msg" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
                $.post('ajax/reader/delete-reader.php', {readerID : readerID}, function (data) {
                    $('#detele-msg').html(data);
                })
            })
            $('.edit-reader').click(function (e){
                var readerID = e.target.getAttribute('readerid');
                $('#list-reader').after('<div id="edit-reader-form" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
                $.post('ajax/reader/edit-reader.php', {readerID : readerID}, function (data) {
                    $('#edit-reader-form').html(data);
                })
            })
        })
    </script>
</ul>

<script>
    $(document).ready(function () {

        $('#sbm-search-reader').click(function (e) {
            e.preventDefault();
            var keySearch = $('#search-reader').val();
            $('#list-reader').attr('key', keySearch);
            $.post('ajax/reader/search-reader.php', {key : keySearch}, function (data) {
                $('#list-reader').html(data);
            })
        })

        $('#list-reader-type>li').click(function (e){
            var dataType = e.target.getAttribute('data')
            var key = $('#list-reader').attr('key');
            $('#list-reader').attr('type', dataType);
            $.post('ajax/reader/reader-by-type.php',
                {readerType : dataType,
                    key: key },
                function (data) {
                    $('#list-reader').html(data);
                })
        })

        $('#add-reader').click(function () {
            $('#list-reader').after('<div id="add-reader-form" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
            $.post('ajax/reader/add-reader.php', function (data) {
                $('#add-reader-form').html(data);
            })
        })
    })
</script>
