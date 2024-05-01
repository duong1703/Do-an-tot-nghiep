<?php

namespace App\Libraries;

class CustomCart
{
    protected $items = [];

    public function add($id, $name, $qty, $price)
    {
        // Thêm một mục vào giỏ hàng
        $this->items[] = [
            'id' => $id,
            'name' => $name,
            'qty' => $qty,
            'price' => $price
        ];
    }

    public function getContents()
    {
        // Trả về danh sách các mục trong giỏ hàng
        return $this->items;
    }
}