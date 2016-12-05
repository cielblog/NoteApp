<?php
defined('FRAMEWORK_PATH') OR die('No direct script access allowed.');

class View {

    protected $params = [];

    protected $template;

    protected $path;

    public function __construct()
    {
        $this->path = ROOT . DS . APPLICATION_PATH . DS . 'views' . DS . Config::get('DEFAULT_THEME') . DS;
    }

    public function assign($key, $value)
    {
        if (!isset($key))
        {
            return FALSE;
        }

        $this->params[$key] = $value;

        return TRUE;
    }

    public function render($template = NULL, $data = [], $custom_render = FALSE)
    {
        $parent_file = $this->path . "master.phtml";
        $child_path = $this->path . $template . '.phtml';

        // Assign data
        if (count($data))
        {
            foreach ($data as $key => $value) {
                $this->assign($key, $value);
            }
        }

        if (count($this->params))
        {
            foreach ($this->params as $key => $value)
            {
                ${$key} = $value;
            }
        }

        if (file_exists($parent_file))
        {
            //print_r($this->params);
            if (!$custom_render)
            {
                require_once($parent_file);
            }
            else
            {
                require_once($child_path);
            }
        }
        else
        {
            throw new Exception("Master template is not found!");
        }
    }

    private function make_param()
    {
        if (count($this->params))
        {
            foreach ($this->params as $key => $value)
            {
                ${$key} = $value;
            }
        }
    }
}