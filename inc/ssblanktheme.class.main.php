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

        //-- function to enabling maintenance mode
        function ssBlankThemeMaintenance() {
            if ( !current_user_can('edit_themes') || !is_user_logged_in() ) {
                wp_die( '<h1>Under Maintenance</h1><br />Something aint right, but were working on it! Check back later.' );
            }
        }

        //-- function to get sidebar visibility from options framework
        function ssBlankSidebarVisibility( $sidebar_id ) {
            $ss_hide_sidebar = false;

            if( function_exists( 'of_get_option' ) && !empty( of_get_option( 'ss_blank_sidebars_visibility', '0' ) ) ) {
                if( of_get_option( 'ss_blank_sidebars_visibility', '0' )[ $sidebar_id ] == '0' ) {
                    $ss_hide_sidebar = true;
                }
            }

            return $ss_hide_sidebar;
        }
    }


    /**
     * Walker class to change WP navigation menu to follow 
     * Semantic UI structure
     */
    class SS_Blank_Theme_Menu_Walker extends Walker_Nav_Menu {

        //-- start element
        function start_el( &$output, $item, $depth=0, $args=array(), $id = 0 ) {            
            $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

            //-- set to SPAN if no Permalink
            if( $item->url && $item->url != '#' ) {
                $output .= '<a href="' . $item->url . '">';
            } else {
                $output .= '<span>';
            }

            $output .= $item->title;

            if( $item->description != '' && $depth == 0 ) {
                $output .= '<small class="description">' . $item->description . '</small>';
            }

            if( $item->url && $item->url != '#' ) {
                $output .= '</a>';
            } else {
                $output .= '</span>';
            }
        }
    }
?>