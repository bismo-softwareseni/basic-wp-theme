<?php
    /**
     * This is left sidebar
     */

    if ( !is_active_sidebar( 'ssbt-sidebar-left' ) ) {
        return;
    } else {
?>

    <aside class="widget-area">
        <?php dynamic_sidebar( 'ssbt-sidebar-left' ); ?>
    </aside>

<?php
    }
?>