<?php
// ## Positive Lookahead (Kiểm tra mẫu phía sau) - Kiểm tra xem một mẫu có theo sau một chuỗi khác hay không mà không bao gồm chuỗi đó trong kết quả.

$string = "apple123 orange456 apple123";
$pattern = '/apple(?=123)/';  // Kiểm tra xem có "123" theo sau "apple"
preg_match_all($pattern, $string, $matches);
print_r($matches);  // Kết quả: Array ( [0] => Array ( [0] => apple [1] => apple ) )



// ## Negative Lookahead ((?!...)): Kiểm tra xem không có mẫu nào theo sau chuỗi.

$string = "apple123 orange456 apple789";
$pattern = '/apple(?!123)/';  // Kiểm tra xem "apple" không theo sau bởi "123"
preg_match_all($pattern, $string, $matches);
print_r($matches);  // Kết quả: Array ( [0] => Array ( [0] => apple [1] => apple ) )

//Giai thich :đảm bảo rằng "apple" không được theo sau bởi "123".



// ## Positive Lookbehind (Kiểm tra mẫu phía trước)
$string = "apple123 banana456 apple789";
$pattern = '/(?<=apple)\d+/';  // Kiểm tra xem sau "apple" là số
preg_match_all($pattern, $string, $matches);
print_r($matches);  // Kết quả: Array ( [0] => Array ( [0] => 123 [1] => 789 ) )


// ## Negative Lookbehind (Kiểm tra không có mẫu phía trước)

$string = "apple123 banana456 apple789";
$pattern = '/(?<!apple)\d+/';  // Kiểm tra xem trước số không phải là "apple"
preg_match_all($pattern, $string, $matches);
print_r($matches);  // Kết quả: Array ( [0] => Array ( [0] => 456 ) )
