<?php

require_once("Connect/mysql/PDOData.php");

class Student{

  public function __contruct() {

  }

  //Lấy danh sách tất cả học sinh
  public function getAll() {
    $db = new PDOData();
    $ret = $db->doQuery("
      select p.*
      from students s
      inner join profiles p
      on p.student_id = s.student_id;
    ");

    return $ret;
  }

  //Lấy danh sách học sinh theo lớp
  public function getStudentByClass($class_id) {
    $db = new PDOData();
    $ret = $db->doPreparedQuery("
      select p.*
      from students s
      inner join profiles p
      on p.student_id = s.student_id
      inner join classes c
      on c.class_id = s.class_id
      where c.class_id = ?;
    ", array($class_id));

    return $ret;
  }

  //Lấy danh sách học sinh theo kỳ thi
  public function getStudentInExam($exam_id) {
    $db =new PDOData();
    $ret = $db->doPreparedQuery("
      select p.*
      from studentsexams se
      inner join profiles p
      on p.student_id = se.student_id
      inner join exams e
      on e.exam_id = se.exam_id
      where e.exam_id = ?;
    ", array($exam_id));

    return $ret;
  }

  //Lấy danh sách tất cả các kỳ thi
  public function getExam(){
    $db = new PDOData();
    $ret = $db->doQuery("
      select *
      from exams;
    ");

    return $ret;
  }

  //Lấy danh sách các kỳ thi mà học sinh với student_id tham gia
  public function getExamByStudent($student_id) {
    $db = new PDOData();
    $ret = $db->doPreparedQuery("
      select e.*
      from exams e
      inner join studentsexams se
      on se.exam_id = e.exam_id
      where se.student_id = ?;
    ", array($student_id));
    return $ret;
  }

  //Tạo kỳ thi mới
  public function CreateExam($class_id, $exam_date, $Time_started,
                             $Time_finished, $exam_room, $exam_limit) {
    $db = new PDOData();
    $ret = $db->doPrepareSql("
      insert into exams (class_id, exam_date, Time_started, Time_finished, exam_room, exam_limit)
      values (?, ?, ?, ?, ?, ?);
    ", array($class_id, $exam_date, $Time_started, $Time_finished, $exam_room, $exam_room));

    return $ret;
  }

  //Thêm sinh viên vào kỳ thi
  public function AddStudentExam($student_id, $exam_id) {
    $db = new PDOData();
    $db->doPrepareSql("
    insert into studentsexams (student_id, exam_id)
    values (?, ?);
    ", array($student_id, $exam_id));
  }
}
