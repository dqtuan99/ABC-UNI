<?php

namespace student\model;
use core\data\model\PDOData;

require_once("core/data/PDOData.php");

class Student{
  public function __contruct() {

  }

  //Lấy ra danh sách ca thi sinh viên đã đăng kí
  public function getExamByStudent($sv_id) {
    $db = new PDOData();
    $ret = $db->doPreparedQuery("
      select c.cathi_id, r.room_name, h.ten_mon_hoc, c.ngaythi, c.cathi, s.sv_id
      from cathi c
      inner join room r on r.room_id = c.room_id
      inner join hocphan h on h.hocphan_id = c.hocphan_id
      inner join sv_cathi s on s.cathi_id = c.cathi_id
      where s.sv_id = ?
      order by c.ngaythi, c.cathi asc;
    ", array($sv_id));

    return $ret;
  }

  //Thêm học sinh vào danh sách ca thi
  public function AddStudentExam($sv_id, $cathi_id) {
    $db = new PDOData();
    $count = $db->doPrepareSql("
      INSERT INTO sv_cathi(sv_id, cathi_id)
      VALUES (?, ?);
    ", array($sv_id, $cathi_id));

    return $count;
  }

}
