<h2>Posts</h2>

<?php foreach ($posts as $post) : ?>
    <ul>
        <li>
            <?php echo $post["title"]?>
        </li>
        <li>
            <?php echo $post["content"]?>
        </li>
        <li>
            <?php echo $post["user_id"]?>
        </li>
    </ul>
<?php endforeach ?>