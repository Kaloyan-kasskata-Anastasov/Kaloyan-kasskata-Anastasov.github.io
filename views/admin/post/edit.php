<form method="POST">
    <ul>
        <li>
            <input type="hidden" name="id" value="<?php echo addslashes($post['id']); ?>"/>

            <span>Title</span>
            <input name="title"
                   value="<?php echo addslashes($post['title']); ?>"
                   type="text"/>
        </li>
        <li>
            <span>Content</span>
        <textarea name="content"><?php echo addslashes($post['content']); ?>
        </textarea>
        </li>
        <li>
            <input type="submit" />
        </li>
    </ul>
</form>