<h2>Comments</h2>
<ul>
    <?php foreach ($posts as $post) : ?>
        <li>
            <?php echo htmlentities("{$post["title"]}(") . htmlentities(($post["created_on"] != null ? $post["created_on"] : "No Date"). ")"); ?>
            <br/>
            <span><?php echo htmlentities($author["username"]); ?></span>
            <p><?php echo htmlentities($post["content"]); ?></p>
        </li>
    <?php endforeach ?>
</ul>