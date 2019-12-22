<?php

namespace admin\control;

require_once("admin/model/Data.php");
require_once("admin/view/DataView.php");

class DataManager {
  public function __contruct() {

  }

  public function showStudentList() {
    $model = new \admin\model\Data();

    if (isset($_POST["std_added"])){
      $count = $model->addStudent($_POST["username"], $_POST["password"], $_POST["fullname"]);
      header("Location: admin.php?location=student");
    }
    if (isset($_POST["std_modified"])){
      $count = $model->modifyStudent($_POST["user_id"], $_POST["username"], $_POST["password"], $_POST["fullname"]);
      header("Location: admin.php?location=student");
    }
    if (isset($_POST["std_deleted"])){
      $count = $model->deleteStudent($_POST["user_id"]);
      header("Location: admin.php?location=student");
    }

    $data = $model->getStudentList();
    $view = new \admin\view\DataView($data);

    echo $view->studentListView();
  }

  public function showCourseList() {
    $model = new \admin\model\Data();

    if (isset($_POST["course_added"])){
      $count = $model->addCourse($_POST["course_name"], $_POST["teacher_id"]);
      header("Location: admin.php?location=monhoc");
    }
    if (isset($_POST["course_modified"])){
      $count = $model->modifyCourse($_POST["course_id"], $_POST["course_name"], $_POST["teacher_id"]);
      header("Location: admin.php?location=monhoc");
    }

    $data = $model->getCourseList();
    $view = new \admin\view\DataView($data);

    echo $view->courseListView();
  }

  public function showSemesterList() {
    $model = new \admin\model\Data();

    if (isset($_GET["kythi_id"]) && $_GET["kythi_id"] != ""){
      $this->showExamListBySemester();
    }
    else {
      if (isset($_POST["semester_added"])){
        $count = $model->addSemester($_POST["semester_name"]);
        header("Location: admin.php?location=kythi");
      }
      if (isset($_POST["semester_modified"])){
        $count = $model->modifySemester($_POST["semester_id"], $_POST["semester_name"]);
        header("Location: admin.php?location=kythi");
      }

      $data = $model->getSemesterList();
      $view = new \admin\view\DataView($data);

      echo $view->semesterListView();
    }
  }

  public function showExamListBySemester() {
    $model = new \admin\model\Data();
    $data = $model->getExamListBySemester($_GET["kythi_id"]);
    echo $data[0]["ten_ky_thi"] . '<br />';

    if (isset($_POST["exam_added"])){
      echo "Exam added";
      $count = $model->addExam($_POST["room_id"], $_POST["course_id"],
                               $_GET["kythi_id"], $_POST["ngaythi"],
                               $_POST["start_time"], $_POST["end_time"]);
      header("Location: admin.php?location=kythi&&kythi_id=".$_GET["kythi_id"]."");
    }
    if (isset($_POST["exam_modified"])){
      echo "Exam added";
      $count = $model->modifyExam($_POST["exam_id"], $_POST["room_id"], $_POST["course_id"],
                                  $_GET["kythi_id"], $_POST["ngaythi"],
                                  $_POST["start_time"], $_POST["end_time"]);
      header("Location: admin.php?location=kythi&&kythi_id=".$_GET["kythi_id"]."");
    }

    $view = new \admin\view\DataView($data);

    echo $view->examListView();
  }

}
