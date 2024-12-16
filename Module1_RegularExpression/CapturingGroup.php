<?php
// Capturing group dùng để nhóm các phần của mẫu và trích xuất chúng sau khi khớp được chuỗi.
// Non-Capturing Group : Dùng để nhóm mà không lưu lại kết quả, chỉ để khớp mẫu mà không cần lấy giá trị.  ̣(nó chỉ trả về mẫu khớp , chứ khong trả về nhóm)
// ví dụ thẻ ảnh , link web

$url = "https://www.example.com/path/to/page?name=JohnDoe&age=25";
$pattern = "/^(https?):\/\/([^\/]+)(\/[^\?]*)\?([^=]+)=(.*)$/"; 

if (preg_match($pattern, $url, $matches)) {
    echo "Giao thức: " . $matches[1] . "\n";   // Nhóm 1 (https)
    echo "Tên miền: " . $matches[2] . "\n";     // Nhóm 2 (www.example.com)
    echo "Đường dẫn: " . $matches[3] . "\n";    // Nhóm 3 (/path/to/page)
    echo "Tham số: " . $matches[4] . "\n";      // Nhóm 4 (name)
    echo "Giá trị tham số: " . $matches[5] . "\n"; // Nhóm 5 (JohnDoe)
} else {
    echo "Không tìm thấy URL hợp lệ!";
}




$string = "apple123banana456cherry789";

// Biểu thức chính quy với Non-Capturing Group, không lưu các số
$pattern = "/apple(?:\d+)banana(?:\d+)/";  // (?:\d+) không lưu các số

if (preg_match($pattern, $string, $matches)) {
    echo "Full match: " . $matches[0] . "\n";  // In ra toàn bộ chuỗi khớp
} else {
    echo "No match found.\n";
}
?>


