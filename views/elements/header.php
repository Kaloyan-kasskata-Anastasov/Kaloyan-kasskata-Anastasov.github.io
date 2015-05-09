<html>
<head>
    <title>
        Kasskata's Blog
    </title>
    <link rel="stylesheet" type="text/css" href="/<?php echo DX_ROOT_PATH; ?>css/style.css">
</head>
<body>
<div id="wrapper">
    <header>
        <h2>Kasskata's Blog</h2>
    </header>
        <?php
        if (!empty($this->logged_user)) {
            if ($this->logged_user['role'] == 'admin') {
                include_once "admin_panel.php";
            } else {
                include_once "user_panel.php";
            }
        } else {
            include_once "unknown_user.php";
        }
        ?>
        <main>
