<?php
    /**
     * Main SoftwareSeni Blank Theme Class
     * This class will handle most of the theme functionality
     */

    class SS_Blank_Theme_Main {
        var $ss_bt_text_domain;

        function __construct() {
            //-- define textdomain
            $this->ss_bt_text_domain = "ssblanktheme";
        }

        //-- function to setup theme, add theme support, register navigation, load text domain
        function ssBlankThemeSetup() {
            //-- load theme text domain
            load_theme_textdomain( $this->ss_bt_text_domain, get_template_directory() . '/languages' );
        
            //-- add theme support - title tag ( WP will provide title tag for each page )
            add_theme_support( 'title-tag' );

            //-- register Main Menu & Footer Menu
            register_nav_menus( array(
                'ssbt-menu-main'    => esc_html__( 'Main Menu', $this->ss_bt_text_domain ),
                'ssbt-menu-footer'  => esc_html__( 'Footer Menu', $this->ss_bt_text_domain )
            ) );
        }

        //-- function to register theme sidebars
        function ssBlankThemeRegisterSidebars() {
            //-- left sidebar
            register_sidebar( array(
                'name'          => esc_html__( 'Left Sidebar', $this->ss_bt_text_domain ),
                'id'            => 'ssbt-sidebar-left',
                'description'   => esc_html__( 'Add widgets to the left sidebar.', $this->ss_bt_text_domain ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ) );

            //-- right sidebar
            register_sidebar( array(
                'name'          => esc_html__( 'Right Sidebar', $this->ss_bt_text_domain ),
                'id'            => 'ssbt-sidebar-right',
                'description'   => esc_html__( 'Add widgets to the right sidebar.', $this->ss_bt_text_domain ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ) );
        }

        //-- function to enqueue scripts and styles
        function ssBlankThemeEnqueueScripts() {
            //-- main css
            wp_enqueue_style( 'ssbt-css-main', get_stylesheet_uri() );

            //-- bootstrap css
            wp_enqueue_style( 'ssbt-css-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'v4.0.0', 'all' );

            //-- bootstrap js
            wp_enqueue_script( 'ssbt-js-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), 'v4.0.0', true );
        }
    }
?>