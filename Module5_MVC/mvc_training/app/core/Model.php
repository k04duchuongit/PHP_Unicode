<?php
abstract class Model extends Database
{
    protected $db;
    use QueryBuilder;
    public function __construct()
    {
        $this->db = new Database();
    }

    abstract function tableFill(); //Hàm trừu tượng để lấy tên bảng

    abstract function fieldFill(); //Hàm trừu tượng để lấy tên các trường

    public function get()
    {
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();
        if (empty($fieldSelect)) {
            $fieldSelect = '*';
        }

        $sql = "SELECT $fieldSelect FROM $tableName";
        $query = $this->db->query($sql);
        if (!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
    public function first()
    {
        $tableName = $this->tableFill();
        $fieldSelect = $this->fieldFill();
        if (empty($fieldSelect)) {
            $fieldSelect = '*';
        }
        $sql = "SELECT $fieldSelect FROM $tableName";
        $query = $this->db->query($sql);
        if (!empty($query)) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return [];
    }
}
