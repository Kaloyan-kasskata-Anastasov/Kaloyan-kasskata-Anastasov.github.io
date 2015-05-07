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
        $post = $this->model->get_by_id($id);
        $post = $post[0];
        $comments = $this->model->get_comments($id);
        $user_id = $post['user_id'];
        $author = $this->model->get_author($user_id);
        $author = $author[0];
        $template_name = DX_ROOT_DIR . $this->views_dir . 'get.php';
        include_once $this->layout;
    }
}
