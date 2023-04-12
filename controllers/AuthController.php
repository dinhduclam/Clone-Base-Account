<?php

require_once("../models/LoginModel.php");
require_once("../models/LogoutModel.php");
require_once("../models/RegisterModel.php");
require_once("BaseController.php");

class AuthController extends BaseController
{
	public function __construct()
	{
	}

	// GET: /login
	public function login()
	{
		if (isset($_SESSION['username'])){
			header('Location: /account');
		}
		$this->layout = 'auth';
		return $this->render('login');
	}

	// POST: /login
	public function handleLogin()
	{
		$data = Application::$app->request->getBody();

		$loginModel = new LoginModel($data);

		$res = $loginModel->validate();

		if ($res){
			Application::$app->session->set('username', $res);
			Application::$app->response->redirect("/account");
		}
		else{
			$param = [
				"email" => $loginModel->email,
				"hasError" => $loginModel->hasError(),
				"error" => $loginModel->getError()
			];
			$this->layout = 'auth';
			return $this->render('login', $param);
		}
	}

	// GET: /register
	public function register()
	{
		if (isset($_SESSION['username'])){
			header('Location: /account');
		}
		$this->layout = 'auth';
		echo $this->render('register');
	}

	// POST: /register
	public function handleRegister()
	{
		$data = Application::$app->request->getBody();

		$registerModel = new RegisterModel($data);

		if ($registerModel->validate() && $registerModel->save()){
			//session
			Application::$app->response->redirect("/login");
		}
		else {
			$param = [
				"email" => $registerModel->email,
				"username" => $registerModel->username,
				"name" => $registerModel->name,
				"hasError" => $registerModel->hasError(),
				"error" => $registerModel->getError()
			];
			$this->layout = 'auth';
			return $this->render('register', $param);
		}
	}

	// GET: /logout
	// POST: /logout
	public function logout()
	{
		$data = Application::$app->request->getBody();
		$logoutModel = new LogoutModel($data);

		if ($logoutModel->validate()){
			session_unset();
			session_destroy();
			header('Location: /login');
		}
		else {
			header("Location: /account");
		}
	}
}

?>