<?php
class HomeModel extends Model
{
    private $__table = 'product_category';

    function tableFill()
    {
       return 'product_category';
    }

    function fieldFill()
    {
       return '*';
    }
    public function getList()
    {
        $data = $this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getDetail($id)
    {
        echo 'Detail - ' . $id;
    }
}
