<?php
class Controller
{
    public function model($model)   // Load model (kết nối với model)
    {
        if (file_exists(_DIR_ROOT . '/app/models/' . $model . '.php')) {   //kiểm tra file model có tồn tại không
            require_once _DIR_ROOT . '/app/models/' . $model . '.php';   //nếu có thì require file model
            if (class_exists($model)) {             //kiểm tra class có tồn tại không
                $model = new $model;
                return $model;
            }
            return false;
        }
    }

    public function render($view, $data = [])
    {
        extract($data); //extract: chuyển các phần tử của mảng thành các biến
        if (file_exists(_DIR_ROOT . '/app/views/' . $view . '.php')) {
            require_once _DIR_ROOT . '/app/views/' . $view . '.php';
        } else {
            echo 'View not found';
        }
    }
}
