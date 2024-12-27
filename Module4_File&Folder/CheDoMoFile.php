<?php
/* 
r: Chỉ đọc. Bắt đầu từ đầu tệp. Tệp phải tồn tại.
r+: Đọc và ghi. Bắt đầu từ đầu tệp. Tệp phải tồn tại.
w: Chỉ ghi. Tạo một tệp mới nếu tệp không tồn tại, hoặc xóa nội dung hiện tại nếu tệp tồn tại.
w+: Đọc và ghi. Tạo một tệp mới nếu tệp không tồn tại, hoặc xóa nội dung hiện tại nếu tệp tồn tại.
a: Chỉ ghi. Ghi tiếp vào cuối tệp (append). Tạo tệp nếu tệp không tồn tại.
a+: Đọc và ghi. Ghi tiếp vào cuối tệp (append). Tạo tệp nếu tệp không tồn tại.
x: Chỉ ghi. Tạo một tệp mới. Gây lỗi nếu tệp đã tồn tại.
x+: Đọc và ghi. Tạo một tệp mới. Gây lỗi nếu tệp đã tồn tại.
*/


// 1. Mở file để đọc ("r")
// Chỉ đọc, bắt đầu từ đầu file. File phải tồn tại trước.
$file = fopen("data.txt", "r");
if ($file) {
    echo "File đã mở thành công!\n";
    fclose($file); // Đóng file sau khi sử dụng
} else {
    echo "Không thể mở file.\n";
}

// 2. Mở file để đọc và ghi ("r+")
// Đọc và ghi, bắt đầu từ đầu file. File phải tồn tại trước.
$file = fopen("example.txt", "r+");
if ($file) {
    fwrite($file, "Thêm nội dung mới!\n"); // Ghi nội dung vào file
    fclose($file); // Đóng file sau khi sử dụng
} else {
    echo "Không thể mở file.\n";
}

// 3. Mở file để ghi ("w")
// Ghi, xóa nội dung cũ. Tạo file mới nếu chưa tồn tại.
$file = fopen("example.txt", "w");
if ($file) {
    fwrite($file, "Nội dung mới!\n"); // Ghi nội dung vào file
    fclose($file); // Đóng file
} else {
    echo "Không thể mở file.\n";
}

// 4. Mở file để ghi và đọc ("w+")
// Xóa nội dung cũ. Tạo file mới nếu chưa tồn tại.
$file = fopen("example.txt", "w+");
if ($file) {
    fwrite($file, "Ghi và đọc nội dung!\n"); // Ghi nội dung vào file
    rewind($file); // Đưa con trỏ file về đầu
    echo fread($file, filesize("example.txt")); // Đọc nội dung từ file
    fclose($file); // Đóng file
} else {
    echo "Không thể mở file.\n";
}

// 5. Mở file để ghi ("a")
// Ghi, giữ lại nội dung cũ. Tạo file mới nếu chưa tồn tại.
$file = fopen("example.txt", "a");
if ($file) {
    fwrite($file, "Thêm nội dung vào cuối file!\n"); // Ghi thêm nội dung
    fclose($file); // Đóng file
} else {
    echo "Không thể mở file.\n";
}

// 6. Mở file để ghi và đọc ("a+")
// Ghi thêm nội dung vào cuối file và đọc. Tạo file mới nếu chưa tồn tại.
$file = fopen("example.txt", "a+");
if ($file) {
    fwrite($file, "Thêm nội dung và đọc từ file!\n"); // Ghi thêm nội dung
    rewind($file); // Đưa con trỏ file về đầu
    echo fread($file, filesize("example.txt")); // Đọc nội dung từ file
    fclose($file); // Đóng file
} else {
    echo "Không thể mở file.\n";
}

// 7. Tạo file mới để ghi ("x")
// Tạo file mới để ghi. Báo lỗi nếu file đã tồn tại.
$file = fopen("example_new.txt", "x");
if ($file) {
    fwrite($file, "Nội dung của file mới!\n"); // Ghi nội dung vào file
    fclose($file);
} else {
    echo "File đã tồn tại hoặc không thể mở file.\n";
}

// 8. Tạo file mới để ghi và đọc ("x+")
// Tạo file mới để ghi và đọc. Báo lỗi nếu file đã tồn tại.
$file = fopen("example_new.txt", "x+");
if ($file) {
    fwrite($file, "Nội dung của file mới!\n");
    rewind($file);          // Đưa con trỏ file về đầu
    echo fread($file, filesize("example_new.txt")); // Đọc nội dung từ file
    fclose($file);
} else {
    echo "File đã tồn tại hoặc không thể mở file.\n";
}
