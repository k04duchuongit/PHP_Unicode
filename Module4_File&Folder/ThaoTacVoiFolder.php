<?php
$folderPath = "uploads";


// Tạo thư mục
if (!is_dir($folderPath)) {
    if (mkdir($folderPath, 0777, true)) {
        echo "Thư mục '$folderPath' đã được tạo.";
    } else {
        echo "Không thể tạo thư mục.";
    }
} else {
    echo "Thư mục '$folderPath' đã tồn tại.";
}



// Xóa thư mục
if (is_dir($folderPath)) {
    if (rmdir($folderPath)) {
        echo "Thư mục '$folderPath' đã được xóa.";
    } else {
        echo "Không thể xóa thư mục.";
    }
} else {
    echo "Thư mục '$folderPath' không tồn tại.";
}



// Đọc nội dung thư mục
if (is_dir($folderPath)) {
    $files = scandir($folderPath);  // Trả về mảng chứa tên các file và thư mục trong thư mục $folderPath

    echo "Nội dung trong thư mục '$folderPath':\n";
    foreach ($files as $file) {
        if ($file !== "." && $file !== "..") {
            echo $file . "\n";
        }
    }
} else {
    echo "Thư mục '$folderPath' không tồn tại.";
}


// Đổi tên thư mục
$oldFolderName = "old_folder";
$newFolderName = "new_folder";

if (is_dir($oldFolderName)) {
    if (rename($oldFolderName, $newFolderName)) {
        echo "Thư mục đã được đổi tên thành '$newFolderName'.";
    } else {
        echo "Không thể đổi tên thư mục.";
    }
} else {
    echo "Thư mục '$oldFolderName' không tồn tại.";
}


// Di chuyển thư mục
$source = "old_folder"; // Thư mục gốc
$destination = "new_location/old_folder"; // Vị trí mới

if (is_dir($source)) {
    if (rename($source, $destination)) {
        echo "Thư mục đã được di chuyển đến '$destination'.";
    } else {
        echo "Không thể di chuyển thư mục.";
    }
} else {
    echo "Thư mục '$source' không tồn tại.";
}


//xóa thư mục   (chỉ xóa thư mục trốngtrống)
$folderPath = 'path/to/folder';

if (is_dir($folderPath)) {
    if (rmdir($folderPath)) {
        echo "Folder đã được xóa thành công.";
    } else {
        echo "Không thể xóa folder. Hãy kiểm tra quyền truy cập.";
    }
} else {
    echo "Folder không tồn tại.";
}


?>