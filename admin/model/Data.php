<?php

namespace admin\model;
use core\data\model\PDOData;

require_once("core/data/PDOData.php");

class Data {
  public function __contruct() {

  }

  // Student section
  // ================================================================================================================

  public function getStudentList() {
    $db = new PDOData();
    $data = $db->doQuery("
      select user_id, username, fullname
      from user
      where isAdmin = 0
      order by fullname;
    ");

    return $data;
  }

  public function addStudent($username, $password, $fullname) {
    $db = new PDOData();
    $hashed = hash("sha256", $password);
    $count = $db->doPrepareSql("
      insert into user (username, password, fullname)
      values (?, ?, ?);
    ", array($username, $hashed, $fullname));

    return $count;
  }

  // ================================================================================================================


  // Course section
  // ================================================================================================================

  public function getCourseList() {
    $db = new PDOData();
    $data = $db->doQuery("
      select h.*, u.fullname
      from hocphan h
      inner join user u
      on u.user_id = h.teacher_id;
    ");

    return $data;
  }

  // ================================================================================================================


  // Semester section
  // ================================================================================================================

  public function getSemesterList() {
    $db = new PDOData();
    $data = $db->doQuery("
      select *
      from kythi;
    ");

    return $data;
  }

  // ================================================================================================================


  // Exam section
  // ================================================================================================================

  public function getExamListBySemester($kythi_id) {
    $db = new PDOData();
    $data = $db->doPreparedQuery("
      select ct.*, kt.ten_ky_thi, hp.ten_mon_hoc, r.room_name
      from cathi ct
      inner join kythi kt
      on kt.kythi_id = ct.kythi_id
      inner join hocphan hp
      on hp.hocphan_id = ct.hocphan_id
      inner join room r
      on r.room_id = ct.room_id
      where ct.kythi_id = ?;
    ", array($kythi_id));

    return $data;
  }

  // ================================================================================================================

}
