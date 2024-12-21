<?php 
require_once '../Classes/DataBase.php';
require_once '../Classes/Bussiness.php';

$bussiness = new Bussiness('users');


echo $bussiness ->getDetail();
// $bussiness -> methodFromDb();
?>