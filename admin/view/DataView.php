<?php

namespace admin\view;

class DataView {
  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function studentListView() {
    $current_path = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $addStdPath = $current_path . '&&modify=add';

    $html = "";

    $html .= '
    <a href="'.$addStdPath.'">Them SV</a>
    ';

    if (isset($_GET["modify"]) && $_GET["modify"] == "add"){
      $html .= '
        <form method="post" action="">
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
    $current_path = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (count($this->data) == 0) {
      $html .= "Khong ton tai ky thi nao.";
    }
    else {
      foreach ($this->data as $row){
        $new_path = $current_path . '&&kythi_id=' . $row["kythi_id"];
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

    if (count($this->data) == 0) {
      $html .= "Ky thi nay khong ton tai ca thi nao ca.";
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
