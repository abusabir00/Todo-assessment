<?php 
/**
* Form Validation Class
*/
class formValidation
{
	public $currentValues;
	public $values = array();
	public $errors = array();

	function __construct(){}

	//Function for get post value
	public function post($key){
		$this->values[$key] = trim($_POST[$key]);
		$this->currentValues = $key;
		return $this; 
	}

	//Function for check empty Field
	public function isEmpty(){
		if(empty($this->values[$this->currentValues])){
			$this->errors[$this->currentValues]['empty'] = "Requared Field Must Not be Empty";
		}
		return $this;
	}

	//Function for check min & max value
	public function length($min=0, $max){
	if(strlen($this->values[$this->currentValues]) < $min or strlen($this->values[$this->currentValues])>$max){
		$this->errors[$this->currentValues]['length'] = "Minimum ".$min." Maximum ".$max. "Charecter" ;
	}
	return $this;
	}

	//Function For Submission Check
	public function submit(){
		if (empty($this->errors)) {
			return true;
		}else{
			return false;
		}
	}





}// End Validation Class ......




?>