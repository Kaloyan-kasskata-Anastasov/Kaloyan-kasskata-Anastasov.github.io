<?php

namespace Controllers;

class Post_Controller extends Master_Controller
{
    public function __construct()
    {
        parent::__construct(get_class(), 'post', 'post');
    }

    public function index()
    {
        $posts = $this->model->find();

        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once $this->layout;
    }

    public function get($id)
    {
        $posts = $this->model->get_by_id($id);
        $comments = $this->model->get_comments($id);

        $template_name = DX_ROOT_DIR . $this->views_dir . 'get.php';
        include_once $this->layout;
    }
}
