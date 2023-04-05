<?php

include_once("entity_credentials.php");

class ModelCredentials
{
	private $db;

	public function __construct()
	{
		$this->db = new mysqli('localhost', '', '', 'base_account');
		if ($this->db->connect_errno) {
			die('Could not connect to database!');
		}
	}

	public function getUserByEmail($email)
	{
		$stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			return $result->fetch_assoc();
		} else {
			return null;
		}
	}


}

?>