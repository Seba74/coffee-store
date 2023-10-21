<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'precio', 'imagen', 'categoria_id', 'tipo_id', 'estado'];

    public function getProducts($column = 'id', $order_type = 'ASC', $limit = 0, $offset = 0)
    {
        if ($limit == 0 && $offset == 0) {
            return $this->orderBy($column, $order_type)->findAll();
        }

        return $this->orderBy($column, $order_type)->findAll($limit, $offset);
    }

    public function getActiveProducts($stock = false)
    {
        $builder = $this->builder();

        $builder->where('estado', 1);

        if ($stock) {
            $builder->where('stock >', 0);
        }

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getProductsByTypeOrCategory($column = 'tipo_id', $spot = 1, $limit = 0, $offset = 0)
    {
        if ($limit == 0 && $offset == 0) {
            return $this->where($column, $spot)->findAll();
        }

        return $this->where($column, $spot)->findAll($limit, $offset);
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

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }

    public function getFilteredProducts($orderBy, $tipo, $categoria, $text = '', $active = 0, $stock = false)
    {
        $builder = $this->builder();

        // search by text
        if ($text != '') {
            $builder->like('nombre', $text);
        }

        if ($orderBy == 1) {
            $builder->orderBy('precio', 'ASC');
        } elseif ($orderBy == 2) {
            $builder->orderBy('precio', 'DESC');
        }

        if ($tipo != 0) {
            $builder->where('tipo_id', $tipo);
        }

        if ($categoria != 0) {
            $builder->where('categoria_id', $categoria);
        }

        if ($active != 0) {
            if ($active == 1) {
                $builder->where('estado', 'SI');
            } else {
                $builder->where('estado', 'NO');
            }
        }

        if ($stock) {
            $builder->where('stock >', 0);
        }

        $query = $builder->get();
        return $query->getResultArray();
    }
}
