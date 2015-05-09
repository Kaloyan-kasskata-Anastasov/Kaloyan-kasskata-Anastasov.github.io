<?php

namespace Controllers;

class Login_Controller extends Master_Controller
{
    public function __construct()
    {
        //echo "USER <br/>";
        parent::__construct(get_class(), 'master', 'login');
    }

    public function index()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $auth = \Lib\Auth::get_instance();
            $is_logged_in = $auth->login($username, $password);
            if ($is_logged_in) {
                header("Location: " . rtrim($_SERVER['REQUEST_URI'], 'login/')."/");
            }
            else echo "<h2>Login Failed</h2>";
        }
        if (empty($_POST['username'])) {
            echo "<h2>Username is required</h2>";
        }

        if (empty($_POST['password'])) {
            echo "<h2>Password is required</h2>";
        }

        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once $this->layout;
    }
}