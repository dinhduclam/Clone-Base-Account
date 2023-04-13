<?php

require_once("../models/LoginModel.php");
require_once("../models/LogoutModel.php");
require_once("../models/RegisterModel.php");
require_once("BaseController.php");

class AuthController extends BaseController
{
	private string $siteKey;

	public function __construct()
	{
		$this->siteKey = Application::$app->env['SITE_KEY'];
	}

	// GET: /login
	public function login()
	{
		if (isset($_SESSION['username'])){
			header('Location: /account');
		}
		$this->layout = 'auth';
		return $this->render('login', [
			"siteKey" => $this->siteKey,
			"title" => 'Login - Base Account'
		]);
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
				"title" => 'Login - Base Account',
				"email" => $loginModel->email,
				"hasError" => $loginModel->hasError(),
				"error" => $loginModel->getError(),
				"siteKey" => $this->siteKey
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
		echo $this->render('register',[
			"siteKey" => $this->siteKey,
			"title" => 'Register - Base Account'
		]);
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
				"title" => 'Register - Base Account',
				"email" => $registerModel->email,
				"username" => $registerModel->username,
				"name" => $registerModel->name,
				"hasError" => $registerModel->hasError(),
				"error" => $registerModel->getError(),
				"siteKey" => $this->siteKey
			];
			$this->layout = 'auth';
			return $this->render('register', $param);
		}
	}

	// GET: /logout?token=?
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