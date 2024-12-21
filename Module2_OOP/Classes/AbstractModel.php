<?php
abstract class AbstractModel
{

    protected $msg;
    const __DB_INFO = ['localhost', 'root', '', 'duchuong'];
    public function getMessage()
    {
        return "This is my mess";
    }

    //Phuong thuc truu tuowng

    abstract public function show();
    abstract public function add();
    abstract public function update();
    abstract public function delete();
}
