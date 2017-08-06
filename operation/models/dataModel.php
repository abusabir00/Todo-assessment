<?php 
/**
* DataModel Class--
*/
class dataModel extends superModel
{
	
function __construct(){ parent::__construct(); }

public function dataList(){
		//$sql = 'SELECT * FROM taskTable';
		$query = $this->db->select();
		return $query;
	}

public function dataInsert($tableName,$allData){
	$query = $this->db->insert($tableName,$allData);
	return $query;
}


public function DataById($tableName,$dataId){
	$query = $this->db->getById($tableName,$dataId);
	return $query;
}

public function updateData($tableName,$allData,$count){
	$query = $this->db->update($tableName,$allData,$count);
	return $query;
}

public function deleteData($tableName,$count){
	$query = $this->db->delete($tableName,$count);
	return $query;
}



public function sqliteTable(){
	$query = $this->db->create();
	return $query;
}	


}// End Datamode Class


?>