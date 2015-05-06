<h2>Posts</h2>

<?php foreach ($posts as $post) : ?>
    <ul>
        <li>
            <?php echo addslashes($post["title"]);?>
        </li>
        <li>
            <?php echo addslashes($post["content"]);?>
        </li>
        <li>
            <?php echo addslashes($post["user_id"]);?>
        </li>
    </ul>
<?php endforeach ?>