<?php
namespace account\control;

require_once("account/view/AccountView.php");
require_once("account/model/Account.php");

class AccountCtrl {
	public function __contruct() {

	}

	public function checkAuthentication() {
		session_start();
		if (isset($_POST["username"]) && $_POST["username"] != ""){
			$this->doLogin();
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

				$infor = $account->getAccountInformation($_SESSION["username"]);
				$_SESSION["user_id"] = $infor["user_id"];
				$_SESSION["fullname"] = $infor["fullname"];
				$_SESSION["isAdmin"] = $infor["isAdmin"];

				if ($_SESSION["isAdmin"]) {
					header("Location: admin.php?location=home");
				}
				else {
					header("Location: student.php");
				}
			}
			else {
				$message = "Failed to login: Username or password not found.";
				echo "
				<script type='text/javascript'>
					alert('$message');
				</script>";

				header("refresh:1; url=index.php"); //Reload page after 1 sec
			}
		}
	}

	public function doLogout() {
		session_destroy();
		// session_start();
		// unset($_SESSION["username"]);
		header("Location: index.php");
		$this->login();
	}
}
