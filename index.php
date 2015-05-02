<?php

//echo "Front controller router";

define('DX_ROOT_DIR', dirname(__FILE__) . '/');
define('DX_ROOT_PATH', basename(dirname(__FILE__)) . '/');

$PFX_CTRL = 'controllers/';
$PFX_MODEL = 'models/';
$PFX_PHP = '.php';
$request = $_SERVER['REQUEST_URI'];
$request_home = '/' . DX_ROOT_PATH;
$controller = 'master';
$method = 'index';
$params = array();


include_once 'config/db.php';
include_once 'lib/database.php';
include_once 'lib/authorization.php';
include_once 'controllers/master.php';
include_once 'models/master.php';

if (!empty($request)) {
    if (0 == strpos($request, $request_home)) {
        $request = substr($request, strlen($request_home));
        $components = explode('/', $request, 3);

        if (1 < count($components)) {
            if (strlen($components[0]) > 0) {
                $controller = $components[0];
            }
            if (strlen($components[1]) > 0) {
                $method = $components[1];
            }
            if (isset($components[2])) {
                $params = $components[2];
            }

            include_once $PFX_CTRL . $controller . $PFX_PHP;
        }
    }
}

//var_dump($components);
//var_dump($controller);
//var_dump($method);
//var_dump($params);

$controller_class = '\Controllers\\' . ucfirst($controller) . '_Controller';
$instance = new $controller_class ();

if (method_exists($instance, $method)) {
    call_user_func_array(array($instance, $method), array($params));
} else {
    //TODO: Error Log
    call_user_func_array(array($instance, 'index'), array($params));
}

$db_object = \lib\Database::get_instance();

//var_dump($db_object::get_db());

//