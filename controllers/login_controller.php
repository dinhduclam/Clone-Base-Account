<?php

require_once("../models/model_credentials.php");

class LoginController
{
    private $credentialsModel;

	public function __construct() {
		$this->credentialsModel = new ModelCredentials();
	}

	public function index() {
		include '../views/login.php';
	}

	public function login() {
		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$user = $this->credentialsModel->getUserByEmail($email);

			if ($user && password_verify($password, $user['password'])) {
				session_start();
				$_SESSION['user'] = $user;
				header('Location: index.php');
			} else {
				echo "Invalid email or password";
			}
		}
	}
}

$loginController = new LoginController();
$loginController-> login();

?>