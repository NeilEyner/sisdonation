<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Home

$routes->get('/', 'HomeController::index');
$routes->get('home/base', 'HomeController::base');
$routes->get('home/inicio', 'HomeController::inicio');
$routes->get('home/quienes_somos', 'HomeController::quienes_somos');
$routes->get('home/donaciones', 'HomeController::donaciones');
$routes->get('home/contacto', 'HomeController::contacto');
$routes->get('home/preguntas', 'HomeController::preguntas');

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

$routes->match(['get', 'post'], 'administrador/agregar-organizacion', 'AdminController::agregarOrganizacion');
$routes->get('administrador/agregar_organizacion', 'AdminController::agregarOrganizacion');
$routes->get('administrador/editar_organizacion/(:num)', 'AdminController::editar_organizacion/$1');
$routes->post('administrador/guardar_edicion_organizacion/(:num)', 'AdminController::guardar_edicion_organizacion/$1');
$routes->get('administrador/eliminar_organizacion/(:num)', 'AdminController::eliminarOrganizacion/$1');



// Rutas del Voluntario
$routes->get('voluntario/dashboard', 'VoluntarioController::dashboard');
$routes->get('voluntario/registro_actividades', 'VoluntarioController::registroActividades');
$routes->get('voluntario/busqueda_oportunidades', 'VoluntarioController::busquedaOportunidades');
$routes->get('voluntario/perfil', 'VoluntarioController::perfil');

// Rutas de la Organización
$routes->get('organizacion_benefica/dashboard', 'OrganizacionBeneficaController::dashboard');

$routes->get('organizacion_benefica/gestion_productos', 'OrganizacionBeneficaController::gestionProductos');
$routes->post('organizacion_benefica/agregar_producto', 'OrganizacionBeneficaController::agregarProducto');
$routes->get('organizacion_benefica/editar_producto/(:num)', 'OrganizacionBeneficaController::editarProducto/$1');
$routes->post('organizacion_benefica/actualizar_producto/(:num)', 'OrganizacionBeneficaController::actualizarProducto/$1');
$routes->get('organizacion_benefica/eliminar_producto/(:num)', 'OrganizacionBeneficaController::eliminarProducto/$1');

$routes->get('organizacion_benefica/gestion_alimentos', 'OrganizacionBeneficaController::gestionAlimentos');
$routes->post('organizacion_benefica/agregar_alimento', 'OrganizacionBeneficaController::agregarAlimento');
$routes->get('organizacion_benefica/editar_alimento/(:num)', 'OrganizacionBeneficaController::editarAlimento/$1');
$routes->post('organizacion_benefica/actualizar_alimento/(:num)', 'OrganizacionBeneficaController::actualizarAlimento/$1');
$routes->get('organizacion_benefica/eliminar_alimento/(:num)', 'OrganizacionBeneficaController::eliminarAlimento/$1');

$routes->get('organizacion_benefica/seguimiento_donaciones', 'OrganizacionBeneficaController::seguimientoDonaciones');
$routes->get('organizacion_benefica/donaciones_pendientes', 'OrganizacionBeneficaController::donacionesPendientes');


$routes->get('organizacion_receptora/dashboard', 'OrganizacionReceptoraController::dashboard');
