<?php


class AccountModel extends BaseModel
{
	public string $firstname;
	public string $lastname;
	public string $email;
	protected string $username;
	public ?string $title;
	public ?string $avatar;
	public ?string $dob;
	public ?string $phone;
	public ?string $address;

	public function __construct($data = [])
	{
		$this->loadData($data);
	}

	public function validate(){
		$username = Application::$app->session->get('username');
		if ($username != $this->username){
			return false;
		}

		return true;
	}

	public function update(){
		if ($this->validate()){
			$stmt = Application::$app->db->prepare("UPDATE accounts SET firstname=?,lastname=?,title=?,dob=?,avatar=?,phone=?,`address`=? WHERE username=?");
			$stmt->bind_param("ssssssss", $this->firstname, $this->lastname, $this->title, $this->dob, $this->avatar, $this->phone, $this->address, $this->username);
			$stmt->execute();
			$result = $stmt->get_result();
			return $result;
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