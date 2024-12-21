<?php
require_once '../../config.php';
require_once '../../includes/Database.php';   //Load class Database
require_once '../../includes/Business.php';   //Load class Business
require_once 'ProductCategory.php';   //Load class Users

use App\Database\Modules\ProductCategory;

$ProductCategory = new ProductCategory();       //Khoi tao doi tuong Users

$data = $ProductCategory->get();

echo '<pre>';
print_r($data);
echo '</pre>';