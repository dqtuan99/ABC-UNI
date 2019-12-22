<?php
  require_once("account/control/AccountCtrl.php");
  $accountCtrl = new \account\control\AccountCtrl();
  $accountCtrl->checkAuthentication();
?>
