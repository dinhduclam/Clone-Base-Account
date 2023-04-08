<?php

abstract class BaseModel
{
	public string $error = '';

	public function loadData($data)
	{
		foreach ($data as $key => $value){
			if (property_exists($this, $key)){
				$this->{$key} = $value;
			}
		}
	}

	public function setError($err)
	{
		$this->error = $err;
	}

	public function hasError()
	{
		return strcmp($this->error, '') === 0;
	}

	public function getError()
	{
		return $this->error;
	}

	abstract function validate();
}

?>