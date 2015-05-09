<?php

namespace Controllers;

class Post_Controller extends Master_Controller
{
    public function __construct()
    {
        parent::__construct(get_class(), 'post', 'post');
    }

    public function index($id)
    {
        $this->get($id);

//        $posts = $this->model->find();
//
//        foreach ($posts as &$post) {
//            $author = $this->model->get_author($post['user_id']);
//            $post['author'] = $author[0]['username'];
//        }
//
//        var_dump($posts);
//
//
//        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
//        include_once $this->layout;
    }

    public function get($id)
    {
        if (empty($id)) {
            $posts = $this->model->find();
            foreach ($posts as &$post) {
                $author = $this->model->get_author($post['user_id']);
                $post['author'] = $author[0]['username'];
            }

            $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
            include_once $this->layout;
        } else {

            if (!empty($_POST['comment']) && !empty($_POST['id'])) {
                $new_comment = $_POST['comment'];
                $id = $_POST['id'];
                $comment = array(
                    'comment' => $new_comment,
                    'post_id' => $id
                );

                $result = $this->model->add_comment($comment);

                $_POST = array();

                header("Location: " . rtrim($_SERVER['REQUEST_URI'], 'get/'));
            }

            $post = $this->model->get_by_id($id);

            if (empty($post)) {
                die("Nothing to show.");
            }

            $post = $post[0];
            $comments = $this->model->get_comments($id);
            $user_id = $post['user_id'];
            $author = $this->model->get_author($user_id);
            $author = $author[0];

            $template_name = DX_ROOT_DIR . $this->views_dir . 'get.php';
            include_once $this->layout;
        }
    }
}
