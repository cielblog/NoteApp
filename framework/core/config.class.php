<?php
defined('FRAMEWORK_PATH') OR die("No direct script access allowed.");

class Config {

    // Config items stack.
    protected static $settings = [];

    public static function get($key)
    {
        // Check if item is exists.
        if (isset(self::$settings[$key]))
        {
            // Return the value of item.
            return self::$settings[$key];
        }
        else
        {
            // Return null.
            return null;
        }
    }

    /**
     * Set()
     * @param $key
     * @param $value
     */
    public static function set($key, $value)
    {
        // Store new config item to stack.
        self::$settings[$key] = $value;
    }
}