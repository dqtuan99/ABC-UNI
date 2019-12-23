<?php

namespace student\control;

require_once("student/model/Student.php");
require_once("student/view/StudentView.php");

class StudentControl {
  public function __construct() {

  }

  public function showCaThi() {
    $model = new \student\model\Student();
    $data = $model->getExamByStudent($_SESSION["user_id"]);
    $view = new \student\view\StudentView($data);

    if (count($data) == 0) {
      echo "Hien tai ban chua dang ky ca thi nao ca.";
    }

    echo $view->studentExamListView();
  }

  public function showAvailableExam() {
    $model = new \student\model\Student();

    if (isset($_GET["delete"])){
      $count = $model->deleteStudentExam($_SESSION["user_id"], $_GET["delete"]);
      header("Location: student/dangky");
    }
    if (isset($_GET["add"])){
      $count = $model->AddStudentExam($_SESSION["user_id"], $_GET["add"]);
      header("Location: student/dangky");
    }

    $availableExam = $model->getAvailableExam($_SESSION["user_id"]);
    $currentExam = $model->getCurrentExam($_SESSION["user_id"]);
    for ($i = 0; $i < count($availableExam); ++$i){
      $current_slot = $model->getRoomSlotNum($availableExam[$i]["cathi_id"])[0]["current_slot"];
      $availableExam[$i]["current_slot"] = $current_slot;

      $duplicate = FALSE;
      for ($j = 0; $j < count($currentExam); ++$j){
        if ($currentExam[$j]["cathi_id"] == $availableExam[$i]["cathi_id"]){
          $duplicate = TRUE;
          break;
        }
        if ($currentExam[$j]["ngaythi"] == $availableExam[$i]["ngaythi"]){
          if ($currentExam[$j]["cathi"] == $availableExam[$i]["cathi"]){
            $duplicate = TRUE;
            break;
          }
        }
        if ($currentExam[$j]["ten_mon_hoc"] == $availableExam[$i]["ten_mon_hoc"]){
          $duplicate = TRUE;
          break;
        }
      }
      if ($duplicate) {
        $availableExam[$i]["available"] = FALSE;
      }
      else {
        $availableExam[$i]["available"] = TRUE;
      }
    }
    $view = new \student\view\StudentView($availableExam);

    echo $view->availableExamView();
    $this->showCurrentExam();
  }

  public function showCurrentExam() {
    $model = new \student\model\Student();
    $data = $model->getCurrentExam($_SESSION["user_id"]);
    for ($i = 0; $i < count($data); ++$i){
      $current_slot = $model->getRoomSlotNum($data[$i]["cathi_id"])[0]["current_slot"];
      $data[$i]["current_slot"] = $current_slot;
    }
    $view = new \student\view\StudentView($data);

    echo $view->currentExamView();
  }
}

?>
