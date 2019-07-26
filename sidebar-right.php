<?php
    /**
     * This is right sidebar
     */

    //-- import main class
    global $ss_bt_main_class;

    if ( !is_active_sidebar( 'ssbt-sidebar-right' ) || $ss_bt_main_class->ssBlankSidebarVisibility( 'ssbt-sidebar-right' ) ) {
        return;
    } else {
?>

    <aside class="widget-area">
        <?php dynamic_sidebar( 'ssbt-sidebar-right' ); ?>
    </aside>

<?php
    }
?>