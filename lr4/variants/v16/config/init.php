<?php

session_start();

define('ROOT_DIR', dirname(__DIR__));
define('CLASSES_DIR', ROOT_DIR . '/classes');
define('CONTROLLERS_DIR', ROOT_DIR . '/controllers');
define('VIEWS_DIR', ROOT_DIR . '/views');

spl_autoload_register(function (string $className): void {
    foreach ([CLASSES_DIR, CONTROLLERS_DIR] as $dir) {
        $file = $dir . '/' . $className . '.php';
        if (file_exists($file)) require_once $file;
    }
});