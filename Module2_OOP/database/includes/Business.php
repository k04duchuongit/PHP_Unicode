<?php

namespace App\Database;

use App\Database\Database;

class Business extends Database
{
    protected $table = null;             //table
    protected $primaryKey = 'id';           //primary key table
    protected $field = '*';                 // field select


    public function __construct()
    {
        parent::__construct();     // gọi construct của class database
        $this->table = $this->getTable();   // lấy tên bảng
    }

    public function get($where = '')
    {
        $tableName = $this->table;
        $fieldSelect = $this->field;

        $sql = "SELECT $fieldSelect FROM $tableName";

        if (!empty($where)) {
            $sql .= " WHERE $where";
        }
        return $this->getRaw($sql);
    }

    // //lay 1 ban ghi theo dieu kien
    public function first($where = '')
    {
        $tableName = $this->table;
        $fieldSelect = $this->field;

        $sql = "SELECT $fieldSelect FROM $tableName";

        if (!empty($where)) {
            $sql .= " WHERE $where";
        }
        return $this->firstRaw($sql);
    }

    //lay 1 ban ghi theo khoa chinh (ID)
    public function find($id)
    {
        $findBy = $this->primaryKey;
        $where = "$findBy = $id ";
        return $this->first($where);
    }

    // Phuong thuc dem ban ghi
    public function count($where)
    {
        $tableName = $this->table;
        $fieldSelect = $this->field;

        $sql = "SELECT $fieldSelect FROM $tableName";

        if (!empty($where)) {
            $sql .= " WHERE $where";
        }

        return $this->getRows($sql);
    }

    //Phuong thuc insert
    public function insert($dataInsert)
    {
        $tableName = $this->table;
        return $this->insertData($tableName, $dataInsert);
    }


    //Phuong thuc update
    public function update($dataUpdate, $id)
    {
        $updateBy = $this->primaryKey;
        $condition = "$updateBy = " . $id;
        $tableName = $this->table;

        return $this->updateData($tableName, $dataUpdate, $condition);
    }

    //Phuong thuc Delete
    public function delete($id)
    {
        $deleteBy = $this->primaryKey;
        $tableName = $this->table;
        $condition = "$deleteBy = $id";

        return $this->deleteData($tableName, $condition);
    }

    private function getTable()
    {
        $currentClassObj = new \ReflectionClass($this);    //Sử dụng lớp \ReflectionClass từ global namespace để lấy thông tin về class hiện tại ($this), chẳng hạn như tên, phương thức, thuộc tính...

        if (!empty($currentClassObj)) {             // kiểm tra class đã tạo hay chưa
            $currentClass = $currentClassObj->getShortName();   //Lấy tên ngắn của class hiện tại

            if (!empty($currentClass)) {
                $currentClass = lcfirst($currentClass);         // chuyển chữ hoa đầu thành thườngthường
                $tableName =  preg_replace('/([A-Z])/', '_$1', $currentClass);  //thêm dấu _ trước chữ hoa
                $tableName = strtolower($tableName);        // chuyển chữ hoa thành chữ thường
                return $tableName;
            }
        }
        return null;
    }
}
