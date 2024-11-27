<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Rutas del CRUD de Personas
$routes->get('/personas', 'PersonaController::index');          // Listar personas
$routes->get('/personas/create', 'PersonaController::create');  // Formulario de creación
$routes->post('/personas', 'PersonaController::store');         // Guardar nueva persona
$routes->get('/personas/edit/(:num)', 'PersonaController::edit/$1');  // Formulario de edición
$routes->post('/personas/update/(:num)', 'PersonaController::update/$1'); // Actualizar persona
$routes->get('/personas/delete/(:num)', 'PersonaController::delete/$1'); // Eliminar persona