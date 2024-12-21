<?php
namespace Module2_Oop\NameSpace;

include_once '../NameSpace/ConCho.php';
include_once '../NameSpace/ConGa.php';

use DongVat\ConCho;
use DongVat\ConGa as Chicken;   //dat ten cho namespace

$dongvat1 = new ConCho();  
echo $dongvat1->Get();

$dongvat2 =  new Chicken();

echo $dongvat2->Get();

//trong các file có namespace , nếu muốn sử dụng các lớp mặc định thì cần dùng dấu \ trước lớp đó
//VD
$current = new \DateTime();