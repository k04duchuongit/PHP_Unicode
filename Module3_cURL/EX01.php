<?php

$url = "https://www.youtube.com/"; //URL CẦN REQUEST 

//KHỞI TẠO CURL
$ch = curl_init();     // có thể đưa url muốn request

//Cấu hình CURL 
curl_setopt($ch, CURLOPT_URL, $url);              //URL CẦN REQUEST
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $url);   //Bỏ qua kiểm tra SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $url);   //Bỏ qua kiểm tra SSL
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   //Trả về kết quả sau khi thực thi


//Thực thi CURL
curl_exec($ch);

//Hiển thị lỗi
$errors = curl_error($ch);


//Đóng CURL
$result = curl_close($ch);
echo $result;
