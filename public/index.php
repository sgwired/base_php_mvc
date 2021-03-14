<?php

/**
 * Front controller
 *
 * PHP version 5.4
 */

// Require the controller class
// require '../App/Controllers/Posts.php';
/**
 * Composer
 */
require '../vendor/autoload.php';

/**
 * Twig
 */
Twig_Autoloader::register();

/**
 * Routing
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Sessions
 */
session_start();

/**
 * Routing
 */
// require '../Core/Router.php';

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('login', ['controller' => 'Login', 'action' => 'new']);
$router->add('logout', ['controller' => 'Login', 'action' => 'destroy']);
$router->add('{controller}/{action}');

// $router->add('{controller}/{id:\d+}/{action}');
// $router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING']);
