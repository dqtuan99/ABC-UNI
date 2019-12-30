<?php

namespace admin\control;
use core\util\Util; // Hợp thức hóa dữ liệu nhập vào form

require_once("admin/model/Data.php");
require_once("admin/view/DataView.php");
require_once("core/util/Util.php");

class DataManager {
  public function __contruct() {

  }

  // Student section
  // ================================================================================================================
  // Controller cho phần xem danh sách sinh viên
  public function showStudentList() {
    $model = new \admin\model\Data();

    if (isset($_POST["std_added"])){
      $user_id = Util::clean($_POST["user_id"], 20);
      $username = Util::clean($_POST["username"], 100);
      $password = Util::clean($_POST["password"], 100);
      $fullname = Util::clean($_POST["fullname"], 100);
      $count = $model->addStudent($user_id, $username, $password, $fullname);

      if ($count == 0){
        $message = "Them sinh vien khong thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/student';
        alert('$message');
        </script>";
      }
      else {
        $message = "Them sinh vien thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/student';
        alert('$message');
        </script>";
      }
    }
    if (isset($_POST["std_modified"])){
      $user_id = Util::clean($_POST["user_id"], 20);
      $username = Util::clean($_POST["username"], 100);
      $password = Util::clean($_POST["password"], 100);
      $fullname = Util::clean($_POST["fullname"], 100);
      $count = $model->modifyStudent($user_id, $username, $password, $fullname);

      if ($count == 0){
        $message = "Sua sinh vien khong thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/student';
        alert('$message');
        </script>";
      }
      else {
        $message = "Sua sinh vien thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/student';
        alert('$message');
        </script>";
      }

      header("refresh:1;url=http://localhost:8080/ABC-UNI/admin/student");
    }
    if (isset($_GET["std_deleted"])){
      $count = $model->deleteStudent($_GET["user_id"]);

      if ($count != 0){
        $message = "Xoa sinh vien thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/student';
        alert('$message');
        </script>";
      }
    }

    $data = $model->getStudentList();
    $view = new \admin\view\DataView($data);

    echo $view->studentListView();

  }
  // ================================================================================================================


  // Course section
  // ================================================================================================================
  // Controller của phần danh sách môn học
  public function showCourseList() {
    $model = new \admin\model\Data();

    if (isset($_GET["hocphan_id"])){
      $this->showStudentByCourse();
    }
    else {
      if (isset($_POST["course_added"])){
        $course_id = Util::clean($_POST["course_id"], 20);
        $course_name = Util::clean($_POST["course_name"], 100);
        $teacher_id = Util::clean($_POST["teacher_id"], 20);
        $count = $model->addCourse($course_id, $course_name, $teacher_id);

        if ($count == 0){
          $message = "Them mon hoc khong thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/monhoc';
          alert('$message');
          </script>";
        }
        else {
          $message = "Them mon hoc thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/monhoc';
          alert('$message');
          </script>";
        }
      }
      if (isset($_POST["course_modified"])){
        $course_id = Util::clean($_POST["course_id"], 20);
        $course_name = Util::clean($_POST["course_name"], 100);
        $teacher_id = Util::clean($_POST["teacher_id"], 20);
        $count = $model->modifyCourse($course_id, $course_name, $teacher_id);

        if ($count == 0){
          $message = "Sua mon hoc khong thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/monhoc';
          alert('$message');
          </script>";
        }
        else {
          $message = "Sua mon hoc thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/monhoc';
          alert('$message');
          </script>";
        }
      }
      if (isset($_GET["course_deleted"])){
        $count = $model->deleteCourse($_GET["course_id"]);
        $message = "Xoa mon hoc thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/monhoc';
        alert('$message');
        </script>";
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
  // Controller của phần danh sách phòng máy
  public function showRoomList() {
    $model = new \admin\model\Data();

    if (isset($_POST["room_added"])){
      $room_id = Util::clean($_POST["room_id"], 20);
      $room_name = Util::clean($_POST["room_name"], 100);
      $max_slot = Util::clean($_POST["max_slot"], 20);
      $count = $model->addRoom($room_id, $room_name, $max_slot);

      if ($count == 0){
        $message = "Them phong may khong thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/phongmay';
        alert('$message');
        </script>";
      }
      else {
        $message = "Them phong may thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/phongmay';
        alert('$message');
        </script>";
      }
    }
    if (isset($_POST["room_modified"])){
      $room_id = Util::clean($_POST["room_id"], 20);
      $room_name = Util::clean($_POST["room_name"], 100);
      $max_slot = Util::clean($_POST["max_slot"], 20);
      $count = $model->modifyRoom($room_id, $room_name, $max_slot);

      if ($count == 0){
        $message = "Sua phong may khong thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/phongmay';
        alert('$message');
        </script>";
      }
      else {
        $message = "Sua phong may thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/phongmay';
        alert('$message');
        </script>";
      }
    }
    if (isset($_GET["room_deleted"])){
      $count = $model->deleteRoom($_GET["room_id"]);
      $message = "Xoa phong may thanh cong";
      echo "<script>
      window.location.href='http://localhost:8080/ABC-UNI/admin/phongmay';
      alert('$message');
      </script>";
    }

    $data = $model->getRoomList();
    $view = new \admin\view\DataView($data);

    echo $view->roomListView();
  }

  // ================================================================================================================


  // Semester section
  // ================================================================================================================
  // Controller của phần danh sách kỳ thi
  public function showSemesterList() {
    $model = new \admin\model\Data();

    // Nếu ta chọn một kỳ thi trong danh sách, thì chuyển qua hiện danh sách ca thi của kỳ thi đó
    if (isset($_GET["kythi_id"]) && $_GET["kythi_id"] != ""){
      $this->showExamListBySemester();
    }
    else {
      if (isset($_POST["semester_added"])){
        $semester_id = Util::clean($_POST["semester_id"], 20);
        $semester_name = Util::clean($_POST["semester_name"], 100);
        $count = $model->addSemester($semester_id, $semester_name);

        if ($count == 0){
          $message = "Them ky thi khong thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/kythi';
          alert('$message');
          </script>";
        }
        else {
          $message = "Them ky thi thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/kythi';
          alert('$message');
          </script>";
        }
      }
      if (isset($_POST["semester_modified"])){
        $semester_id = Util::clean($_POST["semester_id"], 20);
        $semester_name = Util::clean($_POST["semester_name"], 100);
        $count = $model->modifySemester($semester_id, $semester_name);

        if ($count == 0){
          $message = "Sua ky thi khong thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/kythi';
          alert('$message');
          </script>";
        }
        else {
          $message = "Sua ky thi thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/kythi';
          alert('$message');
          </script>";
        }

        header("refresh:1;url=http://localhost:8080/ABC-UNI/admin/kythi");
      }
      if (isset($_GET["semester_deleted"])){
        $count = $model->deleteSemester($_GET["semester_id"]);
        $message = "Xoa ky thi thanh cong";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/kythi';
        alert('$message');
        </script>";
      }

      $data = $model->getSemesterList();
      $view = new \admin\view\DataView($data);

      echo $view->semesterListView();
    }
  }
  // ================================================================================================================


  // Exam section
  // ================================================================================================================
  // Controller của danh sách ca thi thuộc một kỳ thi
  public function showExamListBySemester() {
    $model = new \admin\model\Data();
    $data = $model->getExamListBySemester($_GET["kythi_id"]);
    $semester_name = $model->getSemesterName($_GET["kythi_id"])[0]["ten_ky_thi"];
    echo '<div class="print-exam"><h2 class="text-center">'.$semester_name.'</h2>' . '<br />';



    if (isset($_POST["exam_added"])){
      $exam_id = Util::clean($_POST["exam_id"], 20);
      $room_id = Util::clean($_POST["room_id"], 20);
      $course_id = Util::clean($_POST["course_id"], 20);
      $ngaythi = Util::clean($_POST["ngaythi"], 20);
      $cathi = Util::clean($_POST["cathi"], 20);

      // Kiểm tra hợp thức của mục điền ngày tháng
      $isDate = TRUE;
      $dateArr = explode("-", $ngaythi);
      if (count($dateArr) != 3){
        $isDate = FALSE;
      }
      else {
        $day = $dateArr[2];
        $month = $dateArr[1];
        $year = $dateArr[0];
        $isDate = checkdate($month, $day, $year);
      }

      // Nếu không phải ngày tháng, báo lỗi và tải lại trang
      if (!$isDate) {
        $message = "Ngay thi sai format xin hay nhap lai";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."';
        alert('$message');
        </script>";
      }
      else {
        $count = $model->addExam($exam_id, $room_id, $course_id, $_GET["kythi_id"], $ngaythi, $cathi);

        if ($count == 0){
          $message = "Them ca thi khong thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."';
          alert('$message');
          </script>";
        }
        else {
          $message = "Them ca thi thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."';
          alert('$message');
          </script>";
        }

        // header("refresh:1;url=http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."");
        // header("Location: http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."");
      }
    }
    if (isset($_POST["exam_modified"])){
      $exam_id = Util::clean($_POST["exam_id"], 20);
      $room_id = Util::clean($_POST["room_id"], 20);
      $course_id = Util::clean($_POST["course_id"], 20);
      $ngaythi = Util::clean($_POST["ngaythi"], 20);
      $cathi = Util::clean($_POST["cathi"], 20);

      // Kiểm tra hợp thức của mục điền ngày tháng
      $isDate = TRUE;
      $dateArr = explode("-", $ngaythi);
      if (count($dateArr) != 3){
        $isDate = FALSE;
      }
      else {
        $day = $dateArr[2];
        $month = $dateArr[1];
        $year = $dateArr[0];
        $isDate = checkdate($month, $day, $year);
      }

      // Nếu không phải ngày tháng, báo lỗi và tải lại trang
      if (!$isDate) {
        $message = "Ngay thi sai format xin hay nhap lai";
        echo "<script>
        window.location.href='http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."';
        alert('$message');
        </script>";
      }
      else {
        $count = $model->modifyExam($exam_id, $room_id, $course_id, $_GET["kythi_id"], $ngaythi, $cathi);

        if ($count == 0){
          $message = "Sua ca thi khong thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."';
          alert('$message');
          </script>";
        }
        else {
          $message = "Sua ca thi thanh cong";
          echo "<script>
          window.location.href='http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."';
          alert('$message');
          </script>";
        }

        header("refresh:1;url=http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."");
      }
    }
    if (isset($_GET["exam_deleted"])){
      $count = $model->deleteExam($_GET["exam_id"]);
      $message = "Xoa ca thi thanh cong";
      echo "<script>
      window.location.href='http://localhost:8080/ABC-UNI/admin/kythi/id=".$_GET["kythi_id"]."';
      alert('$message');
      </script>";
    }

    // Nếu ấn nút get all, chuyển qua giao diện in danh sách thí sinh dự thi
    // theo từng phòng thi của các ca thi
    if (isset($_GET["getAll"])){
      echo '
      <div class="text-center" style="margin-bottom: 20px; margin-top: -10px;">
      <button class="print btn btn-info" name="print" onclick="printA()">IN DANH SÁCH</button>
      </div>
      <script>
      function printA(){
        $(".print-exam").printThis();
      }
      </script>';
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
    echo '</div>';
  }
  // ================================================================================================================


}
