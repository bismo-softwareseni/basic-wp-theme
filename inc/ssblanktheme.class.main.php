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

            //-- add theme support - post thumbnail
            add_theme_support( 'post-thumbnails' );

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

            //-- semantic ui css
            wp_enqueue_style( 'ssbt-css-semantic', get_template_directory_uri() . '/semantic/dist/semantic.min.css', array(), 'v2.4.2', 'all' );
            
            //-- semantic ui js
            wp_enqueue_script( 'ssbt-js-semantic', get_template_directory_uri() . '/semantic/dist/semantic.min.js', array(), 'v2.4.2', 'all' );

            //-- bootstrap css
            //wp_enqueue_style( 'ssbt-css-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'v4.0.0', 'all' );

            //-- bootstrap js
            //wp_enqueue_script( 'ssbt-js-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), 'v4.0.0', true );
        }

        //-- function to add meta tags ( so not hard-coded inside header tag )
        function ssBlankThemeAddMetaTags() {
    ?>
            <meta charset="<?php bloginfo( 'charset' ); ?>">
	        <meta name="viewport" content="width=device-width, initial-scale=1">
	        <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php
        }

        //-- function to show menu, altering the default WP menu structure to become Semantic UI
        function ssBlankThemeShowMenu( $ss_menu_name ) {
            if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $ss_menu_name ] ) ) {
                $menu = wp_get_nav_menu_object( $locations[ $ss_menu_name ] );
                $menu_items = wp_get_nav_menu_items($menu->term_id);
                echo '<nav class="ui menu">';
                echo '<div class="right menu">';
                    foreach ( (array) $menu_items as $key => $menu_item ) {
                        $title = $menu_item->title;
                        $url = $menu_item->url;
                        $class = $menu_item->classes; // get array with class names
                        if ( get_the_ID() == $menu_item->object_id ) { // check for current page
                            echo '<a class="item active" href="' . $url . '">';
                        } else {
                            echo '<a class="item" href="' . $url . '">';
                        }
                            echo $title;
                        echo '</a>';
                    }
                echo '</div>';
                echo '</nav>';
            }
        }
    }
?>