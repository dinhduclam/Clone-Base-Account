<?php
class EntityCredentials
{
	public $username;
	public $email;
	public $name;
	public $password;

	public function __construct($_username, $_email, $_name, $_password)
	{
		$this->username = $_username;
		$this->email = $_email;
		$this->name = $_name;
		$this->password = $_password;
	}
}

?>