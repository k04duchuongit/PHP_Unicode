<?php
require_once '../Classes/interfaces/InterfaceAuth.php';
require_once '../Classes/AuthIntergface_class.php';

$auth = new AuthIntergface_class();

var_dump($auth->login());

$templateArr = $auth::_MSG_TEMPLATE;
print_r($templateArr);
