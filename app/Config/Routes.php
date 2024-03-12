<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Home

$routes->get('/', 'HomeController::index');
$routes->get('home/base', 'HomeController::base');

// Rutas de Autenticación
$routes->get('login', 'AuthController::login');
$routes->get('register', 'AuthController::register');
$routes->post('iniciar_sesion', 'AuthController::iniciar_sesion');
$routes->get('cerrar_sesion', 'AuthController::cerrar_sesion');



// Rutas del Administrador

$routes->get('administrador/dashboard', 'AdminController::mostrarPersonasEntregasRecepciones');


$routes->get('administrador/gestion-usuarios', 'AdminController::gestionUsuarios');
$routes->get('administrador/configuracion-sitio', 'AdminController::configuracionSitio');
$routes->get('administrador/estadisticas', 'AdminController::estadisticas');
$routes->get('administrador/productos_vista', 'AdminController::mostrarProductos');
$routes->get('administrador/usuarios', 'AdminController::usuarios');
$routes->match(['get', 'post'], 'administrador/agregar-persona', 'AdminController::agregarPersona');
$routes->get('administrador/agregar_persona', 'AdminController::agregarPersona');




$routes->get('administrador/editar_persona/(:num)', 'AdminController::editar_persona/$1');
$routes->post('administrador/guardar_edicion_persona/(:num)', 'AdminController::guardar_edicion_persona/$1');

$routes->get('administrador/eliminar_persona/(:num)', 'AdminController::eliminarPersona/$1');


// Rutas del Voluntario
$routes->get('voluntario/dashboard', 'VoluntarioController::dashboard');
$routes->get('voluntario/gestion-donaciones', 'VoluntarioController::gestionDonaciones');

// Rutas de la Organización
$routes->get('organizacion/dashboard', 'OrganizacionController::dashboard');
$routes->get('organizacion/gestion-necesidades', 'OrganizacionController::gestionNecesidades');
$routes->get('organizacion/recibir-donaciones', 'OrganizacionController::recibirDonaciones');

// Otras Rutas
$routes->get('productos/listar', 'ProductosController::listarProductos');
$routes->get('alimentos/listar', 'AlimentosController::listarAlimentos');
$routes->get('contacto', 'ContactoController::formularioContacto');
$routes->get('faq', 'FAQController::preguntasFrecuentes');

// agregar más rutas 

