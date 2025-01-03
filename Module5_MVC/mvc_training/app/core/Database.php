<?php
class Database
{
    private $__conn;
    function __construct()
    {
        global $db_config;
        $this->__conn =  Connection::getInstance($db_config);

        var_dump($this->__conn);
    }

    //Thêm đữ liệu
    function insert($table, $data)
    {
        if (!empty($data)) {
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key => $value) {
                $fieldStr .= $key . ',';
                $valueStr .= "'" . $value . "',";
            }
            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";

            $status = $this->query($sql);

            if ($status) {
                return true;
            }
        }

        return false;
    }

    //Sửa dữ liệu
    function update($table, $data, $condition = '')
    {
        if (!empty($data)) {
            $updateStr = '';
            foreach ($data as $key => $value) {
                $updateStr .= "$key='$value',";
            }

            $updateStr = rtrim($updateStr, ',');

            if (!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            } else {
                $sql = "UPDATE $table SET $updateStr";
            }

            $status = $this->query($sql);

            if ($status) {
                return true;
            }
        }

        return false;
    }

    //Xoá dữ liệu
    function delete($table, $condition = '')
    {
        if (!empty($condition)) {
            $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
        } else {
            $sql = 'DELETE FROM ' . $table;
        }

        $status = $this->query($sql);

        if ($status) {
            return true;
        }

        return false;
    }

    //Truy vấn câu lệnh SQL
    function query($sql)
    {
        try {
            $statement = $this->__conn->prepare($sql);

            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            $mess =  'Lỗi: ' . $e->getMessage();
            $data['mess'] = $mess;            //gán lỗi vào mảng data
            App::$app->loadError('database',['message'=>$mess]); //load trang lỗi
            die();
        }
    }

    //Trả về id mới nhất sau khi đã insert
    function lastInsertId()
    {
        return $this->__conn->lastInsertId();
    }
}
