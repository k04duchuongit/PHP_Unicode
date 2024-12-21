<?php 
class Number{
    public static $number = 0;
    
    public function __construct()
    {
        self::$number++;
        echo 'Gia tri : '.self::$number.'<br>';
    }
}
?>