<?php

namespace App\Models;

use CodeIgniter\Model;

class DomicilioModel extends Model
{
    protected $table = 'domicilios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['calle', 'numero', 'ciudad', 'pais', 'codigo_postal', 'telefono'];

    public function createDomicilio($datos)
    {
        return $this->insert($datos);
    }

    public function getDomicilioById($id)
    {
        $data = $this->where('id', $id);
        return $data->get()->getRowArray();
    }
}
