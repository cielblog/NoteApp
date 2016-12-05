<?php
defined('FRAMEWORK_PATH') OR die("No direct script access allowed.");

// Load all helpers
foreach (glob(FRAMEWORK_PATH. DS. 'helpers'. DS. '[.helper]*.php') as $helper)
{
    require_once $helper;
}