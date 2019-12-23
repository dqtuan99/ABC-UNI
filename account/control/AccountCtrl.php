<?php
namespace account\control;

require_once("account/view/AccountView.php");
require_once("account/model/Account.php");

class AccountCtrl {
	public function __contruct() {

	}

  // Xác thực phiên đăng nhập
	public function checkAuthentication() {
		session_start();
		if (isset($_POST["username"]) && $_POST["username"] != ""){
			$this->doLogin();
		}
    if (isset($_GET["logout"])){
			$this->doLogout();
		}
	}

	public function doLogin() {
		if (isset($_SESSION["username"])){
			return; // Da dang nhap san roi, khong check nua
		}

		if (isset($_POST["username"]) && isset($_POST["password"])){
			$account = new \account\model\Account();
			if ($account->checkAccount($_POST["username"], $_POST["password"])){
				$_SESSION["username"] = $_POST["username"];

				// Lấy thông tin user lưu vào session để sử dụng
				$infor = $account->getAccountInformation($_POST["username"]);
				$_SESSION["user_id"] = $infor["user_id"];
				$_SESSION["fullname"] = $infor["fullname"];
				$_SESSION["isAdmin"] = $infor["isAdmin"];

				// Điều hướng sang các template khác nhau dựa trên user type của người dùng
				if ($_SESSION["isAdmin"] == 1) {
					header("Location: admin.php?location=home");
				}
				else {
					header("Location: student.php?location=home");
				}
			}
			else {
				// Thông báo lỗi
				$message = "Failed to login: Username or password not found.";
				echo "
				<script type='text/javascript'>
					alert('$message');
				</script>";

				header("refresh:1; url=index.php"); //Reload page after 1 sec
			}
		}
	}

	// Hủy session để đăng xuất
	public function doLogout() {
		session_destroy();
		// session_start();
		// unset($_SESSION["username"]);
		// unset($_SESSION["isAdmin"]);
		header("Location: index.php");
	}
}
