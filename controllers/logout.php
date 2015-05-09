<?php

namespace Controllers;

class Logout_Controller extends Master_Controller
{
    public function __construct()
    {
        //echo "USER <br/>";
        parent::__construct(get_class(), 'master', 'logout');
    }

    public function index()
    {
        echo "<h2>LOGOUT INDEX</h2>";
        if (!empty($_POST['yes'])) {
            $auth = \Lib\Auth::get_instance();
            var_dump($_POST);
            $auth->logout();
            header("Location: " . rtrim($_SERVER['REQUEST_URI'], 'logout/')."/");
        }

        $template_name = DX_ROOT_DIR . $this->views_dir . 'logout.php';
        include_once $this->layout;
    }
}