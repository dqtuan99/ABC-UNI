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
      select c.cathi_id, r.room_name, h.ten_mon_hoc, c.ngaythi, c.cathi, s.sv_id, k.kythi_id, k.ten_ky_thi
      from cathi c
      inner join room r on r.room_id = c.room_id
      inner join hocphan h on h.hocphan_id = c.hocphan_id
      inner join sv_cathi s on s.cathi_id = c.cathi_id
      inner join kythi k on c.kythi_id = k.kythi_id
      where s.sv_id = ? and k.kythi_id = (select kythi_id from kythi order by kythi_id desc limit 1)
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

  public function getAvailableExam($sv_id) {
    $db = new PDOData();
    $data = $db->doPreparedQuery("
      select skh.*, c.cathi_id, c.ngaythi, c.cathi, r.room_name, r.room_id, r.max_slot, h.ten_mon_hoc
      from sv_kythi_hocphan skh
      inner join sv_cathi sc on skh.sv_id = sc.sv_id
      inner join cathi c on sc.cathi_id = c.cathi_id
                            and skh.hocphan_id = c.hocphan_id
                            and skh.kythi_id = c.kythi_id
      inner join room r on c.room_id = r.room_id
      inner join hocphan h on c.hocphan_id = h.hocphan_id
      where skh.sv_id = ?
            and skh.kythi_id = (select kythi_id from kythi order by kythi_id desc limit 1)
            and skh.banned = 0;
    ", array($sv_id));

    return $data;
  }

  public function getRoomSlotNum($cathi_id) {
    $db = new PDOData();
    $data = $db->doPreparedQuery("
      select *, count(sv_id) as current_slot
      from sv_cathi sc
      inner join cathi c on sc.cathi_id = c.cathi_id
      inner join room r on c.room_id = r.room_id
      where sc.cathi_id = ?
    ", array($cathi_id));

    return $data;
  }
}
