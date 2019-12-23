<?php

namespace admin\control;

require_once("admin/model/Data.php");
require_once("admin/view/DataView.php");

class DataManager {
  public function __contruct() {

  }

  // Student section
  // ================================================================================================================

  public function showStudentList() {
    $model = new \admin\model\Data();

    if (isset($_POST["std_added"])){
      $count = $model->addStudent($_POST["user_id"], $_POST["username"], $_POST["password"], $_POST["fullname"]);
      header("Location: admin.php?location=student");
    }
    // if (isset($_POST["std_modified"])){
    //   $count = $model->modifyStudent($_POST["user_id"], $_POST["username"], $_POST["password"], $_POST["fullname"]);
    //   header("Location: admin.php?location=student");
    // }
    if (isset($_GET["std_deleted"])){
      $count = $model->deleteStudent($_GET["user_id"]);
      header("Location: admin.php?location=student");
    }

    $data = $model->getStudentList();
    $view = new \admin\view\DataView($data);

    echo $view->studentListView();

  }
  // ================================================================================================================


  // Course section
  // ================================================================================================================
  public function showCourseList() {
    $model = new \admin\model\Data();

    if (isset($_GET["hocphan_id"])){
      $this->showStudentByCourse();
    }
    else {
      if (isset($_POST["course_added"])){
        $count = $model->addCourse($_POST["course_id"], $_POST["course_name"], $_POST["teacher_id"]);
        header("Location: admin.php?location=monhoc");
      }
      if (isset($_POST["course_modified"])){
        $count = $model->modifyCourse($_POST["course_id"], $_POST["course_name"], $_POST["teacher_id"]);
        header("Location: admin.php?location=monhoc");
      }
      if (isset($_POST["course_deleted"])){
        $count = $model->deleteCourse($_POST["course_id"]);
        header("Location: admin.php?location=monhoc");
      }

      $data = $model->getCourseList();
      $view = new \admin\view\DataView($data);

      echo $view->courseListView();
    }
  }

  public function showStudentByCourse() {
    $model = new \admin\model\Data();
    $data = $model->getStudentByCourse($_GET["hocphan_id"]);
    $semester_name = $model->getCourseName($_GET["hocphan_id"])[0]["ten_mon_hoc"];
    echo $semester_name . '<br />';

    $view = new \admin\view\DataView($data);
    echo $view->studentByCourseView();
  }
  // ================================================================================================================

  // Room section
  // ================================================================================================================
  public function showRoomList() {
    $model = new \admin\model\Data();

    if (isset($_POST["room_added"])){
      $count = $model->addRoom($_POST["room_id"], $_POST["room_name"], $_POST["max_slot"]);
      header("Location: admin.php?location=phongmay");
    }
    if (isset($_POST["room_modified"])){
      $count = $model->modifyRoom($_POST["room_id"], $_POST["room_name"], $_POST["max_slot"]);
      header("Location: admin.php?location=phongmay");
    }
    if (isset($_POST["room_deleted"])){
      $count = $model->deleteRoom($_POST["room_id"]);
      header("Location: admin.php?location=phongmay");
    }

    $data = $model->getRoomList();
    $view = new \admin\view\DataView($data);

    echo $view->roomListView();
  }

  // ================================================================================================================


  // Semester section
  // ================================================================================================================
  public function showSemesterList() {
    $model = new \admin\model\Data();

    if (isset($_GET["kythi_id"]) && $_GET["kythi_id"] != ""){
      $this->showExamListBySemester();
    }
    else {
      if (isset($_POST["semester_added"])){
        $count = $model->addSemester($_POST["semester_id"], $_POST["semester_name"]);
        header("Location: admin.php?location=kythi");
      }
      if (isset($_POST["semester_modified"])){
        $count = $model->modifySemester($_POST["semester_id"], $_POST["semester_name"]);
        header("Location: admin.php?location=kythi");
      }
      if (isset($_POST["semester_deleted"])){
        $count = $model->deleteSemester($_POST["semester_id"]);
        header("Location: admin.php?location=kythi");
      }

      $data = $model->getSemesterList();
      $view = new \admin\view\DataView($data);

      echo $view->semesterListView();
    }
  }
  // ================================================================================================================


  // Exam section
  // ================================================================================================================
  public function showExamListBySemester() {
    $model = new \admin\model\Data();
    $data = $model->getExamListBySemester($_GET["kythi_id"]);
    $semester_name = $model->getSemesterName($_GET["kythi_id"])[0]["ten_ky_thi"];
    echo $semester_name . '<br />';

    if (isset($_POST["exam_added"])){
      echo "Exam added";
      $count = $model->addExam($_POST["exam_id"], $_POST["room_id"], $_POST["course_id"],
                               $_GET["kythi_id"], $_POST["ngaythi"],
                               $_POST["cathi"]);
      header("Location: admin.php?location=kythi&&kythi_id=".$_GET["kythi_id"]."");
    }
    if (isset($_POST["exam_modified"])){
      echo "Exam added";
      $count = $model->modifyExam($_POST["exam_id"], $_POST["room_id"], $_POST["course_id"],
                                  $_GET["kythi_id"], $_POST["ngaythi"],
                                  $_POST["cathi"]);
      header("Location: admin.php?location=kythi&&kythi_id=".$_GET["kythi_id"]."");
    }
    if (isset($_POST["exam_deleted"])){
      $count = $model->deleteExam($_POST["exam_id"]);
      header("Location: admin.php?location=kythi&&kythi_id=".$_GET["kythi_id"]."");
    }


    if (isset($_GET["getAll"])){
      $examGroup = $model->groupBy_CaThi_NgayThi_PhongThi($_GET["kythi_id"]);
      foreach ($examGroup as $group){
        $stdList = $model->getStudentByExam($group["cathi"], $group["ngaythi"], $group["room_id"]);
        $view = new \admin\view\DataView($stdList);
        echo $view->studentByExamView();
      }
    }
    else {
      $view = new \admin\view\DataView($data);
      echo $view->examListView();
    }
  }
  // ================================================================================================================


}
