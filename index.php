<?php
require_once __DIR__ ."/vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;

session_start();
$config = include_once 'config.php';
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $config['host'],
    'database'  => $config['dbname'],
    'username'  => $config['username'],
    'password'  => $config['password'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$path = parse_url($_SERVER['REQUEST_URI']);
$routes =  explode('/', $path['path']);
$controller_name = "userAction";
$method_name = 'index';
$query = $path['query'];
if (!empty($routes[1])) {
    $controller_name = $routes[1];
}
if (!empty($routes[2])) {
    $method_name = $routes[2];
}
$classname = '\homework5\\'.ucfirst($controller_name);
try {
    if (class_exists($classname)) {
        $controller = new $classname();
    } else {
        throw new Exception();
    }
    if (method_exists($controller, $method_name)) {
        $controller->$method_name($query);
    } else {
        throw new Exception();
    }
} catch (Exception $e) {
    require_once 'views/error.php';
}
