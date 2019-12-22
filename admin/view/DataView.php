<?php

namespace admin\view;

class DataView {
  private $data;
  private $current_path;
  private $addPath;
  private $modifyPath;
  private $deletePath;

  public function __construct($data) {
    $this->data = $data;

    $this->current_path = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $this->addPath = $this->current_path . '&&modify=add';
    $this->modifyPath = $this->current_path . '&&modify=modify';
    $this->deletePath = $this->current_path . '&&modify=delete';
  }

  public function studentListView() {
    $html = "";

    $html .= '
    <a href="'.$this->addPath.'">Them SV</a>
    <a href="'.$this->modifyPath.'">Sua SV</a>
    <a href="'.$this->deletePath.'">Xoa SV</a>
    ';

    if (isset($_GET["modify"]) && $_GET["modify"] == "add"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="std_added" value="1"/>
        Username:<br>
        <input type="text" name="username" placeholder="Username" required>
        <br>
        Password:<br>
        <input type="password" name="password">
        <br>
        Fullname:<br>
        <input type="text" name="fullname" placeholder="Fullname" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }
    if (isset($_GET["modify"]) && $_GET["modify"] == "modify"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="std_modified" value="1"/>
        User id:<br>
        <input type="text" name="user_id" placeholder="User id" required>
        <br>
        Username:<br>
        <input type="text" name="username" placeholder="Username" required>
        <br>
        Password:<br>
        <input type="password" name="password">
        <br>
        Fullname:<br>
        <input type="text" name="fullname" placeholder="Fullname" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }
    if (isset($_GET["modify"]) && $_GET["modify"] == "delete"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="std_deleted" value="1"/>
        User id:<br>
        <input type="text" name="user_id" placeholder="User id" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }

    if (count($this->data) == 0) {
      $html .= "Khong ton tai sinh vien nao.";
    }
    else {
      foreach ($this->data as $row){
        $html .= '
        <p>'.$row["user_id"].'</p>
        <p>'.$row["username"].'</p>
        <p>'.$row["fullname"].'</p>
        <br />
        ';
      }
    }

    return $html;
  }

  public function courseListView() {
    $html = "";

    $html .= '
    <a href="'.$this->addPath.'">Them mon hoc</a>
    <a href="'.$this->modifyPath.'">Sua mon hoc</a>
    ';

    if (isset($_GET["modify"]) && $_GET["modify"] == "add"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="course_added" value="1"/>
        Ten mon hoc:<br>
        <input type="text" name="course_name" placeholder="Ten mon hoc" required>
        <br>
        Teacher id:<br>
        <input type="text" name="teacher_id" placeholder="Teacher id" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }
    if (isset($_GET["modify"]) && $_GET["modify"] == "modify"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="course_modified" value="1"/>
        Course id:<br>
        <input type="text" name="course_id" placeholder="Course id" required>
        <br>
        Ten mon hoc:<br>
        <input type="text" name="course_name" placeholder="Ten mon hoc" required>
        <br>
        Teacher id:<br>
        <input type="text" name="teacher_id" placeholder="Teacher id" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }

    if (count($this->data) == 0) {
      $html .= "Khong ton tai mon hoc nao.";
    }
    else {
      foreach ($this->data as $row){
        $html .= '
        <p>'.$row["hocphan_id"].'</p>
        <p>'.$row["ten_mon_hoc"].'</p>
        <p>'.$row["fullname"].'</p>
        <br />
        ';
      }
    }

    return $html;
  }

  public function semesterListView() {
    $html = "";

    $html .= '
    <a href="'.$this->addPath.'">Them ky thi</a>
    <a href="'.$this->modifyPath.'">Sua ky thi</a>
    ';

    if (isset($_GET["modify"]) && $_GET["modify"] == "add"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="semester_added" value="1"/>
        Semester name:<br>
        <input type="text" name="semester_name" placeholder="Semester name" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }
    if (isset($_GET["modify"]) && $_GET["modify"] == "modify"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="semester_modified" value="1"/>
        Semester id:<br>
        <input type="text" name="semester_id" placeholder="Semester id" required>
        <br>
        Semester name:<br>
        <input type="text" name="semester_name" placeholder="Semester name" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }

    if (count($this->data) == 0) {
      $html .= "Khong ton tai ky thi nao.";
    }
    else {
      foreach ($this->data as $row){
        $new_path = $this->current_path . '&&kythi_id=' . $row["kythi_id"];
        $html .= '
        <a href="'.$new_path.'"><p>'.$row["kythi_id"].'</p></a>
        <p>'.$row["ten_ky_thi"].'</p>
        <br />
        ';
      }
    }

    return $html;
  }

  public function examListView() {
    $html = "";

    $html .= '
    <a href="'.$this->addPath.'">Them ca thi</a>
    <a href="'.$this->modifyPath.'">Sua ca thi</a>
    ';

    if (isset($_GET["modify"]) && $_GET["modify"] == "add"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="exam_added" value="1"/>
        Room id:<br>
        <input type="text" name="room_id" placeholder="Room id" required>
        <br>
        Hoc phan id:<br>
        <input type="text" name="course_id" placeholder="Hoc phan id" required>
        <br>
        Ngay thi:<br>
        <input type="text" name="ngaythi" placeholder="yyyy/mm/dd" required>
        <br>
        Thoi gian bat dau:<br>
        <input type="text" name="start_time" placeholder="hh:mm:ss" required>
        <br>
        Thoi gian ket thuc:<br>
        <input type="text" name="end_time" placeholder="hh:mm:ss" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }
    if (isset($_GET["modify"]) && $_GET["modify"] == "modify"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="exam_modified" value="1"/>
        Exam id:<br>
        <input type="text" name="exam_id" placeholder="Exam id" required>
        <br>
        Room id:<br>
        <input type="text" name="room_id" placeholder="Room id" required>
        <br>
        Hoc phan id:<br>
        <input type="text" name="course_id" placeholder="Hoc phan id" required>
        <br>
        Ngay thi:<br>
        <input type="text" name="ngaythi" placeholder="yyyy/mm/dd" required>
        <br>
        Thoi gian bat dau:<br>
        <input type="text" name="start_time" placeholder="hh:mm:ss" required>
        <br>
        Thoi gian ket thuc:<br>
        <input type="text" name="end_time" placeholder="hh:mm:ss" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }

    if (count($this->data) == 0) {
      $html .= "<br />Ky thi nay khong ton tai ca thi nao ca.";
    }
    else {
      foreach ($this->data as $row){
        $html .= '
        <p>'.$row["hocphan_id"].'</p>
        <p>'.$row["ten_mon_hoc"].'</p>
        <p>'.$row["room_name"].'</p>
        <p>'.$row["ngaythi"].'</p>
        <p>'.$row["start"].'</p>
        <p>'.$row["end"].'</p>
        <br />
        ';
      }
    }

    return $html;
  }

}
