<?php
class HomeModel extends Model
{
    protected $_table = 'product_category';


    public function getList()
    {
        $data = $this->db->query("SELECT * FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getDetail($id)
    {
        echo 'Detail - ' . $id;
    }
}
