<?php
    /**
     * This is the theme header that will display all of the <head> section until <body> section 
     */

    //-- import main class
    global $ss_bt_main_class;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- header -->
    <header class="header-main">
        <!-- container -->
        <div class="ui grid container">
            <!-- logo -->
            <div class="three wide column">
                <?php
                    $ss_logo_url = "";

                    //-- get logo image from options framework
                    if( function_exists( 'of_get_option' ) ) {
                        $ss_logo_url = of_get_option( 'ss_blank_logo', '' );
                    }

                    //-- show logo image
                    if( !empty( $ss_logo_url ) ) {
                ?>

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo">
                    <img src="<?php echo esc_url( $ss_logo_url ); ?>" class="img-logo" />        
                </a>

                <?php
                    }
                ?>
            </div>
            <!-- end logo -->
            
            <!-- main menu -->
            <nav class="thirteen wide column">
                
                <?php
                    if( has_nav_menu( 'ssbt-menu-main' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'ssbt-menu-main',
                            'menu_class'     => 'primary-menu',
                            'walker'         => new SS_Blank_Theme_Menu_Walker()
                        ) );
                    } 
                ?>
            </nav>
            <!-- end main menu -->
        </div>
        <!-- end container -->
    </header>
    <!-- end header -->