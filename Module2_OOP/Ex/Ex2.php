<?php
require_once 'Classes/Caculator.php';
$calc = new Caculator(44);


//I KIEM TRA THUOC TINH TON TAI

//Cách 1 : kiểm tra bằng isset hoặc empty
if (isset($calc->numberC)) {
    echo $calc->numberC;
}

//Cách 2 kiểm tra bằng hàm property_exists()

if (property_exists('Caculator', 'numberC')) {  //ham nay kiem tra thuoc tinh co ton lai trong class khong
    var_dump($calc->numberC);
} else {
    echo 'ko ton tai thuoc tinh';
}

//II KIEM TRA PHUONG THUC TON TAI
// cach 1 : kiem tra bang method_exists

if (method_exists($calc,'showMsg')) {
    $calc->showMsg();
}else{
    echo "Phuong thuc kh ton tai";
}

