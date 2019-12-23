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
}

?>
