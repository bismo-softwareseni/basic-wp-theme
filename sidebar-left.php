<?php
    /**
     * This is left sidebar
     */

    //-- import main class
    global $ss_bt_main_class;

    if ( !is_active_sidebar( 'ssbt-sidebar-left' ) || $ss_bt_main_class->ssBlankSidebarVisibility( 'ssbt-sidebar-left' ) ) {
        return;
    } else {
?>

    <aside class="widget-area">
        <?php dynamic_sidebar( 'ssbt-sidebar-left' ); ?>
    </aside>

<?php
    }
?>