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
$routes->get('/', 'Home::principal');
$routes->get('/cafe', 'Home::productoCafe');
$routes->get('/marca', 'Home::productoMarca');
$routes->get('/quienes-somos', 'Home::quienesSomos');
$routes->get('/nuestra-historia', 'Home::nuestraHistoria');
$routes->get('/trabaja-con-nosotros', 'Home::trabajaConNosotros');
$routes->get('/se-parte', 'Home::formularioSeParte');
$routes->get('/involucra-tu-empresa', 'Home::formularioEmpresa');
$routes->get('/contactanos', 'Home::contactanos');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/terminos-condiciones', 'Home::terminos');
$routes->get('/politicas-privacidad', 'Home::privacidad');
$routes->get('/panel-control', 'Home::panel');
$routes->get('/perfil', 'Home::profile');

// Productos

// Page
$routes->get('/producto/agregar', 'Home::crearProducto');

// Create
$routes->post('/producto/crear-producto', 'ProductosController::createProduct');

// Edit
$routes->get('/producto/editar/(:num)', 'Home::editarProducto/$1');
    
$routes->post('/producto/actualizar-producto', 'ProductosController::updateProduct');


// LOGIN AND REGISTER
$routes->get('/login', 'Home::login');
$routes->get('/register', 'Home::register');

$routes->post('/usuario/register', 'UsuariosController::register');
$routes->post('/usuario/login', 'UsuariosController::login');

// Update User
$routes->post('/usuario/domicilio', 'UsuariosController::addDomicilio');

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
