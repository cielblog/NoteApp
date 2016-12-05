<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

// Define framework path
define('FRAMEWORK_PATH', 'framework');

// Define application path
define('APPLICATION_PATH', 'application');

// Choose environment type
/**
 * Environment help to switch from developer mode,
 * to protection mode.
 *
 * Developer mode : Help the developer with debugging.
 * Protection mode : Turn debugging off.
 */
define('ENVIRONMENT', 'developer');

/**
 * Modify the URI to remove the,
 * parent directory from it, that's help,
 * to install the framework in sub-directory.
 */
$uri = $_SERVER['REQUEST_URI'];

// Get the parent directory.
$parent_directory = end(explode(DS, getcwd()));

// Spilt it as array
$uri = explode("/", $_SERVER['REQUEST_URI']);

// Remove the parent from it.
for ($i = 0; $i < count($uri); $i++)
{
    if ($uri[$i] == $parent_directory)
    {
        unset($uri[$i]);
    }
}

// Return the URI to string again
$uri = implode("/", $uri);

// Assign new string to URI
$_SERVER['REQUEST_URI'] = $uri;

/**
 * Mode switcher
 */
switch (ENVIRONMENT)
{
    case 'developer':
        break;

    case 'protection':
        break;
}

/**
 * Load the framework.
 */
require_once(ROOT . DS . 'framework' . DS . 'autoload.php');


/**
 * For test reason
 * $router = new Router($_SERVER['REQUEST_URI']);
 * echo "<pre>";
 * echo "Route: ". $router->getRoute(). "<br>";
 * echo "Controller: ". $router->getController(). "<br>";
 * echo "Action: ". $router->getAction();
 * echo '<br>';
 * echo "<pre>";
 * print_r($router->getParams());
 */

// Run application
try
{
    App::run($_SERVER['REQUEST_URI']);
}
catch (Exception $e)
{
    #echo $e->getMessage();
    error_handle($e->getMessage());
}