<?php

require_once 'config.php';
require_once './includes/Database.php';
require_once './includes/Business.php';

use App\Database\Database;
use App\Database\Business;

$db = new Database();


// $sql = "SELECT * FROM users WHERE id=1";
// $data = $db->firstRaw($sql);

// $dataInsert = [
//     'name' => 'duchuong'.rand(10,1000),
//     'email' => 'duchuon'.rand(10,1000).'4@xxx',
//     'status'=>rand(00,1),
//     'created_at'=>date('Y-m-d H:i:s')
// ];

// $db->insertData('users',$dataInsert);

// $idLastInsert = $db->insertID();
// echo $idLastInsert;

// $condition = 'id=13';

// $dataUpdate = [
//     'name' => 'duchuong update',
//     'status'=>0,
// ];
// $db->update('users',$dataUpdate,$condition);

// $db->delete('users',$condition);

// $sql = "SELECT * FROM users WHERE id>10";
// $count = $db->getRows($sql);
// echo $count;