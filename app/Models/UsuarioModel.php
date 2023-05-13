<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'domicilio_id', 'perfil_id', 'baja'];

    public function obtenerUsuarios()
    {
        return $this->findAll();
    }

    public function insertarUsuario($datos)
    {
        return $this->insert($datos);
    }

    public function actualizarUsuario($id, $datos)
    {
        return $this->update($id, $datos);
    }

    public function getUserByEmail($email)
    {
        $data = $this->where('email', $email);
        return $data->get()->getRowArray();
    }

    public function existEmail($email)
    {
        $data = $this->where('email', $email);
        return $data->countAllResults();
    }

    public function existUser($user)
    {
        $data = $this->where('usuario', $user);
        return $data->countAllResults();
    }

    public function addDomicilio($id, $domicilioId)
    {
        return $this->update($id, ['domicilio_id' => $domicilioId]);
    }
    // ... otros métodos para interactuar con la tabla de usuarios
}
