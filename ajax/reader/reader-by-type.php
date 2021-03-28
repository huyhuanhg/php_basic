
<?php
require_once '../../lib/conn.php';
require_once '../../opp/bridge.php';
$type = $_POST['readerType'];
$key = $_POST['key'];
unset($_POST['readerType']);
unset($_POST['key']);
$sql = "SELECT * FROM `reader`";

if ($type != 'all') {
    $sql = $sql . " WHERE readerType = '${type}'";
}
if ($key != '' && $type != 'all') {
    $sql = $sql ." AND fullName LIKE '%${key}%'";
} elseif ($key != '' && $type == 'all'){
    $sql = $sql ." WHERE fullName LIKE '%${key}%'";
}
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    array_push($data,  new Reader($row['readerID'],$row['fullName'],$row['adress'],$row['sex'],
        $row['phone'],$row['birthDay'],$row['readerType'],$row['cmt'],$row['email']));
}
?>
<?php
for ($i = 0; $i < count($data); $i++):
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