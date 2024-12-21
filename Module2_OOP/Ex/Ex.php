<?php
require_once 'Classes/Caculator.php';

$calc = new Caculator(44);
// echo $calc -> makeAdd(1,2);
// var_dump($calc->demoThis());
$calc ->setNumberA(4);
$calc ->setNumberA(6);

echo($calc -> makeAdd($calc->numberA,$calc->numberB));
?>
