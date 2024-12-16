<?php
//modifier (hoặc flag) là các tùy chọn bổ sung có thể được sử dụng để điều chỉnh cách mà biểu thức chính quy hoạt động.


// 1. Modifier 'i' - Không phân biệt chữ hoa chữ thường (Case-insensitive)
$string = "Hello world";
$pattern = '/hello/i';  // Tìm "hello" mà không phân biệt chữ hoa chữ thường
preg_match($pattern, $string, $matches);
echo "Modifier 'i': ";
print_r($matches);  // Kết quả: Array ( [0] => Hello )

// 2. Modifier 'm' - Multi-line (Nhiều dòng)
$string = "Hello\nworld";
$pattern = '/^world/m';  // Tìm "world" ở đầu dòng
preg_match($pattern, $string, $matches);
echo "Modifier 'm': ";
print_r($matches);  // Kết quả: Array ( [0] => world )

// 3. Modifier 's' - Dotall (Dấu chấm bao gồm cả dấu xuống dòng)
$string = "Hello\nworld";
$pattern = '/hello.world/s';  // Dấu chấm có thể khớp với dấu xuống dòng
preg_match($pattern, $string, $matches);
echo "Modifier 's': ";
print_r($matches);  // Kết quả: Array ( [0] => Hello\nworld )

// 4. Modifier 'x' - Extended (Khoảng trắng và chú thích)
$pattern = '/\d{2}  \s+  \w/x';  // Khoảng trắng và chú thích trong biểu thức chính quy
$string = "12   abc";
preg_match($pattern, $string, $matches);
echo "Modifier 'x': ";
print_r($matches);  // Kết quả: Array ( [0] => 12   a )

// 5. Modifier 'u' - Unicode (Xử lý Unicode)
$string = "こんにちは";  // "Hello" bằng tiếng Nhật
$pattern = '/こんにちは/u';  // Sử dụng Unicode
preg_match($pattern, $string, $matches);
echo "Modifier 'u': ";
print_r($matches);  // Kết quả: Array ( [0] => こんにちは )

// 6. Modifier 'A' - Tìm kiếm chỉ từ đầu chuỗi
$string = "Hello world";
$pattern = '/^Hello/A';  // Tìm "Hello" từ đầu chuỗi
preg_match($pattern, $string, $matches);
echo "Modifier 'A': ";
print_r($matches);  // Kết quả: Array ( [0] => Hello )
