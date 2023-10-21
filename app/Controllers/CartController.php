<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\CartProductModel;
use App\Models\ProductoModel;

class CartController extends BaseController
{

    private $session;
    private $user;
    private $productoModel;
    private $cartModel;
    private $cartProductModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->user = $this->session->get();
        $this->productoModel = new ProductoModel();
        $this->cartModel = new CartModel();
        $this->cartProductModel = new CartProductModel();
    }

    public function addToCart($id)
    {
        $producto = $this->productoModel->getProductById($id);
        $cart = $this->session->get('cart');
        if ($cart == null) {
            $cart = [];
        }
        $cart[] = $producto;
        $this->session->set('cart', $cart);
        return redirect()->to(base_url('carrito'));
    }


    public function getSaveCart()
    {
        try {
            $cart = json_decode($this->request->getBody());
            $this->session->set('cart', $cart);

            $totalInCart = 0;
            foreach ($cart as $item) {
                $totalInCart += $item->total;
            }

            $cartId = $this->cartModel->addCart([
                'usuario_id' => $_SESSION['id'],
                'fecha_creacion' => date('Y-m-d H:i:s'),
                'estado' => 'cerrado',
                'total' => $totalInCart,
            ]);
            $this->session->set('cartId', $cartId);
            if ($cartId) {
                foreach ($cart as $item) {
                    $product = $item->product;
                    $quantity = $item->quantity;
                    $this->cartProductModel->addProductCart([
                        'cart_id' => $cartId,
                        'product_id' => $product->id,
                        'precio' => $product->precio,
                        'cantidad' => $quantity,
                    ]);
                }
                $this->session->setFlashdata('successBuying', 'Compra realizada con éxito');
                return redirect()->to(base_url('/perfil'));
            } else {
                $this->session->setFlashdata('errorCompra', 'Error al realizar la compra');
                return redirect()->back();
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Manejo específico para la excepción de CodeIgniter
            echo "No es posible agregar el producto.";
        } catch (\Exception $e) {
            // Manejo genérico para otras excepciones
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }
}
