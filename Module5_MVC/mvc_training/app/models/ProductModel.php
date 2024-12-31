<?php
class ProductModel
{

    public function getProductList()
    {
        return [
            'Item1',
            'Item2',
            'Item3'
        ];
    }


    public function getDetail($id)
    {
        $data = [
            'Item1',
            'Item2',
            'Item3'
        ];
        return $data[$id];
    }
}
