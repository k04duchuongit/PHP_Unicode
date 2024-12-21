<?php 
class Database {

    protected $table;
    public function __construct()
    { 
        echo 'Ket noi database <br>';
    }

    public function fectch(){
        return 'Lay du lieu tu table : '.$this->table.' </br>';
    }

    public function methodFromDb(){
        echo 'methodFromDb </br>';
        // $this->methodFromBs();
    }
}
?>