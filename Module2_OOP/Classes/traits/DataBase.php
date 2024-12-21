<?php
include_once 'TraitsLongNhau.php';
//các trait cũng có thể lồng nhau
trait Database
{
    use TraitsLongNhau;
    
    private $table = 'posts';   //private ở đây khi các lớp gọi nó sẽ trở thành các thuộc tính private ở các lớplớp
    public function fectch()
    {
        return 'Lay du lieu tu table';
    }

    public function methodFromDb()
    {
        echo 'methodFromDb </br>';
    }
}
