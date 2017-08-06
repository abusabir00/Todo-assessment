<?php
/**
* Load Class 
*/
class load
{
	
	//function __construct(argument){}

	public function view($fileName, $data=null){
		include_once('operation/views/'. $fileName . '.php');
	}


	public function model($modelName){
		include_once('operation/models/'. $modelName . '.php');
		return new dataModel();
	}

	public function validation($fileName){
		include_once('operation/validation/'. $fileName . '.php');
		return new formValidation();
	}


}// End Load Claas--

 ?>