<?php
require_once ("BaseModel.php");

class LogoutModel extends BaseModel
{
	public string $token;

	public function __construct($data = [])
	{
		$this->loadData($data);
	}

	public function validate(){
		if (isset($this->token) && $this->token === $_SESSION['logout_token']) {
			return true;
		}

		return false;
	}

	public function generateToken(){
		if (isset($_SESSION['logout_token'])){
			return $_SESSION['logout_token'];
		}

		$token = bin2hex(random_bytes(32));
		$_SESSION['logout_token'] = $token;
		return $token;
	}
}

?>