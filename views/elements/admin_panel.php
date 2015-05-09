<div class="admin">
    <ul>
        <div id="left-panel">
            <li>
                <?php echo "Welcome, " . htmlentities($this->logged_user["username"]); ?>
            </li>
            <li>
                <a href="/<?php echo DX_ROOT_PATH . "admin/post/" ?>">
                    Posts
                </a>
            </li>
            <li>
                <a href="/<?php echo DX_ROOT_PATH . "admin/post/add/" ?>">
                    Add new post
                </a>
            </li>
        </div>
        <div id="right-panel">

            <li>
                <a href="/<?php echo DX_ROOT_PATH . "logout/" ?>">Logout</a>
            </li>
        </div>
        <div style="float:none;">
            </div>
    </ul>
</div>