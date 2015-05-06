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
        if (isset($_POST['content']) && isset($_POST['title'])) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $post = array(
                    'title' => $title,
                    'content' => $content
                );
                $result = $this->model->add($post);

                $_POST = array();

                header("Location: " . trim($_SERVER['REQUEST_URI'], 'add'));
            }
        }

        $template_name = DX_ROOT_DIR . $this->views_dir . 'add.php';
        include_once $this->layout;
    }

    public function edit($id)
    {
        var_dump($_POST);
        if (!empty($_POST['title']) &&
            !empty($_POST['content']) &&
            !empty($_POST['id'])) {

            $title = $_POST['title'];
            $content = $_POST['content'];
            $id = $_POST['id'];
            $post = array(
                'title' => $title,
                'content' => $content,
                'id' => $id
            );
            $result = $this->model->edit($post);
            header("Location: " . trim($_SERVER['REQUEST_URI'], 'edit'));
        }

        $post = $this->model->get_by_id($id);
        if (empty($post)) {
            die("Item with id {$id} doesnt exist.");
        }
        $post = $post[0];

        $template_name = DX_ROOT_DIR . $this->views_dir . 'edit.php';
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
