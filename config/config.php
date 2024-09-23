<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'sistema_estoque');
define('DB_USER', 'root');
define('DB_PASS', '');

spl_autoload_register(function ($class) {
    include_once __DIR__ . '/../classes/' . $class . '.php';
});
?>
