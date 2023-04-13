<?php
class UpdateSQLBuilder
{
	private $updateFileds = [];
	private $table;
	private $whereClause;

	public function __construct($table = '')
	{
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

	public function setWhereRaw($clause){
		$this->whereClause = $clause;
		return $this;
	}

	public function build(){
		$sqlClause = "UPDATE $this->table SET ";
		$lastElementKey = array_key_last($this->updateFileds);
		foreach ($this->updateFileds as $field => $value){
			if (is_numeric($value))
				$sqlClause .= $field . '=' . $value;
			else
				$sqlClause .= $field . '=\'' . $value . '\'';

			if ($field != $lastElementKey)
				$sqlClause .= ',';
		}

		if (isset($this->whereClause))
			$sqlClause .= ' WHERE ' . $this->whereClause;

		return $sqlClause;
	}
}
