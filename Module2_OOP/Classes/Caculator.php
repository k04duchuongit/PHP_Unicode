<?php
class Caculator
{
    var $numberA = 1;
    var $numberB = 2;
    var $numberC = null;
    private $userName = 'duchuong';
    protected $pass = '123';

    public function __construct($value)
    {
        echo "ham khoi tao";
        $this->numberA = $value;
    }


    //phuong thuc gan gia tri cho numberA 
    public function setNumberA($value)
    {
        $this->numberA = $value;
    }

    //phuong thuc gan gia tri cho numberB 
    public function setNumberB($value)
    {
        $this->numberB = $value;
    }

    public function makeAdd($valueA, $valueB)
    {
        $result = $valueA + $valueB;
        return $result;
    }
    public function showMsg() {}

    public function demoThis()
    {
        return $this;
    }

    public function getUserName()
    {
        return $this->userName;
    }
    public function getpass()
    {
        return $this->pass;
    }

    public function setUserName($value)
    {
        $this->userName = $value;
    }
    public function setpass($value)
    {
        $this->pass = $value;
    }

    public function __destruct()
    {
        echo "hamf huyr";
    }
}
