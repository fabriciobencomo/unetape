<?php

namespace core;

use PDO;
use PDOException;
use Exception;

class DataBase
{
	static private $config_key = null;
	static public $config_params = array();
	static private $config_format = null;
	static private $config_user = null;
	static private $config_pass = null;
	static private $created = false;
	static private $link = null;
	static private $statement = null;

	static public function config($key = null)
	{
		if(!isset(static::$config_params[$key])){
			throw new Exception("Parámetros de configuración - $key - no existen", 1);
			return null;
		}

		static::$config_key = $key;

		return static::class;
	}

	static public function create()
	{
		$params = static::$config_params;

		if(!is_array($params) || count($params) == 0) {
			throw new Exception("Parámetros de configuración inexistentes o incorrectos.", 1);	
			return null;
		}

		$config_params = array();
		$error = 0;
		$allowed = array("driver", "host", "port", "dbname", "user", "pass");

		foreach ($params as $key => $value) {
			if (is_array($value) && in_array($key, $allowed)) {
				$config_params[$key] = $value;
				continue;
			}else{
				if(in_array($key, $allowed)){
					$config_params['emece'][$key] = $value;
				}else{
					$error = 1;
				}
			}
		}
		
		$config_key = static::$config_key;

		if(!$config_key){
			$config_keys = array_keys($config_params);
			list($config_key) = array_slice($config_keys, 0, 1);
		}

		$params = $config_params[$config_key];

		if($error || (count($params) != count($params))){
			throw new Exception("Parámetros de conexión incorrectos", 1);
			return null;
		}

		static::$config_format = $params['driver']
			. ':host=' . $params['host']
			. ';port=' . $params['port']
			. ';dbname=' . $params['dbname'];
		static::$config_user = $params['user'];
		static::$config_pass = $params['pass'];
		static::$created = true;
		static::$link = null;

		return static::class;
	}

	static public function connect()
	{
		if (!static::$created) static::create();

		try {
			$link = @new PDO(static::$config_format, static::$config_user, static::$config_pass);

			$link->setAttribute(PDO::ATTR_PERSISTENT, false);
			$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			// $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			// $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$link->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");

			static::$link = $link;
		} catch (PDOException $e) {
			throw new Exception("Imposible conectar con la base de datos: " . $e->getMessage(), 1);
			return null;
		}

		return static::class;
	}

	static public function link()
	{
		if (!static::$link) static::connect();

		return static::$link;
	}

	static public function begin()
	{
		if (!static::$link) static::connect();

		static::$link->beginTransaction();

		return static::class;
	}

	static public function rollback()
	{
		if (!static::$link) static::connect();

		static::$link->rollback();

		return static::class;
	}

	static public function commit()
	{
		if (!static::$link) static::connect();

		static::$link->commit();

		return static::class;
	}

	static public function disconnect()
	{
		static::$link = null;

		return static::class;
	}

	static public function query($sql, $params = array())
	{
		if (!static::$link) static::connect();

		$link = static::$link;

		try {
			static::$statement = $link->prepare($sql);
		} catch (PDOException $e) {
			throw new Exception("Problemas al preparar la consulta: " . $e->getMessage(), 1);
			return null;
		}

		if (count($params) > 0) {
			static::prepare($params);
		}

		return static::execute();
	}

	static public function prepare($params = array())
	{
		foreach ($params as $key => $value) {
			try {
				static::$statement->bindValue($key, $value);
			} catch (PDOException $e) {
				throw new Exception("Problemas al enlazar los parámetros de la consulta: " . $e->getMessage(), 1);
				return null;
			}
		}

		return static::class;
	}

	static public function execute()
	{
		try {
			return static::$statement->execute();
		} catch (PDOException $e) {
			throw new Exception("Problemas al ejecutar la consulta: " . $e->getMessage(), 1);
			return null;
		}
	}

	static public function statement()
	{
		return static::$statement;
	}

	static public function sequence()
	{
		return static::$link->lastInsertId();
	}
}
