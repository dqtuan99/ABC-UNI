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

  public function modifyStudent($user_id, $username, $password, $fullname) {
    $db = new PDOData();
    $hashed = hash("sha256", $password);
    $count = $db->doPrepareSql("
      update user
      set username = ?, password = ?, fullname = ?
      where user_id = ?;
    ", array($username, $hashed, $fullname, $user_id));

    return $count;
  }

  public function deleteStudent($user_id) {
    $db = new PDOData();
    $count = $db->doPrepareSql("
      delete from user
      where user_id = ?;
    ", array($user_id));

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

  public function addCourse($ten_mon_hoc, $teacher_id) {
    $db = new PDOData();
    $count = $db->doPrepareSql("
      insert into hocphan (ten_mon_hoc, teacher_id)
      values (?, ?);
    ", array($ten_mon_hoc, $teacher_id));

    return $count;
  }

  public function modifyCourse($hocphan_id, $ten_mon_hoc, $teacher_id) {
    $db = new PDOData();
    $count = $db->doPrepareSql("
      update hocphan
      set ten_mon_hoc = ?, teacher_id = ?
      where hocphan_id = ?;
    ", array($ten_mon_hoc, $teacher_id, $hocphan_id));

    return $count;
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

  public function addSemester($ten_ky_thi) {
    $db = new PDOData();
    $count = $db->doPrepareSql("
      insert into kythi (ten_ky_thi)
      values (?);
    ", array($ten_ky_thi));

    return $count;
  }

  public function modifySemester($kythi_id, $ten_ky_thi) {
    $db = new PDOData();
    $count = $db->doPrepareSql("
      update kythi
      set ten_ky_thi = ?
      where kythi_id = ?;
    ", array($ten_ky_thi, $kythi_id));

    return $count;
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

  public function addExam($room_id, $hocphan_id, $kythi_id, $ngaythi, $start, $end) {
    $db = new PDOData();
    $count = $db->doPrepareSql("
      insert into cathi (room_id, hocphan_id, kythi_id, ngaythi, start, end)
      values (?, ?, ?, ?, ?, ?);
    ", array($room_id, $hocphan_id, $kythi_id, $ngaythi, $start, $end));

    return $count;
  }

  public function modifyExam($exam_id, $room_id, $hocphan_id, $kythi_id, $ngaythi, $start, $end) {
    $db = new PDOData();
    $count = $db->doPrepareSql("
      update cathi
      set room_id = ?, hocphan_id = ?, kythi_id = ?, ngaythi = ?, start = ?, end = ?
      where cathi_id = ?;
    ", array($room_id, $hocphan_id, $kythi_id, $ngaythi, $start, $end, $exam_id));

    return $count;
  }

  // ================================================================================================================

}
