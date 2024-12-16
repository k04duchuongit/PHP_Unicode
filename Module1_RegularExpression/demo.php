<?php
$email = "example@gmail.com";
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

if (preg_match($pattern, $email)) {    // hàm này kiểm tra độ chính xác của biểu thức . 1 là trùng _ 2 là ko trùng và trả về chuỗi đóđó
    echo "Email hợp lệ!";
} else {
    echo "Email không hợp lệ!";
}


$input = "abc123def456ghi789";
$pattern = "/\d+/"; //  tìm nhiều lần khớp trong chuỗi. và trả về tất cả những lần đó trong chuõi 

if (preg_match_all($pattern, $input, $matches)) {  // hàm này kiểm tra
    echo "Các số tìm thấy:\n";   
    print_r($matches);   //array([0]='123',[1]='456',[2]='789',)
} else {
    echo "Không tìm thấy số nào!";
}


// PREG_REPLACE

//## dùng để thay thế các chuỗi khớp bằng chuỗi mới.
$string = "Hello world, welcome to the world of PHP!";
$pattern = "/world/";
$replacement = "universe";

$new_string = preg_replace($pattern, $replacement, $string);
echo $new_string;  // Kết quả: "Hello universe, welcome to the universe of PHP!"


//## giới hạn số lần thay thế
$string = "apple123banana456apple789";
$pattern = "/apple/";
$replacement = "fruit";

$new_string = preg_replace($pattern, $replacement, $string, 1);
echo $new_string;  // Kết quả: "fruit123banana456apple789"



//## Thay thế với sử dụng nhóm bắt (Capturing Groups):

$string = "apple123banana456";
$pattern = "/(apple)(\d+)/";
$replacement = "$1-fruit$2";

$new_string = preg_replace($pattern, $replacement, $string);
echo $new_string;  // Kết quả: "apple-fruit123banana456"

?> 
