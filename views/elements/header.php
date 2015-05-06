<html>
<head>
    <title>
        Kasskata's Blog
    </title>
    <script>
        function clearForms()
        {
            var i;
            for (i = 0; (i < document.forms.length); i++) {
                document.forms[i].reset();
            }
        }
    </script>
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
