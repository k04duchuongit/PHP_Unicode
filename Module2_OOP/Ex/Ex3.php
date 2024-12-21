<?php
require_once 'Classes/Caculator.php';
$calc = new Caculator(123);

$calc ->setUserName('duc huyonf it');
echo $calc->getuserName();
