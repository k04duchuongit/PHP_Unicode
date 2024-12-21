<?php

require_once 'config.php';
require_once './includes/Database.php';
require_once './includes/Business.php';

use App\Database\Database;
use App\Database\Business;


$business = new Business();


$id = 1;

$business->delete($id);
?>