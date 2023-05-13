<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\DomicilioModel;

class UsuariosController extends BaseController
{

    private $session;
    private $usuarioModel;
    private $domicilioModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->usuarioModel = new UsuarioModel();
        $this->domicilioModel = new DomicilioModel();
    }

    public function listarUsuarios()
    {

        // Hacer algo con los datos obtenidos, como pasarlos a la vista
    }

    public function login()
    {

        try {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            if ($email == null || $password == null) {
                $this->session->setFlashdata('errorEmpty', 'Todos los campos son obligatorios.');
                return redirect()->to(base_url('/login'));
            }

            if ($email == null || $password == null) {
                $this->session->setFlashdata('errorEmpty', 'Todos los campos son obligatorios.');
                return redirect()->to(base_url('/login'));
            }
            $password = (string) $password;
            $user = $this->usuarioModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['pass'])) {

                // Las credenciales son correctas, iniciar sesión

                // Crear un array con los datos del usuario a almacenar en la sesión
                $sessionData = [
                    'id' => $user['id'],
                    'name' => $user['nombre'],
                    'surname' => $user['apellido'],
                    'username' => $user['usuario'],
                    'email' => $user['email'],
                    'perfil_id' => $user['perfil_id'],
                    'logged_in' => true
                ];

                // Establecer la sesión con los datos del usuario
                $this->session->set($sessionData);
                $this->session->setFlashdata('success', '!Bienvenido(a) ' . $user['nombre'] . ' a Corazón de Cafe!');
                return redirect()->to(base_url('/principal'));
            } else {
                $this->session->setFlashdata('errorLogin', 'Usuario o contraseña incorrectos.');
                return redirect()->to(base_url('/login'));
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Manejo específico para la excepción de CodeIgniter
            echo "No es posible iniciar sesión.";
        } catch (\Exception $e) {
            // Manejo genérico para otras excepciones
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }


    public function register()
    {
        try {
            $usuarioModel = new UsuarioModel();

            $nombre = $this->request->getPost('name');
            $apellido = $this->request->getPost('surname');
            $usuario = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');


            if ($nombre == null || $apellido == null || $usuario == null || $email == null || $password == null) {
                $this->session->setFlashdata('errorEmpty', 'Todos los campos son obligatorios.');
                return redirect()->to(base_url('/register'));
            }

            // transform password to string
            $password = (string) $password;

            $datos = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'usuario' => $usuario,
                'email' => $email,
                'pass' => crypt($password, PASSWORD_DEFAULT),
                'perfil_id' => 1,
                'baja' => 'NO'
            ];
            $existeEmail = $this->usuarioModel->existEmail($email);
            $existeUsuario = $this->usuarioModel->existUser($usuario);

            if ($existeUsuario > 0) {
                // El usuario ya existe, mostrar mensaje de error
                $this->session->setFlashdata('errorUser', 'El usuario ya está registrado.');
                return redirect()->to(base_url('/register'));
            }

            if ($existeEmail > 0) {
                // El correo ya existe, mostrar mensaje de error
                $this->session->setFlashdata('errorEmail', 'El correo ya está registrado.');
                return redirect()->to(base_url('/register'));
            }

            $userId = $this->usuarioModel->insertarUsuario($datos);

            if ($userId) {
                $sessionData = [
                    'id' => $userId,
                    'name' => $datos['nombre'],
                    'surname' => $datos['apellido'],
                    'username' => $datos['usuario'],
                    'email' => $datos['email'],
                    'perfil_id' => $datos['perfil_id'],
                    'logged_in' => true
                ];
                echo 'Usuario insertado correctamente.';
                $this->session->set($sessionData);
                $this->session->setFlashdata('success', '!Gracias ' . $nombre . ' por unirte a Corazón de Cafe!');
                return redirect()->to(base_url('/principal'));
            } else {
                $this->session->setFlashdata('error', 'El correo ya está registrado.');
                echo 'Error al insertar el usuario.';
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Manejo específico para la excepción de CodeIgniter
            echo "No es posible agregar el usuario.";
        } catch (\Exception $e) {
            // Manejo genérico para otras excepciones
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/principal'));
    }

    public function addDomicilio()
    {
        // Get data of the form
        $calle = $this->request->getPost('calle');
        $numero = $this->request->getPost('numero');
        $ciudad = $this->request->getPost('provincia');
        $pais = $this->request->getPost('pais');
        $telefono = $this->request->getPost('localidad');
        $codigoPostal = $this->request->getPost('codigo_postal');

        $numero = (int) $numero;
        $telefono = (int) $telefono;
        $codigoPostal = (int) $codigoPostal;

        $domicilioData = [
            'calle' => $calle,
            'numero' => $numero,
            'ciudad' => $ciudad,
            'pais' => $pais,
            'telefono' => $telefono,
            'codigo_postal' => $codigoPostal
        ];
        
        // Get userId
        $userId = $this->session->get('id');

        // Get domicilioId
        // $domicilioId = $this->domicilioModel->createDomicilio($domicilioData);
        $domicilioId = 2;
        // Insert domicilioId in user
        $this->usuarioModel->addDomicilio($userId, $domicilioId);
    }
}
