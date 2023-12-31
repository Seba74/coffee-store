<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoModel extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'activo'];

    public function getTypeById($id)
    {
        return $this->where('id', $id)->first();
    }
}
