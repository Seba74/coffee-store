<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'fecha_creacion', 'estado', 'total'];

    public function addCart($data)
    {
        return $this->insert($data);
    }

    public function getCartById($id){
        return $this->where('id', $id)->first();
    }

    public function getCartByUserId($id){
        return $this->where('usuario_id', $id)->first();
    }

}
