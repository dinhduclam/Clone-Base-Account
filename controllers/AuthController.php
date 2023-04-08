<?php

require_once("../models/LoginModel.php");
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
				"email" => $loginModel->email
			];
			$this->layout = 'auth';
			return
				$this->render('login', $param);
		}
	}

	// GET: /register
	public function register()
	{
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
				"name" => $registerModel->name
			];
			$this->layout = 'auth';
			return $this->render('register', $param);
		}
	}

	// GET: /logout
	// POST: /logout
	public function logout()
	{
		session_destroy();
		Application::$app->response->redirect('/login');
	}
}

?>