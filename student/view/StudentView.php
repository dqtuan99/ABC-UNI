<?php

namespace student\view;

class StudentView {
  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function studentExamListView() {
    $html = "";

    $html .= '
    <h1 class="text-center">IN ĐĂNG KÝ THI</h1>
    <p style="display:inline-block;">Họ và tên: <h5 style="display:inline-block; margin-left: 5px;"> '.$_SESSION["fullname"].'</h5></p>
    <p style="display:inline-block;">Username: <h5 style="display:inline-block; margin-left: 5px;"> '.$_SESSION["username"].'</h5></p>
    <p style="display:inline-block;">Mã số sinh viên: <h5 style="display:inline-block; margin-left: 5px;"> '.$_SESSION["user_id"].'</h5></p>
    ';

    $html .= '
    <div>
    <div id="table-wrapper">
    <div id="table-scroll">
    <table>
    <tr>
    <th>Tên Môn Học</th>
    <th>Ngày thi</th>
    <th>Ca thi</th>
    <th>Phòng thi</th>
    </tr>';
    foreach ($this->data as $row){
      $html .= '
      <tr>
      <td>'.$row["ten_mon_hoc"].'</td>
      <td>'.$row["ngaythi"].'</td>
      <td>'.$row["cathi"].'</td>
      <td>'.$row["room_name"].'</td>
      </tr>
      ';
    }
    $html.='
    </table>
    </div>
    </div>
    </div>';

    return $html;
  }

  public function availableExamView() {
    $html = "";

    $html .= '
    <h1 class="text-center">ĐĂNG KÝ THI</h1>';

    $html .= '
    <div>
    <div id="table-wrapper">
    <div id="table-scroll">
    <table>
    <tr>
    <th>Mã Ca Thi</th>
    <th>Mã Môn Học</th>
    <th>Tên Môn Học</th>
    <th>Ngày thi</th>
    <th>Ca thi</th>
    <th>Phòng thi</th>
    <th>Số lượng</th>
    <th></th>
    </tr>';
    foreach ($this->data as $row){
      $slot = $row["current_slot"] . '/' . $row["max_slot"];
      $html .= '
      <tr>
      <td>'.$row["cathi_id"].'</td>
      <td>'.$row["hocphan_id"].'</td>
      <td>'.$row["ten_mon_hoc"].'</td>
      <td>'.$row["ngaythi"].'</td>
      <td>'.$row["cathi"].'</td>
      <td>'.$row["room_name"].'</td>
      <td>'.$slot.'</td>
      <td id="btnevd">';
      if ($row["available"]) {
        $html .= '<button id = "button-add"><i class="fas fa-plus-circle"></i>';
      }      
      $html .= '
      </td>
      </tr>
      ';
    }
    $html.='
    </table>
    </div>
    </div>
    </div>';

    return $html;
  }

  public function currentExamView() {
    $html = "";

    $html .= '
    <h1 class="text-center">Các môn đã đăng ký</h1>';

    $html .= '
    <div>
    <div id="table-wrapper">
    <div id="table-scroll">
    <table>
    <tr>
    <th>Mã Ca Thi</th>
    <th>Mã Môn Học</th>
    <th>Tên Môn Học</th>
    <th>Ngày thi</th>
    <th>Ca thi</th>
    <th>Phòng thi</th>
    <th>Số lượng</th>
    <th></th>
    </tr>';
    foreach ($this->data as $row){
      $slot = $row["current_slot"] . '/' . $row["max_slot"];
      $html .= '
      <tr>
      <td>'.$row["cathi_id"].'</td>
      <td>'.$row["hocphan_id"].'</td>
      <td>'.$row["ten_mon_hoc"].'</td>
      <td>'.$row["ngaythi"].'</td>
      <td>'.$row["cathi"].'</td>
      <td>'.$row["room_name"].'</td>
      <td>'.$slot.'</td>
      <td id="btnevd"><button id = "button-add"><i class="fas fa-plus-circle"></i></td>
      </tr>
      ';
    }
    $html.='
    </table>
    </div>
    </div>
    </div>';

    return $html;
  }

}

?>
