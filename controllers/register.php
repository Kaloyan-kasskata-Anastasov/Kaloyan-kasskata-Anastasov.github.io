<?php

namespace Controllers;

class Register_Controller extends Master_Controller
{
    public function __construct()
    {
        //echo "USER <br/>";
        parent::__construct(get_class(), 'master', 'register');
    }

    public function index()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $mail = $_POST['mail'];
            $new_user = array(
                'username' => $username,
                'password' => $password,
                'email' => $mail
            );
            $result = $this->model->register($new_user);
            if ($result === 1) {
                header("Location: " . rtrim($_SERVER['REQUEST_URI'], 'register/') . "/login/");
            } else {
                echo "<h2>Username/Password issue, please try again</h2>";
            }
        }

        if (empty($_POST['username']) || empty($_POST['password'])) {
            echo "<h2>Username and password is required. Type it both</h2>";
        }

        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once $this->layout;
    }
}