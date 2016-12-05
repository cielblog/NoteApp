<?php
defined('FRAMEWORK_PATH') OR die("No direct script access allowed.");

class Router {

    protected $uri;

    protected $controller;

    protected $action;

    protected $params;

    protected $route;

    protected $method_prefix;

    public function __construct($uri)
    {
        $this->uri = urldecode(trim($uri, '/'));

        // Get default router
        $routers             = Config::get('ROUTERS');
        $this->route         = Config::get('DEFAULT_ROUTE');
        $this->method_prefix = isset($routes[$this->route]) ? $routers[$this->route] : '';
        $this->controller    = Config::get('DEFAULT_CONTROLLER');
        $this->action        = Config::get('DEFAULT_ACTION');

        $uri_parts = explode('?', $this->uri);

        // Get path line
        $path = $uri_parts[0];

        $path_parts = explode("/", $path);

        if (count($path_parts))
        {

            // Get the router first ^^
            if (in_array(strtolower(current($path_parts)), array_keys($routers)))
            {
                $this->route         = strtolower(current($path_parts));
                $this->method_prefix = isset($routers[$this->route]) ? $routers[$this->route] : '';
                array_shift($path_parts);
            }

            /**
             * Later if we want to use language system,
             * will implement it here as elseif.
             */

            // Get controller
            if (current($path_parts))
            {
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            // Get action
            if (current($path_parts))
            {
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            // Get parameters
            $this->params = $path_parts;

        }
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }


    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }


}