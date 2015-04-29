<?php

namespace Controllers;

class Master_Controller
{
    protected $pr_view = '/views/';
    protected $layout;
    protected $views_dir;
    protected $template_name;

    public function __construct($views_dir = 'master')
    {
        //echo "MASTER <br/>";
        $this->views_dir = $this->pr_view . $views_dir . '/';

        $this->layout = DX_ROOT_DIR . 'views/layouts/default.php';
    }
}