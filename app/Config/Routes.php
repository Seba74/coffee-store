<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// HOME PAGE
$routes->get('/', 'Home::principal');

// ABOUT US
$routes->get('/quienes-somos', 'Home::quienesSomos');
$routes->get('/nuestra-historia', 'Home::nuestraHistoria');
$routes->get('/trabaja-con-nosotros', 'Home::trabajaConNosotros');
$routes->get('/se-parte', 'Home::formularioSeParte');
$routes->get('/involucra-tu-empresa', 'Home::formularioEmpresa');

// CONTACT US
$routes->get('/contactanos', 'Home::contactanos');

// PAYMENT METHODS
$routes->get('/comercializacion', 'Home::comercializacion');

// TERMS AND CONDITIONS
$routes->get('/terminos-condiciones', 'Home::terminos');
$routes->get('/politicas-privacidad', 'Home::privacidad');

// PANEL CONTROL
$routes->get('/gestion-productos', 'Home::gestionProductos');

// PROFILE
$routes->get('/perfil', 'Home::profile');


// PRODUCTS

// products Pages
$routes->get('/productos', 'Home::productos');

// Add Product
$routes->get('/producto/agregar', 'Home::crearProducto');

// Create product
$routes->post('/producto/crear-producto', 'ProductosController::createProduct');

// Edit Product
$routes->get('/producto/editar/(:num)', 'Home::editarProducto/$1');
$routes->post('/producto/actualizar-producto', 'ProductosController::updateProduct');

// Delete Product
$routes->get('/producto/eliminar/(:num)', 'ProductosController::deleteProduct/$1');

// Filter
$routes->post('/producto/filtrar/(:num)', 'ProductosController::filterProducts/$1');

// LOGIN AND REGISTER
$routes->get('/login', 'Home::login');
$routes->get('/register', 'Home::register');

// Register and Login User Controller
$routes->post('/usuario/register', 'UsuariosController::register');
$routes->post('/usuario/login', 'UsuariosController::login');

// Update address user
$routes->post('/usuario/domicilio', 'UsuariosController::addDomicilio');

// Finalizar Compra
$routes->get('/checkout', 'Home::checkout');

// Guardar Canasta
$routes->post('/cart/save-cart', 'CartController::getSaveCart');

// Log Out
$routes->get('/logout', 'UsuariosController::logout');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
