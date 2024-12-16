<?php
/*Greedy (tham lam) sẽ khớp càng nhiều càng tốt trong phạm vi mà mẫu cho phép.
Nó sẽ cố gắng mở rộng khớp để lấy chuỗi dài nhất có thể trong khoảng không gian mà biểu thức chính quy chỉ định.
*/
//Non-Greedy (không tham lam) sẽ khớp ít nhất có thể. Nó sẽ dừng lại ngay khi tìm thấy kết quả hợp lệ đầu tiên.

// ## hiểu đơn giản là nó chỉ trả về 1 chuỗi trong khoảng cách nó cho phép và giới hạn là các chuỗi ta đưa ra



$string = "The quick brown fox jumps over the lazy dog.";

// Greedy - Sử dụng .* (khớp tối đa)
$greedyPattern = "/T.*o/";  // Tìm từ T đến o cuối cùng
if (preg_match($greedyPattern, $string, $matches)) {
    echo "Greedy Match: " . $matches[0] . "\n";  // Kết quả sẽ là toàn bộ chuỗi
}

// Non-Greedy - Sử dụng .*? (khớp tối thiểu)
$nonGreedyPattern = "/T.*?o/";  // Tìm từ T đến o đầu tiên
if (preg_match($nonGreedyPattern, $string, $matches)) {
    echo "Non-Greedy Match: " . $matches[0] . "\n";  // Kết quả sẽ là phần nhỏ nhất từ T đến o đầu tiên
}
