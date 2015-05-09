<h2>Posts</h2>

<?php foreach ($posts as $post) : ?>
    <ul>
        <li>
            <?php echo htmlentities($post["title"]);?>
        </li>
        <li>
            <?php echo htmlentities($post["content"]);?>
        </li>
        <li>
            <?php echo htmlentities($post["user_id"]);?>
        </li>
    </ul>
<?php endforeach ?>

<a href="add">Create new post</a>