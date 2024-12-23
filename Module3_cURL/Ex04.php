<?php
$file = fopen("data.txt", "a+");
var_dump($file);

$url = "http://localhost/Module3_cURL/server_redirect.php";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$url); // Đặt URL cần request

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Tắt kiểm tra chứng chỉ SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Tắt kiểm tra host SSL


curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);// Theo dõi các chuyển hướng (HTTP Redirects)

curl_setopt($ch, CURLOPT_FILE, $file);  // Ghi kết quả vào file

// Thực thi cURL
$result = curl_exec($ch);

// Đóng cURL
curl_close($ch);

fclose($file); // Đóng file

// Hiển thị kết quả
var_dump($result);
