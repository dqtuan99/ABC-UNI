<?php
namespace account\model;
use core\data\model\PDOData;

require_once("core/data/PDOData.php");

class Account {
  public function __contruct() {
  }

  public function checkAccount($username, $password) {
    $db = new PDOData();
    $hashed = hash("sha256", $password);
    $data = $db->doPreparedQuery("
      select *
      from user
      where username like ? and password like ?;
    ", array($username, $hashed));

    if (count($data) > 0) return true;

    return false;
  }

  public function getAccountInformation($username) {
    $db = new PDOData();
    $data = $db->doPreparedQuery("
      select user_id, username, fullname, isAdmin
      from user;
      where username like ?;
    ", array($username));

    return $data[0];
  }

}
