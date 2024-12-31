<?php
class Connection
{
    private static $instance = null, $conn = null;

    private function __construct($config)
    {
        try {
            // Thay các hằng số dưới bằng giá trị phù hợp hoặc đặt trong config
            $dsn = 'mysql:dbname=' . $config['db'] . ';host=' . $config['host'];


            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            // Gán kết nối vào thuộc tính $conn
            $con = new PDO($dsn, $config['user'], $config['pass'], $options);
            self::$conn = $con;
        } catch (PDOException $e) {
            $mess = $e->getMessage();

            // Các lỗi khác
            die('Lỗi kết nối: ' . $mess);
        }
    }

    // Phương thức lấy instance duy nhất (Singleton)
    public static function getInstance($config)
    {
        if (self::$instance === null) {

            $connection  = new Connection($config);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }

}
