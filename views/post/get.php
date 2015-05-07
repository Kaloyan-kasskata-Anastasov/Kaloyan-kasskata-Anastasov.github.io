<h2>Posts</h2>
<h3><?php echo addslashes($post["title"] . "({$author['username']})") ?></h3>
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
            <?php echo addslashes($comment["author"]) ?>
        </li>
    </ul>
<?php endforeach ?>