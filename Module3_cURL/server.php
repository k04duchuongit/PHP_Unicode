<?php
echo '<h1>Duc huong dang hoc unicode</h1>';
$header = getallheaders();


echo '<pre>';
print_r($header);
echo '</pre>';



echo '<h3>Phuong thuc GET</h3>';
echo '<pre>';
print_r($_GET);
echo '</pre>';



echo '<h3>Phuong thuc POST</h3>';
echo '<pre>';
print_r($_POST);
echo '</pre>';



echo '<h3>Phuong thuc PUT</h3>';
if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    parse_str(file_get_contents('php://input'), $put); // Chuyển dữ liệu từ raw sang mảng
}
echo '<pre>';
print_r($put);
echo '</pre>';



echo '<h3>Phuong thuc PATCH</h3>';
$PATCH = [];

if($_SERVER['REQUEST_METHOD'] == 'PATCH'){
    parse_str(file_get_contents('php://input'), $PATCH); // Chuyển dữ liệu từ raw sang mảng
}
echo '<pre>';
print_r($PATCH);
echo '</pre>';



echo '<h3>Phuong thuc DELETE</h3>';
$DELETE = [];

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    parse_str(file_get_contents('php://input'), $DELETE); // Chuyển dữ liệu từ raw sang mảng
}
echo '<pre>';
print_r($PATCH);
echo '</pre>';