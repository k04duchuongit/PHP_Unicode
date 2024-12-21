<?php
require_once 'Caculator.php';

//Constructor được gọi tự động khi một đối tượng của class được khởi tạo.
// Nó thường được sử dụng de thiet lap gia tri mac dinh , thuc hien thao tac can thiet


//Destructor được gọi tự động khi một đối tượng không còn tồn tại hoặc kết thúc chương trình.
// Nó thường được sử dụng để: Giải phóng tài nguyên như đóng kết nối cơ sở dữ liệu, xóa file tạm, hoặc ghi log.
//Thực hiện các công việc dọn dẹp (cleanup).

$calc = new Caculator(123);

$calc ->showMsg();

