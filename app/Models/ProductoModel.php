<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'precio', 'imagen', 'categoria_id', 'tipo_id', 'estado'];

    public function getProducts($order_type = 'ASC')
    {
        return $this->orderBy('id', $order_type)->findAll();
    }

    public function getProductById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function insertarProducto($datos)
    {
        return $this->insert($datos);
    }

    public function updateProduct($id, $datos)
    {
        return $this->update($id, $datos);
    }
}
