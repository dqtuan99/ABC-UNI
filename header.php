<!-- Luôn xác thực phiên đăng nhập tại đầu mỗi lần load trang web -->
<?php
  require_once("account/control/AccountCtrl.php");
  $accountCtrl = new \account\control\AccountCtrl();
  $accountCtrl->checkAuthentication();
?>
