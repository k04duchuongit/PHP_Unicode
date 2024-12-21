<?php
require_once '../Classes/MagicMethod.php';

$ex1 = new MagicMethod();
$ex1->Number1 = 222;
$ex1->methodA('234');

MagicMethod::methodStatic('123');

echo $ex1->Number1;
