<?php 

$filePath = "example.txt";


//Thay đổi quyền của filefile
// Đặt quyền 0755 cho file
if (chmod($filePath, 0755)) {
    echo "Đã thay đổi quyền cho file '$filePath'.";
} else {
    echo "Không thể thay đổi quyền cho file.";
}




// Đặt quyền 0777 cho thư mục
$folderPath = "uploads";

if (chmod($folderPath, 0777)) {
    echo "Đã thay đổi quyền cho thư mục '$folderPath'.";
} else {
    echo "Không thể thay đổi quyền cho thư mục.";
}


?>