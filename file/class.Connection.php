<?php

$filepath = realpath (dirname(__FILE__));
include_once($filepath."/Config.php");

 class Connection{
     
  protected $MYSQL_SERVER;
  protected $MYSQL_USER;
  protected $MYSQL_PASS;
  protected $MYSQL_DB;
  protected $conn;
  
  function __construct() {
      if(defined('MYSQL_SERVER')) $this->MYSQL_SERVER=MYSQL_SERVER;
      if(defined('MYSQL_USER'))   $this->MYSQL_USER=MYSQL_USER;
      if(defined('MYSQL_PASS'))   $this->MYSQL_PASS=MYSQL_PASS;
      if(defined('MYSQL_DB'))     $this->MYSQL_DB=MYSQL_DB;
  }
  
  
  
    //function for creating the connection to the database
    function open() 
    {   
	        $this->conn=mysql_connect($this->MYSQL_SERVER,  $this->MYSQL_USER,  $this->MYSQL_PASS) or die(mysql_error());
		if($this->conn){
		//echo "connectioin created successfully";
		mysql_select_db($this->MYSQL_DB) or die(mysql_error());
		}else{
		   //echo "could not connect to the database";
		}
    }

    // close the connection
    function close() 
    {   mysql_close($this->conn);
    }
}
?>
