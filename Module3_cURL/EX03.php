<?php
$url = "http://localhost/Module3_cURL/server.php?user_id=1&keyword=php";
$ch = curl_init();

$data = [
    'user_id' => 'duchuong2',
    'email' => '123456@gmail.com'
];

//user_id=duchuong2&email=123456@gmail.com
$queryString = http_build_query($data); // Chuyển mảng dữ liệu thành chuỗi query string


curl_setopt($ch, CURLOPT_URL, $url); // Đặt URL cần request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Trả về kết quả thay vì xuất trực tiếp


curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Tắt kiểm tra chứng chỉ SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Tắt kiểm tra host SSL


// curl_setopt($ch, CURLOPT_HTTPGET, true); //  Đặt phương thức HTTP là GET
// curl_setopt($ch, CURLOPT_POST, true);   // Đặt phương thức HTTP là POST.


curl_setopt($ch, CURLOPT_POSTFIELDS, $queryString); //gửi dữ liệu trong phần body của yêu cầu HTTP (POST, PUT, PATCH, DELETE, v.v.).

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH'); //Thiết lập phương thức HTTP tùy chỉnh cho yêu cầu cURL.

curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']); // Thiết lập các header tùy chỉnh cho yêu cầu HTTP.



// Thực thi cURL
$result = curl_exec($ch);


// Đóng cURL
curl_close($ch);

// Hiển thị kết quả
var_dump($result);
