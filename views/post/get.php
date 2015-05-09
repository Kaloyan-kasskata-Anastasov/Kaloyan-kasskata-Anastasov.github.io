<div class="post">
    <h2><?php echo htmlentities($post["title"]); ?></h2>
    <span><?php echo htmlentities($post['created_on']);?></span>
    <br/>
    <span>By: <?php echo htmlentities($author['username'])?></span>
    <p><?php echo htmlentities($post["content"]) ?></p>
</div>
<div class="comment">
    <?php foreach ($comments as $comment) : ?>
        <span><?php echo htmlentities($comment["author"]) ?> says:</span>
        <article>
            <?php echo htmlentities($comment["comment"]) ?>
        </article>
    <?php endforeach ?>
</div>

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