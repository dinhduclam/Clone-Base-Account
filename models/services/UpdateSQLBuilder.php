<?php
class UpdateSQLBuilder
{
	private $updateFileds = [];
	private $whereFileds = [];
	private $table;
	private $conn;
	private $stmt;

	public function __construct($conn, $table = '')
	{
		$this->conn = $conn;
		$this->table = $table;
	}

	public function update($field, $value){
		$field = htmlspecialchars($field);
		$value = htmlspecialchars($value);

		$this->updateFileds += [$field => $value];
		return $this;
	}

	public function setTable($table){
		$this->table = $table;
		return $this;
	}

	public function where($field, $value){
		$field = htmlspecialchars($field);
		$value = htmlspecialchars($value);

		$this->whereFileds += [$field => $value];
		return $this;
	}

	public function build(){
		$sqlClause = "UPDATE $this->table SET ";
		$lastElementKey = array_key_last($this->updateFileds);

		foreach ($this->updateFileds as $field => $value){
			$sqlClause .= $field . '=?';

			if ($field != $lastElementKey)
				$sqlClause .= ',';
		}

		if (!empty($this->whereFileds)){
			$sqlClause .= " WHERE ";
			$lastElementKey = array_key_last($this->whereFileds);
			foreach ($this->whereFileds as $field => $value){
				$sqlClause .= $field . '=?';
				if ($field != $lastElementKey)
					$sqlClause .= ',';
			}
		}

		$this->stmt = $this->conn->prepare($sqlClause);

		return $this;
	}

	public function execute(){
		$type = '';
		$values = [];
		foreach ($this->updateFileds as $field => $value){
			$type .= $this->get_param_type($value);
			$values[] = $value;
		}
		foreach ($this->whereFileds as $field => $value){
			$type .= $this->get_param_type($value);
			$values[] = $value;
		}

		$this->stmt->bind_param($type, ...$values);

		$this->stmt->execute();
	}

	private function get_param_type($param) {
		if (is_int($param)) {
			return 'i';
		} elseif (is_float($param)) {
			return 'd';
		} elseif (is_string($param)) {
			return 's';
		} elseif (is_bool($param)) {
			return 'i';
		} elseif (is_null($param)) {
			return 's';
		} elseif (is_resource($param)) {
			return 'b';
		} else {
			return null;
		}
	}
}
