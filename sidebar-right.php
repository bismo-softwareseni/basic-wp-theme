<?php
    /**
     * This is right sidebar
     */

    if ( !is_active_sidebar( 'ssbt-sidebar-right' ) ) {
        return;
    } else {
?>

    <aside class="widget-area">
        <?php dynamic_sidebar( 'ssbt-sidebar-right' ); ?>
    </aside>

<?php
    }
?>