<?php
    //-- import main class
    global $ss_bt_main_class;

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

        //-- add meta tags
        if( method_exists( $ss_bt_main_class, 'ssBlankThemeAddMetaTags' ) ) {
            add_action( 'wp_head', array( $ss_bt_main_class, 'ssBlankThemeAddMetaTags' ) );
        }
    }

    //-- check whether maintenance mode enabled or not
    if( function_exists( 'of_get_option' ) ) {
        if( of_get_option( 'ss_blank_maintenance_mode', '0' ) == '1' ) {
            add_action( 'init', array( $ss_bt_main_class, 'ssBlankThemeMaintenance' ) );
        }
    }
?>