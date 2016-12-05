<?php
defined('FRAMEWORK_PATH') OR die("No direct script access allowed.");

class App {

    protected static $router;

    public static $db;

    public static $view;

    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri)
    {
        self::$router = new Router($uri);

        $db_config = Config::get('DB');
        self::$db  = new DB([
            'database_type' => $db_config['type'],
            'database_name' => $db_config['name'],
            'server'        => $db_config['host'],
            'username'      => $db_config['username'],
            'password'      => $db_config['password'],
            'charset'       => $db_config['charset']
        ]);

        // View
        self::$view = new View();

        $controller_class  = ucfirst(self::$router->getController()) . 'Controller';
        $controller_method = strtolower(self::$router->getMethodPrefix() . self::$router->getAction());

        // Check if controller exists, otherwise print 404
        if (class_exists(ucfirst(self::$router->getController()) . 'Controller'))
        {
            $controller_object = new $controller_class();
        }
        else
        {
            throw new Exception("ControllerDoesNotExists");
        }

        // Calling controller's method
        if (method_exists($controller_object, $controller_method))
        {
            $result = $controller_object->$controller_method();
        }
        else
        {
            throw new Exception("MethodDoesNotExists");
        }

    }
}