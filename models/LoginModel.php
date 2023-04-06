<?php
require_once ("BaseModel.php");

class LoginModel extends BaseModel
{
	public string $email = '';
	public string $password = '';

	public function __construct($data)
	{
		$this->loadData($data);
	}

	public function validate(){
		$stmt = Application::$app->db->prepare("SELECT email, username, password FROM credentials WHERE email = ?");
		$stmt->bind_param("s", $this->email);
		$stmt->execute();
		$result = $stmt->get_result();

		$userData = $result->fetch_assoc();
		if (password_verify($this->password, $userData['password']))
			return $userData['username'];
		else
			return false;
	}


}

?>