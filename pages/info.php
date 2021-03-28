

tài khoản: <?= $_SESSION['user']->getUserID() ?><br/>
Họ và tên: <?= $_SESSION['user']->getFullName() ?><br/>
giới tính: <?= $_SESSION['user']->getSex() == 0 ? "nam" : "nữ" ?><br/>
ngày sinh: <?= $_SESSION['user']->getbirthDay() ?><br/>
CMT: <?= $_SESSION['user']->getCmt() ?><br/>
điện thoại: <?= $_SESSION['user']->getPhone() ?><br/>
email: <?= $_SESSION['user']->getEmail() ?><br/>
địa chỉ: <?= $_SESSION['user']->getAdress() ?><br/>
chuc vu: <?= $_SESSION['user']->getPosition() ?><br/>
<div><a href="./index.php?page=logout">Đăng xuất</a></div>
