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
        <!-- main menu -->
        <?php
            $ss_bt_main_class->ssBlankThemeShowMenu( 'ssbt-menu-main' );
        ?>
        <!-- end main menu -->
    </header>
    <!-- end header -->