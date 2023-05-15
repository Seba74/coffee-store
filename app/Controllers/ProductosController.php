<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ProductosController extends BaseController
{

    private $session;
    private $productModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->productModel = new ProductoModel();
    }

    public function createProduct()
    {
        try {
            $nombre = $this->request->getPost('name');
            $precio = $this->request->getPost('price');
            $imagen = $this->request->getFile('image');
            $categoria_id = $this->request->getPost('category');
            $tipo_id = $this->request->getPost('type');
            $estado = $this->request->getPost('status');

            if (!is_numeric($categoria_id) || !is_numeric($tipo_id) || $nombre == null || $precio == null || $imagen == null) {
                $this->session->setFlashdata('error', 'Todos los campos son obligatorios');
                return redirect()->to(base_url('producto/agregar'));
            }

            $image = $imagen->getRandomName();

            $imagen->move('./assets/img/productos/producto-cafe', $image);

            $data = [
                'nombre' => $nombre,
                'precio' => $precio,
                'imagen' => $image,
                'categoria_id' => $categoria_id,
                'tipo_id' => $tipo_id,
                'estado' => $estado
            ];

            $this->productModel->insert($data);

            $this->session->setFlashdata('success', 'Producto agregado correctamente');
            return redirect()->to(base_url('panel-control'));
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Manejo específico para la excepción de CodeIgniter
            echo "No es posible agregar el producto.";
        } catch (\Exception $e) {
            // Manejo genérico para otras excepciones
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }

    public function updateProduct()
    {
        try {

            $id = $this->session->get('product_id');
            $id = (int) $id;

            $nombre = $this->request->getPost('name');
            $precio = $this->request->getPost('price');
            $imagen = $this->request->getFile('image');

            if (!($imagen && $imagen->isValid())) {
                $imagen = null;
            }

            $categoria_id = $this->request->getPost('category');
            $tipo_id = $this->request->getPost('type');
            $estado = $this->request->getPost('status');



            if (!is_numeric($categoria_id) || !is_numeric($tipo_id) || $nombre == null || $precio == null) {
                $this->session->setFlashdata('error', 'Todos los campos son obligatorios');
                return redirect()->to(base_url('producto/editar/' . $id));
            }

            $data = [
                'nombre' => $nombre,
                'precio' => $precio,
                'categoria_id' => $categoria_id,
                'tipo_id' => $tipo_id,
                'estado' => $estado
            ];

            if ($imagen != null) {
                $image = $imagen->getRandomName();
                $imagen->move('./assets/img/productos/producto-cafe', $image);
                $data['imagen'] = $image;

                $product = $this->productModel->getProductById($id);
                $oldImage = $product['imagen'];
                unlink('./assets/img/productos/producto-cafe/' . $oldImage);
            } else {
                $product = $this->productModel->getProductById($id);
                $data['imagen'] = $product['imagen'];
            }

            $this->productModel->updateProduct($id, $data);

            $this->session->setFlashdata('success', 'Producto actualizado correctamente');
            return redirect()->to(base_url('panel-control'));
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Manejo específico para la excepción de CodeIgniter
            echo "No es posible actualizar el producto.";
        } catch (\Exception $e) {
            // Manejo genérico para otras excepciones
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }
}
