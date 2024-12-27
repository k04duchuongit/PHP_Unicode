<?php

// Xoa file

$filePath = "data.txt";

if (file_exists($filePath)) {
    if (unlink($filePath)) {
        echo "File '$filePath' đã được xóa thành công!";
    } else {
        echo "Không thể xóa file '$filePath'.";
    }
} else {
    echo "File '$filePath' không tồn tại.";
}



// Lấy dung lượng file
$fileSize = filesize($filePath);

if ($fileSize !== false) {
    echo "Dung lượng file: $fileSize byte";
} else {
    echo "Không thể lấy dung lượng của file.";
}


// Đổi tên file
$oldFileName = "data.txt";
$newFileName = "new_example.txt";
if (rename($oldFileName, $newFileName)) { //$newFileName: Đường dẫn mới hoặc tên mới cho file.
    echo "Đổi tên file thành công!";
} else {
    echo "Không thể đổi tên file.";
}



// Sao chép file
$sourceFile = "data.txt";
$destinationFile = "backup/example.txt";

if (copy($sourceFile, $destinationFile)) {
    echo "Sao chép file thành công!";
} else {
    echo "Không thể sao chép file.";
}
?>
