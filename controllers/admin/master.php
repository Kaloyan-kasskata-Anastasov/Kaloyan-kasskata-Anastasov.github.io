<?php

namespace Admin\Controllers;

class Admin_Controller extends \Controllers\Master_Controller
{
    public function __construct(
        $class_name = '\Admin\Controllers\Admin_Controller',
        $model = 'master',
        $views_dir = 'admin/master'
    )
    {
        parent::__construct(
            $class_name,$model,$views_dir
        );

        $auth = \Lib\Auth::get_instance();
        $logged_user = $auth->get_logged_user();

        if (empty($logged_user) || $logged_user['role']==='user') {
            //TODO Messages
            die("No Access");
        }
    }

}