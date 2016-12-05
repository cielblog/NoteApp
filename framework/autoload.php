<?php
defined('FRAMEWORK_PATH') OR die("No direct script access allowed.");

// Include config file
require_once(ROOT . DS . APPLICATION_PATH . DS . 'config' . DS . 'config.php');

// Autoload controllers, models, libraries
function __autoload($class_name)
{
    $private_core      = ROOT . DS . FRAMEWORK_PATH . DS . 'core' . DS . strtolower($class_name) . '.class.php';
    $private_libraries = ROOT . DS . FRAMEWORK_PATH . DS . 'libraries' . DS . strtolower($class_name) . '.class.php';
    $libraries_path    = ROOT . DS . APPLICATION_PATH . DS . 'libraries' . DS . strtolower($class_name) . '.class.php';
    $controllers_path  = ROOT . DS . APPLICATION_PATH . DS . 'controllers' . DS . str_replace('controller', '', strtolower($class_name)) . '.controller.php';
    $models_path       = ROOT . DS . APPLICATION_PATH . DS . 'models' . DS . strtolower($class_name) . '.php';

    if (file_exists($private_core))
    {
        require_once($private_core);
    }
    elseif (file_exists($private_libraries))
    {
        require_once($private_libraries);
    }
    elseif (file_exists($libraries_path))
    {
        require_once($libraries_path);
    }
    elseif (file_exists($controllers_path))
    {
        require_once($controllers_path);
    }
    elseif (file_exists($models_path))
    {
        require_once($models_path);
    }
    else
    {
        //throw new Exception('Failed to load component: ' . $class_name);
    }
}

/**
 * If you want to add any settings or include any third_party library,
 * you can do that here!
 */
require_once(ROOT. DS. FRAMEWORK_PATH. DS. 'init.php');