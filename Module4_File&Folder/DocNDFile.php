<?php
//CACH DOC FILE

//CACH 1 
$filePath = "data.txt";

// Đọc file thành mảng
$lines = file($filePath);

if ($lines !== false) {
    echo "Nội dung file:\n";
    foreach ($lines as $line) {
        echo $line;
    }
} else {
    echo "Không thể đọc file!";
}




//CACH 2
// Mở file ở chế độ đọc
$file = fopen($filePath, "r");

if ($file) {
    // Lấy kích thước file để đọc toàn bộ nội dung
    $fileSize = filesize($filePath); // lấy kích thước file
    $content = fread($file, $fileSize); // đọc toàn bộ file  tham so 2 la so byte mà mình muốn đọc
    
    fclose($file);
    
    echo "Nội dung file:\n";
    echo $content;
} else {
    echo "Không thể mở file!";
}


//CACH 3

$filePath = "data.txt";

// Đọc nội dung file
$content = file_get_contents($filePath);

if ($content !== false) {
    echo "Nội dung file:\n";
    echo $content;
} else {
    echo "Không thể đọc file!";
}
?>

?>