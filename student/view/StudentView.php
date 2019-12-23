<?php

namespace student\view;

class StudentView {
  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function studentExamListView() {
    $html = "";

    foreach($this->data as $row) {
      $html .= '
      <p>'.$row["ten_mon_hoc"].'</p>
      <p>'.$row["ngaythi"].'</p>
      <p>'.$row["cathi"].'</p>
      <p>'.$row["room_name"].'</p>
      <br />
      ';
    }

    return $html;
  }
}

?>
