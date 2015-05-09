<h2>Posts</h2>
<?php foreach ($posts as &$post) : ?>
    <li class="posts">
        <header>
            <h3>
                <a href="/<?php echo DX_ROOT_PATH . "post/get/" . $post['id'] ?>">
                    <?php echo htmlentities("{$post["title"]}"); ?>
                </a>
            </h3>
                <span>
                    <?php echo $post["created_on"] != null ? htmlentities(explode(' ',$post["created_on"])[1])."<br/>".htmlentities(explode(' ',$post["created_on"])[0]): "No Date" ?>
                </span>
        </header>

        <article>
            <h4>
                By: <?php echo htmlentities($post["author"]); ?>
            </h4>

            <p>
                <?php
                if (strlen($post["content"]) > 500) {
                    echo substr(htmlentities($post["content"]), 0, 500) . "...";
                }else{
                    echo htmlentities($post["content"]);
                }
                ?>
            </p>
        </article>
    </li>
<?php endforeach ?>
