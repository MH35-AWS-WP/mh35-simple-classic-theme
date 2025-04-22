<aside id="sidebar" class="sidebar">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) {
        ?><ul id="sidebar-1-content" class="sidebar-1-content">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </ul><?php
    }
    ?>
</aside>
