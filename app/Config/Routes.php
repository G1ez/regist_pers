<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/personas', 'PersonaController::index'); // Listar personas
$routes->get('/personas/create', 'PersonaController::create'); // Mostrar formulario de creación
$routes->post('/personas/store', 'PersonaController::store'); // Guardar nueva persona
$routes->get('/personas/edit/(:num)', 'PersonaController::edit/$1'); // Mostrar formulario de edición
$routes->post('/personas/update/(:num)', 'PersonaController::update/$1'); // Actualizar persona
$routes->get('/personas/delete/(:num)', 'PersonaController::delete/$1'); // Eliminar persona
