<?php
    /**
     * Main template file
     * 
     * This is the most generic template file in a WordPress theme
     * and one of the two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * E.g., it puts together the home page when no home.php file exists.
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
				<main id="main" class="site-main">

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */

					//-- limit the posts amount per page
					if( function_exists( 'of_get_option' ) && !is_singular() ) {
						if( of_get_option( 'ss_blank_post_limit', '5' ) > 0 ) {
							query_posts( 'posts_per_page=' . of_get_option( 'ss_blank_post_limit', '5' ) );
						}
					}

					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					echo '<div class="post-nav-container">' . the_posts_navigation() . '</div>';
					
					//-- Reset Query
					wp_reset_query();
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
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

