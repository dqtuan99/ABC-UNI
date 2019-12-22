<?php

namespace admin\control;

require_once("admin/model/Data.php");
require_once("admin/view/DataView.php");

class DataManager {
  public function __contruct() {

  }

  public function showStudentList() {
    $model = new \admin\model\Data();

    if (isset($_POST["username"])){
      $count = $model->addStudent($_POST["username"], $_POST["password"], $_POST["fullname"]);
      header("Location: admin.php?location=student");
    }

    $data = $model->getStudentList();
    $view = new \admin\view\DataView($data);

    echo $view->studentListView();
  }

  public function showCourseList() {
    $model = new \admin\model\Data();
    $data = $model->getCourseList();
    $view = new \admin\view\DataView($data);

    echo $view->courseListView();
  }

  public function showSemesterList() {
    $model = new \admin\model\Data();

    if (isset($_GET["kythi_id"]) && $_GET["kythi_id"] != ""){
      $data = $model->getExamListBySemester($_GET["kythi_id"]);
      $view = new \admin\view\DataView($data);

      echo $view->examListView();
    }
    else {
      $data = $model->getSemesterList();
      $view = new \admin\view\DataView($data);

      echo $view->semesterListView();
    }
  }

}
