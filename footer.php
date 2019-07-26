<?php
    /**
     * This is the theme footer that will display section before </body> section and all content after 
     */
?>

    <!-- footer -->
    <footer>
        <!-- container -->
        <div class="ui grid container">
            <!-- blog desc -->
            <div class="eight wide column">
                <?php
                    //-- get blog desc from options framework
                    if( function_exists( 'of_get_option' ) && !empty( of_get_option( 'ss_blank_blog_desc', '' ) ) ) {
                        echo '<p class="blog-desc">' . of_get_option( 'ss_blank_blog_desc', '' ) . '</p>';
                    }
                ?>
            </div>
            <!-- end blog desc -->

            <!-- for widget -->
            <div class="four wide column"></div>
            <div class="four wide column"></div>
            <!-- for widget -->
        </div>
        <!-- end container -->

        <!-- copyright container -->
        <div class="copyright-container">
            <?php
                //-- get copyright from options framework
                if( function_exists( 'of_get_option' ) && !empty( of_get_option( 'ss_blank_copyright', '' ) ) ) {
                    echo '<p class="copyright">' . of_get_option( 'ss_blank_copyright', '' ) . '</p>';
                }
            ?>
        </div>
        <!-- end copyright container -->
    </footer>
    <!-- end footer -->

    <?php wp_footer(); ?>

</body>
</html>