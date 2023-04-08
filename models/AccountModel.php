<?php


class AccountModel extends BaseModel
{
	public string $firstname;
	public string $lastname;
	public string $email;
	protected string $username;
	public ?string $title;
	public ?string $avatar;
	public ?string $phone;
	public ?string $address;

	public function __construct($data = [])
	{
		$this->loadData($data);
	}

	public function validate(){
		return true;
	}

	public function update(){
		if ($this->validate()){

		}
	}

	public function loadAccountFromDb($username){
		$stmt = Application::$app->db->prepare("SELECT * FROM accounts WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();
		$account = $result->fetch_assoc();
		$this->loadData($account);
	}
}