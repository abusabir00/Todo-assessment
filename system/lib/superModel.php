<?php 
/**
* Super Model Class-------
*/
class superModel
{
	protected $db = array();

	function __construct(){
		$this->db = new dbSqlite();
	}

}//End Super Class------



?>