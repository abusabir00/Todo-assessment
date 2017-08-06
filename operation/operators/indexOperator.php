<?php

/**
* 
*/
class indexOperator extends superOperator
{
	
	function __construct(){ parent::__construct(); }

	public function addData(){ $this->load->view('home');}

// Read Data Function ---------------------------------------
	public function dataList(){ 
	$listObject =	$this->load->model('dataModel');
	$data = $listObject->dataList(); //var_dump($data);
	$this->load->view('dataList',$data);
	}

// Inser Data Function ---------------------------------------
	public function insertData(){
		$validationObject = $this->load->validation('formValidation');
		$validationObject ->post('title')
						  ->isEmpty()
						  ->length(10,100);

		$validationObject ->post('status')
						  ->isEmpty();

		$validationObject ->post('startDate')
						  ->isEmpty();		  				  

		$validationObject ->post('dueDate')
						  ->isEmpty();

		$tableName = 'tasktable';				  

		$title = $validationObject->values['title'];
		$status = $validationObject->values['status'];
		$startDate = $validationObject->values['startDate'];
		$dueDate = $validationObject->values['dueDate'];
		$priority = trim($_POST['priority']);
		$completion = trim($_POST['completion']);
		$comment = trim($_POST['comm']);				  

		if($validationObject->submit()){
		$allData = array(
			'title' => $title,
			'status' => $status,
			'startDate' => $startDate,
			'dueDate' => $dueDate,
			'priority' => $priority,
			'completion' => $completion,
			'comment' => $comment
			);  

	$listObject = $this->load->model('dataModel');
	$result = $listObject->dataInsert($tableName,$allData );
	$msg = array();

	if($result){$msg = "Data Successfully Added !";}else{$msg = "Data Not Added! Error!";}
	$url = BASE_URL	.'/indexOperator/dataList?msg='.urlencode(serialize($msg));
	header('location:'. $url);
	}else{
		$data = $validationObject->errors; //var_dump($error);
		$this->load->view('home',$data);
	}
}

// Edit Data Function ---------------------------------------
	public function dataEdit($dataId){
		$tableName = 'tasktable';
		$listObject = $this->load->model('dataModel');
		$data = $listObject->DataById($tableName,$dataId);
		$this->load->view('dataEdit',$data);	
	}

//Update Data Function ---------
public function updateData($dataId){ 
$validationObject = $this->load->validation('formValidation');
	$validationObject ->post('title')
					  ->isEmpty()
					  ->length(10,100);

	$validationObject ->post('status')
					  ->isEmpty();

	$validationObject ->post('startDate')
					  ->isEmpty();		  				  

	$validationObject ->post('dueDate')
					  ->isEmpty();

	$tableName = 'tasktable';
	$count = 'id = '.$dataId;				  

	$title = $validationObject->values['title'];
	$status = $validationObject->values['status'];
	$startDate = $validationObject->values['startDate'];
	$dueDate = $validationObject->values['dueDate'];
	$priority = trim($_POST['priority']);
	$completion = trim($_POST['completion']);
	$comment = trim($_POST['comm']);				  

	if($validationObject->submit()){
	$allData = array(
		'title' => $title,
		'status' => $status,
		'startDate' => $startDate,
		'dueDate' => $dueDate,
		'priority' => $priority,
		'completion' => $completion,
		'comment' => $comment
		);  

	$listObject = $this->load->model('dataModel');
	$result = $listObject->updateData($tableName,$allData,$count);
	$msg = array();

	 if($result){$msg = "Data Successfully Updated !";}else{$msg = "Data Not Updated! Error!";}
	 $url = BASE_URL	.'/indexOperator/dataList?msg='.urlencode(serialize($msg));
	 header('location:'. $url);
	}else{
		$data = $validationObject->errors; //var_dump($error);
		$url = BASE_URL	.'/indexOperator/dataEdit/'.$dataId.'?error='.urlencode(serialize($data));
	 header('location:'. $url);
	}	
}

// DELETE Data Function ---------------------------------------
public function dataDelete($dataId){
	$tableName = 'tasktable';
	$count = 'id = '.$dataId;
	$listObject = $this->load->model('dataModel');
	$result = $listObject->deleteData($tableName,$count);
	if($result){$msg = "Data Successfully Deleted !";}else{$msg = "Data Not Deleted! Error!";}
	 $url = BASE_URL	.'/indexOperator/dataList?msg='.urlencode(serialize($msg));
	 header('location:'. $url);	
}	


	/**
	public function sqlite(){ 
	$listObject =	$this->load->model('dataModel');
	$data = $listObject->sqliteTable();
	var_dump($data);
	//$this->load->view('dataList',$data);
	}
	**/


}// End indexOperator lass

 ?>