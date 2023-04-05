<?php

require_once("../models/Credentials.php");
require_once("BaseController.php");

class AuthController extends BaseController
{
    private $credentialsModel;

	public function __construct() {
		// $this->credentialsModel = new ModelCredentials();
	}

	// GET: /login
	public function login(){
		$this->layout = 'auth';
		return $this->render('login');
	}

	// POST: /login
	public function handleLogin(){
		$data = Application::$app->request->getBody();
		var_dump($data);
		echo "handle login";
		// if (isset($_POST['login'])) {
		// 	$email = $_POST['email'];
		// 	$password = $_POST['password'];
		// 	$user = $this->credentialsModel->getUserByEmail($email);

		// 	if ($user && password_verify($password, $user['password'])) {
		//  		session_start();
		// 		$_SESSION['user'] = $user;
		// 		echo "Success";
		// 	} else {
		// 		echo "Invalid email or password";
		// 	}
		// }
	}

	// GET: /register
	public function register(){
		$this->layout = 'auth';
		echo 'register';
	}

	// POST: /register
	public function handleRegister(){
		$data = Application::$app->request->getBody();
		var_dump($data);
		echo "handle register";
	}
}


?>