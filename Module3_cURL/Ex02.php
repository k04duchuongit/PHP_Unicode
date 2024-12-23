<?php

$url = "http://localhost/Module3_cURL/server.php";
$url = "https://my.vnexpress.net/users/chi-tiet-tai-khoan";

// User-Agent giả lập trình duyệt
$userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.79 Safari/537.36';

$cookieStr = 'gia lap cookie';

// Khởi tạo cURL
$ch = curl_init();

// Cấu hình cURL
curl_setopt($ch, CURLOPT_URL, $url); // Đặt URL cần request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Trả về kết quả thay vì xuất trực tiếp
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Tắt kiểm tra chứng chỉ SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Tắt kiểm tra host SSL
curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Thiết lập timeout (30 giây)

curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);   // Giả lập trình duyệt

curl_setopt($ch, CURLOPT_HEADER, false); // cho phép gửi header (trả về header của linh cần request)

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'api-key: duchuong123',
    'token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...'
]); // mảng header cần gửi lên request


curl_setopt($ch, CURLOPT_COOKIE, $cookieStr); // Đặt cookie cần gửi lên request

// Thực thi cURL
$result = curl_exec($ch);

// Đóng cURL
curl_close($ch);

// Hiển thị kết quả
var_dump($result);
