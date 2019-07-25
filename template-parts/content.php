<?php
    /**
     * This is default template for displaying post
     */

    //-- init global variable
    global $ss_bt_main_class;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- post header -->
	<header class="entry-header">
        <!-- display post thumbnail -->
        <?php
            if( has_post_thumbnail() ) {
        ?>

        <div class="post-thumbnail-container">
            <?php echo get_the_post_thumbnail(); ?>
        </div>

        <?php
            }
        ?>
        <!-- end display post thumbnail -->

        <!-- display title -->
        <?php
            //-- if single page
            if( is_singular() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                //-- if not single page display as link
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
            }
        ?>
        <!-- end display title -->
	</header>
    <!-- end post header -->
    
    <!-- post content -->
	<section class="entry-content">
		<?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', $ss_bt_main_class->ss_bt_text_domain ),
                'after'  => '</div>',
            ) );
		?>
	</section>
    <!-- end post content -->
</article>