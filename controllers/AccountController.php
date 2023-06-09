<?php

require_once("../models/AccountModel.php");
require_once("BaseController.php");

class AccountController extends BaseController
{
	public function __construct()
	{
	}

	// GET: /account
	public function show()
	{
		$username = Application::$app->session->get('username');
		if (!$username){
			Application::$app->response->redirect('/login');
		}

		$accountModel = new AccountModel();
		$accountModel->loadAccountFromDb($username);

		$logoutModel = new LogoutModel();
		$token = $logoutModel->generateToken();

		$param = [
			"firstname" => $accountModel->firstname,
			"lastname" => $accountModel->lastname,
			"fullname" => $accountModel->lastname.' '.$accountModel->firstname,
			"email" => $accountModel->email,
			"username" => $username,
			"avatar" => $accountModel->avatar,
			"title" => $accountModel->title,
			"phone" => $accountModel->phone,
			"address" => $accountModel->address,
			"logoutToken" => $token,
			"hasError" => $accountModel->hasError(),
			"error" => $accountModel->getError(),
		];

		return $this->render('account', $param);
	}

	//GET: api/account/info
	public function get()
	{
		$username = Application::$app->session->get('username');
		if (!$username){
			return null;
		}
		$accountModel = new AccountModel();
		$accountModel->loadAccountFromDb($username);

		$data = [
			"firstname" => $accountModel->firstname,
			"lastname" => $accountModel->lastname,
			"email" => $accountModel->email,
			"username" => $username,
			"title" => $accountModel->title,
			"dob" => $accountModel->dob,
			"phone" => $accountModel->phone,
			"address" => $accountModel->address
		];

		return json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	// POST: /api/account/edit
	public function edit()
	{
		$username = Application::$app->session->get('username');
		if (!$username){
			return null;
		}
		$data = Application::$app->request->getBody();
		if ($username != $data['username']){
			return null;
		}

		$accountModel = new AccountModel($data);
		if ($accountModel->update()){
			return json_encode([
				"success" => true,
				"message" => "Update successfully!"
			], JSON_UNESCAPED_UNICODE);
		}
		else {
			return json_encode([
				"success" => false,
				"message" => $accountModel->getError()
			], JSON_UNESCAPED_UNICODE);
		}
	}
}

?>