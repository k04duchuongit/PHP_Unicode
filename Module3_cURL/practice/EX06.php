<?php 
//UPLOAD FILE BAng CURL 
//ex06.php(formupload) sang server khac

/* 
file xử lý curl : nhận file từ formupload
upload.php : nhận file từ curl và lưu vào thư mục uploads
=>curl và uploads.php cung 1 server
*/



?>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>
