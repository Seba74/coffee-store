<?php

namespace App\Models;

use CodeIgniter\Model;

class CartProductModel extends Model
{
    protected $table = 'cart_productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cart_id', 'product_id', 'precio', 'cantidad'];

    public function addProductCart($data)
    {
        return $this->insert($data);
    }

    public function getProductCartById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getProductCartByUserId($id)
    {
        return $this->where('usuario_id', $id)->first();
    }
}
