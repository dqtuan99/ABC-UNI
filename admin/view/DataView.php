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
		$html .= '
      <div>
      <div id="table-wrapper">
      <div id="table-scroll">
      <table>
      <tr>
      <th>Mã Sinh viên</th>
      <th>Tên tài khoản</th>
      <th>Tên học sinh</th>
      <th></th>
      </tr>';
      foreach ($this->data as $row){
        $html .= '
        <tr>
        <td>'.$row["user_id"].'</td>
        <td>'.$row["username"].'</td>
        <td>'.$row["fullname"].'</td>
        <td id="btnevd"><button id = "button-edit"><i class="fas fa-edit"></i></button><button id = "button-delete"><i class="fas fa-trash"></i></button></td>
        </tr>
        ';
      }
      $html.='
      </table>
      </div>
      </div>
      </div>';
      
    }

    return $html;
  }

  public function courseListView() {
    $html = "";

    $html .= '
    <a href="'.$this->addPath.'">Them mon hoc</a>
    <a href="'.$this->modifyPath.'">Sua mon hoc</a>
    <a href="'.$this->deletePath.'">Xoa mon hoc</a>
    ';

    if (isset($_GET["modify"]) && $_GET["modify"] == "add"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="course_added" value="1"/>
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
    if (isset($_GET["modify"]) && $_GET["modify"] == "delete"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="course_deleted" value="1"/>
        Course id:<br>
        <input type="text" name="course_id" placeholder="Course id" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }

    if (count($this->data) == 0) {
      $html .= "Khong ton tai mon hoc nao.";
    }
    else {
      // foreach ($this->data as $row){
        // $new_path = $this->current_path . '&&hocphan_id=' . $row["hocphan_id"];
        // $html .= '
        // <a href="'.$new_path.'"><p>'.$row["hocphan_id"].'</p></a>
        // <p>'.$row["ten_mon_hoc"].'</p>
        // <p>'.$row["fullname"].'</p>
        // <br />
        // ';
      // }
      $html .= '
      <div>
      <div id="table-wrapper">
      <div id="table-scroll">
      <table>
      <tr>
      <th>Mã Môn Học</th>
      <th>Tên Môn học</th>
      <th>Tên giảng viên</th>
      <th></th>
      </tr>';
      foreach ($this->data as $row){
        $html .= '
        <tr>
        <td>'.$row["hocphan_id"].'</td>
        <td>'.$row["ten_mon_hoc"].'</td>
        <td>'.$row["fullname"].'</td>
        <td id="btnevd"><button id = "button-edit"><i class="fas fa-edit"></i></button><button id = "button-delete"><i class="fas fa-trash"></i></button></td>
        </tr>
        ';
      }
      $html.='
      </table>
      </div>
      </div>
      </div>';
    }

    return $html;
  }

  public function semesterListView() {
    $html = "";

    $html .= '
    <a href="'.$this->addPath.'">Them ky thi</a>
    <a href="'.$this->modifyPath.'">Sua ky thi</a>
    <a href="'.$this->deletePath.'">Xoa ky thi</a>
    ';

    if (isset($_GET["modify"]) && $_GET["modify"] == "add"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="semester_added" value="1"/>
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
    if (isset($_GET["modify"]) && $_GET["modify"] == "delete"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="semester_deleted" value="1"/>
        Semester id:<br>
        <input type="text" name="semester_id" placeholder="Semester id" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }

    if (count($this->data) == 0) {
      $html .= "Khong ton tai ky thi nao.";
    }
    else {
		$html .= '
      <div>
      <div id="table-wrapper">
      <div id="table-scroll">
      <table>
      <tr>
      <th>Mã Sinh viên</th>
      <th>Tên tài khoản</th>
      <th></th>
      </tr>';
      foreach ($this->data as $row){
		$new_path = $this->current_path . '&&kythi_id=' . $row["kythi_id"];
        $html .= '
        <tr>
        <td ><a href="'.$new_path.'">'.$row["kythi_id"].'</a></td>
        <td>'.$row["ten_ky_thi"].'</td>
        <td id="btnevd"><button id = "button-edit"><i class="fas fa-edit"></i></button><button id = "button-delete"><i class="fas fa-trash"></i></button></td>
        </tr>
        ';
      }
      $html.='
      </table>
      </div>
      </div>
      </div>';
      
    }

    return $html;
  }

  public function examListView() {
    $getAllPath = $this->current_path . '&&getAll=1';
    $html = "";

    $html .= '
    <a href="'.$this->addPath.'">Them ca thi</a>
    <a href="'.$this->modifyPath.'">Sua ca thi</a>
    <a href="'.$this->deletePath.'">Xoa ca thi</a>
    <a href="'.$getAllPath.'">Get all</a>
    ';

    if (isset($_GET["modify"]) && $_GET["modify"] == "add"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="exam_added" value="1"/>
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
        Ca thi:<br>
        <input type="text" name="cathi" placeholder="Ca thi" required>
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
        Ca thi:<br>
        <input type="text" name="cathi" placeholder="Ca thi" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }
    if (isset($_GET["modify"]) && $_GET["modify"] == "delete"){
      $html .= '
        <form method="post" action="">
        <input type="hidden" name="exam_deleted" value="1"/>
        Exam id:<br>
        <input type="text" name="exam_id" placeholder="Exam id" required>
        <br>
        <input type="submit" value="Submit">
        </form>
      ';
    }

    if (count($this->data) == 0) {
      $html .= "<br />Ky thi nay khong ton tai ca thi nao ca.";
    }
    else {
		$html .= '
      <div>
      <div id="table-wrapper">
      <div id="table-scroll">
      <table>
      <tr>
      <th>Mã ca thi</th>
      <th>Mã học phần</th>
	  <th>Tên môn học</th>
	  <th>Phòng</th>
	  <th>Ngày thi</th>
	  <th>Ca thi</th>
      <th></th>
      </tr>';
      foreach ($this->data as $row){
		$new_path = $this->current_path . '&&kythi_id=' . $row["kythi_id"];
        $html .= '
        <tr>
        <td>'.$row["cathi_id"].'</td>
        <td>'.$row["hocphan_id"].'</td>
		<td>'.$row["ten_mon_hoc"].'</td>
		<td>'.$row["room_name"].'</td>
		<td>'.$row["ngaythi"].'</td>
		<td>'.$row["cathi"].'</td>
        <td id="btnevd"><button id = "button-edit"><i class="fas fa-edit"></i></button><button id = "button-delete"><i class="fas fa-trash"></i></button></td>
        </tr>
        ';
      }
      $html.='
      </table>
      </div>
      </div>
      </div>';

    }

    return $html;
  }

  public function studentByExamView() {
    $html = "";

    $html .= '<h3>Ca thi: '.$this->data[0]["cathi"].'</h3>';
    $html .= '<h3>Ngay thi: '.$this->data[0]["ngaythi"].'</h3>';
    $html .= '<h3>Phong thi: '.$this->data[0]["room_name"].'</h3>';
    $html .= '<h3>Ma mon hoc: '.$this->data[0]["hocphan_id"].'</h3>';
    $html .= '<h3>Mon thi: '.$this->data[0]["ten_mon_hoc"].'</h3>';

    $html .= 'Masv | ';
    $html .= 'Username | ';
    $html .= 'Fullname<br />';

    foreach($this->data as $std){
      $html .= $std["sv_id"] . ' | ';
      $html .= $std["username"] . ' | ';
      $html .= $std["fullname"] . '<br />';
    }

    return $html;

  }

  public function studentByCourseView() {
    $html ="";

    foreach($this->data as $std){
      $html .= $std["sv_id"] . ' | ';
      $html .= $std["username"] . ' | ';
      $html .= $std["fullname"] . ' | ';
      $html .= $std["banned"] . '<br />';
    }

    return $html;
  }

}
