<?php

require_once('BaseModel.php');

class RegisterModel extends BaseModel
{
	public string $email = '';
	public string $username = '';
	public string $name = '';
	public string $password = '';
	public string $confirmPassword = '';

	public function __construct($data = [])
	{
		$this->loadData($data);
	}

	public function validate()
	{
		if (!$this->email){
			$this->setError('Invalid or empty email. Please try again.');
			return false;
		}
		if (!$this->username){
			$this->setError('Invalid or empty username. Please try again.');
			return false;
		}
		if (!$this->name){
			$this->setError('Invalid or empty name. Please try again.');
			return false;
		}
		if (!$this->password){
			$this->setError('Invalid password. Please try again.');
			return false;
		}
		if ($this->password != $this->confirmPassword){
			$this->setError('Confirm password is not correct. Please try again.');
			return false;
		}
		if ($this->emailDuplicated()){
			$this->setError('Email existed. Please try again.');
			return false;
		}
		if ($this->usernameDuplicated()){
			$this->setError('Username existed. Please try again.');
			return false;
		}

		return true;
	}

	public function save()
	{
		$passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
		$words = explode(" ", $this->name);
		$firstname = array_pop($words);
		$lastname = implode(" ", $words);

		$stmt1 = Application::$app->db->prepare("INSERT INTO credentials(email, username, password) VALUES (?, ?, ?)");
		$stmt1->bind_param("sss", $this->email, $this->username, $passwordHash);

		$stmt2 = Application::$app->db->prepare("INSERT INTO accounts(firstname, lastname, email, username) VALUES (?, ?, ?, ?)");
		$stmt2->bind_param("ssss", $firstname, $lastname, $this->email, $this->username);

		mysqli_begin_transaction(Application::$app->db);

		try {
			$stmt1->execute();
			$stmt2->execute();
			mysqli_commit(Application::$app->db);
		} catch (Exception $e) {
			$this->setError("Something went wrong!");
			mysqli_rollback(Application::$app->db);
			return false;
		}

		return true;
	}

	private function emailDuplicated()
	{
		$stmt = Application::$app->db->prepare("SELECT * FROM credentials WHERE email = ?");
		$stmt->bind_param("s", $this->email);
		$stmt->execute();
		$result = $stmt->get_result();
		return mysqli_num_rows($result) > 0;
	}

	private function usernameDuplicated()
	{
		$stmt = Application::$app->db->prepare("SELECT * FROM credentials WHERE username = ?");
		$stmt->bind_param("s", $this->username);
		$stmt->execute();
		$result = $stmt->get_result();
		return mysqli_num_rows($result) > 0;
	}
}

?>