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
    $data = $model->getAvailableExam($_SESSION["user_id"]);
    for ($i = 0; $i < count($data); ++$i){
      $current_slot = $model->getRoomSlotNum($data[$i]["cathi_id"])[0]["current_slot"];
      $data[$i]["current_slot"] = $current_slot;
    }
    $view = new \student\view\StudentView($data);

    echo $view->availableExamView();
    $this->showCurrentExam();
  }

  public function showCurrentExam() {

  }
}

?>
