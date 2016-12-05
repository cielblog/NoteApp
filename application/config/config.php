<?php

// Application information
Config::set('APP_NAME', 'Note Generator');
Config::set('APP_VER', '1.0.0');

// Website information
Config::set('SITE_NAME', 'Note Generator');
Config::set('SITE_URL', 'http://localhost/NoteApp');

// Some configuration
Config::set('DEFAULT_THEME', 'default');

// Database information
Config::set('DB', [
    'type'     => 'mysql',
    'host'     => 'localhost',
    'name'     => 'note',
    'username' => 'root',
    'password' => '',
    'charset'  => 'utf8'
]);

// Routes
Config::set('ROUTERS', [
    'default' => '',
    'admin'   => 'admin'
]);

/**
 * DEFAULT_ROUTE => hidden from URL
 * DEFAULT_CONTROLLER => like index page, what seen first
 * DEFAULT_METHOD => index <later it must be automatically>
 */
Config::set('DEFAULT_ROUTE', 'default');
Config::set('DEFAULT_CONTROLLER', 'welcome');
Config::set('DEFAULT_ACTION', 'index');
Config::set('ERROR_CONTROLLER', 'eh');



