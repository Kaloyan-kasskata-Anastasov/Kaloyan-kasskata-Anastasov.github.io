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

    public function add()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $post = array(
                'title' => $title,
                'content' => $content
            );
            $result = $this->model->add($post);

            $_POST = array();
        }

        $template_name = DX_ROOT_DIR . $this->views_dir . 'add.php';
        include_once $this->layout;
    }

    public function get($id)
    {
        if (empty($id)) {
            $posts = $this->model->find();
        } else {
            $posts = $this->model->get_by_id($id);
        }
//        var_dump($posts);
        $template_name = DX_ROOT_DIR . $this->views_dir . 'get.php';
        include_once $this->layout;
    }
}
