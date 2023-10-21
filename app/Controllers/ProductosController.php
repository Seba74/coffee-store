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

            if (!is_numeric($categoria_id) || !is_numeric($tipo_id) || $nombre == null || $precio == null) {
                $this->session->setFlashdata('error', 'Todos los campos son obligatorios');
                return redirect()->to(base_url('producto/agregar'));
            }

            if (!is_numeric($precio)) {
                $this->session->setFlashdata('error', 'El precio debe ser un número');
                return redirect()->to(base_url('producto/agregar'));
            }

            if (!($imagen && $imagen->isValid())) {
                $this->session->setFlashdata('error', 'No se ha seleccionado una imagen válida');
                return redirect()->to(base_url('producto/agregar'));
            }

            $image = $imagen->getRandomName();
            $precio = (float) $precio;

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
            return redirect()->to(base_url('gestion-productos'));
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

            if (!is_numeric($precio)) {
                $this->session->setFlashdata('error', 'El precio debe ser un número');
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

            $this->session->remove('product_id');
            $this->session->setFlashdata('success', 'Producto actualizado correctamente');
            return redirect()->to(base_url('gestion-productos'));
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Manejo específico para la excepción de CodeIgniter
            echo "No es posible actualizar el producto.";
        } catch (\Exception $e) {
            // Manejo genérico para otras excepciones
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }

    public function deleteProduct($id)
    {

        try {
            if ($id == null) {
                $this->session->setFlashdata('error', 'No se ha seleccionado un producto');
                return redirect()->to(base_url('gestion-productos'));
            }

            $productToDelete = $this->productModel->getProductById($id);
            $image = $productToDelete['imagen'];
            unlink('./assets/img/productos/producto-cafe/' . $image);
            $this->productModel->deleteProduct($id);

            $this->session->remove('product_id');
            $this->session->setFlashdata('success', 'Producto eliminado correctamente');
            return redirect()->to(base_url('gestion-productos'));
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Manejo específico para la excepción de CodeIgniter
            echo "No es posible eliminar el producto.";
        } catch (\Exception $e) {
            // Manejo genérico para otras excepciones
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }

    public function filterProducts($id)
    {
        $orderBy = $this->request->getPost('orderBy');
        $tipoCafe = $this->request->getPost('tipo');
        $categoria = $this->request->getPost('categoria');
        $estado = $this->request->getPost('estado');
        $text = $this->request->getPost('text');

        if (!$orderBy) $orderBy = 1;
        if (!$tipoCafe) $tipoCafe = 0;
        if (!$categoria) $categoria = 0;
        if (!$estado) $estado = 0;
        if (!$text) $text = '';

        if ($id != 1) {
            $productos = $this->productModel->getFilteredProducts($orderBy, $tipoCafe, $categoria, $text);
            $this->session->set('productos', $productos);
            $this->session->set('filters', [$orderBy, $tipoCafe, $categoria, $text]);
            return redirect()->to(base_url('productos'));
        } else {
            $productos = $this->productModel->getFilteredProducts($orderBy, $tipoCafe, $categoria, $text, $estado);
            $this->session->set('gestionProductos', $productos);
            $this->session->set('gestionFilters', [$orderBy, $tipoCafe, $categoria, $text, $estado]);
            return redirect()->to(base_url('gestion-productos'));
        }
    }
}
