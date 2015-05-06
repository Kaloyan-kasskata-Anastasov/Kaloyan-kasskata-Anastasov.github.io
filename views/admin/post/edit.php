<form method="POST">
    <ul>
        <li>
            <span>Title</span>
            <input name="title"
                   value="<?php echo addslashes($post_for_edit['title']); ?>"
                   type="text"/>
        </li>
        <li>
            <!--            <span>Content</span>-->
            <textarea name="content"><?php echo addslashes($post_for_edit['content']); ?></textarea>
        </li>
        <input type="hidden" name="id" value="<?php echo addslashes($post_for_edit['id']); ?>"/>
        <li>
            <input type="submit" value="Change"/>
        </li>
    </ul>
</form>