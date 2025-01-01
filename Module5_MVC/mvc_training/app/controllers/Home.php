<?php
class Home extends Controller
{

    public $province;
    public function __construct()
    {
        $this->province = $this->model('HomeModel');  //load model home
    }

    public function index()
    {
        $data = $this->province->first();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
