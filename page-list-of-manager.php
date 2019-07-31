<?php
    /*
        Template Name: Display Manager
    */

    //-- header 
	get_header();
?>

<!-- container -->
<div class="ui grid container" style="margin-top: 50px;">
		<!-- left sidebar -->
		<div class="three wide column">
			<?php get_sidebar( 'left' ); ?>
		</div>
		<!-- end left sidebar -->

		<!-- main content -->
		<div class="ten wide column">
			<div id="primary" class="content-area">
				<div id="main" class="site-main">
                    <!-- display staff -->
                    <?php
                        //-- check if plugin active
                        if( function_exists( 'is_plugin_active' ) ) {
                            if( is_plugin_active( 'ss_wp_7/ss_wp_7.php' ) ) {
                                $ss_wp_7_main_class = new SS_WP_7_Main();

                                $ss_wp_7_main_class->ssDisplayStaffManager( 'ss_manager' );
                            }
                        }
                    ?>
                    <!-- end display staff -->
				</div><!-- #main -->
			</div><!-- #primary -->
		</div>
		<!-- end main content -->

		<!-- right sidebar -->
		<div class="three wide column">
			<?php get_sidebar( 'right' ); ?>
		</div>
		<!-- end right sidebar -->
	</div>
	<!-- end container -->

<?php
    get_footer();
?>
