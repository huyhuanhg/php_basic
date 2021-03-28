<?php
require_once '../../lib/conn.php';
require_once '../../opp/bridge.php';
session_start();
$level = $_SESSION['user']->getPosition();
$key = $_POST['key'];
unset($_POST['key']);
$sql = "SELECT * FROM `user` WHERE user_name LIKE '%${key}%'";
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    array_push($data, new User($row['account'], $row['user_name'], $row['sex'], $row['ngay_sinh'],
        $row['type'], $row['phone'], $row['email'], $row['adress'], $row['cmt']));
}
?>
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
<?php
if ($level > 0) {
    ?>
    <script>
        $(document).ready(function () {

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

        })
    </script>

    <?php
}
?>