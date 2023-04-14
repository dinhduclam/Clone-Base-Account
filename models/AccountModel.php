<?php

require_once __DIR__."/services/UpdateSQLBuilder.php";
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

		if (!isset($this->firstname) || $this->firstname == ''){
			$this->setError("Invalid first name");
			return false;
		}
		if (!isset($this->lastname) || $this->lastname == ''){
			$this->setError("Invalid last name");
			return false;
		}

		if (!$this->validateAvatar()){
			$this->setError("Invalid avatar");
			return false;
		}

		return true;
	}

	public function update(){
		if ($this->validate()){
			$updateSQLBuilder = new UpdateSQLBuilder(Application::$app->db);
			$updateSQLBuilder
				->setTable('accounts')
				->update('firstname', $this->firstname)
				->update('lastname', $this->lastname)
				->update('title', $this->title)
				->update('dob', $this->dob)
				->update('phone', $this->phone)
				->update('address', $this->address);

			if (isset($this->avatar) && $this->avatar != '')
				$updateSQLBuilder->update('avatar', $this->avatar);
			
			$updateSQLBuilder->where('username', $this->username);
			$updateSQLBuilder->build()->execute();
			return true;
		}
		else
			return false;
	}

	public function loadAccountFromDb($username){
		$stmt = Application::$app->db->prepare("SELECT * FROM accounts WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();
		$account = $result->fetch_assoc();
		$this->loadData($account);
	}

	private function validateAvatar(){
		if ($_FILES['avatar']['size'] == 0)
			return true;

		$check = getimagesize($_FILES["avatar"]["tmp_name"]);

		if($check == false) {
			return false;
		}

		$uploadFileName = basename($_FILES["avatar"]["name"]);
		$target_dir = __DIR__."\..\public\avatar\\";
		$imageFileType = strtolower(pathinfo($uploadFileName, PATHINFO_EXTENSION));
		$target_file = $target_dir . $this->username . '.' . $imageFileType;

		if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
			$this->avatar = $this->username . '.' . $imageFileType;
			return true;
		} else {
			return false;
		}
	}
}