<?php
require_once ("BaseModel.php");

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

		$recaptcha_secret = Application::$app->env['CAPTCHA_SECRET'];
		$recaptcha_response = $_POST['g-recaptcha-response'];
		$remote_ip = $_SERVER['SERVER_NAME'];

		$url = Application::$app->env['RECAPTCHA_URL'];
		$data = array(
			'secret' => $recaptcha_secret,
			'response' => $recaptcha_response,
			'remoteip' => $remote_ip
		);

		$options = array(
			'http' => array (
				'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);

		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$response = json_decode($result, true);

		if ($response['success'] == false) {
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