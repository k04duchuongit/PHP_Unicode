<?php
class Product extends Controller
{
    public $data = [];
    public $model;
    public function __construct()
    {
        $this->model = $this->model('ProductModel');   //load model
    }
    public function index()
    {
       echo 'index cua product';
    }
    public function list_product()
    {
        $dataProducts =  $this->model->getProductList();
        $title =  'Danh sách sản phẩm';

        $this->data['sub_content']['list_product'] = $dataProducts;
        $this->data['sub_content']['page_title'] = $title;
        $this->data['content'] = 'products/list';

        //Render view
        $this->render('layouts/client_layout', $this->data);
    }

    public function detail($id = 0)
    {
        $this->data['sub_content']['info'] =  $this->model->getDetail($id);

        $this->data['content'] = 'products/detail';
        $this->render('layouts/client_layout', $this->data);   //Render layout mastermaster
    }
}
