<?php
class Class_traits
{
    use Database;

    function __construct()
    {
        $this->table = 'post';
    }
    
    public function getList()
    {
        echo 'Hello get list';
        echo '<br>';
        echo $this->fectch();
    }
}
