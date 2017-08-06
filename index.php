<?php
include_once('operation/config/config.php');
include_once('includes/header.php');

spl_autoload_register(function($class){
include_once('system/lib/'.$class.'.php');
});


//Get Operator/Method/Peramiter From URL
$mainIndex = new mainIndex();

include_once('includes/footer.php'); 

 ?>


