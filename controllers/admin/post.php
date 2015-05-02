<?php

namespace Admin\Controllers;

class Post_Controller extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct(get_class(), 'post', 'admin/post');
    }

    public function index()
    {
        //echo "INDEX";

        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once $this->layout;
    }

//    public function get()
//    {
//        $artists = $this->model->find();
//        var_dump($artists); die();
//        $template_name = DX_ROOT_DIR . $this->views_dir . 'get.php';
//        include_once $this->layout;
//    }

    public function get($id)
    {
        if (empty($id)) {
            $posts = $this->model->find();
        }
        else{
            $posts = $this->model->get_by_id($id);
        }
//        var_dump($posts);
        $template_name = DX_ROOT_DIR . $this->views_dir . 'get.php';
        include_once $this->layout;
    }
}
