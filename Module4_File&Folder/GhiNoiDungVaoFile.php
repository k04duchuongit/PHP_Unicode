<?php
$filePath = "data.txt";
$content = "duchuong k04k04";

/*
- thay the noi dung cu (ghi de)
- khong can resouce fopne
- neu file khong ton tai thi tao file moi

*/
// Ghi nội dung vào file
if (file_put_contents($filePath, $content)) {
    echo "Ghi nội dung thành công vào file: $filePath";
} else {
    echo "Không thể ghi vào file!";
}
?>