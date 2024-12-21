<?php
class Bussiness extends Database{

    public function __construct($value)
    {
        parent::__construct();   // goi construct cua class cha
        $this->table = $value;
    }


    public function getDetail(){
        $this->table = 'usersusers';
        return $this->fectch();
    }

    public function methodFromBs(){
        echo 'methodFromBs </br>';
    }
}
?>