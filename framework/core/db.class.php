<?php
defined('FRAMEWORK_PATH') OR die("No direct script access allowed.");

class DB extends medoo {

    public function __construct($options)
    {
        parent::__construct($options);
    }
}