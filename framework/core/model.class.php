<?php
defined('APPLICATION_PATH') OR die("No direct script access allowed.");

class Model {

    protected $db;

    public function __construct()
    {
        $this->db = App::$db;
    }

}