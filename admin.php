<?php
  include("header.php");

  if (isset($_SESSION["username"])) {
    if ($_SESSION["isAdmin"] != 1) {
  		header("Location: student.php?location=home");
  	}
  }
  else {
    header("Location: index.php");
  }

  require_once("admin/control/DataManager.php");
  $dataMgr = new \admin\control\DataManager();

  require_once("admin/control/ExcelControl.php");
  $excelCtrl = new ExcelControl();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Home</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="css/style5.css">
  <!-- Font Text -->
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <a href="./admin.php?location=home"><h3><i class="fas fa-school"></i> ABC UNI</h3></a>
      </div>

      <ul class="list-unstyled components">
        <li>
          <a href="./admin.php?location=student"><div style="display:inline-block; width: 30px;">
            <i class="fas fa-user" style="margin-right:4px;"></i>
          </div> Sinh viên</a>
        </li>
        <li>
          <a href="./admin.php?location=monhoc"><div style="display:inline-block; width: 30px;">
            <i class="fas fa-book-open " style="margin-right:4px;"></i>
          </div> Môn học</a>
        </li>
        <li>
          <a href="./admin.php?location=kythi"><div style="display:inline-block; width: 30px;">
            <i class="fas fa-eye-dropper" style="margin-right:4px;"></i>
          </div> Kỳ thi</a>
        </li>
        <li>
          <a href="./admin.php?location=excel"><div style="display:inline-block; width: 30px;">
            <i class="fas fa-file-excel" style="margin-right:4px;"></i>
          </div> Import Excel</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="./index.php?logout">Chào mừng: <?php echo $_SESSION["fullname"]; ?></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <?php if ($_GET["location"] == "home"): ?>
        <h2>THÔNG BÁO - HƯỚNG DẪN</h2>
        <div class="line"></div>
        <p>- Thời gian đăng ký  thi trực tuyến: từ 11/12/2019 - 19/12/2019.</p>
        <p>- Thời gian điều chỉnh đăng ký thi trực tuyến: từ 3/2/2020 - 16/2/2020 (2 tuần cuối của kỳ).</p>
        <p>- Sinh viên các chương trình đào tạo chuẩn không đăng ký thi tại các lớp thi phần dành cho sinh viên các chương trình chất lượng cao thông tư 23.</p>
        <p>- Ngược lại, sinh viên các chương trình chất lượng cao TT23 không đăng ký thi tại các lớp thi phần dành cho sinh viên chương trình đào tạo chuẩn.</p>
        <div class="line"></div>
      <?php elseif ($_GET["location"] == "student"): echo $dataMgr->showStudentList(); ?>
      <?php elseif ($_GET["location"] == "monhoc"): echo $dataMgr->showCourseList(); ?>
      <?php elseif ($_GET["location"] == "kythi"): echo $dataMgr->showSemesterList(); ?>
      <?php elseif ($_GET["location"] == "excel"): echo $excelCtrl->importExcel(); ?>
      <?php endif; ?>


    </div>
  </div>

  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  <script type="text/javascript">
  $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
      $(this).toggleClass('active');
    });
  });
  </script>
</body>

</html>
