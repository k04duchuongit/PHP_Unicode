<?php
require_once '../../config.php';
require_once '../../includes/Database.php';   //Load class Database
require_once '../../includes/Business.php';   //Load class Business
require_once 'Users.php';   //Load class Users

use App\Database\Modules\Users;

$users = new Users();       //Khoi tao doi tuong Users


$listUser = $users->find(74); 
echo '<pre>';
print_r($listUser);
echo '</pre>';