<?php
class DB
{
    static private $db;

    public function __construct(){
        self::$db = $this;
    }

    public function table($table)
    {
        echo $table;
        return self::$db;
    }
    public function where($field, $compare, $value)
    {
        echo 'where';
        return self::$db;
    }
    public function select($field = '*')
    {
        echo $field;
        return self::$db;
    }
    public function get()
    {
        echo 'run';
        return self::$db;
    }
}
