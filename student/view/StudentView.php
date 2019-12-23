<?php

namespace student\view;

class StudentView {
  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function studentExamListView() {
    $html = '<div class="print-exam">';

    $html .= '
    <h2 class="text-center">IN ĐĂNG KÝ THI</h2>
    <p style="display:inline-block;">Họ và tên: <h5 style="display:inline-block; margin-left: 5px;"> '.$_SESSION["fullname"].'</h5></p>
    <p style="display:inline-block;">Username: <h5 style="display:inline-block; margin-left: 5px;"> '.$_SESSION["username"].'</h5></p>
    <p style="display:inline-block;">Mã số sinh viên: <h5 style="display:inline-block; margin-left: 5px;"> '.$_SESSION["user_id"].'</h5></p>
    ';

    $html .= '
    <div>
    <div id="table-wrapper">
    <div id="table-scroll">
    <table style="border:none; width: 100%; border-collapse:collapse;">
    <tr>
    <th style="border:1px solid #000; border-left:1px solid #000; text-align:center;"><h5>Tên Môn Học</h5></th>
    <th style="border:1px solid #000; border-left:1px solid #000; text-align:center;"><h5>Ngày thi</h5></th>
    <th style="border:1px solid #000; border-left:1px solid #000; text-align:center;"><h5>Ca thi</h5></th>
    <th style="border:1px solid #000; border-left:1px solid #000; text-align:center;"><h5>Phòng thi</h5></th>
    </tr>';
    foreach ($this->data as $row){
      $html .= '
      <tr>
      <td style="border:1px solid #000; border-left:1px solid #000; text-align:center;">'.$row["ten_mon_hoc"].'</td>
      <td style="border:1px solid #000; border-left:1px solid #000; text-align:center;">'.$row["ngaythi"].'</td>
      <td style="border:1px solid #000; border-left:1px solid #000; text-align:center;">'.$row["cathi"].'</td>
      <td style="border:1px solid #000; border-left:1px solid #000; text-align:center;">'.$row["room_name"].'</td>
      </tr>
      ';
    }
    $html.='
    </table>
    </div>
    </div>
    </div>
    </div>
    <button class="print btn btn-info" name="print" onclick="printA()" style="float: right; margin-right: 15px; min-width: 140px;">IN DANH SÁCH</button>
    <script>
    function printA(){
      $(".print-exam").printThis();
    }
    </script>';

    return $html;
  }

  public function availableExamView() {
    $html = "";

    $html .= '
    <h2 class="text-center">ĐĂNG KÝ THI</h2>';

    $html .= '
    <div>
    <div id="table-wrapper">
    <div id="table-scroll">
    <table>
    <tr>
    <th><h5>Mã Ca Thi</h5></th>
    <th><h5>Mã Môn Học</h5></th>
    <th><h5>Tên Môn Học</h5></th>
    <th><h5>Ngày thi</h5></th>
    <th><h5>Ca thi</h5></th>
    <th><h5>Phòng thi</h5></th>
    <th><h5>Số lượng</h5></th>
    <th><h5></h5></th>
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
      <td style="padding-right: 0px;">';
      if ($row["available"]) {
        $html .= '
        <a class="button-add" href="student.php?location=dangky&&add='.$row["cathi_id"].'"><i class="fas fa-plus-circle"></i></a>
        ';
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
    <h2 class="text-center">Các môn đã đăng ký</h2>';

    $html .= '
    <div>
    <div id="table-wrapper">
    <div id="table-scroll">
    <table>
    <tr>
    <th><h5>Mã Ca Thi</h5></th>
    <th><h5>Mã Môn Học</h5></th>
    <th><h5>Tên Môn Học</h5></th>
    <th><h5>Ngày thi</h5></th>
    <th><h5>Ca thi</h5></th>
    <th><h5>Phòng thi</h5></th>
    <th><h5>Số lượng</h5></th>
    <th><h5></h5></th>
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
      <td style="padding-right: 0px;">
        <a class="button-del" href="student.php?location=dangky&&delete='.$row["cathi_id"].'"><i class="fa fa-trash"></i></a>
      </td>
      </tr>
      ';
    }
    $html.='
    </table>
    </div>
    </div>
    </div>
    ';

    return $html;
  }

}

?>
