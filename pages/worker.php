<?php
$level = $_SESSION['user']->getPosition();
?>

<?php
$sql = "SELECT * FROM `user`";
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    array_push($data, new User($row['account'], $row['user_name'], $row['sex'], $row['ngay_sinh'],
        $row['type'], $row['phone'], $row['email'], $row['adress'], $row['cmt']));
}
//$sqlL = "SELECT workerType FROM `worker` GROUP BY workerType";
//$queryL = mysqli_query($conn, $sqlL);
//$dataL = [];
//while ($row = mysqli_fetch_assoc($queryL)){
//    array_push($dataL, $row);
//}
?>

<!--su dung ajax-->
<?php
if ($level > 0) {
    ?>
    <div id="add-worker" style="float: right; cursor: pointer; border: blue 1px solid; padding: 10px">Them nhan vien</div>
    <?php
}
?>
<form>
    <input type="text" placeholder="Tim kiem nhan vien" name="search-worker" id="search-worker">
    <button id="sbm-search-worker" name="sbm-search-worker">tim kiem</button>
</form>
<!--<ul id="list-worker-type" style="display: flex">-->
<!--    <li style="margin: 10px 20px; cursor: pointer" data="all">tat ca-->
<!--    </li>-->
<!--    --><?php
//    foreach ($dataL as $value):
//        ?>
<!--        <li style="margin: 10px 20px; cursor: pointer" data="--><? //=$value['workerType']?><!--">-->
<!--            --><? //=$value['workerType']?>
<!--        </li>-->
<!--    --><?php
//    endforeach;
//    ?>
<!--</ul>-->

<!---->
<ul id="list-worker" key="">

    <?php
    foreach ($data as $val):
        ?>
        <li>
<!--            --><?//= $i + 1 ?><!--<br/>-->
                Tai khoan: <?= $val->getUserID() ?><br/>
            Tên nhan vien: <?= $val->getFullName() ?><br/>
            Giới tính: <?= $val->getSex() != 0 ? 'nam' : "nu" ?><br/>
            Ngày sinh: <?= $val->getBirthDay() ?><br/>
            Số điện thoại: <?= $val->getPhone() ?><br/>
            Địa chỉ: <?= $val->getAdress() ?><br/>
            Loại: <?= $val->getPosition() ?><br/>
            Email:<?= $val->getEmail() ?><br/>
            CMT:<?= $val->getCmt() ?><br/>

            <?php
            if ($level > 0) {
                ?>
                <div id="worker-control" style="display: flex; color: blue">
                    <div class="edit-worker" style="cursor: pointer; margin-right: 30px"
                         workerid="<?= $val->getUserID() ?>">Sua
                    </div>
                    <div class="delete-worker" style="cursor: pointer" workerid="<?= $val->getUserID() ?>">Xoa</div>
                </div>
                <?php
            }
            ?>

        </li>
    <?php
    endforeach;
    ?>

    <script>
        $(document).ready(function () {
            <?php
            if ($level > 0) {
            ?>
            $('.delete-worker').click(function (e) {
                var workerID = e.target.getAttribute('workerid');
                $('#list-worker').after('<div id="detele-msg" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
                $.post('ajax/worker/delete-worker.php', {workerID: workerID}, function (data) {
                    $('#detele-msg').html(data);
                })
            })
            $('.edit-worker').click(function (e) {
                var workerID = e.target.getAttribute('workerid');
                $('#list-worker').after('<div id="edit-worker-form" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
                $.post('ajax/worker/edit-worker.php', {workerID: workerID}, function (data) {
                    $('#edit-worker-form').html(data);
                })
            })
            <?php
            }
            ?>

        })
    </script>
</ul>

<script>
    $(document).ready(function () {

        $('#sbm-search-worker').click(function (e) {
            e.preventDefault();
            var keySearch = $('#search-worker').val();
            $('#list-worker').attr('key', keySearch);
            $.post('ajax/worker/search-worker.php', {key: keySearch}, function (data) {
                $('#list-worker').html(data);
            })
        })

        <?php
        if ($level > 0) {
        ?>
        $('#add-worker').click(function () {
            $('#list-worker').after('<div id="add-worker-form" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0,0,0,.3);"></div>');
            $.post('ajax/worker/add-worker.php', function (data) {
                $('#add-worker-form').html(data);
            })
        })
        <?php
        }
        ?>
    })
</script>

