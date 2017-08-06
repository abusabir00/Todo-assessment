<?php

class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('task.db');
   }
}


class dbSqlite extends MyDB
{
   protected $conn = array();
   function __construct(){ $this->conn = new MyDB(); }


//Data Read Function Here .....
public function select(){

   $sql =<<<EOF
      SELECT * from tasktable ORDER BY id DESC;
EOF;
   $result = array();
   $ret = $this->conn->query($sql);
   return $ret;
   }

 //Get Data By ID Function ----------
public function getById($tableName,$dataId){

   $sql =<<<EOF
      SELECT * from $tableName  where id=$dataId;
EOF;
   $ret = $this->conn->query($sql);
   return $ret;
   }


// Data Insert Function Here ....
public function insert($tableName,$allData){
   $keys = implode(',', array_keys($allData));
   $values = implode("','" , array_values($allData));
   $values = "'".$values."'";

   $sql =<<<EOF
      INSERT INTO $tableName ($keys)
      VALUES ($values);

      
EOF;

   $result = $this->conn->exec($sql);
   return $result; 
} 


// Data Update Function Here ....
public function update($tableName,$allData,$count){
   $keyValue = null;
   foreach ($allData as $key => $value) {
      $keyValue .= ("$key = "."'".$value."',");
   }
   $keyValue = rtrim($keyValue,','); var_dump($keyValue);

   $sql =<<<EOF
      UPDATE $tableName SET $keyValue WHERE $count;     
EOF;

   $result = $this->conn->exec($sql);
   return $result; 
}

// Data DELETE Function Here ....
public function delete($tableName,$count){
   $sql =<<<EOF
      DELETE FROM $tableName WHERE $count;     
EOF;

   $result = $this->conn->exec($sql);
   return $result; 
}


/**   
public function check(){
       if(!$this->conn){
        echo $this->conn->lastErrorMsg();
       } else { echo "Opened database successfully\n";}
   }


   public function create(){
   $sql =<<<EOF
   CREATE TABLE tasktable
   (id            INTEGER PRIMARY KEY AUTOINCREMENT,
   title           TEXT    NOT NULL,
   status           TEXT,
   priority           TEXT,
   startDate           DATE,
   dueDate           DATE,
   completion           TEXT,
   comment           TEXT
   );
EOF;

   $ret = $this->conn->exec($sql);
   if(!$ret){echo $conn->lastErrorMsg();} else {echo "Table created successfully\n";}
//$db->close();
   }
  **/ 

}//dbsqite End ..........

?>