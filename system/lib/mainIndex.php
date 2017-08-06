<?php
/**
* Main Index Class From Library
*/
class mainIndex
{
	public $url;
	public $operatorName = 'indexOperator';
	public $operatorPath = 'operation/operators/';
	public $operator;
	public $methodName = 'dataList';
	
	function __construct(){
		$this->getUrl();
		$this->loadOperator();
		$this->getMethod();
	}

	function getUrl(){
		$this->url = isset($_GET['url'])? $_GET['url'] : null;

		 if($this->url!=null){
		 $this->url = rtrim($this->url,'/');
		 $this->url = explode('/',filter_var($this->url, FILTER_SANITIZE_URL));
		 }else{ unset($this->url); 
		}
	}

	function loadOperator(){
		if(!isset($this->url[0])){
			include $this->operatorPath . $this->operatorName.'.php';
			$this->operator = new $this->operatorName();
		}else{
			$this->operatorName = $this->url[0];
			$fileName = $this->operatorPath . $this->operatorName.'.php';
			if(file_exists($fileName)){
				include $fileName;
				if(class_exists($this->operatorName)){
				$this->operator = new $this->operatorName();
				}else{ header(BASE_URL.'/indexOperator'); }
			}else{}
		}
	}

	function getMethod(){
		if(isset($this->url[2])){
			$this->methodName = $this->url[1];
			if(method_exists($this->operatorName, $this->methodName)){
				$this->operator->{$this->methodName}($this->url[2]);
			}else{ header(BASE_URL.'/indexOperator');}
		}else{ 
			if(isset($this->url[1])){
				$this->methodName = $this->url[1];
				if(method_exists($this->operatorName, $this->methodName)){
					$this->operator->{$this->methodName}();
				}else{ header(BASE_URL.'/indexOperator'); }
			}else{
				if(method_exists($this->operatorName, $this->methodName)){
					$this->operator->{$this->methodName}();
				}else{ header(BASE_URL.'/indexOperator'); }
			}
		}
	}



}// End Main Index Class---


 ?>