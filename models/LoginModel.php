<?php
require_once ("BaseModel.php");
require_once ("CaptchaModel.php");

class LoginModel extends BaseModel
{
	public string $email = '';
	public string $password = '';

	public function __construct($data = [])
	{
		$this->loadData($data);
	}

	public function validate(){
		if (!$this->email){
			$this->setError('Invalid or empty email. Please try again.');
			return false;
		}
		if (!$this->password){
			$this->setError('Invalid password. Please try again.');
			return false;
		}

		$recaptcha_response = $_POST['g-recaptcha-response'];
		if (!CaptchaModel::confirmCaptcha($recaptcha_response)) {
			$this->setError('Invalid captcha. Please try again.');
			return false;
		}

		$stmt = Application::$app->db->prepare("SELECT email, username, password FROM credentials WHERE email = ?");
		$stmt->bind_param("s", $this->email);
		$stmt->execute();
		$result = $stmt->get_result();

		$userData = $result->fetch_assoc();
		if (password_verify($this->password, $userData['password']))
			return $userData['username'];
		else{
			$this->setError('Email and password doesn\'t match.');
			return false;
		}
	}
}

?>