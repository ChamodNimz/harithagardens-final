<?php 

require_once 'connection.php';

/**
 * Model
 */

class Model
{

	protected $username;
	protected $server;
	protected $password;
	protected $database;
	protected $connection;

	function __construct($server,$username,$password,$database)
	{
		$this->username=$username;
		$this->server=$server;
		$this->password=$password;
		$this->database=$database;

	}

	function __construct(){

		
	}

	public function getConnection(){

		return $this->connection;
	}

}

?>