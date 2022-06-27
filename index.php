<?php
include "mvc/Models/DBconfig.php";
include "mvc/Models/DBaid.php";

$db = new Database();
$db->connect();
$db1= new Database2();
$db1->connect();
if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
}
else{
    $controller = '';
}
switch($controller){
    case 'Shop':{
        require_once ('mvc/Controllers/Shop/index.php');
    }
    case 'Branch':{
        require_once ('mvc/Controllers/Branch/assistance.php');
    }
}
?>