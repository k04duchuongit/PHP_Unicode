<?php
require_once '../Classes/DB.php';

$db = new DB();
$db = $db->table('users')
    ->where('id', '=', 1)
    ->select()->get();
 