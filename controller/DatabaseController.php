<?php

class DatabaseController
{ 
	private $link;
	private $result;
	
	public function __construct() 
	{ 
		include('config.inc.php');
		$this->link = mysqli_connect($server, $username, $password) or die("Can't connect to database server!");
		mysqli_select_db($this->link, $db) or die("Can't select database!");
	} 
	
	public function doSQL($sql)
	{
		$this->result = mysqli_query($this->link, $sql);
	}
	
	public function getRecord()
	{
		if ($row = $this->result->fetch_array()) 
		{ 
			return $row;
		} 
	}
} 

?>