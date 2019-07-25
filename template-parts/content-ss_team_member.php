<?php
    /**
     * This is default template for displaying post
     */

    //-- init global variable
    global $ss_bt_main_class;

    //-- get team member post meta
    $ss_team_member_meta = get_post_meta( get_the_ID() );
?>


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- post header -->
        <header class="entry-header">
            <!-- display post thumbnail -->
            <?php
                if( isset( $ss_team_member_meta[ 'ss_tm_image' ] ) && !empty( $ss_team_member_meta[ 'ss_tm_image' ][ 0 ] ) ) {
            ?>

            <div class="post-thumbnail-container">
                <img src="<?php echo esc_url( wp_get_attachment_image_src( $ss_team_member_meta[ 'ss_tm_image' ][ 0 ] )[ 0 ] ); ?>" />
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

            <!-- position -->
            <?php
                if( isset( $ss_team_member_meta[ 'ss_tm_position' ] ) && !empty( $ss_team_member_meta[ 'ss_tm_position' ][ 0 ] ) ) {
            ?>
                <h6><?php echo $ss_team_member_meta[ 'ss_tm_position' ][ 0 ]; ?></h6>
            <?php
                }
            ?>

            <!-- email -->
            <?php
                if( isset( $ss_team_member_meta[ 'ss_tm_email' ] ) && !empty( $ss_team_member_meta[ 'ss_tm_email' ][ 0 ] ) ) {
            ?>
                <h6><?php echo $ss_team_member_meta[ 'ss_tm_email' ][ 0 ]; ?></h6>
            <?php
                }
            ?>

            <!-- phone -->
            <?php
                if( isset( $ss_team_member_meta[ 'ss_tm_phone' ] ) && !empty( $ss_team_member_meta[ 'ss_tm_phone' ][ 0 ] ) ) {
            ?>
                <h6><?php echo $ss_team_member_meta[ 'ss_tm_phone' ][ 0 ]; ?></h6>
            <?php
                }
            ?>

            <!-- website -->
            <?php
                if( isset( $ss_team_member_meta[ 'ss_tm_website' ] ) && !empty( $ss_team_member_meta[ 'ss_tm_website' ][ 0 ] ) ) {
            ?>
                <h6><?php echo $ss_team_member_meta[ 'ss_tm_website' ][ 0 ]; ?></h6>
            <?php
                }
            ?>
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
