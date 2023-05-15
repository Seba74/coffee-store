<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\DomicilioModel;
use App\Models\UsuarioModel;
use App\Models\ProductoModel;
use App\Models\TipoModel;

class Home extends BaseController
{

    private $session;
    private $user;
    private $domicilioModel;
    private $usuarioModel;
    private $productoModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->user = $this->session->get();
        $this->domicilioModel = new DomicilioModel();
        $this->usuarioModel = new UsuarioModel();
        $this->productoModel = new ProductoModel();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function principal()
    {

        $agent = $this->request->getUserAgent();
        $css_file = 'assets/css/styles/views/principal.css';


        $carousel = [
            "assets/img/carousel/1.webp",
            "assets/img/carousel/2.webp",
            "assets/img/carousel/3.webp",
            "assets/img/carousel/4.webp",
            "assets/img/carousel/5.webp",
            "assets/img/carousel/6.webp",
        ];

        if ($agent->isMobile()) {
            $css_file = 'assets/css/styles/views/responsive/principal.css';
            $carousel = [
                "assets/img/carousel/responsive/1.webp",
                "assets/img/carousel/responsive/2.webp",
                "assets/img/carousel/responsive/3.webp",
                "assets/img/carousel/responsive/4.webp",
                "assets/img/carousel/responsive/5.webp",
                "assets/img/carousel/responsive/6.webp",
            ];
        }

        $products = [
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],

        ];

        return view('principal', [
            "products" => $products,
            "titulo" => "Corazón de Café",
            "carousel" => $carousel,
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function quienesSomos()
    {
        $css_file = 'assets/css/styles/views/quienes-somos.css';
        return view('quienes_somos', [
            "titulo" => "Corazón de Café - Quiénes Somos",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function nuestraHistoria()
    {
        $css_file = 'assets/css/styles/views/nuestra-historia.css';

        return view('nuestra_historia', [
            "titulo" => "Corazón de Café - Nuestra Historia",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function trabajaConNosotros()
    {
        $css_file = 'assets/css/styles/views/trabaja-con-nosotros.css';

        return view('trabaja_con_nosotros', [
            "titulo" => "Corazón de Café - Trabaja con Nosotros",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function productoCafe()
    {
        $agent = $this->request->getUserAgent();
        $isMobile = $agent->isMobile();
        $products = [
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],

        ];

        $css_file = 'assets/css/styles/views/producto-cafe.css';

        return view('producto_cafe', [
            "titulo" => "Corazón de Café - Café Grano/Molido",
            "products" => $products,
            "css_file" => $css_file,
            "user" => $this->user,
            "isMobile" => $isMobile
        ]);
    }

    public function productoMarca()
    {

        $products = [
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],
            [
                "name" => "Café Colina",
                "price" => 20,
                "image" => "assets/img/productos/producto-cafe/product-1.png"
            ],
            [
                "name" => "Café Cumbre Descafeinado",
                "price" => 34,
                "image" => "assets/img/productos/producto-cafe/product-2.png"
            ],
            [
                "name" => "Café Cumbre",
                "price" => 30,
                "image" => "assets/img/productos/producto-cafe/product-3.png"
            ],

        ];

        $css_file = 'assets/css/styles/views/producto-cafe.css';
        return view('producto_marca', [
            "titulo" => "Corazón de Café - Articulos de Marca",
            "products" => $products,
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function formularioSeParte()
    {
        $css_file = 'assets/css/styles/views/formulario-se-parte.css';

        return view('se_parte', [
            "titulo" => "Corazón de Café - Sé Parte",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }
    public function formularioEmpresa()
    {
        $css_file = 'assets/css/styles/views/formulario-empresa.css';

        return view('involucra_tu_empresa', [
            "titulo" => "Corazón de Café - Involucra tu empresa",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function contactanos()
    {
        $css_file = 'assets/css/styles/views/contactanos.css';

        return view('contactanos', [
            "titulo" => "Corazón de Café - Contactanos",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function comercializacion()
    {
        $css_file = 'assets/css/styles/views/comercializacion.css';

        return view('comercializacion', [
            "titulo" => "Corazón de Café - Comercialización",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function terminos()
    {
        $css_file = 'assets/css/styles/views/terminos.css';

        return view('terminos', [
            "titulo" => "Corazón de Café - Términos y Condiciones",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function privacidad()
    {
        $css_file = 'assets/css/styles/views/privacidad.css';

        return view('privacidad', [
            "titulo" => "Corazón de Café - Políticas de Privacidad",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function panel()
    {
        if (empty($this->user) || (isset($this->user['role_id']) && $this->user['role_id'] == 4)) {
            return redirect()->to(base_url('/'));
        }

        // add tipoModel and categoryModel
        $categoryModel = new CategoriaModel();
        $typeModel = new TipoModel();

        $products = $this->productoModel->getProducts();

        foreach ($products as &$product) {
            $categoria = $categoryModel->getCategoryById($product['categoria_id']);
            $tipo = $typeModel->getTypeById($product['tipo_id']);
            $product['categoria_nombre'] = $categoria['nombre'];
            $product['tipo_nombre'] = $tipo['nombre'];
        }

        $css_file = 'assets/css/styles/views/panel.css';

        return view('panel', [
            "titulo" => "Corazón de Café - Panel de Control",
            "css_file" => $css_file,
            "user" => $this->user,
            "productos" => $products,
        ]);
    }

    public function crearProducto()
    {
        $css_file = 'assets/css/styles/views/crear-producto.css';

        return view('crear_producto', [
            "titulo" => "Corazón de Café - Agregar Producto",
            "css_file" => $css_file,
            "user" => $this->user,
            "product" => null,
        ]);
    }

    public function editarProducto($id)
    {
        $css_file = 'assets/css/styles/views/crear-producto.css';

        $product = $this->productoModel->getProductById($id);

        $this->session->set('product_id', $id);

        return view('crear_producto', [
            "titulo" => "Corazón de Café - Editar Producto",
            "css_file" => $css_file,
            "user" => $this->user,
            "product" => $product,
        ]);
    }

    public function login()
    {


        if (isset($this->user['logged_in']) && $this->user['logged_in']) {
            return redirect()->to(base_url('/'));
        }

        $css_file = 'assets/css/styles/views/login.css';

        return view('login', [
            "titulo" => "Corazón de Café - Login",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function register()
    {

        if (isset($this->user['logged_in']) && $this->user['logged_in']) {
            return redirect()->to(base_url('/'));
        }
        $css_file = 'assets/css/styles/views/register.css';

        return view('register', [
            "titulo" => "Corazón de Café - Register",
            "css_file" => $css_file,
            "user" => $this->user,
        ]);
    }

    public function profile()
    {
        if (empty($this->user)) {
            return redirect()->to(base_url('/'));
        }

        $css_file = 'assets/css/styles/views/profile.css';
        $userData = $this->usuarioModel->getUserByEmail($this->user['email']);

        $domicilioData = null;
        if ($userData['domicilio_id']) {
            $domicilioId = (int) ($userData['domicilio_id']);
            $domicilioData = $this->domicilioModel->getDomicilioById($domicilioId);
        }

        return view('profile', [
            "titulo" => "Corazón de Café - Perfil",
            "css_file" => $css_file,
            "user" => $this->user,
            "domicilioData" => $domicilioData,
        ]);
    }
}
