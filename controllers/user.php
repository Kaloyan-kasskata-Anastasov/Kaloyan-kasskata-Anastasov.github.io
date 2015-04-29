<?php

namespace Controllers;

class User_Controller extends Master_Controller
{
    public function __construct()
    {
        //echo "USER <br/>";
        parent::__construct('user');
    }

    public function index()
    {
        //echo "INDEX";
        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once $this->layout;
    }

    public function getAllPosts()
    {
        $template_name = DX_ROOT_DIR . $this->views_dir . 'getAllPosts.php';

        include_once $this->layout;
    }
}
