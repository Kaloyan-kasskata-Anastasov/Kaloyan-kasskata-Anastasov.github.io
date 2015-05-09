<h2>Posts</h2>

<?php foreach ($posts as $post) : ?>
    <ul>
        <li>
            <h2><?php echo htmlentities($post["title"]); ?></h2>

            <a href="/<?php echo DX_ROOT_PATH . "admin/post/edit/{$post['id']}" ?>">
                Edit
            </a>
            <a href="/<?php echo DX_ROOT_PATH . "admin/post/delete/{$post['id']}" ?>">
                Delete
            </a>

            <p><?php echo htmlentities($post["content"]); ?></p>
        </li>
    </ul>
<?php endforeach ?>

<a href="add">Create new post</a>