<?php

namespace Controllers;

class Post_Controller extends Master_Controller
{
    public function __construct()
    {
        //echo "USER <br/>";
        parent::__construct(get_class(), 'post', 'post');
    }

    public function index()
    {
        //echo "INDEX";
        $artists = $this->model->find();

        var_dump($artists); die();
        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once $this->layout;
    }

    public function getAllPosts()
    {
        $template_name = DX_ROOT_DIR . $this->views_dir . 'getAllPosts.php';

        include_once $this->layout;
    }
}
