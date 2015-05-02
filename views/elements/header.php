<html>
<head>
    <title>
        Kasskata's Blog
    </title>
</head>
<body>
<div id="Wrapper">
    <header>
        <h2>Kasskata's Blog</h2>
    </header>
    <?php
    if (!empty($this->logged_user)) {
        echo "<div>Welcome, {$this->logged_user["username"]}</div>";
    }
    ?>
    <main>
