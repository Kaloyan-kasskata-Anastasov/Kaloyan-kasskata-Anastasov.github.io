<div class="post">
    <h2><?php echo htmlentities($post["title"]); ?></h2>
    <span><?php echo htmlentities($post['created_on']); ?></span>
    <br/>
    <span>By: <?php echo htmlentities($author['username']) ?></span>

    <p><?php echo htmlentities($post["content"]) ?></p>
</div>
<?php foreach ($comments as $comment) : ?>
    <div class="comment" >
        <span style="border-bottom: 1px solid black">
            <?php echo htmlentities($comment["author"])."( ".
                htmlentities(explode(' ',$comment["created_on"])[1]) ." ".
                htmlentities(explode(' ',$comment["created_on"])[0]) ." )"
            ?> says:
        </span>
        <article>
            <?php echo htmlentities($comment["comment"]) ?>
        </article>
    </div>
<?php endforeach ?>

<form method="POST">
    <h2>Add a comment about this post:</h2>
    <ul>
        <li>
            <textarea name="comment"></textarea>
        </li>
        <input type="hidden" name="id" value="<?php echo htmlentities($post['id']); ?>"/>
        <li>
            <input type="submit"/>
        </li>
    </ul>
</form>