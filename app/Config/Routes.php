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
$routes->get('/', 'Home::login');
$routes->get('/Dashboard', 'Home::index');
$routes->post('/iniciar', 'Home::iniciar');
//categoria
$routes->get('/Categoria', 'CategoriaController::index');
$routes->get('/Categoria/(:any)', 'CategoriaController::obtener/$1');
$routes->post('/Categoria/insertar', 'CategoriaController::insertar');
$routes->post('/Categoria/actualizar', 'CategoriaController::actualizar');
$routes->get('/Categorias/estado/(:any)/(:any)', 'CategoriaController::estado/$1/$2');

//SubCategoria
$routes->get('/SubCategoria/(:any)', 'SubCategoriaController::obtener/$1');
$routes->get('/SubCategoria', 'SubCategoriaController::index');
$routes->post('/SubCategoria/insertar', 'SubCategoriaController::insertar');
$routes->post('/SubCategoria/actualizar', 'SubCategoriaController::actualizar');
$routes->get('/SubCategorias/estado/(:any)/(:any)', 'SubCategoriaController::estado/$1/$2');
// caja
$routes->get('/Caja/(:any)', 'CajaController::index/$1');
$routes->get('/actualizar/(:any)', 'CajaController::obtener/$1');
$routes->post('/caja/actualizar/', 'CajaController::actualizar');
$routes->get('/Cajas/(:any)', 'CajaController::cajas/$1');
$routes->get('/kardex', 'CajaController::kardex');
$routes->get('/procesar/(:any)', 'CajaController::procesar/$1');
$routes->get('/proceso/eliminar/(:any)', 'CajaController::eliminar/$1');
$routes->post('/Caja/insertar', 'CajaController::insertar');
$routes->post('/BuscarCliente', 'CajaController::buscar');
$routes->post('/pro/insertar', 'CajaController::insertartmp');
$routes->get('/impresion/(:any)', 'CajaController::imp/$1');

//tipo Cliente
$routes->get('/Tipocliente', 'TipoclienteController::index');
$routes->get('/Tipocliente/(:any)', 'TipoclienteController::obtener/$1');
$routes->get('/Tipoclientes/estado/(:any)/(:any)', 'TipoclienteController::estado/$1/$2');

$routes->post('/Tipocliente/insertar', 'TipoclienteController::insertar');
$routes->post('/Tipocliente/actualizar', 'TipoclienteController::actualizar');
// Cliente
$routes->get('/Cliente', 'ClienteController::index');
$routes->get('/Cliente/(:any)', 'ClienteController::obtener/$1');
$routes->get('/Clientes/estado/(:any)/(:any)', 'ClienteController::estado/$1/$2');

$routes->post('/Cliente/insertar', 'ClienteController::insertar');
$routes->post('/Cliente/actualizar', 'ClienteController::actualizar');

//Progrmados

$routes->get('/Programados/(:any)', 'ProgramadosController::index/$1');
$routes->post('/Programados/insertar', 'ProgramadosController::insertar');


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
