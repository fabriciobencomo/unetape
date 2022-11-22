<?php

namespace core\database;

use core\DataBase;
use PDO;

class Model
{
	private $result = null;
	private $statement = null;

	public function query($sql, $params = array())
	{
		$query = DataBase::query($sql, $params);

		if($query) {
			$this->result = $query;
			$this->statement = DataBase::statement();
		}

		return $this;
	}

	public function result(){
		return $this->result;
	}

	public function row()
	{
		if(!$this->result) return null;

		$statement = $this->statement;

		$statement->setFetchMode(PDO::FETCH_CLASS, get_class($this));

		return $statement->fetch();
	}

	public function all()
	{
		if(!$this->result) return array();

		$statement = $this->statement;

		$statement->setFetchMode(PDO::FETCH_CLASS, get_class($this));

		return $statement->fetchAll();
	}

	public function count(){
		if(!$this->result) return null;

		$statement = $this->statement;

		return $statement->rowCount();
	}
}
