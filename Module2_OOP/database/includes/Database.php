<?php

namespace App\Database;

use PDO;
use Exception;

class Database
{
    private $drive = _DRIVER;
    private $host = _HOST;
    private $user = _USER;
    private $pass = _PASS;
    private $dbName = _DBNAME;
    private static $conn = null;
    private $sql = null;


    function __construct()
    {
        //Viết câu lệnh kết nối ở đây
        try {
            // Kiểm tra xem lớp PDO có tồn tại hay không
            if (class_exists('PDO')) {
                // Thiết lập DSN (Data Source Name)
                $dsn = $this->drive . ':dbname=' .  $this->dbName . ';host=' . $this->host;

                // Cấu hình các tùy chọn cho PDO
                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // Thiết lập mã hóa UTF-8
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION      // Kích hoạt chế độ ngoại lệ cho lỗi
                ];

                // Khởi tạo kết nối PDO
                if (self::$conn == null) {        //tránh tạo lại mỗi khi truy vấnvấn
                    self::$conn = new PDO($dsn, $this->user, $this->pass, $options);
                }
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
            die();
        }
    }

    //THỰC THI CÂU TRUY VẤN
    public function query($sql, $data = [], $statementStatus = false) // mảng data sẽ truyền giá trị thay cho ? để tăng bảo mậtmật
    {
        $this->sql = $sql;
        $query = false;

        try {
            // Chuẩn bị câu lệnh SQL
            $statement = self::$conn->prepare($this->sql);

            // Thực thi câu lệnh với hoặc không có dữ liệu
            if (empty($data)) {
                $query = $statement->execute();
            } else {
                $query = $statement->execute($data);
            }
        } catch (Exception $exception) {
            // Xử lý lỗi bằng cách gọi file lỗi và ngừng chương trình
            $exception->getMessage() . '<br/>';

            echo '<pre>';
            print_r($exception);
            echo '</pre>';
            
            echo 'Xảy ra lỗi _ SQL Query : ' . $this->sql;
            die(); // Dừng thực thi nếu xảy ra lỗi
        }

        // Nếu cần trả về đối tượng statement
        if ($statementStatus && $query) {
            return $statement;
        }

        // Trả về kết quả thực thi
        return $query;
    }


    private function fetch($sql)    //trả về PDOStatement để chuẩn bị fetch hoặc fetachAll
    {
        $statement = $this->query($sql, [], true);
        if (is_object($statement)) {
            return $statement;
        }
        return false;
    }


    //LẤY TẤT CẢ BẢN GHI
    public function getRaw($sql)
    {
        $statement = $this->fetch($sql);

        if (!empty($statement)) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    //LẤY MỘT CẢ BẢN GHI
    public function firstRaw($sql)
    {
        $statement = $this->fetch($sql);

        if (!empty($statement)) {
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    //PHƯƠNG THỨC INSERT (ADD)
    public function insertData($table, $dataInsert)
    {
        // Lấy danh sách các cột từ mảng dữ liệu
        $keyArr = array_keys($dataInsert);

        // Tạo chuỗi các cột
        $fieldStr = implode(', ', $keyArr);    // EX : name, email, creted_at

        // Tạo chuỗi các placeholder giá trị (e.g., ":key1, :key2")
        $valueStr = ':' . implode(', :', $keyArr);    //EX : :name, :email, :creted_at

        // Tạo câu lệnh SQL chèn dữ liệu
        $sql = 'INSERT INTO ' . $table . ' (' . $fieldStr . ') VALUES (' . $valueStr . ')';   //tạo câu lệnh hoàn chỉnhchỉnh

        // Gọi hàm query để thực thi câu lệnh SQL với dữ liệu
        return $this->query($sql, $dataInsert);
    }


    // PHƯƠNG THỨC UPDATEUPDATE
    public function updateData($table, $dataUpdate, $condition = '')
    {
        // Khởi tạo chuỗi chứa các cặp key-value để cập nhật
        $updateStr = '';

        // Duyệt qua mảng $dataUpdate để tạo chuỗi key=value
        foreach ($dataUpdate as $key => $value) {
            // Thêm từng cặp key-value vào chuỗi cập nhật
            $updateStr .= $key . '=:' . $key . ', ';
        }

        // Loại bỏ dấu phẩy và khoảng trắng cuối cùng của chuỗi
        $updateStr = rtrim($updateStr, ', ');

        // Kiểm tra xem điều kiện ($condition) có tồn tại không
        if (!empty($condition)) {
            // Nếu có điều kiện, thêm câu lệnh WHERE vào SQL
            $sql = 'UPDATE ' . $table . ' SET ' . $updateStr . ' WHERE ' . $condition;
        } else {
            // Nếu không có điều kiện, chỉ tạo câu lệnh UPDATE mà không có WHERE
            $sql = 'UPDATE ' . $table . ' SET ' . $updateStr;
        }

        // Thực thi câu lệnh SQL đã tạo, truyền kèm dữ liệu cập nhật
        return $this->query($sql, $dataUpdate);
    }


    public function deleteData($table, $condition = '')
    {
        // Kiểm tra xem có điều kiện xóa không
        if (!empty($condition)) {
            // Nếu có điều kiện, thêm câu lệnh WHERE vào SQL
            $sql = "DELETE FROM $table WHERE $condition";
        } else {
            // Nếu không có điều kiện, chỉ thực hiện câu lệnh DELETE toàn bảng
            $sql = "DELETE FROM $table";
        }

        // Thực thi câu lệnh SQL đã tạo
        return $this->query($sql);
    }


    //PHƯƠNG THỨC LẤY SỐ DÒNG CỦA CÂU LỆNH TRUY VẤN  (lấy ra số bản ghi)

    public function getRows($sql)
    {
        $statement = $this->query($sql, [], true);
        if (!empty($statement)) {
            return $statement->rowCount();
        }
        return 0;
    }


    //PHƯƠNG THỨC TRẢ VỀ ID VỚI INSERT (lấy id của bản ghi mới nhất được tạotạo)
    public function insertID()
    {
        return self::$conn->lastInsertId();
    }

    //PHƯƠNG THỨC TRẢ VỀ PDO ($conn),để có thể phát sinh các phương thức khác
    public function getPdo(){
        return self::$conn;
    }
}
