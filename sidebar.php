<?php
    /**
     * This is default sidebar template
     * Dedault sidebar to show is right, but if right sidebar is not active then check for left sidebar
     */

    if ( !is_active_sidebar( 'ssbt-sidebar-right' ) ) {
        if ( !is_active_sidebar( 'ssbt-sidebar-left' ) ) {
            return;
        } else {
?>

    <aside class="widget-area">
        <?php dynamic_sidebar( 'ssbt-sidebar-left' ); ?>
    </aside>

<?php
        }
    } else {
?>

    <aside class="widget-area">
        <?php dynamic_sidebar( 'ssbt-sidebar-right' ); ?>
    </aside>

<?php
    }
?>