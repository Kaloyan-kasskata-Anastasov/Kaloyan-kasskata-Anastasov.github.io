<?php

define('DX_ROOT_DIR', dirname(__FILE__) . '/');
define('DX_ROOT_PATH', basename(dirname(__FILE__)) . '/');

$PFX_CTRL = 'controllers/';
$PFX_MODEL = 'models/';
$PFX_PHP = '.php';
$request = $_SERVER['REQUEST_URI'];
$request_home = '/' . DX_ROOT_PATH;
$controller = 'master';
$method = 'index';
$admin_routing = false;
$params = array();

include_once 'config/db.php';
include_once 'lib/database.php';
include_once 'lib/authorization.php';
include_once 'controllers/master.php';
include_once 'models/master.php';

if (!empty($request)) {
    if (0 == strpos($request, $request_home)) {
        $request = substr($request, strlen($request_home));

        if (strpos($request, 'admin/') === 0) {
            $admin_routing = true;
            include_once 'controllers/admin/master.php';
            $request = substr($request, strlen('admin/'));
        }

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

            $admin_folder = $admin_routing ? 'admin/' : '';

            include_once $PFX_CTRL . $admin_folder . $controller . $PFX_PHP;
        }
    }
}

$admin_namespace = $admin_routing ? '\Admin' : '';
$controller_class = $admin_namespace . '\Controllers\\' . ucfirst($controller) . '_Controller';
$instance = new $controller_class ();

if (method_exists($instance, $method)) {
    call_user_func_array(array($instance, $method), array($params));
} else {
    echo "Failed to log";
    call_user_func_array(array($instance, 'index'), array($params));
}

$db_object = \lib\Database::get_instance();

//var_dump($db_object::get_db());

//