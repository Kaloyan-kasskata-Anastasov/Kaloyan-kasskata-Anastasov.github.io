<h2>Posts</h2>

<?php foreach ($posts as $post) : ?>
    <h3><?php echo addslashes($post["title"]."({$post["user_id"]})") ?></h3>
    <p><?php echo addslashes($post["content"]) ?></p>
    <?php foreach ($comments as $comment) : ?>
        <ul>
            <li>
                <?php echo addslashes($comment["comment"]) ?>
            </li>
            <li>
                <?php echo addslashes($comment["post_id"]) ?>
            </li>
            <li>
                <?php echo addslashes($comment["user_id"]) ?>
            </li>
        </ul>
    <?php endforeach ?>
<?php endforeach ?>