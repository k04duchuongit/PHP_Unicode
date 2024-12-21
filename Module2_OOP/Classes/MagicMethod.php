<?php
class MagicMethod
{
    private $Number1 = 123;
    private $Number2 = 345;

    // magicmethod tự động chạy phương thức get khi thuộc tính private được truy cập
    function __get($name)
    {
        return $this->$name;
    }

    // magicmethod tự động chạy phương thức get khi thuộc tính private được truy cập
    function __set($name, $value)
    {
        $this->$name = $value;
    }

    // __call($name, $arguments) kích hoạt khi cố gắng gọi một phương thức không tồn tại hoặc không thể truy cập trong một đối tượng.
    function __call($name, $arguments)
    {
        echo "Phuong thuc khong ton tai";
        echo "cac tham so nhan duoc la :";
        print_r($arguments);
    }

    //__callStatic($name, $arguments) được kích hoạt khi gọi một phương thức tĩnh (static) không tồn tại trong một lớp.
    static function __callStatic($name, $arguments)
    {
        // $name: Tên phương thức tĩnh được gọi
        // $arguments: Mảng chứa các tham số truyền vào
    }
}
