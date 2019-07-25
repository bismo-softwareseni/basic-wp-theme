<?php
    //-- import main class
    $ss_bt_main_class = "";
    if( !class_exists( 'SS_Blank_Theme_Main' ) ) {
        include_once( get_template_directory() . '/inc/ssblanktheme.class.main.php' );

        $ss_bt_main_class = new SS_Blank_Theme_Main();
    }

    //-- setup the theme
    if( !empty( $ss_bt_main_class ) ) {
        //-- theme support, load text domain, register menus
        if( method_exists( $ss_bt_main_class, 'ssBlankThemeSetup' ) ) {
            add_action( 'after_setup_theme', array( $ss_bt_main_class, 'ssBlankThemeSetup' ) );
        }
        
        //-- register sidebars
        if( method_exists( $ss_bt_main_class, 'ssBlankThemeRegisterSidebars' ) ) {
            add_action( 'widgets_init', array( $ss_bt_main_class, 'ssBlankThemeRegisterSidebars' ) );
        }

        //-- enqueue css and js
        if( method_exists( $ss_bt_main_class, 'ssBlankThemeEnqueueScripts' ) ) {
            add_action( 'wp_enqueue_scripts', array( $ss_bt_main_class, 'ssBlankThemeEnqueueScripts' ) );
        }
    }
?>