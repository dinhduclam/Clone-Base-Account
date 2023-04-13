<?php
class SQLConditionBuilder
{
	private $conditionClause;

	public function __construct()
	{
		$this->conditionClause = '';
	}

	public function equal($field, $value){
		$field = htmlspecialchars($field);
		$value = htmlspecialchars($value);
		if (is_numeric($value))
			$this->conditionClause .= $field . '=' . $value;
		else $this->conditionClause .= $field . '=\'' . $value .'\'';
		return $this;
	}

	public function andEqual($field, $value){
		$this->conditionClause .= ' AND ' . $this->equal($field, $value);
		return $this;
	}

	public function orEqual($field, $value){
		$this->conditionClause .= ' OR ' . $this->equal($field, $value);
		return $this;
	}

	public function build(){
		return $this->conditionClause;
	}
}
