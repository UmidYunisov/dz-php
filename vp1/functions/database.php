<?php
class DB
{
	
	public static function connect()
	{
		$config = require_once 'config.php';
		$dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
		$db = new PDO($dsn, $config['username'], $config['password']);
		return $db;
	}

}