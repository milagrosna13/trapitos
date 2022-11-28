<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/sobrenosotros', 'Home::sobre_nosotros');
$routes->get('/terminosyuso', 'Home::terminosyuso');

$routes->get('/registrarse', 'Usuario_controller::create');
$routes->post('/enviar-form', 'Usuario_controller::formValidation');

$routes->get('/registrarse', 'formController::create');
$routes->post('/enviar-form', 'formController::formValidation');

$routes->get('/login', 'Home::login');

$routes->get('/login', 'login_controller');
$routes->post('/enviarlogin', 'login_controller::auth');
$routes->get('/panel', 'Panel_controller::index', ['filter'=> 'auth']);
$routes->get('/logout', 'login_controller::logout');

//listado usuarios

$routes->get('usuarios-list', 'Datatable_controller::index');

$routes->get('/registro', 'Usuario_controller::create');
$routes->post('/enviar-form', 'Usuario_controller::formValidation');

$routes->get('contact-form', 'formController::create');

$routes->get('/userlist', 'Usuario_crud_controller::index');
$routes->get('/users-form', 'Usuario_crud_controller::create');
//$routes->get('/usuarioseliminados', 'Usuario_crud_controller::usuarios_eliminados');
$routes->get('/usuarioseliminados', 'Usuario_crud_controller::usuarios_eliminados');
$routes->post('/enviar', 'Usuario_crud_controller::store');
$routes->get('/edit-view/(:num)', 'Usuario_crud_controller::singleUser/$1');
$routes->post('update', 'Usuario_crud_controller::update');

$routes->get('/deletelogico/(:num)', 'Usuario_crud_controller::deletelogico/$1');

$routes->get('/micompra/(:num)', 'venta_controller::micompra/$1');
//rutas productos
$routes->get('/crear', 'Productocontroller::index');
//$routes->get('/agregar', 'Productocontroller::index');
$routes->get('/produ-form', 'Productocontroller::crearproducto');
$routes->get('/productoseliminados', 'Productocontroller::productos_eliminados');
$routes->post('/enviar-prod', 'Productocontroller::store');
$routes->get('/editar/(:num)', 'Productocontroller::singleproducto/$1');
$routes->post('modifica/(:num)', 'Productocontroller::modifica/$1');
$routes->get('borrar/(:num)', 'Productocontroller::deletelogico/$1');

// $routes->get('/editar_producto', 'Productocontroller::editar_producto');
// $routes->get('/actualizar_producto', 'Productocontroller::actualizar_producto');
// $routes->post('/actualizar_producto', 'Productocontroller::actualizar_producto');

$routes->get('activar/(:num)', 'Productocontroller::activarproducto/$1');

$routes->get('/eliminados', 'Productocontroller::no_stock_productos');
$routes->get('/restaurar_producto', 'Productocontroller::restaurar_producto');
// rutas carrito

$routes->get('/carrito', 'carrito_controller::index');
$routes->get('/todos', 'carrito_controller::catalogo');
$routes->get('/carrito_actualiza', 'carrito_controller::actualiza_carrito');
$routes->post('/carrito_agrega', 'carrito_controller::add');
$routes->get('/muestro', 'carrito_controller::muestra');

$routes->get('/borrar', 'carrito_controller::eliminar_carrito');
$routes->get('/eliminarcarro', 'carrito_controller::borrarcarrito');
$routes->get("/prodAumentar", "carrito_controller::sumarProd");
$routes->get("/prodRestar", "carrito_controller::restarProd");
$routes->get('/rechazCompra', 'venta_controller::rechazadaCompra');

$routes->get('/comprar', 'Venta_controller::comprar');
$routes->post('/comprar', 'Venta_controller::comprar');

$routes->get('/detalle/(:num)', 'Venta_controller::muestra_detalle/$1');

$routes->get('/agregar_consulta', 'Consulta_controller::agregar_consulta');
$routes->post('/agregar_consulta', 'Consulta_controller::agregar_consulta');

$routes->get('/consultas', 'Consulta_controller::ver_consulta');
$routes->post('/consultas', 'Consulta_controller::ver_consulta');

$routes->get('/consultas_contestado', 'consulta_controller::contestar_consulta');

$routes->get('/exitosa', 'venta_controller::ventamsj');
$routes->get('/ventas', 'venta_controller::ver_ventas');

$routes->post('/consultas_contestado', 'consulta_controller::contestar_consulta');
  
$routes->get('dashboard', 'Usuario_controller::dashboard');
$routes->get('dashboard_usuario', 'Usuario_controller::dashboard_usuario');

 //$routes->get('/consultas_constestado', 'Consulta_controller::contestar_consulta');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
